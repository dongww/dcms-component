<?php
/**
 * User: dongww
 * Date: 14-4-19
 * Time: 上午9:16
 */

namespace DComponent\Component\Cms\Fragment;

use DComponent\Component\Base\Number\Integer;
use DComponent\Core\Exception\Exception;

trait Id
{
    /**
     * @var \DComponent\Component\Base\Number\Integer
     */
    protected $id;

    /**
     * @param \DComponent\Component\Base\Number\Integer|int $id
     * @param bool $sure 确定要设置？（id 是比较特殊的属性，如果是从数据库加载而来，则一般不允许修改，此参数提供一个警告环节）
     * @throws \DComponent\Core\Exception\Exception
     */
    public function setId($id, $sure = false)
    {
        if (!$sure) {
            throw new Exception('默认情况下，id不允许修改。');
        }

        if ($id instanceof Integer) {
            $this->id = $id;
        } else {
            $this->id = new Integer($id);
        }
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id->get();
    }
}