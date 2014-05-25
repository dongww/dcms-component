<?php
/**
 * User: dongww
 * Date: 14-4-18
 * Time: 上午11:24
 */

namespace Test\DComponent\Filter;

use DComponent\Filter\Number\ToIntegerFilter;

class ToIntegerFilterTest extends \PHPUnit_Framework_TestCase
{
    public function testOptions()
    {
        $f = new ToIntegerFilter([
            ToIntegerFilter::OPTION_CONVERSION_CEIL,
        ]);
        $this->assertEquals(13, $f->filter(12.1));
        $this->assertEquals(13, $f->filter(12.9));
        $this->assertEquals(13, $f(12.9));

        $f = new ToIntegerFilter([
            ToIntegerFilter::OPTION_CONVERSION_FLOOR,
        ]);
        $this->assertEquals(12, $f->filter(12.1));
        $this->assertEquals(12, $f->filter(12.9));

        $f = new ToIntegerFilter([
            ToIntegerFilter::OPTION_CONVERSION_ROUND,
        ]);
        $this->assertEquals(12, $f->filter(12.1));
        $this->assertEquals(13, $f->filter(12.9));
    }
}
 