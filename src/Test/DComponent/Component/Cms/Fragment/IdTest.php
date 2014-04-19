<?php
/**
 * User: dongww
 * Date: 14-4-19
 * Time: 上午9:42
 */

namespace Test\DComponent\Component\Cms\Fragment;

use DComponent\Component\Cms\Fragment\Id;
use DComponent\Component\Base\Number\Integer;
use DComponent\Core\Exception\Exception;

class IdClass
{
    use Id;
}

class IdTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var IdClass
     */
    protected $idObj;

    public function setup()
    {
        $this->idObj = new IdClass();
    }

    public function testId()
    {
        $this->idObj->setId(12, true);
        $this->assertEquals(12, $this->idObj->getId());

        $this->idObj->setId(new Integer(13), true);
        $this->assertEquals(13, $this->idObj->getId());
    }

    /**
     * @expectedException        Exception
     */
    public function testException()
    {
        $this->idObj->setId(14);
    }

    /**
     * @expectedException        Exception
     */
    public function testException1()
    {
        $this->idObj->setId(new Integer(15));
    }
}
 