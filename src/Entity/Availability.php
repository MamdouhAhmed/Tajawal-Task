<?php
/**
 * Created by PhpStorm.
 * User: Mamdouh
 * Date: 4/6/2018
 * Time: 6:57 PM
 */

namespace App\Entity;

/**
 * Class Availability
 * @package App\Entity
 */
class Availability
{
    private $from;
    private $to;

    /**
     * @return string
     */
    public function getFrom(): string
    {
        return $this->from;
    }

    /**
     * @param string $from
     */
    public function setFrom(string $from): void
    {
        $this->from = $from;
    }

    /**
     * @return string
     */
    public function getTo(): string
    {
        return $this->to;
    }

    /**
     * @param string $to
     */
    public function setTo(string $to): void
    {
        $this->to = $to;
    }

}