<?php
/**
 * Created by PhpStorm.
 * User: Mamdouh
 * Date: 4/8/2018
 * Time: 4:22 PM
 */

namespace App\Services\Validators;


use App\Exceptions\ValidationException;
use App\Services\Helpers\StringHelper;

/**
 * Class AvailabilityQueryValidator
 * @package App\Services\Validators
 */
class AvailabilityQueryValidator implements ValidatorInterface
{

    /**
     * @param $query
     * @return void
     * @throws ValidationException
     */
    function validate(string $query) : void
    {
        if(empty($query))
        {
            throw new ValidationException('Availability query shouldn\'t be empty');
        }
        $rangeStrings = StringHelper::splitByComma($query);
        $dateRangeValidator = new DateRangeValidator();
        foreach ($rangeStrings as $range)
        {
            $dateRangeValidator->validate($range);
        }
    }
}