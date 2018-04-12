<?php
/**
 * Created by PhpStorm.
 * User: Mamdouh
 * Date: 4/10/2018
 * Time: 12:43 AM
 */

namespace App\Tests\Services\Filters;


use App\Entity\Availability;
use App\Entity\Hotel;
use App\Services\Filters\AvailabilityFilter;
use PHPUnit\Framework\TestCase;

class AvailabilityFilterTest extends TestCase
{
    private $hotel;

    public function setUp() : void
    {
        $availability = new Availability();
        $availability->setFrom("01-10-2010");
        $availability->setTo("30-10-2010");
        $this->hotel = new Hotel();
        $this->hotel->setAvailability([$availability]);
    }
    public function testAvailabilityFilterForOneDateRange() : void
    {
        $availabilityFilter = new AvailabilityFilter();

        $this->assertTrue($availabilityFilter->apply($this->hotel, "01-10-2010:30-10-2010"));
        $this->assertTrue($availabilityFilter->apply($this->hotel, "01-10-2010:29-10-2010"));
        $this->assertTrue($availabilityFilter->apply($this->hotel, "02-10-2010:30-10-2010"));
        $this->assertTrue($availabilityFilter->apply($this->hotel, "02-10-2010:29-10-2010"));


        $this->assertFalse($availabilityFilter->apply($this->hotel, "02-10-2010:31-10-2010"));
        $this->assertFalse($availabilityFilter->apply($this->hotel, "30-09-2010:30-10-2010"));
        $this->assertFalse($availabilityFilter->apply($this->hotel, "30-09-2010:31-10-2010"));

    }

    public function testAvailabilityFilterForMultipleDateRanges() : void
    {
        $availabilityFilter = new AvailabilityFilter();

        $this->assertTrue($availabilityFilter->apply($this->hotel, "01-10-2010:30-10-2010,01-10-2010:29-10-2010")); //Both Fit
        $this->assertTrue($availabilityFilter->apply($this->hotel, "01-10-2010:30-10-2010,02-10-2010:31-10-2010")); //Only One fits
        $this->assertFalse($availabilityFilter->apply($this->hotel, "30-09-2010:30-10-2010,30-09-2010:31-10-2010")); // None fit

    }


}