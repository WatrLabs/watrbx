<?php

declare(strict_types=1);

namespace ServiceType;

use SoapFault;
use WsdlToPhp\PackageBase\AbstractSoapClientBase;

/**
 * This class stands for Hello ServiceType
 * @subpackage Services
 */
class Hello extends AbstractSoapClientBase
{
    /**
     * Method to call the operation originally named HelloWorld
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\HelloWorld $parameters
     * @return \StructType\HelloWorldResponse|bool
     */
    public function HelloWorld(\StructType\HelloWorld $parameters)
    {
        try {
            $this->setResult($resultHelloWorld = $this->getSoapClient()->__soapCall('HelloWorld', [
                $parameters,
            ], [], [], $this->outputHeaders));
        
            return $resultHelloWorld;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Returns the result
     * @see AbstractSoapClientBase::getResult()
     * @return \StructType\HelloWorldResponse
     */
    public function getResult()
    {
        return parent::getResult();
    }
}
