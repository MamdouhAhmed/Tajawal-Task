<?php
/**
 * Created by PhpStorm.
 * User: Mamdouh
 * Date: 4/9/2018
 * Time: 8:19 PM
 */

namespace App\Services\Helpers;


use App\Services\Filters\AvailabilityFilter;
use App\Services\Filters\CitiesFilter;
use App\Services\Filters\NameFilter;
use App\Services\Filters\PriceLowerLimitFilter;
use App\Services\Filters\PriceUpperLimitFilter;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class SearchHelper
 * @package App\Services\Helpers
 */
class SearchHelper
{
    protected $supportedFilterClasses = [
        'name' => NameFilter::class,
        'city' => CitiesFilter::class,
        'price_from' => PriceLowerLimitFilter::class,
        'price_to' => PriceUpperLimitFilter::class,
        'avail' => AvailabilityFilter::class
    ];

    private $filters = [];

    private $filterClasses = [];

    public function __construct(Request $request)
    {
        $this->filters = $this->extractFilters($request);
        $this->filterClasses = $this->mapFiltersToClasses();
    }


    /**
     * @param Request $request
     * @return array
     */
    private function extractFilters(Request $request): array
    {
        $filters = [];
        foreach (array_keys($this->supportedFilterClasses) as $filterName) {
            if (null !== $request->query->get($filterName)) {
                $filters[$filterName] = $request->query->get($filterName);
            }
        }
        return $filters;
    }

    /**
     * @return array
     */
    private function mapFiltersToClasses(): array
    {
        $filterClasses = [];
        foreach ($this->filters as $filter => $value) {
            $filterClasses[$filter] = $this->supportedFilterClasses[$filter];
        }
        return $filterClasses;
    }

    /**
     * @return array
     */
    public function getFilters(): array
    {
        return $this->filters;
    }

    /**
     * @return array
     */
    public function getFilterClasses(): array
    {
        return $this->filterClasses;
    }

}