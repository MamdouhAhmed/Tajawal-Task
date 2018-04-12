<?php
/**
 * Created by PhpStorm.
 * User: Mamdouh
 * Date: 4/9/2018
 * Time: 8:38 PM
 */

namespace App\Exceptions;


use Exception;
use Throwable;

/**
 * Class ValidationException
 * @package App\Exceptions
 */
class ValidationException extends Exception
{
    /**
     * ValidationException constructor.
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct(string $message = "", int $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}