<?php
/**
 * Created by PhpStorm.
 * User: Mamdouh
 * Date: 4/10/2018
 * Time: 1:05 AM
 */

namespace App\Tests\Services\Sorters;


use App\Entity\Hotel;
use App\Services\Sorters\NameSorter;
use PHPUnit\Framework\TestCase;

class NameSorterTest extends TestCase
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

    public function testNameSorter(): void
    {
        $nameSorter = new NameSorter();
        $this->hotels = $nameSorter->sort($this->hotels);
        $this->assertEquals(3, sizeof($this->hotels));
        $this->assertEquals('a', $this->hotels[0]->getName());
        $this->assertEquals('c', $this->hotels[2]->getName());
    }

}