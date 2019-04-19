<?php

declare(strict_types=1);

/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Chibraction\Contraception\Model;

use Chibraction\Contraception\Api\ContraceptionProductRepositoryInterface;
use Chibraction\Contraception\Api\Data;
use Chibraction\Contraception\Model\ResourceModel\ContraceptionProduct as ContraceptionProductResource;
use Chibraction\Contraception\Model\ResourceModel\ContraceptionProduct\CollectionFactory as ContraceptionProductCollectionFactory;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

/**
 * Class BlockRepository
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class ContraceptionProductRepository implements ContraceptionProductRepositoryInterface
{
    /**
     * @var ContraceptionProductResource
     */
    protected $resource;
    /**
     * @var ContraceptionProductFactory
     */
    protected $contraceptionProductFactory;
    /**
     * @var ContraceptionProductCollectionFactory
     */
    protected $contraceptionProductCollectionFactory;
    /**
     * @var Data\ContraceptionProductSearchResultsInterface
     */
    protected $searchResultsFactory;

    /**
     * @param ContraceptionProductResource                           $resource
     * @param ContraceptionProductFactory                            $contraceptionProductFactory
     * @param ContraceptionProductCollectionFactory                  $contraceptionProductCollectionFactory
     * @param Data\ContraceptionProductSearchResultsInterfaceFactory $searchResultsFactory
     */
    public function __construct(
        ContraceptionProductResource $resource,
        ContraceptionProductFactory $contraceptionProductFactory,
        ContraceptionProductCollectionFactory $contraceptionProductCollectionFactory,
        Data\ContraceptionProductSearchResultsInterfaceFactory $searchResultsFactory
    ) {
        $this->resource             = $resource;
        $this->contraceptionProductFactory           = $contraceptionProductFactory;
        $this->contraceptionProductCollectionFactory = $contraceptionProductCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
    }

    /**
     * Save ContraceptionProduct data
     *
     * @param \Chibraction\Contraception\Api\Data\ContraceptionProductInterface $contraceptionProduct
     *
     * @return ContraceptionProduct
     * @throws CouldNotSaveException
     */
    public function save(Data\ContraceptionProductInterface $contraceptionProduct)
    {
        try {
            $this->resource->save($contraceptionProduct);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__($exception->getMessage()));
        }

        return $contraceptionProduct;
    }

    /**
     * Load ContraceptionProduct data by given ContraceptionProduct Identity
     *
     * @param string $consomId
     *
     * @return ContraceptionProduct
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById($contraceptionProductId)
    {
        $contraceptionProduct = $this->contraceptionProductFactory->create();
        $this->resource->load($contraceptionProduct, $contraceptionProductId);
        if (!$contraceptionProduct->getId()) {
            throw new NoSuchEntityException(__('ContraceptionProduct with id "%1" does not exist.', $contraceptionProduct));
        }

        return $contraceptionProduct;
    }

    /**
     * Load ContraceptionProduct data collection by given search criteria
     *
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     * @param \Magento\Framework\Api\SearchCriteriaInterface $criteria
     *
     * @return \Chibraction\Contraception\Api\Data\ContraceptionProductSearchResultsInterface
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $criteria)
    {
        /** @var \Chibraction\Contraception\Model\ResourceModel\ContraceptionProduct\Collection $collection */
        $collection = $this->contraceptionProductCollectionFactory->create();

        /** @var Data\ContraceptionProductSearchResultsInterface $searchResults */
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());

        return $searchResults;
    }

    /**
     * Delete ContraceptionProduct
     *
     * @param \Chibraction\ContraceptionProduct\Api\Data\ContraceptionProductInterface $contraceptionProduct
     *
     * @return bool
     * @throws CouldNotDeleteException
     */
    public function delete(Data\ContraceptionProductInterface $contraceptionProduct)
    {
        try {
            $this->resource->delete($contraceptionProduct);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__($exception->getMessage()));
        }

        return true;
    }

    /**
     * Delete ContraceptionProduct by given ContraceptionProduct Identity
     *
     * @param string $contraceptionProductId
     *
     * @return bool
     * @throws CouldNotDeleteException
     * @throws NoSuchEntityException
     */
    public function deleteById($contraceptionProductId)
    {
        return $this->delete($this->getById($contraceptionProductId));
    }
}
