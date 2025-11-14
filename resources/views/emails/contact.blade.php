<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form Submission</title>
</head>
<body style="margin: 0; padding: 0; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif; background-color: #ffffff;">
    <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="background-color: #ffffff;">
        <tr>
            <td align="center" style="padding: 40px 20px;">
                <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="600" style="max-width: 600px; background-color: #ffffff;">
                    <!-- Logo Section -->
                    <tr>
                        <td align="center" style="padding-bottom: 30px;">
                            <img src="{{ $baseUrl }}/images/MLL%20-%20LOGO%20-%20WEB.png" alt="Melbourne Legal Lawyers" style="max-width: 200px; height: auto;" />
                        </td>
                    </tr>
                    
                    <!-- Heading -->
                    <tr>
                        <td align="center" style="padding-bottom: 40px;">
                            <h1 style="margin: 0; font-size: 32px; font-weight: 600; color: #333333; letter-spacing: -0.5px;">Contact Form Submission</h1>
                        </td>
                    </tr>
                    
                    <!-- Form Fields -->
                    <tr>
                        <td>
                            <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                                <!-- Full Name -->
                                <tr>
                                    <td style="padding-bottom: 20px;">
                                        <div style="margin-bottom: 8px;">
                                            <span style="font-size: 12px; font-weight: 500; color: #666666; text-transform: uppercase; letter-spacing: 0.5px;">FULL NAME</span>
                                        </div>
                                        <div style="background-color: #f5f5f5; border-radius: 4px; padding: 12px 16px; min-height: 20px;">
                                            <span style="font-size: 16px; color: #000000; line-height: 1.5;">{{ htmlspecialchars($fullName) }}</span>
                                        </div>
                                    </td>
                                </tr>
                                
                                <!-- Email -->
                                <tr>
                                    <td style="padding-bottom: 20px;">
                                        <div style="margin-bottom: 8px;">
                                            <span style="font-size: 12px; font-weight: 500; color: #666666; text-transform: uppercase; letter-spacing: 0.5px;">EMAIL</span>
                                        </div>
                                        <div style="background-color: #f5f5f5; border-radius: 4px; padding: 12px 16px; min-height: 20px;">
                                            <a href="mailto:{{ htmlspecialchars($email) }}" style="font-size: 16px; color: #0066cc; text-decoration: none; line-height: 1.5;">{{ htmlspecialchars($email) }}</a>
                                        </div>
                                    </td>
                                </tr>
                                
                                <!-- Phone -->
                                <tr>
                                    <td style="padding-bottom: 20px;">
                                        <div style="margin-bottom: 8px;">
                                            <span style="font-size: 12px; font-weight: 500; color: #666666; text-transform: uppercase; letter-spacing: 0.5px;">PHONE</span>
                                        </div>
                                        <div style="background-color: #f5f5f5; border-radius: 4px; padding: 12px 16px; min-height: 20px;">
                                            <a href="tel:{{ htmlspecialchars($phone) }}" style="font-size: 16px; color: #000000; text-decoration: none; line-height: 1.5;">{{ htmlspecialchars($phone) }}</a>
                                        </div>
                                    </td>
                                </tr>
                                
                                <!-- Practice Area -->
                                <tr>
                                    <td style="padding-bottom: 20px;">
                                        <div style="margin-bottom: 8px;">
                                            <span style="font-size: 12px; font-weight: 500; color: #666666; text-transform: uppercase; letter-spacing: 0.5px;">PRACTICE AREA</span>
                                        </div>
                                        <div style="background-color: #f5f5f5; border-radius: 4px; padding: 12px 16px; min-height: 20px;">
                                            <span style="font-size: 16px; color: #000000; line-height: 1.5;">{{ htmlspecialchars($practiceArea) }}</span>
                                        </div>
                                    </td>
                                </tr>
                                
                                <!-- Description -->
                                <tr>
                                    <td style="padding-bottom: 20px;">
                                        <div style="margin-bottom: 8px;">
                                            <span style="font-size: 12px; font-weight: 500; color: #666666; text-transform: uppercase; letter-spacing: 0.5px;">DESCRIPTION</span>
                                        </div>
                                        <div style="background-color: #f5f5f5; border-radius: 4px; padding: 12px 16px; min-height: 20px;">
                                            <p style="margin: 0; font-size: 16px; color: #000000; line-height: 1.5; white-space: pre-wrap;">{{ htmlspecialchars($description) }}</p>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    
                    <!-- Footer -->
                    <tr>
                        <td align="center" style="padding-top: 40px; border-top: 1px solid #e5e5e5;">
                            <p style="margin: 0; font-size: 12px; color: #999999; line-height: 1.5;">This email was generated by Melbourne Legal Lawyers Website</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>

