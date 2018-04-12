<?php
/**
 * Created by PhpStorm.
 * User: Mamdouh
 * Date: 4/10/2018
 * Time: 12:41 AM
 */

namespace App\Tests\Services\Filters;


use App\Entity\Hotel;
use App\Services\Filters\PriceUpperLimitFilter;
use PHPUnit\Framework\TestCase;

class PriceUpperLimitFilterTest extends TestCase
{

    private  $hotel;

    public function setUp() : void
    {
        $this->hotel = new Hotel();
        $this->hotel->setPrice(80);
    }

    public function  testNameFilter() : void
    {
        $priceUpperLimitFilter = new PriceUpperLimitFilter();

        $this->assertTrue($priceUpperLimitFilter->apply($this->hotel,'90'));
        $this->assertTrue($priceUpperLimitFilter->apply($this->hotel,'80'));
        $this->assertFalse($priceUpperLimitFilter->apply($this->hotel,'70'));
    }

}