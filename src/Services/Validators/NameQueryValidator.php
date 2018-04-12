<?php
/**
 * Created by PhpStorm.
 * User: Mamdouh
 * Date: 4/8/2018
 * Time: 5:03 PM
 */

namespace App\Services\Validators;


use App\Exceptions\ValidationException;
use App\Services\Helpers\StringHelper;

/**
 * Class NameQueryValidator
 * @package App\Services\Validators
 */
class NameQueryValidator implements ValidatorInterface
{

    /**
     * @param $nameQuery
     * @throws ValidationException
     */
    function validate(string $nameQuery) : void
    {
        $names = StringHelper::splitByComma($nameQuery);
        foreach ($names as $name)
        {
            if(empty($name))
            {
                throw new ValidationException('All values in NameQuery should not be empty');
            }
        }
    }
}