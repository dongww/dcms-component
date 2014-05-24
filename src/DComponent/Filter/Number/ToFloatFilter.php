<?php
/**
 * User: dongww
 * Date: 14-4-18
 * Time: 下午4:46
 */

namespace DComponent\Filter\Number;

use DComponent\Core\Filter;

class ToFloatFilter extends Filter
{
    /** 小数位 */
    const PARAM_DECIMALS = 'decimals';

    /** 四舍五入 */
    const OPTION_CONVERSION_ROUND = 1;

    /**
     * @param $value
     * @return mixed
     */
    public function filter($value)
    {
        if (!$this->hasParameter(static::PARAM_DECIMALS)) {
            $decimals = 2;
        } else {
            $decimals = (int)$this->parameters[static::PARAM_DECIMALS];
        }

        if ($this->hasOption(static::OPTION_CONVERSION_ROUND)) {
            $value = round($value, $decimals);
        } else {
            $value = round($value, $decimals, PHP_ROUND_HALF_DOWN);
        }

        return $value;
    }
}
 