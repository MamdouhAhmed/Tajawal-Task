<?php
/**
 * Created by PhpStorm.
 * User: Mamdouh
 * Date: 4/10/2018
 * Time: 12:30 AM
 */

namespace App\Tests\Services\Filters;


use App\Entity\Hotel;
use App\Services\Filters\PriceLowerLimitFilter;
use PHPUnit\Framework\TestCase;

class PriceLowerLimitFilterTest extends TestCase
{

    private  $hotel;

    public function setUp() : void
    {
        $this->hotel = new Hotel();
        $this->hotel->setPrice(80);
    }

    public function  testNameFilter() : void
    {
        $priceLowerLimitFilter = new PriceLowerLimitFilter();

        $this->assertFalse($priceLowerLimitFilter->apply($this->hotel,'90'));
        $this->assertTrue($priceLowerLimitFilter->apply($this->hotel,'80'));
        $this->assertTrue($priceLowerLimitFilter->apply($this->hotel,'70'));

    }

}