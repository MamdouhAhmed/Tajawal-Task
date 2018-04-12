<?php
/**
 * Created by PhpStorm.
 * User: Mamdouh
 * Date: 4/7/2018
 * Time: 7:39 PM
 */

namespace App\Services\Filters;


use App\Entity\Hotel;

/**
 * Class PriceLowerLimitFilter
 * @package App\Services\Filters
 */
class PriceLowerLimitFilter implements HotelFilterInterface
{
    /**
     * @param Hotel $hotel
     * @param string $constraint
     * @return bool
     */
    public function apply(Hotel $hotel, string  $constraint) : bool
    {
        $constraint = (double) $constraint;
        return $hotel->getPrice() >= $constraint;
    }
}