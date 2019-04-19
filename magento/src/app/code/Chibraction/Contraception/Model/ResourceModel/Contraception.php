<?php

declare(strict_types=1);

namespace Chibraction\Contraception\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Contraception extends AbstractDb
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        // Table Name and Primary Key column
        $this->_init('chibraction_contraception_contraception', 'entity_id');
    }
}
