<?php
/**
 * User: dongww
 * Date: 14-4-18
 * Time: 上午9:46
 */

namespace DComponent\Component\Base;

use DComponent\Core\SimpleProperty;
use DComponent\Filter\Number\IntegerFilter;

class Integer extends SimpleProperty
{
    public function get($filters = [])
    {
        if(empty($filters)){
            $this->addCoreFilter(new IntegerFilter());
        }

        return parent::get($filters);
    }
}
