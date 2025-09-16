<?php

namespace App\Services;

use App\Mail\WelcomeEmail;
use App\Models\Provider;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Exception;

class EmailService
{
    /**
     * Send welcome email to a provider
     *
     * @param Provider $provider
     * @return bool
     */
    public function sendWelcomeEmail(Provider $provider): bool
    {
        try {
            Mail::to($provider->Email)
                ->send(new WelcomeEmail($provider));

            Log::info('Welcome email sent successfully to provider: ' . $provider->Email);
            return true;
        } catch (Exception $e) {
            Log::error('Failed to send welcome email to provider: ' . $provider->Email . '. Error: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Send custom email with template
     *
     * @param string $to
     * @param string $subject
     * @param string $template
     * @param array $data
     * @return bool
     */
    public function sendCustomEmail(string $to, string $subject, string $template, array $data = []): bool
    {
        try {
            Mail::send($template, $data, function ($message) use ($to, $subject) {
                $message->to($to)
                    ->subject($subject);
            });

            Log::info('Custom email sent successfully to: ' . $to);
            return true;
        } catch (Exception $e) {
            Log::error('Failed to send custom email to: ' . $to . '. Error: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Send bulk emails
     *
     * @param array $recipients Array of email addresses
     * @param string $subject
     * @param string $template
     * @param array $data
     * @return array Returns array with success and failed recipients
     */
    public function sendBulkEmails(array $recipients, string $subject, string $template, array $data = []): array
    {
        $results = [
            'success' => [],
            'failed' => []
        ];

        foreach ($recipients as $recipient) {
            if ($this->sendCustomEmail($recipient, $subject, $template, $data)) {
                $results['success'][] = $recipient;
            } else {
                $results['failed'][] = $recipient;
            }
        }

        return $results;
    }
}
