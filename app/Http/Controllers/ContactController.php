<?php

namespace App\Http\Controllers;

use App\Services\MailService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fullName' => 'required|string|min:2|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|min:8|max:20',
            'practiceArea' => 'required|string|max:255',
            'description' => 'required|string|min:10|max:5000',
        ], [
            'fullName.required' => 'Full name is required',
            'fullName.min' => 'Full name must be at least 2 characters',
            'email.required' => 'Email is required',
            'email.email' => 'Please enter a valid email address',
            'phone.required' => 'Phone number is required',
            'phone.min' => 'Please enter a valid phone number',
            'practiceArea.required' => 'Please select a practice area',
            'description.required' => 'Description is required',
            'description.min' => 'Description must be at least 10 characters',
        ]);

        if ($validator->fails()) {
            if ($request->expectsJson() || $request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed',
                    'errors' => $validator->errors()
                ], 422);
            }

            return back()->withErrors($validator)->withInput();
        }

        $validated = $validator->validated();

        // Get recipient email from config or environment
        $recipientEmail = config('mail.contact_email', config('mail.from.address'));
        $baseUrl = $request->getSchemeAndHttpHost();

        try {
            // Send email to business using PHPMailer
            $mailService = new MailService();
            $mailService->sendEmailFromTemplate(
                $recipientEmail,
                'MLL - Contact Form Submission - ' . $validated['practiceArea'],
                'emails.contact',
                [
                    'fullName' => $validated['fullName'],
                    'email' => $validated['email'],
                    'phone' => $validated['phone'],
                    'practiceArea' => $validated['practiceArea'],
                    'description' => $validated['description'],
                    'baseUrl' => $baseUrl,
                ],
                $validated['email'],
                $validated['fullName']
            );

            // If no exception was thrown, mail was sent successfully
            Log::info('Contact form email sent successfully', [
                'recipient' => $recipientEmail,
                'from' => $validated['email'],
                'practice_area' => $validated['practiceArea']
            ]);

            // Save to CSV file
            $this->saveToCsv($validated);

        } catch (\Exception $e) {
            Log::error('Contact form submission error', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'recipient' => $recipientEmail,
                'form_data' => $validated
            ]);

            if ($request->expectsJson() || $request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to send email. Please try again later.'
                ], 500);
            }

            return back()->with('error', 'An error occurred. Please try again later.')->withInput();
        }

        // Optionally send confirmation email to user
        if (config('mail.send_confirmation_email', false)) {
            try {
                $mailService = new MailService();
                $mailService->sendEmailFromTemplate(
                    $validated['email'],
                    'Thank you for contacting Melbourne Legal Lawyers',
                    'emails.contact-confirmation',
                    [
                        'fullName' => $validated['fullName'],
                        'practiceArea' => $validated['practiceArea'],
                        'description' => $validated['description'],
                    ]
                );

                Log::info('Contact form confirmation email sent successfully', [
                    'recipient' => $validated['email']
                ]);

            } catch (\Exception $e) {
                // Log error but don't fail the request if confirmation email fails
                Log::error('Contact form confirmation email error', [
                    'error' => $e->getMessage(),
                    'recipient' => $validated['email']
                ]);
            }
        }

        if ($request->expectsJson() || $request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Thank you for your inquiry! We will get back to you soon.'
            ]);
        }

        return back()->with('success', 'Thank you for your inquiry! We will get back to you soon.');
    }

    /**
     * Save form submission to CSV file
     *
     * @param array $data
     * @return void
     */
    private function saveToCsv(array $data): void
    {
        try {
            $csvFile = 'contact-submissions.csv';
            $csvPath = storage_path('app/private/' . $csvFile);

            // Check if file exists to determine if we need to write headers
            $fileExists = file_exists($csvPath);

            // Open file in append mode
            $handle = fopen($csvPath, 'a');

            if ($handle === false) {
                Log::error('Failed to open CSV file for writing', ['path' => $csvPath]);
                return;
            }

            // Write headers if file is new
            if (!$fileExists) {
                $headers = ['Timestamp', 'Full Name', 'Email', 'Phone', 'Practice Area', 'Description'];
                fputcsv($handle, $headers);
            }

            // Prepare data row
            $row = [
                now()->toDateTimeString(),
                $data['fullName'],
                $data['email'],
                $data['phone'],
                $data['practiceArea'],
                $data['description'],
            ];

            // Write data row
            fputcsv($handle, $row);

            fclose($handle);

            Log::info('Contact form submission saved to CSV', [
                'file' => $csvFile,
                'email' => $data['email']
            ]);

        } catch (\Exception $e) {
            // Log error but don't fail the request if CSV saving fails
            Log::error('Failed to save contact form submission to CSV', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
        }
    }
}
