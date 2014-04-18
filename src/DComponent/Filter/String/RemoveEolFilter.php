<?php
/**
 * User: dongww
 * Date: 14-4-18
 * Time: 下午3:45
 */

namespace DComponent\Filter\String;

use DComponent\Core\Filter;

/**
 * 移除换行符
 *
 * Class RemoveEolFilter
 * @package DComponent\Filter\String
 */
class RemoveEolFilter extends Filter
{
    /**
     * @param $value
     * @return string
     */
    public function filter($value)
    {
        return str_replace(PHP_EOL, '', $value);
    }
}
