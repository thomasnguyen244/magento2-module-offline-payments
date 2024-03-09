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

use Magento\Checkout\Model\ConfigProviderInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;

/**
 * Class GetCustomValue
 *
 * @package Thomas\OfflinePayments\Model
 */
class GetCustomValue extends \Magento\Framework\View\Element\Template implements ConfigProviderInterface
{

    /**
     * @var ScopeConfigInterface
     */
    protected $_scopeConfig;

    /**
     * GetCustomValue constructor.
     *
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(ScopeConfigInterface $scopeConfig)
    {
        $this->_scopeConfig = $scopeConfig;
    }

    /**
     * get code length
     * @return int|float
     */
    public function getCodeLength()
    {
        return (int)$this->_scopeConfig->getValue("payment/tmopayment/code_length", \Magento\Store\Model\ScopeInterface::SCOPE_WEBSITE);
    }

    /**
     * get getConsecutiveCharacters
     * @return int|float|string
     */
    public function getConsecutiveCharacters()
    {
        return $this->_scopeConfig->getValue("payment/tmopayment/consecutive_characters", \Magento\Store\Model\ScopeInterface::SCOPE_WEBSITE);
    }

    /**
     * get custom config
     *
     * @return array|mixed
     */
    public function getConfig()
    {
        $config = [];
        $config['tmo_code_length'] = $this->getCodeLength();
        $config['consecutive_chars'] = $this->getConsecutiveCharacters();
        return $config;
    }
}
