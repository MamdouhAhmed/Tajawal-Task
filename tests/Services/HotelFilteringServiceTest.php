<?php
/**
 * Created by PhpStorm.
 * User: Mamdouh
 * Date: 4/10/2018
 * Time: 11:10 AM
 */

namespace App\Tests\Services;


use App\Entity\Availability;
use App\Entity\Hotel;
use App\Entity\Hotels;
use App\Services\Helpers\SearchHelper;
use App\Services\HotelFilteringService;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Request;

class HotelFilteringServiceTest extends TestCase
{
    private $hotels;

    public function setUp() : void
    {
        $hotel1 = new Hotel();
        $hotel1->setName('a');
        $hotel1->setPrice(80);
        $hotel1->setCity('d');
        $availability1 = new Availability();
        $availability1->setFrom("01-10-2010");
        $availability1->setTo("30-10-2010");
        $hotel1->setAvailability([$availability1]);

        $hotel2 = new Hotel();
        $hotel2->setName('b');
        $hotel2->setPrice(70);
        $hotel2->setCity('e');
        $availability2 = new Availability();
        $availability2->setFrom("01-07-2010");
        $availability2->setTo("30-08-2010");
        $hotel1->setAvailability([$availability2]);


        $hotel3 = new Hotel();
        $hotel3->setName('c');
        $hotel3->setPrice(75);
        $hotel3->setCity('f');
        $availability3 = new Availability();
        $availability3->setFrom("01-10-2010");
        $availability3->setTo("30-10-2010");
        $hotel1->setAvailability([$availability3]);


        $this->hotels = new Hotels();
        $this->hotels->setHotels([$hotel2, $hotel1, $hotel3]);
    }

    public function testFilterByNothingShouldReturnAll(): void
    {
        $hotelFilteringService = new HotelFilteringService();

        $request = new Request();
        $request->query->add([]);

        $this->hotels = $hotelFilteringService->filterHotels($this->hotels, new SearchHelper($request));

        $this->assertEquals(3, sizeof($this->hotels->getHotels()));
    }

    public function testFilterByOneParameterThatWillReturnNothing(): void
    {
        $hotelFilteringService = new HotelFilteringService();

        $request = new Request();
        $request->query->add(['name'=>'k']);

        $this->hotels = $hotelFilteringService->filterHotels($this->hotels, new SearchHelper($request));

        $this->assertEquals(0, sizeof($this->hotels->getHotels()));
    }

    public function testFilterByMultipleParametersThatWillReturnNothing(): void
    {
        $hotelFilteringService = new HotelFilteringService();

        $request = new Request();
        $request->query->add(['name'=>'a', 'city' => 'c']);

        $this->hotels = $hotelFilteringService->filterHotels($this->hotels, new SearchHelper($request));

        $this->assertEquals(0, sizeof($this->hotels->getHotels()));
    }

    public function testFilterByOneParameterThatWillReturnOnlyOneResult(): void
    {
        $hotelFilteringService = new HotelFilteringService();

        $request = new Request();
        $request->query->add(['name'=>'a']);

        $this->hotels = $hotelFilteringService->filterHotels($this->hotels, new SearchHelper($request));

        $this->assertEquals(1, sizeof($this->hotels->getHotels()));
    }

    public function testFilterByOneParameterThatWillReturnOnlyTwoResults(): void
    {
        $hotelFilteringService = new HotelFilteringService();

        $request = new Request();
        $request->query->add(['name'=>'a,b']);

        $this->hotels = $hotelFilteringService->filterHotels($this->hotels, new SearchHelper($request));

        $this->assertEquals(2, sizeof($this->hotels->getHotels()));
    }

    public function testFilterByMultipleParametersThatWillReturnOnlyOneResult(): void
    {
        $hotelFilteringService = new HotelFilteringService();

        $request = new Request();
        $request->query->add(['name'=>'a', 'city'=>'d,e']);

        $this->hotels = $hotelFilteringService->filterHotels($this->hotels, new SearchHelper($request));

        $this->assertEquals(1, sizeof($this->hotels->getHotels()));
    }

    public function testFilterByMultipleParametersThatWillReturnOnlyTwoResult(): void
    {
        $hotelFilteringService = new HotelFilteringService();

        $request = new Request();
        $request->query->add(['name'=>'a,b', 'city'=>'d,e']);

        $this->hotels = $hotelFilteringService->filterHotels($this->hotels, new SearchHelper($request));

        $this->assertEquals(2, sizeof($this->hotels->getHotels()));
    }
}