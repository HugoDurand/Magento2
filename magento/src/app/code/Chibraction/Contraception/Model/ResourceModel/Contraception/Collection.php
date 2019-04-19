<?php

declare(strict_types=1);

namespace Chibraction\Contraception\Model\ResourceModel\Contraception;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Chibraction\Contraception\Model\Contraception;
use Chibraction\Contraception\Model\ResourceModel\Contraception as ContraceptionResourceModel;

class Collection extends AbstractCollection
{

    protected $_idFieldName = 'entity_id';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(Contraception::class, ContraceptionResourceModel::class);
    }

    /**
     * @return array
     */
    public function toOptionArray()
    {
        return $this->_toOptionArray($this->_idFieldName, 'title');
    }
}
