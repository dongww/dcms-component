<?php
/**
 * User: dongww
 * Date: 14-4-18
 * Time: 上午11:24
 */

namespace Test\DComponent\Filter;

use DComponent\Filter\Number\IntegerFilter;

class IntegerFilterTest extends \PHPUnit_Framework_TestCase
{
    public function testOptions()
    {
        $f = new IntegerFilter([
            'conversion' => IntegerFilter::CONVERSION_CEIL,
        ]);
        $this->assertEquals(13, $f->filter(12.1));
        $this->assertEquals(13, $f->filter(12.9));

        $f = new IntegerFilter([
            'conversion' => IntegerFilter::CONVERSION_FLOOR,
        ]);
        $this->assertEquals(12, $f->filter(12.1));
        $this->assertEquals(12, $f->filter(12.9));

        $f = new IntegerFilter([
            'conversion' => IntegerFilter::CONVERSION_ROUND,
        ]);
        $this->assertEquals(12, $f->filter(12.1));
        $this->assertEquals(13, $f->filter(12.9));
    }
}
 