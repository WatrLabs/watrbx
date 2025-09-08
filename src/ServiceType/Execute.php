<?php

declare(strict_types=1);

namespace ServiceType;

use SoapFault;
use WsdlToPhp\PackageBase\AbstractSoapClientBase;

/**
 * This class stands for Execute ServiceType
 * @subpackage Services
 */
class Execute extends AbstractSoapClientBase
{
    /**
     * Method to call the operation originally named Execute
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\Execute $parameters
     * @return \StructType\ExecuteResponse|bool
     */
    public function Execute(\StructType\Execute $parameters)
    {
        try {
            $this->setResult($resultExecute = $this->getSoapClient()->__soapCall('Execute', [
                $parameters,
            ], [], [], $this->outputHeaders));
        
            return $resultExecute;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named ExecuteEx
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ExecuteEx $parameters
     * @return \StructType\ExecuteExResponse|bool
     */
    public function ExecuteEx(\StructType\ExecuteEx $parameters)
    {
        try {
            $this->setResult($resultExecuteEx = $this->getSoapClient()->__soapCall('ExecuteEx', [
                $parameters,
            ], [], [], $this->outputHeaders));
        
            return $resultExecuteEx;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Returns the result
     * @see AbstractSoapClientBase::getResult()
     * @return \StructType\ExecuteExResponse|\StructType\ExecuteResponse
     */
    public function getResult()
    {
        return parent::getResult();
    }
}
