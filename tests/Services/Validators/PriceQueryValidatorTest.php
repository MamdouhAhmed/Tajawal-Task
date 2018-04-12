<?php
/**
 * Created by PhpStorm.
 * User: Mamdouh
 * Date: 4/9/2018
 * Time: 1:03 AM
 */

namespace App\Tests\Services\Validators;


use App\Exceptions\ValidationException;
use App\Services\Validators\PriceQueryValidator;
use PHPUnit\Framework\TestCase;

class PriceQueryValidatorTest extends TestCase
{
    public function testValidateStringThatIsNotaNumberThrowsException() : void
    {
        $this->expectException(ValidationException::class);

        (new PriceQueryValidator())->validate("NaN");
    }
    public function testValidateEmptyStringThrowsException() : void
    {
        $this->expectException(ValidationException::class);

        (new PriceQueryValidator())->validate("");
    }

}