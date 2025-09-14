<?php

namespace App\Console\Commands;

use App\Models\Patient;
use Illuminate\Console\Command;

class IndexAllPatientsToElasticsearch extends Command
{
    protected $signature = 'index:patients';
    protected $description = 'Index all patients to Elasticsearch';

    public function handle()
    {
        Patient::with('appointments')->chunk(20, function ($patients) {
            foreach ($patients as $patient) {
                $patient->indexToElasticsearch();
                unset($patient); // Free memory after each patient
            }
        });
        $this->info('All patients indexed to Elasticsearch.');
    }
}
