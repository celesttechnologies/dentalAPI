<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class GenerateControllersForModels extends Command
{
    protected $signature = 'generate:controllers';
    protected $description = 'Automatically generate controllers for all models in app/Models';

    public function handle()
    {
        $modelsPath = app_path('Models');

        if (!File::exists($modelsPath)) {
            $this->error("Models directory does not exist at {$modelsPath}.");
            return;
        }

        $files = File::files($modelsPath);

        foreach ($files as $file) {
            // Get the model name from the file name (without extension)
            $modelName = $file->getFilenameWithoutExtension();
            $controllerName = $modelName . 'Controller';
            $controllerPath = app_path('Http/Controllers/' . $controllerName . '.php');

            // Skip if controller already exists
            if (File::exists($controllerPath)) {
                $this->info("{$controllerName} already exists, skipping.");
                continue;
            }

            // Call the built-in Artisan command to create a controller.
            // The --model option scaffolds the controller to reference the model.
            $this->call('make:controller', [
                'name' => $controllerName,
                '--model' => "App\\Models\\{$modelName}"
            ]);
            $this->info("Created {$controllerName} for model {$modelName}");
        }
    }
}
