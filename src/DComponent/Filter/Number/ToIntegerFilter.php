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
    const OPTION_CONVERSION_FLOOR = 1;
    /** 向上取整 */
    const OPTION_CONVERSION_CEIL = 2;
    /** 四舍五入 */
    const OPTION_CONVERSION_ROUND = 3;

    public function filter($value)
    {
        if ($this->emptyOptions()) {
            $this->options[] = static::OPTION_CONVERSION_FLOOR;
        }

        foreach ($this->options as $option) {
            switch ($option) {
                case static::OPTION_CONVERSION_CEIL:
                    $value = ceil($value);
                    break;
                case static::OPTION_CONVERSION_ROUND:
                    $value = round($value);
                    break;
                case static::OPTION_CONVERSION_FLOOR:
                    $value = floor($value);
            }
        }

        return (int)$value;
    }
}
