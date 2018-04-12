<?php
/**
 * Created by PhpStorm.
 * User: Mamdouh
 * Date: 4/8/2018
 * Time: 1:36 AM
 */

namespace App\Services\Sorters;

/**
 * Interface HotelSorterInterface
 * @package App\Services\Sorters
 */
interface HotelSorterInterface
{
    public function sort(array $hotels): array;
}