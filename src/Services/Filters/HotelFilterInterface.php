<?php
/**
 * Created by PhpStorm.
 * User: Mamdouh
 * Date: 4/7/2018
 * Time: 7:35 PM
 */

namespace App\Services\Filters;


use App\Entity\Hotel;

/**
 * Interface HotelFilterInterface
 * @package App\Services\Filters
 */
interface HotelFilterInterface
{
    public function apply(Hotel $hotel, string $constraint): bool;
}