<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitff74fe447a305b28d8b4f0dd8318d035
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

        spl_autoload_register(array('ComposerAutoloaderInitff74fe447a305b28d8b4f0dd8318d035', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitff74fe447a305b28d8b4f0dd8318d035', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitff74fe447a305b28d8b4f0dd8318d035::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
