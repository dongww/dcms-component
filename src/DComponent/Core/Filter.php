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
    public function __construct($options = [])
    {
        $this->options = $options;
    }
}
 