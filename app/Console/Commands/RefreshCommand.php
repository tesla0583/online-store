<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\File;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class RefreshCommand extends Command
{
    protected $signature = 'shop:refresh';

    protected $description = 'Refresh';

    public function handle()
    {
        if(app()->isProduction()){
            return self::FAILURE;
        }

        Storage::deleteDirectory('images/products');
        Storage::deleteDirectory('images/brands');
//        File::cleanDirectory(Storage::path('images/products'));
//        File::cleanDirectory(Storage::path('images/brands'));
        $this->call('migrate:fresh', [
            '--seed' => true
        ]);

        return self::SUCCESS;
    }
}
