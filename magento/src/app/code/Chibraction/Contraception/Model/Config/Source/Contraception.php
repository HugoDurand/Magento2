<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Chibraction\Contraception\Model\Config\Source;

use Magento\Framework\Option\ArrayInterface;
use Chibraction\Contraception\Model\ResourceModel\Contraception\Collection;
use Chibraction\Contraception\Model\ResourceModel\Contraception\CollectionFactory;

/**
 * Options provider for countries list
 *
 * @api
 * @since 100.0.2
 */
class Contraception implements ArrayInterface
{
    /**
     * Countries
     *
     * @var CollectionFactory $contraceptionCollectionFactory
     */
    protected $contraceptionCollectionFactory;

    /**
     * Options array
     *
     * @var array
     */
    protected $options;

    /**
     * Contraception constructor
     *
     * @param CollectionFactory $contraceptionCollectionFactory
     */
    public function __construct(
        CollectionFactory $contraceptionCollectionFactory
    ) {
        $this->contraceptionCollectionFactory = $contraceptionCollectionFactory;
    }

    /**
     * Return options array
     *
     * @param boolean $isMultiselect
     * @return array
     */
    public function toOptionArray($isMultiselect = false): array
    {
        if (!$this->options) {
            /** @var Collection $collection */
            $collection = $this->contraceptionCollectionFactory->create();
            $this->options = $collection->toOptionArray();
        }

        $options = $this->options;
        if (!$isMultiselect) {
            array_unshift($options, ['value' => '', 'label' => __('--Please Select--')]);
        }

        return $options;
    }
}
