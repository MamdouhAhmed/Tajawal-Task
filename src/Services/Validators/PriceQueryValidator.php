<?php
/**
 * Created by PhpStorm.
 * User: Mamdouh
 * Date: 4/8/2018
 * Time: 5:24 PM
 */

namespace App\Services\Validators;


use App\Exceptions\ValidationException;

/**
 * Class PriceQueryValidator
 * @package App\Services\Validators
 */
class PriceQueryValidator implements ValidatorInterface
{

    /**
     * @param $price
     * @throws ValidationException
     */
    function validate(string $price): void
    {
        if (preg_match("/^\d+(?:\.\d+)?$/", $price) == false) {
            throw new ValidationException('Price query should be a number.');
        }
    }
}