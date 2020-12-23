<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application. Just store away!
    |
    */

    'default' => env('FILESYSTEM_DRIVER', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been setup for each driver as an example of the required options.
    |
    | Supported Drivers: "local", "ftp", "sftp", "s3"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => '/storage',
            'visibility' => 'public',
        ],

        'qiniu' => [
            'driver' => 'qiniu',
            'access_key' => 'zFClHO9z_m8APaYaA4Na2ZRufGRlIXj1E9BdALsi',
            'secret_key' => 'GIRkI6gutlxMXfr6jACvGCZOxN8o2zeQV_m6XVot',
            'bucket' => 'guo1995',
            'notify_url' => '',  //持久化处理回调地址
            'domains' => [

                'default' => 'cdn.06606.cn', //你的七牛域名

                'https' => 'cdn.06606.cn',//你的HTTPS域名

                'custom' => 'cdn.06606.cn',     //你的自定义域名

            ],


        ],
        'oss' => [
            'driver' => 'oss',
            'access_key' => 'LTAI4GJgv3tcZBW7ZsCssTGt',
            'secret_key' => 'GmTkpgheMl3lNeOIbR7vK8thgV8jHP',
            'bucket' => 'guo1995',
            'endpoint' => 'https://oss-cn-shanghai.aliyuncs.com', // 使用 ssl 这里设置如: https://oss-cn-beijing.aliyuncs.com
            'isCName' => false,
        ],


        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
            'endpoint' => env('AWS_ENDPOINT'),
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Symbolic Links
    |--------------------------------------------------------------------------
    |
    | Here you may configure the symbolic links that will be created when the
    | `storage:link` Artisan command is executed. The array keys should be
    | the locations of the links and the values should be their targets.
    |
    */

    'links' => [
        public_path('storage') => storage_path('app/public'),
    ],

];
