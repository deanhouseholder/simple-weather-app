<?php
/**
 * Helpers class to provide one-off functions
 */

namespace App\Classes;

class Helpers
{
    // Get the real user IP as opposed to a proxy IP
    public static function getIpAddress() {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            return $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            return $_SERVER['REMOTE_ADDR'];
        }
    }

    // Convert Centigrade degrees to Fahrenheit degrees
    public static function centigradeToFahrenheit($centigrade) {
        return round(($centigrade * 1.8) + 32);
    }

    // Convert mbar to inHg (air pressure)
    public static function mbToInHg($mb) {
        return round($mb * 0.029529983071, 2);
    }
}
