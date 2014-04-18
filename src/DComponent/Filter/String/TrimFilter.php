<?php
/**
 * User: dongww
 * Date: 14-4-18
 * Time: 下午1:01
 */

namespace DComponent\Filter\String;

use DComponent\Core\Filter;

/**
 * 去除边上空格
 *
 * Class TrimFilter
 * @package DComponent\Filter\String
 */
class TrimFilter extends Filter
{
    const TRIM_LEFT = 1;
    const TRIM_RIGHT = 2;
    const TRIM_BOTH = 3;

    /**
     * @param $value
     * @return string
     */
    public function filter($value)
    {
        if (!isset($this->options['position'])) {
            $this->options['position'] = self::TRIM_BOTH;
        }

        switch ($this->options['position']) {
            case self::TRIM_LEFT:
                $value = ltrim($value);
                break;
            case self::TRIM_RIGHT:
                $value = rtrim($value);
                break;
            case self::TRIM_BOTH:
            default:
                $value = trim($value);
                break;
        }

        return $value;
    }
}
