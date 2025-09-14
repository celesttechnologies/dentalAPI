<?php

namespace WFX\ScribeGenerator\Console\Commands;

use Illuminate\Console\Command;
use WFX\ScribeGenerator\ScribeGenerator\ControllerParser;
use WFX\ScribeGenerator\ScribeGenerator\FileUpdater;
use Exception;
use Symfony\Component\Finder\Finder;

class GenerateScribeDocsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scribe:generate-docs {path? : Path to the controller file or directory}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate Scribe PHPDoc comments for Laravel controllers';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Laravel Scribe PHPDoc Generator');
        $this->line('Generating API documentation PHPDoc comments...');

        try {
            $path = $this->argument('path');

            // If no path specified, use config default
            if (!$path) {
                $path = config('scribe-generator.controller_paths')[0];
                $this->info("Using default controller path: {$path}");
            }

            // Check if the path exists
            if (!file_exists($path)) {
                $this->error("Error: Path does not exist: {$path}");
                return 1;
            }

            // Process a single file or a directory
            if (is_file($path)) {
                $this->processControllerFile($path);
            } else {
                $this->processControllerDirectory($path);
            }

            $this->info('Documentation generation completed.');
            return 0;

        } catch (Exception $e) {
            $this->error("Error: {$e->getMessage()}");
            $this->error($e->getTraceAsString());
            return 1;
        }
    }

    /**
     * Process a single controller file.
     *
     * @param string $file The path to the controller file
     * @return void
     */
    protected function processControllerFile($file)
    {
        $this->info("Processing: " . basename($file));

        $parser = new ControllerParser($file);
        $methods = $parser->parse();
        
        $updater = new FileUpdater($file);
        $updated = $updater->updateWithDocBlocks($methods);

        if ($updated) {
            $this->info("✓ Updated controller with Scribe PHPDoc comments.");
        } else {
            $this->info("ℹ No changes were needed for this controller.");
        }
    }

    /**
     * Process all controller files in a directory.
     *
     * @param string $directory The path to the directory containing controllers
     * @return void
     */
    protected function processControllerDirectory($directory)
    {
        $finder = new Finder();
        $finder->files()->name('*Controller.php')->in($directory);

        $totalFiles = count($finder);
        $updatedFiles = 0;

        if ($totalFiles === 0) {
            $this->warn("No controller files found in {$directory}");
            return;
        }

        $this->info("Found {$totalFiles} controller file(s) to process.");

        foreach ($finder as $file) {
            $this->line("Processing: " . basename($file->getPathname()));

            $parser = new ControllerParser($file->getPathname());
            $methods = $parser->parse();
            
            $updater = new FileUpdater($file->getPathname());
            $updated = $updater->updateWithDocBlocks($methods);

            if ($updated) {
                $updatedFiles++;
                $this->line("  ✓ Updated controller with Scribe PHPDoc comments.");
            } else {
                $this->line("  ℹ No changes were needed for this controller.");
            }
        }

        $this->info("Summary: Processed {$totalFiles}/{$totalFiles} files, updated {$updatedFiles} file(s).");
    }
}