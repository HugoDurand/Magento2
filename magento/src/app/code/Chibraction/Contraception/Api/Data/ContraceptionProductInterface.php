<?php

declare(strict_types=1);

namespace Chibraction\Contraception\Api\Data;

/**
 * Contraception ContraceptionProduct interface.
 *
 * @api
 */
interface ContraceptionProductInterface
{
    /**#@+
     * Constants for keys of data array. Identical to the name of the getter in snake case
     */
    const ID = 'entity_id';
    const CONTRACEPTION_ID = 'contraception_id';
    const PRODUCT_ID = 'product_id';
    /**#@-*/

    /**
     * Get ID
     *
     * @return int|null
     */
    public function getId();

    /**
     * Get contraception_id
     *
     * @return int|null
     */
    public function getContraceptionId();

    /**
     * Get product_id
     *
     * @return int|null
     */
    public function getProductId();

    /**
     * Set ID
     *
     * @param int $id
     *
     * @return ContraceptionProductInterface
     */
    public function setId($id);


    /**
     * Set contraception_id
     *
     * @param string $contraceptionId
     *
     * @return ContraceptionProductInterface
     */
    public function setContraceptionId($contraceptionId);

    /**
     * Set product_id
     *
     * @param string $productId
     *
     * @return ContraceptionProductInterface
     */
    public function setProductId($productId);
}
