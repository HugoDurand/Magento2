<?php

namespace Chibraction\Contraception\Model\ContraceptionProduct;

use Chibraction\Contraception\Model\ResourceModel\ContraceptionProduct\CollectionFactory;
use Magento\Framework\App\Request\DataPersistorInterface;

/**
 * Class DataProvider
 */
class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    /**
     * @var \Chibraction\Contraception\Model\ResourceModel\ContraceptionProduct\Collection
     */
    protected $collection;
    /**
     * @var DataPersistorInterface
     */
    protected $dataPersistor;
    /**
     * @var array
     */
    protected $loadedData;

    /**
     * Constructor
     *
     * @param string                 $name
     * @param string                 $primaryFieldName
     * @param string                 $requestFieldName
     * @param CollectionFactory      $contraceptionProductCollectionFactory
     * @param DataPersistorInterface $dataPersistor
     * @param array                  $meta
     * @param array                  $data
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $contraceptionProductCollectionFactory,
        DataPersistorInterface $dataPersistor,
        array $meta = [],
        array $data = []
    ) {
        $this->collection    = $contraceptionProductCollectionFactory->create();
        $this->dataPersistor = $dataPersistor;
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    /**
     * Get data
     *
     * @return array
     */
    public function getData()
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }
        $items = $this->collection->getItems();
        /** @var \Chibraction\Contraception\Model\ContraceptionProduct $contraceptionProduct */
        foreach ($items as $contraceptionProduct) {
            $this->loadedData[$contraceptionProduct->getId()] = $contraceptionProduct->getData();
        }

        $data = $this->dataPersistor->get('contraception_contraceptionProduct');

        if (!empty($data)) {
            $contraceptionProduct = $this->collection->getNewEmptyItem();
            $contraceptionProduct->setData($data);
            $this->loadedData[$contraceptionProduct->getId()] = $contraceptionProduct->getData();
            $this->dataPersistor->clear('contraception_contraceptionProduct');
        }

        return $this->loadedData;
    }
}
