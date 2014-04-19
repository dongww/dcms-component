<?php
/**
 * User: dongww
 * Date: 14-4-18
 * Time: 上午9:16
 */

namespace DComponent\Core;


abstract class SimpleProperty implements SimplePropertyInterface
{
    protected $rawValue;

    /**
     * @var FilterInterface[]
     */
    protected $coreFilters = [];

    /**
     * @param string|int|float|null $value 属性值
     */
    public function __construct($value = null)
    {
        $this->rawValue = $value;
    }

    public function set($value)
    {
        $this->rawValue = $value;
    }

    /**
     * 获得属性的值，可以设置额外的过滤器
     *
     * @param FilterInterface[] $filters
     * @return string|int|float|null
     */
    public function get($filters = [])
    {
        //todo filter 排序

        $value = $this->rawValue;

        foreach ($this->coreFilters as $f) {
            $value = $f->filter($value);
        }

        foreach ($filters as $f) {
            $value = $f->filter($value);
        }

        return $value;
    }

    /**
     * @param FilterInterface $filter
     */
    public function addCoreFilter($filter)
    {
        $this->coreFilters[] = $filter;
    }

    public function getRaw()
    {
        return $this->rawValue;
    }
}
 