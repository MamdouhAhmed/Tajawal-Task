<?php
/**
 * Created by PhpStorm.
 * User: Mamdouh
 * Date: 4/10/2018
 * Time: 1:21 AM
 */

namespace App\Tests\Services\Sorters;


use App\Entity\Hotel;
use App\Services\Sorters\PriceSorter;
use PHPUnit\Framework\TestCase;

class PriceSorterTest extends TestCase
{
    private $hotels;

    public function setUp(): void
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

        $this->hotels = [$hotel2, $hotel1, $hotel3];
    }

    public function testPriceSorter(): void
    {
        $priceSorter = new PriceSorter();
        $this->hotels = $priceSorter->sort($this->hotels);
        $this->assertEquals(3, sizeof($this->hotels));
        $this->assertEquals(70, $this->hotels[0]->getPrice());
        $this->assertEquals(80, $this->hotels[2]->getPrice());
    }

}