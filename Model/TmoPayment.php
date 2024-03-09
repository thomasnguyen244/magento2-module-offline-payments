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

namespace Thomas\OfflinePayments\Model;

use Magento\Quote\Api\Data\PaymentInterface;

/**
 * Class TmoPayment
 *
 * @package Thomas\OfflinePayments\Model
 */
class TmoPayment extends \Magento\Payment\Model\Method\AbstractMethod
{
    const PAYMENT_METHOD_TMOPAYMENT_CODE = 'tmopayment';

    /**
     * Payment method code
     *
     * @var string
     */
    protected $_code = self::PAYMENT_METHOD_TMOPAYMENT_CODE;

    /**
     * @var string
     */
    protected $_formBlockType = \Thomas\OfflinePayments\Block\Form\TmoPayment::class;

    /**
     * @var string
     */
    protected $_infoBlockType = \Thomas\OfflinePayments\Block\Info\TmoPayment::class;

    /**
     * Availability option
     *
     * @var bool
     */
    protected $_isOffline = true;
}
