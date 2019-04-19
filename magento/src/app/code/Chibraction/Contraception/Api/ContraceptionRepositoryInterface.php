<?php

declare(strict_types=1);

namespace Chibraction\Contraception\Api;

/**
 * Chibraction contraception CRUD interface.
 * @api
 */
interface ContraceptionRepositoryInterface
{
    /**
     * Save block.
     *
     * @param \Chibraction\Contraception\Api\Data\ContraceptionInterface $contraception
     * @return \Chibraction\Contraception\Api\Data\ContraceptionInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(Data\ContraceptionInterface $contraception);

    /**
     * Retrieve $contraception.
     *
     * @param int $contraceptionId
     * @return \Chibraction\Contraception\Api\Data\ContraceptionInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($contraceptionId);

    /**
     * Retrieve contraceptions matching the specified criteria.
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Chibraction\Contraception\Api\Data\ContraceptionSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);

    /**
     * Delete contraception.
     *
     * @param \Chibraction\Contraception\Api\Data\ContraceptionInterface $contraception
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(Data\ContraceptionInterface $contraception);

    /**
     * Delete contraception by ID.
     *
     * @param int $contraceptionId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($contraceptionId);
}
