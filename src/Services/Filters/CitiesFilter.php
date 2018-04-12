<?php
/**
 * Created by PhpStorm.
 * User: Mamdouh
 * Date: 4/7/2018
 * Time: 8:51 PM
 */

namespace App\Services\Filters;


use App\Entity\Hotel;
use App\Services\Helpers\StringHelper;

/**
 * Class CitiesFilter
 * @package App\Services\Filters
 */
class CitiesFilter extends AbstractHotelArrayFilter
{

    /**
     * @param Hotel $hotel
     * @param array $cityNames
     * @return bool
     */
    protected function applyOnArray(Hotel $hotel, array $cityNames): bool
    {
        foreach ($cityNames as $name){
            if(StringHelper::contains($hotel->getCity(), $name))
            {
                return true;
            }
        }
        return false;
    }

    /**
     * @param Hotel $hotel
     * @param string $constraint
     * @return bool
     */
    public function apply(Hotel $hotel, string $constraint): bool
    {
        return $this->applyOnArray($hotel, StringHelper::splitByComma($constraint));
    }
}