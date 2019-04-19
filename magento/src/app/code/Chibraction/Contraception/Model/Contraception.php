<?php

declare(strict_types=1);

namespace Chibraction\Contraception\Model;

use Chibraction\Contraception\Api\Data\ContraceptionInterface;
use Magento\Framework\Model\AbstractModel;
use Magento\Framework\DataObject\IdentityInterface;
use Chibraction\Contraception\Model\ResourceModel\Contraception as ContraceptionResourceModel;

class Contraception extends AbstractModel implements ContraceptionInterface, IdentityInterface
{
    /**
     * Chibraction Contraception Contraception cache tag
     */
    const CACHE_TAG = 'chibraction_contraception_contraception';

    /**#@-*/
    protected $_cacheTag = self::CACHE_TAG;

    /**
     * Prefix of model events names
     *
     * @var string
     */
    protected $_eventPrefix = 'chibraction_contraception';

    /**
     * Parameter name in event
     *
     * In observe method you can use $observer->getEvent()->getObject() in this case
     *
     * @var string
     */
    protected $_eventObject = 'Contraception';

    /**
     * Name of object id field
     *
     * @var string
     */
    protected $_idFieldName = 'entity_id';

    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init(ContraceptionResourceModel::class);
    }

    /**
     * Get identities
     *
     * @return array
     */
    public function getIdentities(): array
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    /**
     * Retrieve contraception id
     *
     * @return int
     */
    public function getId()
    {
        return $this->getData(self::ID);
    }

    /**
     * Retrieve contraception name
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->getData(self::NAME);
    }

    /**
     * Retrieve contraception description
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->getData(self::DESCRIPTION);
    }

    /**
     * Set ID
     *
     * @param int $id
     * @return ContraceptionInterface
     */
    public function setId($id)
    {
        return $this->setData(self::ID, $id);
    }

    /**
     * Set name
     *
     * @param string $name
     * @return ContraceptionInterface
     */
    public function setName(string $name): ContraceptionInterface
    {
        return $this->setData(self::NAME, $name);
    }

    /**
     * Set description
     *
     * @param string $description
     * @return ContraceptionInterface
     */
    public function setDescription(string $description): ContraceptionInterface
    {
        return $this->setData(self::DESCRIPTION, $description);
    }

}
