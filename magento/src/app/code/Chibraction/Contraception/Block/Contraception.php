<?php

namespace Chibraction\Contraception\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Chibraction\Contraception\Model\ResourceModel\Contraception\Collection;
use Chibraction\Contraception\Model\ResourceModel\Contraception\CollectionFactory;

/**
 * Contraception block
 */
class Contraception extends Template
{
    protected $collectionFactory;

    public function __construct(
        CollectionFactory $collectionFactory,
        Context $context,
        array $data = []
    ) {
        $this->collectionFactory = $collectionFactory;
        parent::__construct($context, $data);
    }

    public function getContraceptions()
    {
        /** @var Collection $collection */
        $collection = $this->collectionFactory->create();

        return $collection->getItems();
    }
}
