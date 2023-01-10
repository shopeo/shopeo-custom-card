<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0bd8c817a89d8d96b4e2af51fe5f60e7
{
    public static $files = array (
        '7b11c4dc42b3b3023073cb14e519683c' => __DIR__ . '/..' . '/ralouphie/getallheaders/src/getallheaders.php',
        'a0edc8309cc5e1d60e3047b5df6b7052' => __DIR__ . '/..' . '/guzzlehttp/psr7/src/functions_include.php',
        'c964ee0ededf28c96ebd9db5099ef910' => __DIR__ . '/..' . '/guzzlehttp/promises/src/functions_include.php',
        '6e3fae29631ef280660b3cdad06f25a8' => __DIR__ . '/..' . '/symfony/deprecation-contracts/function.php',
        'd767e4fc2dc52fe66584ab8c6684783e' => __DIR__ . '/..' . '/adbario/php-dot-notation/src/helpers.php',
        '37a3dc5111fe8f707ab4c132ef1dbc62' => __DIR__ . '/..' . '/guzzlehttp/guzzle/src/functions_include.php',
    );

    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Shopeo\\ShopeoCustomCard\\' => 24,
        ),
        'P' => 
        array (
            'Psr\\Http\\Message\\' => 17,
            'Psr\\Http\\Client\\' => 16,
        ),
        'O' => 
        array (
            'OneSm\\' => 6,
        ),
        'G' => 
        array (
            'GuzzleHttp\\Psr7\\' => 16,
            'GuzzleHttp\\Promise\\' => 19,
            'GuzzleHttp\\' => 11,
        ),
        'D' => 
        array (
            'Darabonba\\OpenApi\\' => 18,
            'Darabonba\\GatewaySpi\\' => 21,
        ),
        'A' => 
        array (
            'AlibabaCloud\\Tea\\XML\\' => 21,
            'AlibabaCloud\\Tea\\Utils\\' => 23,
            'AlibabaCloud\\Tea\\OSSUtils\\' => 26,
            'AlibabaCloud\\Tea\\FileForm\\' => 26,
            'AlibabaCloud\\Tea\\' => 17,
            'AlibabaCloud\\SDK\\OpenPlatform\\V20191219\\' => 40,
            'AlibabaCloud\\SDK\\OSS\\' => 21,
            'AlibabaCloud\\SDK\\Imageseg\\V20191230\\' => 36,
            'AlibabaCloud\\OpenApiUtil\\' => 25,
            'AlibabaCloud\\Endpoint\\' => 22,
            'AlibabaCloud\\Credentials\\' => 25,
            'Adbar\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Shopeo\\ShopeoCustomCard\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
        'Psr\\Http\\Message\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/http-message/src',
        ),
        'Psr\\Http\\Client\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/http-client/src',
        ),
        'OneSm\\' => 
        array (
            0 => __DIR__ . '/..' . '/lizhichao/one-sm/src',
        ),
        'GuzzleHttp\\Psr7\\' => 
        array (
            0 => __DIR__ . '/..' . '/guzzlehttp/psr7/src',
        ),
        'GuzzleHttp\\Promise\\' => 
        array (
            0 => __DIR__ . '/..' . '/guzzlehttp/promises/src',
        ),
        'GuzzleHttp\\' => 
        array (
            0 => __DIR__ . '/..' . '/guzzlehttp/guzzle/src',
        ),
        'Darabonba\\OpenApi\\' => 
        array (
            0 => __DIR__ . '/..' . '/alibabacloud/darabonba-openapi/src',
        ),
        'Darabonba\\GatewaySpi\\' => 
        array (
            0 => __DIR__ . '/..' . '/alibabacloud/gateway-spi/src',
        ),
        'AlibabaCloud\\Tea\\XML\\' => 
        array (
            0 => __DIR__ . '/..' . '/alibabacloud/tea-xml/src',
        ),
        'AlibabaCloud\\Tea\\Utils\\' => 
        array (
            0 => __DIR__ . '/..' . '/alibabacloud/tea-utils/src',
        ),
        'AlibabaCloud\\Tea\\OSSUtils\\' => 
        array (
            0 => __DIR__ . '/..' . '/alibabacloud/tea-oss-utils/src',
        ),
        'AlibabaCloud\\Tea\\FileForm\\' => 
        array (
            0 => __DIR__ . '/..' . '/alibabacloud/tea-fileform/src',
        ),
        'AlibabaCloud\\Tea\\' => 
        array (
            0 => __DIR__ . '/..' . '/alibabacloud/tea/src',
        ),
        'AlibabaCloud\\SDK\\OpenPlatform\\V20191219\\' => 
        array (
            0 => __DIR__ . '/..' . '/alibabacloud/openplatform-20191219/src',
        ),
        'AlibabaCloud\\SDK\\OSS\\' => 
        array (
            0 => __DIR__ . '/..' . '/alibabacloud/tea-oss-sdk/src',
        ),
        'AlibabaCloud\\SDK\\Imageseg\\V20191230\\' => 
        array (
            0 => __DIR__ . '/..' . '/alibabacloud/imageseg-20191230/src',
        ),
        'AlibabaCloud\\OpenApiUtil\\' => 
        array (
            0 => __DIR__ . '/..' . '/alibabacloud/openapi-util/src',
        ),
        'AlibabaCloud\\Endpoint\\' => 
        array (
            0 => __DIR__ . '/..' . '/alibabacloud/endpoint-util/src',
        ),
        'AlibabaCloud\\Credentials\\' => 
        array (
            0 => __DIR__ . '/..' . '/alibabacloud/credentials/src',
        ),
        'Adbar\\' => 
        array (
            0 => __DIR__ . '/..' . '/adbario/php-dot-notation/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit0bd8c817a89d8d96b4e2af51fe5f60e7::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0bd8c817a89d8d96b4e2af51fe5f60e7::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit0bd8c817a89d8d96b4e2af51fe5f60e7::$classMap;

        }, null, ClassLoader::class);
    }
}
