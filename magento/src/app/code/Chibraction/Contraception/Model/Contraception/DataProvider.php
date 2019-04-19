<?php

namespace Chibraction\Contraception\Model\Contraception;

use Chibraction\Contraception\Model\ResourceModel\Contraception\CollectionFactory;
use Magento\Framework\App\Request\DataPersistorInterface;

/**
 * Class DataProvider
 */
class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    /**
     * @var \Chibraction\Contraception\Model\ResourceModel\Contraception\Collection
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
     * @param CollectionFactory      $contraceptionCollectionFactory
     * @param DataPersistorInterface $dataPersistor
     * @param array                  $meta
     * @param array                  $data
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $contraceptionCollectionFactory,
        DataPersistorInterface $dataPersistor,
        array $meta = [],
        array $data = []
    ) {
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);

        $this->collection    = $contraceptionCollectionFactory->create();
        $this->dataPersistor = $dataPersistor;
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
        /** @var \Chibraction\Contraception\Model\Contraception $contraception */
        foreach ($items as $contraception) {
            $this->loadedData[$contraception->getId()] = $contraception->getData();
        }

        $data = $this->dataPersistor->get('contraception_contraception');

        if (!empty($data)) {
            $contraception = $this->collection->getNewEmptyItem();
            $contraception->setData($data);
            $this->loadedData[$contraception->getId()] = $contraception->getData();
            $this->dataPersistor->clear('contraception_contraception');
        }

        return $this->loadedData;
    }
}
