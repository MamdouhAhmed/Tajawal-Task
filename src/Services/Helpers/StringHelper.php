<?php
/**
 * Created by PhpStorm.
 * User: Mamdouh
 * Date: 4/7/2018
 * Time: 8:00 PM
 */

namespace App\Services\Helpers;


use DateTime;

/**
 * Class StringHelper
 * @package App\Services\Helpers
 */
class StringHelper
{

    /**
     * @param string $text
     * @param string $pattern
     * @return bool
     */
    public static function contains(string $text, string $pattern): bool
    {
        return stripos($text,$pattern) !== FALSE ;
    }

    /**
     * @param string $text
     * @return array
     */
    public static function splitByComma(string $text): array
    {
        return explode(",",$text);
    }

    /**
     * @param string $text
     * @return array
     */
    public static function splitByColon(string $text): array
    {
        return explode(":",$text);
    }

    /**
     * @param array $elements
     * @return string
     */
    public static function joinWithCommas(array $elements): string
    {
        return implode(",",$elements);
    }

    /**
     * @param string $dateRange
     * @return array
     */
    public static function convertDateRangeToArray(string $dateRange) : array
    {
        $dates = array_map(function($date){
            return (new DateTime($date))->getTimestamp();
        }, StringHelper::splitByColon($dateRange));

        sort($dates);
        return $dates;
    }

}