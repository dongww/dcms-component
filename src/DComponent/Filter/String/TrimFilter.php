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
    const PARAM_TRIM_CHAR_LIST = 'charList';

    const OPTION_TRIM_LEFT  = 1;
    const OPTION_TRIM_RIGHT = 2;
    const OPTION_TRIM_BOTH  = 3;

    /**
     * @param $value
     * @return string
     */
    public function filter($value)
    {
        if (!isset($this->options['position'])) {
            $this->options['position'] = static::OPTION_TRIM_BOTH;
        }

        $charList = null;
        if ($this->hasParameter(static::PARAM_TRIM_CHAR_LIST)) {
            $charList = $this->parameters[static::PARAM_TRIM_CHAR_LIST];
        }

        if ($this->emptyOptions()) {
            $this->options[] = static::OPTION_TRIM_BOTH;
        }

        foreach ($this->options as $option) {
            switch ($option) {
                case static::OPTION_TRIM_LEFT:
                    $value = $charList === null ? ltrim($value) : ltrim($value, $charList);
                    break;
                case static::OPTION_TRIM_RIGHT:
                    $value = $charList === null ? rtrim($value) : rtrim($value, $charList);
                    break;
                case static::OPTION_TRIM_BOTH:
                    $value = $charList === null ? trim($value) : trim($value, $charList);
                    break;
            }
        }


        return $value;
    }
}
