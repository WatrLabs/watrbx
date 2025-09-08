<?php

declare(strict_types=1);

namespace ServiceType;

use SoapFault;
use WsdlToPhp\PackageBase\AbstractSoapClientBase;

/**
 * This class stands for Diag ServiceType
 * @subpackage Services
 */
class Diag extends AbstractSoapClientBase
{
    /**
     * Method to call the operation originally named Diag
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\Diag $parameters
     * @return \StructType\DiagResponse|bool
     */
    public function Diag(\StructType\Diag $parameters)
    {
        try {
            $this->setResult($resultDiag = $this->getSoapClient()->__soapCall('Diag', [
                $parameters,
            ], [], [], $this->outputHeaders));
        
            return $resultDiag;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named DiagEx
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\DiagEx $parameters
     * @return \StructType\DiagExResponse|bool
     */
    public function DiagEx(\StructType\DiagEx $parameters)
    {
        try {
            $this->setResult($resultDiagEx = $this->getSoapClient()->__soapCall('DiagEx', [
                $parameters,
            ], [], [], $this->outputHeaders));
        
            return $resultDiagEx;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Returns the result
     * @see AbstractSoapClientBase::getResult()
     * @return \StructType\DiagExResponse|\StructType\DiagResponse
     */
    public function getResult()
    {
        return parent::getResult();
    }
}
