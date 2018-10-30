<?php

namespace Liiijabn\LaravelAzureChinaBlobStorage;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Storage;
use League\Flysystem\AzureBlobStorage\AzureBlobStorageAdapter;
use League\Flysystem\Filesystem;
use MicrosoftAzure\Storage\Blob\BlobRestProxy;

class AzureChinaBlobStorageProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Storage::extend('azure', function ($app, $config) {
            $endPoint = 'https://' . $config['name'] . '.blob.core.chinacloudapi.cn/';
            $connectString = "BlobEndpoint=" . $endPoint
                . ";AccountName=" . $config['name']
                . ";AccountKey=" . $config['key'];
            return new Filesystem(
                new AzureBlobStorageAdapter(
                    BlobRestProxy::createBlobService($connectString),
                    $config['container'],
                    $config['prefix']
                ));
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}