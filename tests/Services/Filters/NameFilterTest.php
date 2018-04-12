<?php
/**
 * Created by PhpStorm.
 * User: Mamdouh
 * Date: 4/10/2018
 * Time: 12:22 AM
 */

namespace App\Tests\Services\Filters;


use App\Entity\Hotel;
use App\Services\Filters\NameFilter;
use PHPUnit\Framework\TestCase;

class NameFilterTest extends TestCase
{

    private $hotel;

    public function setUp(): void
    {
        $this->hotel = new Hotel();
        $this->hotel->setName('Rotana Hotel');
    }

    public function testNameFilter(): void
    {
        $nameFilter = new NameFilter();
        $this->assertTrue($nameFilter->apply($this->hotel, 'Rotana Hotel'), 'Whole Word');
        $this->assertTrue($nameFilter->apply($this->hotel, 'tel', 'Suffix'));
        $this->assertTrue($nameFilter->apply($this->hotel, 'rot', 'Prefix'));
        $this->assertTrue($nameFilter->apply($this->hotel, 't', 'One Character'));
        $this->assertFalse($nameFilter->apply($this->hotel, '', 'Empty Input'));
        $this->assertFalse($nameFilter->apply($this->hotel, 'k'), 'One Character that doesn\'t belong');

    }

}