<?php
/**
 * Created by PhpStorm.
 * User: Mamdouh
 * Date: 4/10/2018
 * Time: 1:30 AM
 */

namespace App\Tests\Services;


use App\Entity\Hotel;
use App\Entity\Hotels;
use App\Services\HotelSortingService;
use PHPUnit\Framework\TestCase;
use Exception;

class HotelSortingServiceTest extends TestCase
{
    private $hotels;

    public function setUp() : void
    {
        $hotel1 = new Hotel();
        $hotel1->setName('a');
        $hotel1->setPrice(80);

        $hotel2 = new Hotel();
        $hotel2->setName('b');
        $hotel2->setPrice(70);

        $hotel3 = new Hotel();
        $hotel3->setName('c');
        $hotel3->setPrice(75);

        $this->hotels = new Hotels();
        $this->hotels->setHotels([$hotel2, $hotel1, $hotel3]);
    }

    public function testSortHotelsByName() : void
    {
        $hotelSortingService = new HotelSortingService();
        $hotelSortingService->sortHotels($this->hotels, 'name');
        $this->assertEquals(3, sizeof($this->hotels->getHotels()));
        $this->assertEquals('a', $this->hotels->getHotels()[0]->getName());
        $this->assertEquals('c', $this->hotels->getHotels()[2]->getName());

    }

    public function testSortHotelsByPriceAsParameter() : void
    {
        $hotelSortingService = new HotelSortingService();
        $hotelSortingService->sortHotels($this->hotels, 'price');
        $this->assertEquals(3, sizeof($this->hotels->getHotels()));
        $this->assertEquals(70, $this->hotels->getHotels()[0]->getPrice());
        $this->assertEquals(80, $this->hotels->getHotels()[2]->getPrice());

    }

    public function testSortHotelsByDefaultKeyShouldSortByPrice() : void
    {
        $hotelSortingService = new HotelSortingService();
        $hotelSortingService->sortHotels($this->hotels);
        $this->assertEquals(3, sizeof($this->hotels->getHotels()));
        $this->assertEquals(70, $this->hotels->getHotels()[0]->getPrice());
        $this->assertEquals(80, $this->hotels->getHotels()[2]->getPrice());

    }

    public function testSortHotelsByEmptyKeyShouldThrowException() : void
    {
        $this->expectException(Exception::class);
        $hotelSortingService = new HotelSortingService();
        $hotelSortingService->sortHotels($this->hotels, '');

    }

    public function testSortHotelsByUnsupportedKeyShouldThrowException() : void
    {
        $this->expectException(Exception::class);
        $hotelSortingService = new HotelSortingService();
        $hotelSortingService->sortHotels($this->hotels, 'unsupportedKey');

    }
}