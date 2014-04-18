<?php
/**
 * User: dongww
 * Date: 14-4-18
 * Time: 上午9:28
 */

namespace DComponent\Core;

/**
 * 过滤器接口
 *
 * Interface FilterInterface
 * @package Core
 */
interface FilterInterface
{
    /**
     * @param $value
     * @return mixed
     */
    public function filter($value);
}
 