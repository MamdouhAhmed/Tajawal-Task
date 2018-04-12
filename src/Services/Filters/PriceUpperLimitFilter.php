<?php
/**
 * Created by PhpStorm.
 * User: Mamdouh
 * Date: 4/7/2018
 * Time: 7:48 PM
 */

namespace App\Services\Filters;


use App\Entity\Hotel;

/**
 * Class PriceUpperLimitFilter
 * @package App\Services\Filters
 */
class PriceUpperLimitFilter implements HotelFilterInterface
{
    /**
     * @param Hotel $hotel
     * @param string $constraint
     * @return bool
     */
    public function apply(Hotel $hotel, string $constraint): bool
    {
        $constraint = (double)$constraint;
        return $hotel->getPrice() <= $constraint;
    }
}