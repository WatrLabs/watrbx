<?php

declare(strict_types=1);

namespace ServiceType;

use SoapFault;
use WsdlToPhp\PackageBase\AbstractSoapClientBase;

/**
 * This class stands for Renew ServiceType
 * @subpackage Services
 */
class Renew extends AbstractSoapClientBase
{
    /**
     * Method to call the operation originally named RenewLease
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\RenewLease $parameters
     * @return \StructType\RenewLeaseResponse|bool
     */
    public function RenewLease(\StructType\RenewLease $parameters)
    {
        try {
            $this->setResult($resultRenewLease = $this->getSoapClient()->__soapCall('RenewLease', [
                $parameters,
            ], [], [], $this->outputHeaders));
        
            return $resultRenewLease;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Returns the result
     * @see AbstractSoapClientBase::getResult()
     * @return \StructType\RenewLeaseResponse
     */
    public function getResult()
    {
        return parent::getResult();
    }
}
