<?php
/**
 * Created by PhpStorm.
 * User: Mamdouh
 * Date: 4/8/2018
 * Time: 1:43 AM
 */

namespace App\Services\Sorters;


use App\Entity\Hotel;

/**
 * Class PriceSorter
 * @package App\Services\Sorters
 */
class PriceSorter implements HotelSorterInterface
{

    public function sort(array $hotels): array
    {
        usort($hotels, function (Hotel $first, Hotel $second) {
            return $first->getPrice() > $second->getPrice();
        });
        return $hotels;
    }
}