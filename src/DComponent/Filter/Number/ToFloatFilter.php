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
    /**
     * @param $value
     * @return mixed
     */
    public function filter($value)
    {
        if (!isset($this->options['decimals'])) {
            $this->options['decimals'] = 2;
        }

        if (!isset($this->options['round'])) {
            $this->options['round'] = true;
        }

        if ($this->options['round']) {
            $value = round($value, $this->options['decimals']);
        } else {
            $value = number_format($value, $this->options['decimals']);
        }

        return $value;
    }
}
 