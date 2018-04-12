<?php
/**
 * Created by PhpStorm.
 * User: Mamdouh
 * Date: 4/8/2018
 * Time: 5:21 PM
 */

namespace App\Services\Validators;


use App\Exceptions\ValidationException;
use App\Services\Helpers\StringHelper;

/**
 * Class CityQueryValidator
 * @package App\Services\Validators
 */
class CityQueryValidator implements ValidatorInterface
{

    /**
     * @param $cityQuery
     * @throws ValidationException
     */
    function validate(string $cityQuery) : void
    {
        $names = StringHelper::splitByComma($cityQuery);
        foreach ($names as $name)
        {
            if(empty($name))
            {
                throw new ValidationException('All values in CityQuery should not be empty');
            }
        }
    }
}