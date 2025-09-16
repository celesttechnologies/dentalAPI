<?php

namespace App\Console\Commands;

use App\Models\Provider;
use App\Services\EmailService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class TestEmailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:test {email} {--provider-id=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test email functionality by sending a welcome email';

    /**
     * Execute the console command.
     */
    public function handle(EmailService $emailService)
    {
        $email = $this->argument('email');
        $providerId = $this->option('provider-id');

        if ($providerId) {
            $provider = Provider::find($providerId);
            if (!$provider) {
                $this->error("Provider with ID {$providerId} not found.");
                return 1;
            }
        } else {
            // Create a temporary provider for testing
            $provider = new Provider([
                'ProviderName' => 'Test Provider',
                'Email' => $email,
                'PhoneNumber' => '123-456-7890',
                'Location' => 'Test Location',
                'Experience' => '5 years',
                'RegistrationNumber' => 'TEST123'
            ]);
        }

        $this->info("Sending welcome email to: {$email}");

        try {
            $result = $emailService->sendWelcomeEmail($provider);
            
            if ($result) {
                $this->info('✅ Welcome email sent successfully!');
            } else {
                $this->error('❌ Failed to send welcome email. Check logs for details.');
                return 1;
            }
        } catch (\Exception $e) {
            $this->error('❌ Error sending email: ' . $e->getMessage());
            return 1;
        }

        return 0;
    }
}
