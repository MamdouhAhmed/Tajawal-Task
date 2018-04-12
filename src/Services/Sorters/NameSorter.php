<?php
/**
 * Created by PhpStorm.
 * User: Mamdouh
 * Date: 4/8/2018
 * Time: 1:36 AM
 */

namespace App\Services\Sorters;


use App\Entity\Hotel;

/**
 * Class NameSorter
 * @package App\Services\Sorters
 */
class NameSorter implements HotelSorterInterface
{

    public function sort(array $hotels): array
    {
        usort($hotels, function (Hotel $first,Hotel $second){
            return strcmp($first->getName() , $second->getName()) > 0;
        });
        return $hotels;
    }
}