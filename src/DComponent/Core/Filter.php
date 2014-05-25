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
        return in_array($option, $this->options) ? true : false;
    }

    public function hasParameter($parameter)
    {
        return array_key_exists($parameter, $this->parameters) ? true : false;
    }

    public function addOption($option)
    {
        if ($this->hasOption($option)) {
            return;
        }

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

    public function __invoke($value)
    {
        return $this->filter($value);
    }
}
