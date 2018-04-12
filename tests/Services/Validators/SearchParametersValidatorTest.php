<?php
/**
 * Created by PhpStorm.
 * User: Mamdouh
 * Date: 4/9/2018
 * Time: 1:29 AM
 */

namespace App\Tests\Services\Validators;


use App\Exceptions\ValidationException;
use App\Services\Validators\SearchParametersValidator;
use PHPUnit\Framework\TestCase;

class SearchParametersValidatorTest extends TestCase
{
    public function testValidateWithEmptyQueryValueThrowsException(): void
    {
        $this->expectException(ValidationException::class);

        (new SearchParametersValidator())->validate(array('name' => ''));
    }

}