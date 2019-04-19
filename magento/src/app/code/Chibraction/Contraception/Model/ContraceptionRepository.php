<?php

declare(strict_types=1);

/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Chibraction\Contraception\Model;

use Chibraction\Contraception\Api\ContraceptionRepositoryInterface;
use Chibraction\Contraception\Api\Data;
use Chibraction\Contraception\Model\ResourceModel\Contraception as ContraceptionResource;
use Chibraction\Contraception\Model\ContraceptionFactory;
use Chibraction\Contraception\Model\ResourceModel\Contraception\CollectionFactory as ContraceptionCollectionFactory;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

/**
 * Class BlockRepository
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class ContraceptionRepository implements ContraceptionRepositoryInterface
{
    /**
     * @var ContraceptionResource
     */
    protected $resource;

    /**
     * @var ContraceptionFactory
     */
    protected $contraceptionFactory;

    /**
     * @var ContraceptionCollectionFactory
     */
    protected $contraceptionCollectionFactory;

    /**
     * @var Data\ContraceptionSearchResultsInterface
     */
    protected $searchResultsFactory;

    /**
     * @param ContraceptionResource $resource
     * @param ContraceptionFactory $contraceptionFactory
     * @param ContraceptionCollectionFactory $contraceptionCollectionFactory
     * @param Data\ContraceptionSearchResultsInterfaceFactory $searchResultsFactory
     */
    public function __construct(
        ContraceptionResource $resource,
        ContraceptionFactory $contraceptionFactory,
        \Chibraction\Contraception\Api\Data\ContraceptionInterfaceFactory $dataContraceptionFactory,
        ContraceptionCollectionFactory $contraceptionCollectionFactory,
        Data\ContraceptionSearchResultsInterfaceFactory $searchResultsFactory
    ) {
        $this->resource = $resource;
        $this->contraceptionFactory = $contraceptionFactory;
        $this->contraceptionCollectionFactory = $contraceptionCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
    }

    /**
     * Save Contraception data
     *
     * @param \Chibraction\Contraception\Api\Data\ContraceptionInterface $contraception
     * @return Contraception
     * @throws CouldNotSaveException
     */
    public function save(Data\ContraceptionInterface $contraception)
    {
        try {
            $this->resource->save($contraception);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__($exception->getMessage()));
        }

        return $contraception;
    }

    /**
     * Load Contraception data by given Contraception Identity
     *
     * @param string $contraceptionId
     * @return Contraception
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById($contraceptionId)
    {
        $contraception = $this->contraceptionFactory->create();
        $this->resource->load($contraception, $contraceptionId);
        if (!$contraception->getId()) {
            throw new NoSuchEntityException(__('Contraception with id "%1" does not exist.', $contraception));
        }

        return $contraception;
    }

    /**
     * Load Contraception data collection by given search criteria
     *
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     * @param \Magento\Framework\Api\SearchCriteriaInterface $criteria
     * @return \Chibraction\Contraception\Api\Data\ContraceptionSearchResultsInterface
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $criteria)
    {
        /** @var \Chibraction\Contraception\Model\ResourceModel\Contraception\Collection $collection */
        $collection = $this->contraceptionCollectionFactory->create();

        /** @var Data\ContraceptionSearchResultsInterface $searchResults */
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());

        return $searchResults;
    }

    /**
     * Delete Contraception
     *
     * @param \Chibraction\Contraception\Api\Data\ContraceptionInterface $contraception
     * @return bool
     * @throws CouldNotDeleteException
     */
    public function delete(Data\ContraceptionInterface $contraception)
    {
        try {
            $this->resource->delete($contraception);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__($exception->getMessage()));
        }

        return true;
    }

    /**
     * Delete Contraception by given Contraception Identity
     *
     * @param string $contraceptionId
     * @return bool
     * @throws CouldNotDeleteException
     * @throws NoSuchEntityException
     */
    public function deleteById($contraceptionId)
    {
        return $this->delete($this->getById($contraceptionId));
    }
}
