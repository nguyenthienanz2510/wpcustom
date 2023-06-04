<?php

namespace Inc;

final class Init
{
    /**
     * Store all the classes inside an array
     * @return array full list of classes
     */
    public static function get_services()
    {
        return [
            Pages\Admin::class,
            Base\Enqueue::class,
            Base\SettingsLink::class,
        ];
    }

    /**
     * Loop through the classes, initialize them,
     * and call the register() if it exits
     * @return
     */
    public static function register_services()
    {
        foreach (self::get_services() as $class) {
            $service = self::instantiate($class);
            if (method_exists($class, 'register')) {
                $service->register();
            }
        }
    }

    /**
     * Initializes the class
     * @param mixed $class class from the services array 
     * @return mixed $service new instance of the class
     */
    private static function instantiate($class)
    {
        $service = new $class;
        return $service;
    }
}
