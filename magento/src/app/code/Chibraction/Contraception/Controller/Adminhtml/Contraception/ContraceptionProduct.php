<?php

namespace Chibraction\Contraception\Controller\Adminhtml\Contraception;


abstract class ContraceptionProduct extends \Magento\Backend\App\Action
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'Contraception_Chibraction::item_list';


}