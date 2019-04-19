<?php

declare(strict_types=1);

namespace Chibraction\Contraception\Model;

use Chibraction\Contraception\Api\Data\ContraceptionProductInterface;
use Magento\Framework\Model\AbstractModel;
use Magento\Framework\DataObject\IdentityInterface;

class ContraceptionProduct extends AbstractModel implements ContraceptionProductInterface, IdentityInterface
{
    /**
     * Chibraction Contraception contraceptionProduct cache tag
     */
    const CACHE_TAG = 'chibraction_contraception_contraceptionProduct';

    /**#@+
     * ContraceptionProduct's statuses
     */
    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;

    /**#@-*/
    protected $_cacheTag = self::CACHE_TAG;

    /**
     * Prefix of model events names
     *
     * @var string
     */
    protected $_eventPrefix = 'chibraction_contraceptionProduct';

    /**
     * Parameter name in event
     *
     * In observe method you can use $observer->getEvent()->getObject() in this case
     *
     * @var string
     */
    protected $_eventObject = 'contraceptionProduct';

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
        $this->_init(\Chibraction\Contraception\Model\ResourceModel\ContraceptionProduct::class);
    }

    /**
     * Get identities
     *
     * @return array
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    /**
     * Retrieve contraceptionProduct id
     *
     * @return int
     */
    public function getId()
    {
        return $this->getData(self::ID);
    }


    /**
     * Get contraception id
     *
     * @return int|null
     */
    public function getContraceptionId()
    {
        return $this->getData(self::CONTRACEPTION_ID);
    }

    /**
     * Get product id
     *
     * @return int|null
     */
    public function getProductId()
    {
        return $this->getData(self::PRODUCT_ID);
    }

    /**
     * Set ID
     *
     * @param int $id
     * @return ContraceptionProductInterface
     */
    public function setId($id)
    {
        return $this->setData(self::ID, $id);
    }


    /**
     * Set product id
     *
     * @param string $productId
     * @return ContraceptionProductInterface
     */
    public function setProductId($productId)
    {
        return $this->setData(self::PRODUCT_ID, $productId);
    }

    /**
     * @param string $contraceptionId
     * @return ContraceptionProductInterface
     */
    public function setContraceptionId($contraceptionId)
    {
        return $this->setData(self::CONTRACEPTION_ID, $contraceptionId);
    }
}
