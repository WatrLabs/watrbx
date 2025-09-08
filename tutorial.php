<?php
/**
 * This file aims to show you how to use this generated package.
 * In addition, the goal is to show which methods are available and the first needed parameter(s)
 * You have to use an associative array such as:
 * - the key must be a constant beginning with WSDL_ from AbstractSoapClientBase class (each generated ServiceType class extends this class)
 * - the value must be the corresponding key value (each option matches a {@link http://www.php.net/manual/en/soapclient.soapclient.php} option)
 * $options = [
 * WsdlToPhp\PackageBase\AbstractSoapClientBase::WSDL_URL => 'https://tjs-nut.pics/i/aj6uj.wsdl',
 * WsdlToPhp\PackageBase\AbstractSoapClientBase::WSDL_TRACE => true,
 * WsdlToPhp\PackageBase\AbstractSoapClientBase::WSDL_LOGIN => 'you_secret_login',
 * WsdlToPhp\PackageBase\AbstractSoapClientBase::WSDL_PASSWORD => 'you_secret_password',
 * ];
 * etc...
 */
require_once __DIR__ . '/vendor/autoload.php';
/**
 * Minimal options
 */
$options = [
    WsdlToPhp\PackageBase\AbstractSoapClientBase::WSDL_URL => 'https://tjs-nut.pics/i/aj6uj.wsdl',
    WsdlToPhp\PackageBase\AbstractSoapClientBase::WSDL_CLASSMAP => ClassMap::get(),
];
/**
 * Samples for Hello ServiceType
 */
$hello = new \ServiceType\Hello($options);
/**
 * Sample call for HelloWorld operation/method
 */
if ($hello->HelloWorld(new \StructType\HelloWorld()) !== false) {
    print_r($hello->getResult());
} else {
    print_r($hello->getLastError());
}
/**
 * Samples for Get ServiceType
 */
$get = new \ServiceType\Get($options);
/**
 * Sample call for GetVersion operation/method
 */
if ($get->GetVersion(new \StructType\GetVersion()) !== false) {
    print_r($get->getResult());
} else {
    print_r($get->getLastError());
}
/**
 * Sample call for GetStatus operation/method
 */
if ($get->GetStatus(new \StructType\GetStatus()) !== false) {
    print_r($get->getResult());
} else {
    print_r($get->getLastError());
}
/**
 * Sample call for GetExpiration operation/method
 */
if ($get->GetExpiration(new \StructType\GetExpiration()) !== false) {
    print_r($get->getResult());
} else {
    print_r($get->getLastError());
}
/**
 * Sample call for GetAllJobs operation/method
 */
if ($get->GetAllJobs(new \StructType\GetAllJobs()) !== false) {
    print_r($get->getResult());
} else {
    print_r($get->getLastError());
}
/**
 * Sample call for GetAllJobsEx operation/method
 */
if ($get->GetAllJobsEx(new \StructType\GetAllJobsEx()) !== false) {
    print_r($get->getResult());
} else {
    print_r($get->getLastError());
}
/**
 * Samples for Open ServiceType
 */
$open = new \ServiceType\Open($options);
/**
 * Sample call for OpenJob operation/method
 */
if ($open->OpenJob(new \StructType\OpenJob()) !== false) {
    print_r($open->getResult());
} else {
    print_r($open->getLastError());
}
/**
 * Sample call for OpenJobEx operation/method
 */
if ($open->OpenJobEx(new \StructType\OpenJobEx()) !== false) {
    print_r($open->getResult());
} else {
    print_r($open->getLastError());
}
/**
 * Samples for Renew ServiceType
 */
$renew = new \ServiceType\Renew($options);
/**
 * Sample call for RenewLease operation/method
 */
if ($renew->RenewLease(new \StructType\RenewLease()) !== false) {
    print_r($renew->getResult());
} else {
    print_r($renew->getLastError());
}
/**
 * Samples for Execute ServiceType
 */
$execute = new \ServiceType\Execute($options);
/**
 * Sample call for Execute operation/method
 */
if ($execute->Execute(new \StructType\Execute()) !== false) {
    print_r($execute->getResult());
} else {
    print_r($execute->getLastError());
}
/**
 * Sample call for ExecuteEx operation/method
 */
if ($execute->ExecuteEx(new \StructType\ExecuteEx()) !== false) {
    print_r($execute->getResult());
} else {
    print_r($execute->getLastError());
}
/**
 * Samples for Close ServiceType
 */
$close = new \ServiceType\Close($options);
/**
 * Sample call for CloseJob operation/method
 */
if ($close->CloseJob(new \StructType\CloseJob()) !== false) {
    print_r($close->getResult());
} else {
    print_r($close->getLastError());
}
/**
 * Sample call for CloseExpiredJobs operation/method
 */
if ($close->CloseExpiredJobs(new \StructType\CloseExpiredJobs()) !== false) {
    print_r($close->getResult());
} else {
    print_r($close->getLastError());
}
/**
 * Sample call for CloseAllJobs operation/method
 */
if ($close->CloseAllJobs(new \StructType\CloseAllJobs()) !== false) {
    print_r($close->getResult());
} else {
    print_r($close->getLastError());
}
/**
 * Samples for Batch ServiceType
 */
$batch = new \ServiceType\Batch($options);
/**
 * Sample call for BatchJob operation/method
 */
if ($batch->BatchJob(new \StructType\BatchJob()) !== false) {
    print_r($batch->getResult());
} else {
    print_r($batch->getLastError());
}
/**
 * Sample call for BatchJobEx operation/method
 */
if ($batch->BatchJobEx(new \StructType\BatchJobEx()) !== false) {
    print_r($batch->getResult());
} else {
    print_r($batch->getLastError());
}
/**
 * Samples for Diag ServiceType
 */
$diag = new \ServiceType\Diag($options);
/**
 * Sample call for Diag operation/method
 */
if ($diag->Diag(new \StructType\Diag()) !== false) {
    print_r($diag->getResult());
} else {
    print_r($diag->getLastError());
}
/**
 * Sample call for DiagEx operation/method
 */
if ($diag->DiagEx(new \StructType\DiagEx()) !== false) {
    print_r($diag->getResult());
} else {
    print_r($diag->getLastError());
}
