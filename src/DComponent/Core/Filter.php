<?php
/**
 * User: dongww
 * Date: 14-4-18
 * Time: 上午10:38
 */

namespace DComponent\Core;


abstract class Filter implements FilterInterface
{
    protected $options = [];
    protected $parameters = [];

    /**
     * @param array $options 选项。例如小数点的处理，是舍弃还是四舍五入。
     * @param array $parameters 参数。例如保留几位小数
     */
    public function __construct($options = [], $parameters = [])
    {
        $this->options    = $options;
        $this->parameters = $parameters;
    }

    public function hasOption($option)
    {
        if (in_array($option, $this->options)) {
            return true;
        }

        return false;
    }

    public function hasParameter($parameter)
    {
        return isset($this->parameters[$parameter]) ? true : false;
    }

    public function addOption($option)
    {
        $this->options[] = $option;
    }

    public function addParameter($name, $value)
    {
        $this->parameters[$name] = $value;
    }

    public function emptyOptions()
    {
        return count($this->options) ? false : true;
    }

    public function emptyParameters()
    {
        return count($this->parameters) ? false : true;
    }
}
