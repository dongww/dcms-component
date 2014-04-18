<?php
/**
 * User: dongww
 * Date: 14-4-18
 * Time: 上午9:17
 */

namespace DComponent\Core;


interface SimplePropertyInterface
{
    /**
     * @param $value
     */
    public function set($value);

    /*
     * @param FilterInterface[] $filters 过滤器列表
     */
    public function get($filters = []);
}
