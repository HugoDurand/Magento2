<?php

declare(strict_types=1);

namespace Chibraction\Contraception\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * Interface for chibraction contraception search results.
 * @api
 */
interface ContraceptionSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get Contraceptions list.
     *
     * @return \Chibraction\Contraception\Api\Data\ContraceptionInterface[]
     */
    public function getItems();

    /**
     * Set Contraceptions list.
     *
     * @param \Chibraction\Contraception\Api\Data\ContraceptionInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
