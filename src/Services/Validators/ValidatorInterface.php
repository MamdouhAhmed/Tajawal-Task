<?php
/**
 * Created by PhpStorm.
 * User: Mamdouh
 * Date: 4/8/2018
 * Time: 4:23 PM
 */

namespace App\Services\Validators;

/**
 * Interface ValidatorInterface
 * @package App\Services\Validators
 */
interface ValidatorInterface
{
    function validate(string $value): void;
}