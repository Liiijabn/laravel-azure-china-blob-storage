# laravel-azure-china-blob-storage

Microsoft Azure China Blob Storage integration for Laravel's Storage API

## Installation

``` 
composer require liiijabn/laravel-azure-china-blob-storage
```

On Laravel versions before 5.5 you also need to add the service provider to `config/app.php` manually:

```
Liiijabn\LaravelAzureChinaBlobStorage\AzureChinaBlobStorageProvider::class,
```

or just register when you need it.

OK, next add some code to the `disks` section of `config/filesystems.php`:

```
'azure' => [
    'driver'    => 'azure',
    'name'      => env('AZURE_STORAGE_NAME'),
    'key'       => env('AZURE_STORAGE_KEY'),
    'container' => env('AZURE_STORAGE_CONTAINER'),
    'prefix'    => env('AZURE_STORAGE_PREFIX', ''),
],
```

Finally, add `AZURE_STORAGE_NAME`, `AZURE_STORAGE_KEY`, `AZURE_STORAGE_CONTAINER`, `AZURE_STORAGE_PREFIX` 
to your `.env` file.