<?php
/**
 * Created by PhpStorm.
 * User: Mamdouh
 * Date: 4/9/2018
 * Time: 1:24 AM
 */

namespace App\Tests\Services\Validators;


use App\Exceptions\ValidationException;
use App\Services\Validators\AvailabilityQueryValidator;
use PHPUnit\Framework\TestCase;

class AvailabilityQueryValidatorTest extends TestCase
{
    public function testValidateEmptyStringThrowsException(): void
    {
        $this->expectException(ValidationException::class);
        (new AvailabilityQueryValidator())->validate("");
    }

    public function testValidateStringWithWrongFormatThrowsException(): void
    {
        $this->expectException(ValidationException::class);
        (new AvailabilityQueryValidator())->validate("00-00-0000:00-00-0000,,00-00-0000:00-00-0000");
    }
}