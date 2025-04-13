<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit506b8b4f0c5a0e4979d5609b000509ef
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInit506b8b4f0c5a0e4979d5609b000509ef', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit506b8b4f0c5a0e4979d5609b000509ef', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit506b8b4f0c5a0e4979d5609b000509ef::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
