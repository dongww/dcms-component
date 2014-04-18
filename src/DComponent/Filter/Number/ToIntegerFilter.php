<?php
/**
 * User: dongww
 * Date: 14-4-18
 * Time: 上午9:48
 */

namespace DComponent\Filter\Number;

use DComponent\Core\Filter;

class ToIntegerFilter extends Filter
{
    /** 向下取整 */
    const CONVERSION_FLOOR = 1;
    /** 向上取整 */
    const CONVERSION_CEIL = 2;
    /** 四舍五入 */
    const CONVERSION_ROUND = 3;

    public function filter($value)
    {
        if (!isset($this->options['conversion'])) {
            $this->options['conversion'] = self::CONVERSION_FLOOR;
        }

        switch ($this->options['conversion']) {
            case self::CONVERSION_CEIL:
                $value = ceil($value);
                break;
            case self::CONVERSION_FLOOR:
                $value = floor($value);
                break;
            case self::CONVERSION_ROUND:
                $value = round($value);
                break;
            default:
                $value = (int)$value;
        }

        return (int)$value;
    }
}
