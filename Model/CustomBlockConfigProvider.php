<?php
/**
 * @category Magenuts FrontOrderComment
 * @package Magenuts_FrontOrderComment
 * @copyright Copyright (c) 2017-2021 Magenuts
 * @author Magenuts Team <support@magenuts.com>
 */
namespace Magenuts\FrontOrderComment\Model;

use Magento\Checkout\Model\ConfigProviderInterface;
use Magento\Store\Model\ScopeInterface;

class CustomBlockConfigProvider implements ConfigProviderInterface
{
    /** @var \Magento\Framework\App\Config\ScopeConfigInterface */
    protected $scopeConfiguration;

    /**
     * @param \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfiguration
     */
    public function __construct(
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfiguration
    ) {
        $this->scopeConfiguration = $scopeConfiguration;
    }

    /**
     * @return array() $showHide
     */
    public function getConfig()
    {
		/** @var array() $showHide */
        $showHide = [];
		/** @var boolean $enabled */
        $enabled = $this->scopeConfiguration
			->getValue('FrontOrderComment/module/ordercomment', ScopeInterface::SCOPE_STORE);
        $showHide['show_hide_custom_block'] = ($enabled)?true:false;
        return $showHide;
    }
}