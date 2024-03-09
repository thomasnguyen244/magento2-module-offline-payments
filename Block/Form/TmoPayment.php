<?php
/**
 * WorkWithThomas
 *
 * Do not edit or add to this file if you wish to upgrade to newer versions in the future.
 * If you wish to customise this module for your needs.
 * Please contact us https://workwiththomas.com/contact/.
 *
 * @category   WorkWithThomas
 * @package    Thomas_OfflinePayments
 * @copyright  Copyright (C) 2024 WorkWithThomas,.Jsc (https://workwiththomas.com/)
 * @license    https://workwiththomas.com/magento2-extension-license/
 */
declare(strict_types=1);

namespace Thomas\OfflinePayments\Block\Form;

class TmoPayment extends \Magento\Payment\Block\Form
{
    protected $_template = 'Thomas_OfflinePayments::form/tmopayment.phtml';
}
