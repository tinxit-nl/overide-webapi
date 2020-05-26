<?php
namespace TinxIT\OverrideWebapi\Model\Soap;

/**
 * SOAP Server
 *
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class Server extends \Magento\Webapi\Model\Soap\Server
{
    /**
     * Generate URI of SOAP endpoint.
     *
     * @return string
     */
    public function getEndpointUri()
    {
        $storeCode = $this->_storeManager->getStore()->getCode() === \Magento\Store\Model\Store::ADMIN_CODE
            ? \Magento\Webapi\Controller\PathProcessor::ALL_STORE_CODE
            : $this->_storeManager->getStore()->getCode();
	/* *** TinxIT CUSTOM ***
	   Remove the admin/ part in the endpoint, 
	   because it causes an error when store codes are enabled in URL	  
	*/ 
        $endPoint = str_replace("admin/", "", $this->_storeManager->getStore()->getBaseUrl())
                    . $this->_areaList->getFrontName($this->_configScope->getCurrentScope())
                    . '/' . $storeCode;
        return $endPoint;
	/* *** END TinxIT CUSTOM *** */
    }
}
