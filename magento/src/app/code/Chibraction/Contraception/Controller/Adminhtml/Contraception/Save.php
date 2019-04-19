<?php

namespace Chibraction\Contraception\Controller\Adminhtml\Contraception;

use Magento\Backend\App\Action\Context;
use Chibraction\Contraception\Model\Contraception;
use Chibraction\Contraception\Model\ContraceptionFactory;
use Chibraction\Contraception\Model\ResourceModel\Contraception as ContraceptionResourceModel;
use Chibraction\Contraception\Api\ContraceptionRepositoryInterface;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\Exception\LocalizedException;

class Save extends \Chibraction\Contraception\Controller\Adminhtml\Contraception
{
    /**
     * @var DataPersistorInterface
     */
    protected $dataPersistor;
    /**
     * Description $contraceptionRepository field
     *
     * @var ContraceptionRepositoryInterface $contraceptionRepository
     */
    protected $contraceptionRepository;
    /**
     * Description $contraceptionFactory field
     *
     * @var ContraceptionFactory $contraceptionFactory
     */
    protected $contraceptionFactory;
    /**
     * Description $contraceptionResourceModel field
     *
     * @var ContraceptionResourceModel $contraceptionResourceModel
     */
    protected $contraceptionResourceModel;

    /**
     * Save constructor
     *
     * @param Context                       $context
     * @param \Magento\Framework\Registry   $coreRegistry
     * @param DataPersistorInterface        $dataPersistor
     * @param ContraceptionRepositoryInterface $contraceptionRepository
     * @param ContraceptionFactory             $contraceptionFactory
     * @param ContraceptionResourceModel       $contraceptionResourceModel
     */
    public function __construct(
        Context $context,
        \Magento\Framework\Registry $coreRegistry,
        DataPersistorInterface $dataPersistor,
        ContraceptionRepositoryInterface $contraceptionRepository,
        ContraceptionFactory $contraceptionFactory,
        ContraceptionResourceModel $contraceptionResourceModel
    ) {
        parent::__construct($context, $coreRegistry);

        $this->dataPersistor           = $dataPersistor;
        $this->contraceptionRepository    = $contraceptionRepository;
        $this->contraceptionFactory       = $contraceptionFactory;
        $this->contraceptionResourceModel = $contraceptionResourceModel;
    }

    /**
     * Save action
     *
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        $data           = $this->getRequest()->getPostValue();
        if ($data) {
            if (empty($data['entity_id'])) {
                $data['entity_id'] = null;
            }

            /** @var Contraception $model */
            $model = $this->contraceptionFactory->create();

            $id = $this->getRequest()->getParam('entity_id');
            if ($id) {
                try {
                    $model = $this->contraceptionRepository->getById($id);
                } catch (LocalizedException $e) {
                    $this->messageManager->addErrorMessage(__('This contraception no longer exists.'));

                    return $resultRedirect->setPath('*/*/');
                }
            }

            $model->setData($data);

            try {
                $this->contraceptionRepository->save($model);
                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('*/*/edit', ['id' => $model->getId()]);
                }

                return $resultRedirect->setPath('*/*/');
            } catch (LocalizedException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addExceptionMessage($e, __('Something went wrong while saving the contraception.'));
            }

            $this->dataPersistor->set('contraception_contraception', $data);

            return $resultRedirect->setPath('*/*/edit', ['entity_id' => $id]);
        }

        return $resultRedirect->setPath('*/*/');
    }
}
