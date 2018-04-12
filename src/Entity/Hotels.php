<?php
/**
 * Created by PhpStorm.
 * User: Mamdouh
 * Date: 4/7/2018
 * Time: 11:29 AM
 */

namespace App\Entity;


use Tebru\Gson\Annotation\Type;

/**
 * Class Hotels
 * @package App\Entity
 */
class Hotels
{
    /**
     * @var array
     * @Type("array<App\Entity\Hotel>")
     */
    private $hotels = [];

    /**
     * @return array
     */
    public function getHotels(): array
    {
        return $this->hotels;
    }

    /**
     * @param array $hotels
     */
    public function setHotels(array $hotels): void
    {
        $this->hotels = $hotels;
    }

}