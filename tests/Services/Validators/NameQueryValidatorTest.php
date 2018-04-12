<?php
/**
 * Created by PhpStorm.
 * User: Mamdouh
 * Date: 4/9/2018
 * Time: 1:15 AM
 */

namespace App\Tests\Services\Validators;


use App\Exceptions\ValidationException;
use App\Services\Validators\NameQueryValidator;
use PHPUnit\Framework\TestCase;

class NameQueryValidatorTest extends TestCase
{
    public function testValidateEmptyStringThrowsException(): void
    {
        $this->expectException(ValidationException::class);
        (new NameQueryValidator())->validate("");
    }

    public function testValidateStringWithWrongFormatThrowsException(): void
    {
        $this->expectException(ValidationException::class);
        (new NameQueryValidator())->validate("d,,d");
    }
}