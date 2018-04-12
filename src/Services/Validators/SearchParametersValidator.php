<?php
/**
 * Created by PhpStorm.
 * User: Mamdouh
 * Date: 4/8/2018
 * Time: 4:38 PM
 */

namespace App\Services\Validators;


use App\Exceptions\ValidationException;

/**
 * Class SearchParametersValidator
 * @package App\Services\Validators
 */
class SearchParametersValidator
{
    /**
     * @var array<string => App\Services\Validators\ValidatorInterface>
     */
    protected static $supportedValidatorClasses = array ('avail' => AvailabilityQueryValidator::class
                                                ,'name' => NameQueryValidator::class
                                                ,'city' => CityQueryValidator::class
                                                ,'price_from' => PriceQueryValidator::class
                                                ,'price_to' => PriceQueryValidator::class);

    /**
     * @param array $searchParameters
     * @throws ValidationException
     */
    public function validate(array $searchParameters) : void
    {
        foreach($searchParameters as $parameter => $value)
        {
            if(empty($value))
            {
                throw new ValidationException('Search query for '.$parameter.' should not be empty');
            }
            if(isset(self::$supportedValidatorClasses[$parameter]) !== false)
            {
                (new self::$supportedValidatorClasses[$parameter]) -> validate($value);
            }
        }
    }

}