<?php
/**
 * Created by PhpStorm.
 * User: Mamdouh
 * Date: 4/7/2018
 * Time: 7:59 PM
 */

namespace App\Services\Filters;


use App\Entity\Hotel;
use App\Services\Helpers\StringHelper;

/**
 * Class NameFilter
 * @package App\Services\Filters
 */
class NameFilter extends AbstractHotelArrayFilter
{

    /**
     * @param Hotel $hotel
     * @param string $constraint
     * @return bool
     */
    public function apply(Hotel $hotel, string $constraint): bool
    {
        return $this->applyOnArray($hotel, StringHelper::splitByComma($constraint));
    }

    /**
     * @param Hotel $hotel
     * @param array $queryNames
     * @return bool
     */
    protected function applyOnArray(Hotel $hotel, array $queryNames): bool
    {
        foreach ($queryNames as $name) {
            if (StringHelper::contains($hotel->getName(), $name)) {
                return true;
            }
        }
        return false;
    }
}