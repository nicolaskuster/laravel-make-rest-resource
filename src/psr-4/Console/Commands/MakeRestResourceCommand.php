<?php

namespace Nicolaskuster\MakeRestResource\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class MakeRestResourceCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:restresource';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make all Files for a Rest Resource';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $modelNamespace = 'Models';

        $name = $this->ask('Name der Resource?');

        $modelName = "$modelNamespace/$name";
        $controllerName = "{$name}Controller";
        $storeRequestName = "Store{$name}Request";
        $updateRequestName = "Update{$name}Request";
        $policyName = "{$name}Policy";
        $testName = "{$name}ControllerTest";

        Artisan::call('make:model', ["name" => $modelName]);
        $this->info('Model created successfully.');

        Artisan::call('make:controller', [
            "name" => $controllerName,
            "--resource" => true,
            "--model" => $modelName
        ]);
        $this->info('Controller created successfully.');

        Artisan::call('make:request', [
            "name" => $storeRequestName,
        ]);
        $this->info('Store Request created successfully.');

        Artisan::call('make:request', [
            "name" => $updateRequestName,
        ]);
        $this->info('Update Request created successfully.');

        Artisan::call('make:policy', [
            "name" => $policyName,
            "--model" => $modelName
        ]);
        $this->info('Policy created successfully.');

        Artisan::call('make:test', [
            "name" => $testName,
        ]);
        $this->info('Test created successfully.');
    }
}
