<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit040d3a6e01f2c64185c0cdd60dabc704
{
    public static $prefixLengthsPsr4 = array (
        'L' => 
        array (
            'League\\Event\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'League\\Event\\' => 
        array (
            0 => __DIR__ . '/..' . '/league/event/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit040d3a6e01f2c64185c0cdd60dabc704::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit040d3a6e01f2c64185c0cdd60dabc704::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
