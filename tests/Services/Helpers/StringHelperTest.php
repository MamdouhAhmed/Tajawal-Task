<?php
/**
 * Created by PhpStorm.
 * User: Mamdouh
 * Date: 4/8/2018
 * Time: 11:40 PM
 */

namespace App\Tests\Services\Helpers;


use App\Services\Helpers\StringHelper;
use PHPUnit\Framework\TestCase;

class StringHelperTest extends TestCase
{
    public function testSplitByComma() : void
    {
        $this->assertEquals(['a','b'],StringHelper::splitByComma("a,b"));
        $this->assertEquals(['a','','b'],StringHelper::splitByComma("a,,b"));
        $this->assertEquals(['a','','b',''],StringHelper::splitByComma("a,,b,"));
        $this->assertEquals(['',''],StringHelper::splitByComma(","));
        $this->assertEquals([''],StringHelper::splitByComma(""));
    }
    public function testSplitByColon() : void
    {
        $this->assertEquals(['a','b'],StringHelper::splitByColon("a:b"));
        $this->assertEquals(['a','','b'],StringHelper::splitByColon("a::b"));
        $this->assertEquals(['a','','b',''],StringHelper::splitByColon("a::b:"));
        $this->assertEquals(['',''],StringHelper::splitByColon(":"));
        $this->assertEquals([''],StringHelper::splitByColon(""));
    }
    public function testContains() : void
    {
        $this->assertTrue(StringHelper::contains("input","in"));
        $this->assertTrue(StringHelper::contains("input","np"));
        $this->assertTrue(StringHelper::contains("input","ut"));
        $this->assertFalse(StringHelper::contains("input","out"));
    }

    public function testJoinByComma() : void
    {
        $this->assertEquals('a,b',StringHelper::joinWithCommas(['a','b']));
        $this->assertEquals('a',StringHelper::joinWithCommas(['a']));
        $this->assertEquals(',',StringHelper::joinWithCommas(['','']));
        $this->assertEquals('',StringHelper::joinWithCommas(['']));
    }
}