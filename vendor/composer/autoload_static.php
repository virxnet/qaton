<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitee4d5124e799639b63c49772193294a5
{
    public static $prefixLengthsPsr4 = array (
        'V' => 
        array (
            'VirX\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'VirX\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/VirX',
        ),
    );

    public static $prefixesPsr0 = array (
        'P' => 
        array (
            'Parsedown' => 
            array (
                0 => __DIR__ . '/..' . '/erusev/parsedown',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitee4d5124e799639b63c49772193294a5::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitee4d5124e799639b63c49772193294a5::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInitee4d5124e799639b63c49772193294a5::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
