<?php
/**
 * Created by PhpStorm.
 * User: Mamdouh
 * Date: 4/8/2018
 * Time: 1:53 AM
 */

namespace App\Services;


use App\Entity\Hotels;
use App\Services\Sorters\NameSorter;
use App\Services\Sorters\PriceSorter;

/**
 * Class HotelSortingService
 * @package App\Services
 */
class HotelSortingService
{
    protected $sorterClasses = ['name' => NameSorter::class, 'price'=> PriceSorter::class];
    protected $supportedSortingKeys = ['name', 'price'];


    /**
     * @param Hotels $hotels
     * @param string $sortingKey
     * @return Hotels
     * @throws \Exception
     */
    public function sortHotels(Hotels $hotels, string $sortingKey = 'price'): Hotels
    {

        $this->validateSortingKey($sortingKey);

        $hotels->setHotels((new $this->sorterClasses[$sortingKey])->sort($hotels->getHotels()));

        return $hotels;
    }

    /**
     * @param string $sortingKey
     * @throws \Exception
     */
    private function validateSortingKey(string $sortingKey): void
    {
        if(empty($sortingKey)) {
            throw new \Exception('sorting key should not be empty.');
        }
        if (!in_array($sortingKey, $this->supportedSortingKeys)) {
            throw new \Exception('sorting key ' . $sortingKey . ' is not supported yet.');
        }
    }


    /**
     * @return array
     */
    public function getSupportedSortingKeys(): array
    {
        return $this->supportedSortingKeys;
    }


}