<?php
/**
 * Created by PhpStorm.
 * User: Mamdouh
 * Date: 4/10/2018
 * Time: 12:14 AM
 */

namespace App\Tests\Services\Filters;


use App\Entity\Hotel;
use App\Services\Filters\CitiesFilter;
use PHPUnit\Framework\TestCase;

class CitiesFilterTest extends TestCase
{
    private  $hotel;
    public function setUp() : void
    {
        $this->hotel = new Hotel();
        $this->hotel->setCity('dubai');
    }

    public function  testCityFilter() : void
    {
        $citiesFilter = new CitiesFilter();
        $this->assertTrue($citiesFilter->apply($this->hotel, 'dubai'), 'Whole Word'); //Whole Word
        $this->assertTrue($citiesFilter->apply($this->hotel, 'bai', 'Suffix')); //Suffix
        $this->assertTrue($citiesFilter->apply($this->hotel, 'dub', 'Prefix')); //Prefix
        $this->assertTrue($citiesFilter->apply($this->hotel, 'd', 'One Character')); //One Character
        $this->assertFalse($citiesFilter->apply($this->hotel, '', 'Empty Input'));
        $this->assertFalse($citiesFilter->apply($this->hotel, 'o'), 'One Character that doesn\'t belong');
    }

}