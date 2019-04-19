<?php

declare(strict_types=1);

namespace Chibraction\Contraception\Api;

/**
 * @api
 */
interface ContraceptionProductRepositoryInterface
{
    /**
     * Save block.
     *
     * @param \Chibraction\Contraception\Api\Data\ContraceptionProductInterface $contraceptionProduct
     * @return \Chibraction\Contraception\Api\Data\ContraceptionProductInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(Data\ContraceptionProductInterface $contraceptionProduct);

    /**
     * Retrieve $contraceptionProduct.
     *
     * @param int $contraceptionProductId
     * @return \Chibraction\Contraception\Api\Data\ContraceptionProductInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($contraceptionProductId);

    /**
     * Retrieve contraceptionProduct matching the specified criteria.
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Chibraction\Contraception\Api\Data\ContraceptionProductSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);

    /**
     * Delete ContraceptionProduct.
     *
     * @param \Chibraction\Contraception\Api\Data\ContraceptionProductInterface $contraceptionProduct
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(Data\ContraceptionProductInterface $contraceptionProduct);

    /**
     * Delete contraceptionProduct by ID.
     *
     * @param int $contraceptionProductId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($contraceptionProductId);
}
