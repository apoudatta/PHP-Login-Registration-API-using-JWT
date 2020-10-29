<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit893c326115cb1cdb1a020f53353669dc
{
    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'Firebase\\JWT\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Firebase\\JWT\\' => 
        array (
            0 => __DIR__ . '/..' . '/firebase/php-jwt/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit893c326115cb1cdb1a020f53353669dc::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit893c326115cb1cdb1a020f53353669dc::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit893c326115cb1cdb1a020f53353669dc::$classMap;

        }, null, ClassLoader::class);
    }
}