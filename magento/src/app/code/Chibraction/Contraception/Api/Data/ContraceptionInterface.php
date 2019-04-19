<?php

declare(strict_types=1);

namespace Chibraction\Contraception\Api\Data;

/**
 * Chibraction Contraception interface.
 *
 * @api
 */
interface ContraceptionInterface
{
    /**#@+
     * Constants for keys of data array. Identical to the name of the getter in snake case
     */
    const ID = 'entity_id';
    const NAME = 'name';
    const DESCRIPTION = 'description';
    /**#@-*/

    /**
     * Get ID
     *
     * @return int|null
     */
    public function getId();

    /**
     * Get name
     *
     * @return string|null
     */
    public function getName(): string;

    /**
     * Get description
     *
     * @return string|null
     */
    public function getDescription(): string;

    /**
     * Set ID
     *
     * @param int $id
     *
     * @return ContraceptionInterface
     */
    public function setId($id);

    /**
     * Set name
     *
     * @param string $Name
     *
     * @return ContraceptionInterface
     */
    public function setName(string $Name): ContraceptionInterface;

    /**
     * Set description
     *
     * @param string $description
     *
     * @return ContraceptionInterface
     */
    public function setDescription(string $description): ContraceptionInterface;
}
