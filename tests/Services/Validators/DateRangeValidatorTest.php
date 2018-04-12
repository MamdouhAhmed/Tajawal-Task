<?php
/**
 * Created by PhpStorm.
 * User: Mamdouh
 * Date: 4/9/2018
 * Time: 1:18 AM
 */

namespace App\Tests\Services\Validators;


use App\Exceptions\ValidationException;
use App\Services\Validators\DateRangeValidator;
use PHPUnit\Framework\TestCase;

class DateRangeValidatorTest extends TestCase
{
    public function testValidateStringWithOnlyOneDateThrowsException() : void
    {
        $this->expectException(ValidationException::class);

        (new DateRangeValidator())->validate("00-00-0000");
    }
    public function testValidateStringWithWrongFormDateThrowsException() : void
    {
        $this->expectException(ValidationException::class);

        (new DateRangeValidator())->validate("00-00-0000:00-00-00");
    }

    public function testValidateEmptyStringThrowsException() : void
    {
        $this->expectException(ValidationException::class);

        (new DateRangeValidator())->validate("");
    }

}