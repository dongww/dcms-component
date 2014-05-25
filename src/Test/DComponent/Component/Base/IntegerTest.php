<?php

/**
 * User: dongww
 * Date: 14-4-18
 * Time: 上午10:55
 */

use DComponent\Component\Base\Number\Integer;
use DComponent\Filter\Number\ToIntegerFilter;

class IntegerTest extends PHPUnit_Framework_TestCase
{
    public function testGetValue()
    {
        $integer = new Integer(12);
        $this->assertEquals(12, $integer->get());
        $this->assertEquals(13, $integer(13));

        $integer = new Integer(12.1);
        $this->assertEquals(12, $integer->get());

        $integer = new Integer(12.9);
        $this->assertEquals(12, $integer->get());
        $this->assertEquals(12, $integer(12.9));

        $integer = new Integer('');
        $this->assertEquals(0, $integer->get());

        $integer = new Integer('12');
        $this->assertEquals(12, $integer->get());
    }

    public function testOptions()
    {
        $integer = new Integer(12.1);
        $integer->addCoreFilter(
            new ToIntegerFilter([
                ToIntegerFilter::OPTION_CONVERSION_FLOOR,
            ])
        );
        $this->assertEquals(12, $integer->get());

        $integer = new Integer(12.1);
        $this->assertEquals(
            12,
            $integer->get([
                    new ToIntegerFilter([
                        ToIntegerFilter::OPTION_CONVERSION_FLOOR,
                    ])
                ]
            )
        );

        $integer = new Integer('12.1');
        $integer->addCoreFilter(
            new ToIntegerFilter([
                ToIntegerFilter::OPTION_CONVERSION_FLOOR,
            ])
        );
        $this->assertEquals(12, $integer->get());

        $integer = new Integer(12.9);
        $integer->addCoreFilter(
            new ToIntegerFilter([
                ToIntegerFilter::OPTION_CONVERSION_FLOOR,
            ])
        );
        $this->assertEquals(12, $integer->get());

        $integer = new Integer('12.9');
        $integer->addCoreFilter(
            new ToIntegerFilter([
                ToIntegerFilter::OPTION_CONVERSION_FLOOR,
            ])
        );
        $this->assertEquals(12, $integer->get());

        $integer = new Integer(12.1);
        $integer->addCoreFilter(
            new ToIntegerFilter([
                ToIntegerFilter::OPTION_CONVERSION_CEIL,
            ])
        );
        $this->assertEquals(13, $integer->get());
        $this->assertEquals(13, $integer(12.1));

        $integer = new Integer('12.1');
        $integer->addCoreFilter(
            new ToIntegerFilter([
                ToIntegerFilter::OPTION_CONVERSION_CEIL,
            ])
        );
        $this->assertEquals(13, $integer->get());
    }
}