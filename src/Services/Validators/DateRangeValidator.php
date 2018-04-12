<?php
/**
 * Created by PhpStorm.
 * User: Mamdouh
 * Date: 4/8/2018
 * Time: 2:31 AM
 */

namespace App\Services\Validators;


use App\Exceptions\ValidationException;

/**
 * Class DateRangeValidator
 * @package App\Services\Validators
 */
class DateRangeValidator implements ValidatorInterface
{

    /**
     * @param $dateRange
     * @throws ValidationException
     */
    public function validate(string $dateRange) : void
    {
        if( preg_match("/^\d{2}\-\d{2}\-\d{4}:\d{2}\-\d{2}\-\d{4}$/",$dateRange) == FALSE)
        {
            throw new ValidationException('Date range should match dd-mm-yyyy:dd-mm-yyyy format.');
        }
    }
}