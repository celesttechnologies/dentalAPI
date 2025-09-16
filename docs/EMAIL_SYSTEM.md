# Email System Documentation

## Overview
This Laravel 11 application includes a comprehensive email system for sending various types of emails, with a focus on provider welcome emails for the dental clinic.

## Components

### 1. EmailService (`app/Services/EmailService.php`)
A centralized service for handling all email operations:

- `sendWelcomeEmail(Provider $provider)`: Sends welcome email to new providers
- `sendCustomEmail(string $to, string $subject, string $template, array $data)`: Sends custom emails with templates
- `sendBulkEmails(array $recipients, string $subject, string $template, array $data)`: Sends emails to multiple recipients

### 2. WelcomeEmail Mailable (`app/Mail/WelcomeEmail.php`)
A Laravel Mailable class that:
- Implements `ShouldQueue` for background processing
- Uses the welcome email template
- Includes provider information and clinic branding

### 3. Email Template (`resources/views/emails/welcome.blade.php`)
A responsive HTML email template featuring:
- Professional dental clinic branding
- Provider information display
- Next steps for new providers
- Contact information
- Mobile-responsive design

## Configuration

### Environment Variables
Add these to your `.env` file:

```env
MAIL_MAILER=smtp
MAIL_HOST=your-smtp-host
MAIL_PORT=587
MAIL_USERNAME=your-email@domain.com
MAIL_PASSWORD=your-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="noreply@dentalclinic.com"
MAIL_FROM_NAME="Dental Clinic"
```

### Mail Configuration
The system uses Laravel's default mail configuration in `config/mail.php`. Supported drivers:
- SMTP (recommended for production)
- Log (for development/testing)
- Mailgun, SES, Postmark, Resend

## Usage

### Automatic Welcome Email
When a new provider is created via the `ProviderController::store()` method, a welcome email is automatically sent.

### Manual Email Sending
```php
use App\Services\EmailService;

$emailService = app(EmailService::class);

// Send welcome email
$emailService->sendWelcomeEmail($provider);

// Send custom email
$emailService->sendCustomEmail(
    'user@example.com',
    'Subject',
    'emails.custom-template',
    ['data' => 'value']
);
```

### Testing Emails
Use the provided test command:
```bash
php artisan email:test user@example.com
php artisan email:test user@example.com --provider-id=1
```

## Queue Configuration
The welcome email implements `ShouldQueue` for background processing. Ensure your queue is configured:

```env
QUEUE_CONNECTION=database
```

Run the queue worker:
```bash
php artisan queue:work
```

## Extending the System

### Adding New Email Types
1. Create a new Mailable class in `app/Mail/`
2. Create a corresponding template in `resources/views/emails/`
3. Add methods to `EmailService` for sending the new email type

### Customizing Templates
- Edit templates in `resources/views/emails/`
- Use Laravel Blade syntax for dynamic content
- Maintain responsive design for mobile compatibility

## Troubleshooting

### Common Issues
1. **Emails not sending**: Check mail configuration and credentials
2. **Queue not processing**: Ensure queue worker is running
3. **Template not found**: Verify template path and file exists

### Logs
Email sending is logged in Laravel's log files. Check `storage/logs/laravel.log` for email-related errors.

## Security Considerations
- Never hardcode email credentials
- Use environment variables for sensitive data
- Validate email addresses before sending
- Implement rate limiting for bulk emails
- Use HTTPS for email links in production
