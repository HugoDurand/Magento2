<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Chibraction\Contraception\Block\Adminhtml\Contraception\Edit;

use Magento\Backend\Block\Widget\Context;
use Chibraction\Contraception\Api\ContraceptionRepositoryInterface;
use Magento\Framework\Exception\NoSuchEntityException;

/**
 * Class GenericButton
 */
abstract class GenericButton
{
    /**
     * @var Context
     */
    protected $context;

    /**
     * @var ContraceptionRepositoryInterface
     */
    protected $contraceptionRepository;

    /**
     * @param Context $context
     * @param ContraceptionRepositoryInterface $contraceptionRepository
     */
    public function __construct(
        Context $context,
        ContraceptionRepositoryInterface $contraceptionRepository
    ) {
        $this->context              = $context;
        $this->contraceptionRepository = $contraceptionRepository;
    }

    /**
     * Return Contraception contraception ID
     *
     * @return int|null
     */
    public function getContraceptionId()
    {
        try {
            return $this->contraceptionRepository->getById(
                $this->context->getRequest()->getParam('id')
            )->getId();
        } catch (NoSuchEntityException $e) {
        }
        return null;
    }

    /**
     * Generate url by route and parameters
     *
     * @param   string $route
     * @param   array $params
     * @return  string
     */
    public function getUrl($route = '', $params = [])
    {
        return $this->context->getUrlBuilder()->getUrl($route, $params);
    }
}
