<?php
/**
 * User: dongww
 * Date: 14-4-18
 * Time: 上午9:46
 */

namespace DComponent\Component\Base\Number;

use DComponent\Core\SimpleProperty;
use DComponent\Filter\Number\ToIntegerFilter;

class Integer extends SimpleProperty
{
    public function get($filters = [])
    {
        if(empty($filters)){
            $this->addCoreFilter(new ToIntegerFilter());
        }

        return parent::get($filters);
    }
}
