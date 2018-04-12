<?php
/**
 * Created by PhpStorm.
 * User: Mamdouh
 * Date: 4/9/2018
 * Time: 11:40 PM
 */

namespace App\Tests\Services\Helpers;


use App\Services\Helpers\SearchHelper;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Request;

class SearchHelperTest extends TestCase
{
    public function testAddValidFilters() : void
    {
        $request = new Request();
        $request->query->add(['name'=>'rot','city'=>'dub']);
        $searchHelper = new SearchHelper($request);
        $filters = $searchHelper->getFilters();
        $filterClasses = $searchHelper->getFilterClasses();
        $this->assertEquals(2, sizeof($filters));
        $this->assertEquals(2, sizeof($filterClasses));
    }
    public function testAddValidAndInvalidFilters() : void
    {
        $request = new Request();
        $request->query->add(['name'=>'rot','city'=>'dub', 'notAfilter' => 'doesntmatter']);
        $searchHelper = new SearchHelper($request);
        $filters = $searchHelper->getFilters();
        $filterClasses = $searchHelper->getFilterClasses();
        $this->assertEquals(2, sizeof($filters));
        $this->assertEquals(2, sizeof($filterClasses));
    }
}