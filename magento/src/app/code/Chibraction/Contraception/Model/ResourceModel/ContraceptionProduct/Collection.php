<?php

declare(strict_types=1);

namespace Chibraction\Contraception\Model\ResourceModel\ContraceptionProduct;

use Magento\Catalog\Model\ResourceModel\Product\Collection as NativeCollection;

class Collection extends NativeCollection
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

    public function addContraceptionFiler($contraception)
    {
        $this->getSelect()->join(
            ['related' => $this->getTable('chibraction_contraception_products')],
            'related.product_id = e.entity_id',
            ['position']
        );
    }

}
