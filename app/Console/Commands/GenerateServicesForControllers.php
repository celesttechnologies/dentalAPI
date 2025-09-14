<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class GenerateServicesForControllers extends Command
{
    protected $signature = 'generate:services';
    protected $description = 'Generate service classes for all controllers in app/Http/Controllers';

    public function handle()
    {
        $controllersPath = app_path('Http/Controllers');
        $servicesPath    = app_path('Services');

        if (!File::exists($servicesPath)) {
            File::makeDirectory($servicesPath);
            $this->info("Created Services directory at {$servicesPath}");
        }

        $files = File::files($controllersPath);

        foreach ($files as $file) {
            $controllerName = $file->getFilenameWithoutExtension();

            // Only consider files ending with "Controller"
            if (substr($controllerName, -10) !== 'Controller') {
                continue;
            }

            $baseName = str_replace('Controller', '', $controllerName);
            $serviceName = $baseName . 'Service';
            $serviceFile = $servicesPath . '/' . $serviceName . '.php';

            if (File::exists($serviceFile)) {
                $this->info("{$serviceName} already exists, skipping.");
                continue;
            }

            // Create a basic service class template
            $stub = <<<EOT
<?php

namespace App\Services;

class {$serviceName}
{
    // Add your business logic for {$baseName} here.
}

EOT;

            File::put($serviceFile, $stub);
            $this->info("Created service: {$serviceName}");
        }
    }
}
