<?php
/**
 * Created by PhpStorm.
 * User: Mamdouh
 * Date: 4/7/2018
 * Time: 7:46 PM
 */

namespace App\Services\Filters;


use App\Entity\Hotel;

/**
 * Class AbstractHotelArrayFilter
 * @package App\Services\Filters
 */
abstract class AbstractHotelArrayFilter implements HotelFilterInterface
{
    abstract protected function applyOnArray(Hotel $hotel, array $constraints): bool;
}