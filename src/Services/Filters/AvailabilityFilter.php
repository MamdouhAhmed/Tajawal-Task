<?php
/**
 * Created by PhpStorm.
 * User: Mamdouh
 * Date: 4/8/2018
 * Time: 2:19 AM
 */

namespace App\Services\Filters;


use App\Entity\Hotel;
use App\Services\Helpers\StringHelper;
use DateTime;

/**
 * Class AvailabilityFilter
 * @package App\Services\Filters
 */
class AvailabilityFilter extends AbstractHotelArrayFilter
{
    private const FROM_INDEX = 0;
    private const TO_INDEX = 1;
    /**
     * @param Hotel $hotel
     * @param array $constraints
     * @return bool
     */
    protected function applyOnArray(Hotel $hotel, array $constraints): bool
    {

        foreach ($constraints as $rangeArray)
        {
            foreach ($hotel->getAvailability() as $availability)
            {
                $from = (new DateTime($availability->getFrom()))->getTimestamp();
                $to = (new DateTime($availability->getTo()))->getTimestamp();
                if($from <= $rangeArray[self::FROM_INDEX] && $to >= $rangeArray[self::TO_INDEX])
                {
                    return true;
                }
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
        $rangeStrings = StringHelper::splitByComma($constraint);
        $rangeArrays = [];
        foreach ($rangeStrings as $range){
            $rangeArrays[] = StringHelper::convertDateRangeToArray($range);
        }
        return $this->applyOnArray($hotel, $rangeArrays);
    }
}