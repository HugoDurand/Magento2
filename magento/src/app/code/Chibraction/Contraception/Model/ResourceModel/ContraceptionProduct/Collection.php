<?php

declare(strict_types=1);

namespace Chibraction\Contraception\Model\ResourceModel\ContraceptionProduct;

use \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

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
        $this->_init('Chibraction\Contraception\Model\ContraceptionProduct', 'Chibraction\Contraception\Model\ResourceModel\ContraceptionProduct');
    }

}
