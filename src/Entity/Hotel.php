<?php
/**
 * Created by PhpStorm.
 * User: Mamdouh
 * Date: 4/6/2018
 * Time: 6:45 PM
 */

namespace App\Entity;


use Tebru\Gson\Annotation\Type;

/**
 * Class Hotel
 * @package App\Entity
 */
class Hotel
{
    private $name ;
    /**
     * @var float
     * @Type("float")
     */
    private $price ;
    private $city;
    /**
     * @var array
     * @Type("array<App\Entity\Availability>")
     */
    private $availability = [];

    /**
     * @return string
     */
    public function getName() :string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getPrice() : float
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getCity() : string
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    /**
     * @return Availability[]
     */
    public function getAvailability(): array
    {
        return $this->availability;
    }

    /**
     * @param array $availability
     */
    public function setAvailability(array $availability): void
    {
        $this->availability = $availability;
    }







}

