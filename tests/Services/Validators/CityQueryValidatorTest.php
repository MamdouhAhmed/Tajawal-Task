<?php
/**
 * Created by PhpStorm.
 * User: Mamdouh
 * Date: 4/9/2018
 * Time: 1:10 AM
 */

namespace App\Tests\Services\Validators;


use App\Exceptions\ValidationException;
use App\Services\Validators\CityQueryValidator;
use PHPUnit\Framework\TestCase;

class CityQueryValidatorTest extends TestCase
{
    public function testValidateEmptyStringThrowsException(): void
    {
        $this->expectException(ValidationException::class);
        (new CityQueryValidator())->validate("");
    }

    public function testValidateStringWithWrongFormatThrowsException(): void
    {
        $this->expectException(ValidationException::class);
        (new CityQueryValidator())->validate("d,,d");
    }

}