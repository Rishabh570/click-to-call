<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit6a36deab3c0fb42a7e41900f8b7d95a8
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Twilio\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Twilio\\' => 
        array (
            0 => __DIR__ . '/..' . '/twilio/sdk/Twilio',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit6a36deab3c0fb42a7e41900f8b7d95a8::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit6a36deab3c0fb42a7e41900f8b7d95a8::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}