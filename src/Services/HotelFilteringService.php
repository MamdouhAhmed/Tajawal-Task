<?php
/**
 * Created by PhpStorm.
 * User: Mamdouh
 * Date: 4/7/2018
 * Time: 9:46 PM
 */

namespace App\Services;


use App\Entity\Hotel;
use App\Entity\Hotels;
use App\Services\Helpers\SearchHelper;

/**
 * Class HotelFilteringService
 * @package App\Services
 */
class HotelFilteringService
{

    /**
     * @param Hotels $hotels
     * @param SearchHelper $searchHelper
     * @return Hotels
     */
    public function filterHotels(Hotels $hotels, SearchHelper $searchHelper): Hotels
    {
        $filters = $searchHelper->getFilters();

        $filterClasses = $searchHelper->getFilterClasses();

        $hotels->setHotels(array_filter($hotels->getHotels(),
            function (Hotel $hotel) use (& $filterClasses, & $filters) {

                foreach ($filters as $filter => $constraint) {
                    if (!(new $filterClasses[$filter])->apply($hotel, $constraint)) {
                        return false;
                    }
                }

                return true;
            }));


        return $hotels;
    }


}