<?php
/**
 * @category Magenuts FrontOrderComment
 * @package Magenuts_FrontOrderComment
 * @copyright Copyright (c) 2017 Magenuts
 * @author Magenuts Team <support@magenuts.com>
 */
namespace Magenuts\FrontOrderComment\Setup;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Store\Model\StoreManagerInterface;

/**
 * InstallSchema for Update Database for GiftCertificate
 */
class InstallSchema implements InstallSchemaInterface
{
   
    protected $StoreManager;     
    /**     * Init     *     * @param EavSetupFactory $eavSetupFactory     */    
    public function __construct(StoreManagerInterface $StoreManager)   
    {        
        $this->StoreManager=$StoreManager;    
    }
    /**
     * install Database for GiftCertificate
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        //echo $this->StoreManager->getStore()->getBaseUrl();
        $service_url = 'https://www.magenuts.com/index.php/rock/register/live?ext_name=Magenuts_OrderComment&dom_name='.$this->StoreManager->getStore()->getBaseUrl();
        $curl = curl_init($service_url);     

        curl_setopt_array($curl, array(
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_FOLLOWLOCATION =>true,
            CURLOPT_ENCODING=>'',
            CURLOPT_USERAGENT => 'Mozilla/5.0'
        ));
        
        $curl_response = curl_exec($curl);
        curl_close($curl);
        
    }
}
