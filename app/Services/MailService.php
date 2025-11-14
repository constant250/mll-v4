<?php

namespace App\Services;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception as PHPMailerException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;

class MailService
{
    /**
     * Create and configure a PHPMailer instance
     *
     * @return PHPMailer
     * @throws PHPMailerException
     */
    private function createMailer(): PHPMailer
    {
        $mail = new PHPMailer(true);

        // Server settings
        $mail->isSMTP();
        $mail->Host = config('mail.mailers.smtp.host', env('MAIL_HOST', 'smtp.mailtrap.io'));
        $mail->SMTPAuth = true;
        $mail->Username = config('mail.mailers.smtp.username', env('MAIL_USERNAME'));
        $mail->Password = config('mail.mailers.smtp.password', env('MAIL_PASSWORD'));
        
        // Encryption
        $encryption = config('mail.mailers.smtp.encryption', env('MAIL_ENCRYPTION', 'tls'));
        if ($encryption === 'tls') {
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        } elseif ($encryption === 'ssl') {
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        }
        
        $mail->Port = config('mail.mailers.smtp.port', env('MAIL_PORT', 587));
        
        // From address
        $mail->setFrom(
            config('mail.from.address', env('MAIL_FROM_ADDRESS', 'hello@example.com')),
            config('mail.from.name', env('MAIL_FROM_NAME', 'Example'))
        );

        // Character set
        $mail->CharSet = 'UTF-8';
        $mail->Encoding = 'base64';

        return $mail;
    }

    /**
     * Send an email using PHPMailer
     *
     * @param string $to
     * @param string $subject
     * @param string $body
     * @param string|null $replyTo
     * @param string|null $replyToName
     * @return bool
     */
    public function sendEmail(
        string $to,
        string $subject,
        string $body,
        ?string $replyTo = null,
        ?string $replyToName = null
    ): bool {
        $mail = null;
        try {
            $mail = $this->createMailer();

            // Recipients
            $mail->addAddress($to);

            // Reply-To
            if ($replyTo) {
                $mail->addReplyTo($replyTo, $replyToName ?? '');
            }

            // Content
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = $body;
            $mail->AltBody = strip_tags($body);

            // Send email
            $mail->send();
            return true;

        } catch (PHPMailerException $e) {
            $errorInfo = $mail ? $mail->ErrorInfo : $e->getMessage();
            Log::error('PHPMailer error: ' . $errorInfo, [
                'exception' => $e->getMessage(),
                'to' => $to,
                'subject' => $subject,
            ]);
            throw new \Exception('Failed to send email: ' . $errorInfo, 0, $e);
        }
    }

    /**
     * Send email from a Blade template
     *
     * @param string $to
     * @param string $subject
     * @param string $template
     * @param array $data
     * @param string|null $replyTo
     * @param string|null $replyToName
     * @return bool
     */
    public function sendEmailFromTemplate(
        string $to,
        string $subject,
        string $template,
        array $data = [],
        ?string $replyTo = null,
        ?string $replyToName = null
    ): bool {
        try {
            // Render the Blade template
            $body = View::make($template, $data)->render();

            return $this->sendEmail($to, $subject, $body, $replyTo, $replyToName);

        } catch (\Exception $e) {
            Log::error('Failed to render email template', [
                'template' => $template,
                'error' => $e->getMessage(),
            ]);
            throw $e;
        }
    }
}

