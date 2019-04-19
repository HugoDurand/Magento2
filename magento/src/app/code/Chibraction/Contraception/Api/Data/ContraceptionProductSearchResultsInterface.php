<?php

declare(strict_types=1);

namespace Chibraction\Contraception\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * Interface for Contraception ContraceptionProduct search results.
 * @api
 */
interface ContraceptionProductSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get contraception list.
     *
     * @return \Chibraction\Contraception\Api\Data\ContraceptionProductInterface[]
     */
    public function getItems();

    /**
     * Set contraception list.
     *
     * @param \Chibraction\Contraception\Api\Data\ContraceptionProductInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
