<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use App\Models\Patient;

class ExportPatientThumbnails extends Command
{
    protected $signature = 'patients:export-thumbnails';
    protected $description = 'Export Imagethumbnail blobs to images and update ImagePath';

    public function handle()
    {
        $folder = 'public/patient_images/';
        Storage::makeDirectory($folder);

        $query = Patient::whereNotNull('Imagethumbnail')->whereNull('ImagePath');
        $total = $query->count();
        $this->info("Total patients to process: $total");
        $processed = 0;

        $query->chunk(20, function ($patients) use (&$processed, $total, $folder) {
            foreach ($patients as $patient) {
                $filename = 'patient_' . $patient->id . '.jpg';
                $path = $folder . $filename;

                $data = $patient->Imagethumbnail;
                if (is_string($data) && str_starts_with($data, '0x')) {
                    $hex = substr($data, 2);
                    if (strlen($hex) % 2 !== 0) {
                        continue; // Skip if hex string is not valid
                    }
                    $data = hex2bin($hex);
                }
                Storage::put($path, $data);

                $patient->ImagePath = 'storage/patient_images/' . $filename;
                $patient->save();
                $processed++;
                $this->info("Exported image for patient ID {$patient->id} ($processed/$total)");
            }
        });
        $this->info('All patient thumbnails exported.');
    }
}
