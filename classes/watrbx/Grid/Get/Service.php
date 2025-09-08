<?php

namespace watrbx\Grid\Get;

use watrbx\Grid\Grid;

class Service {

    private $GetService; 
    private $Service;
    private $Target = "127.0.0.1:64989";

    function __construct($Target) {

        $Grid = new Grid;
        $config = $Grid->getConfig();

        $this->Service = new \ServiceType\Get($config);
        $this->Service->setLocation($Target);

    }

    public function GetVersion(){

        $Service = $this->Service;

        if ($Service->GetVersion(new \StructType\GetVersion()) !== false) {
            $result = $Service->getResult();
            return $result->getGetVersionResult();
        } else {
            $error = $Service->getLastError();
            $error = $error['ServiceType\Get::GetVersion'];
            return $error->getMessage();
        }
    }

    public function GetStatus(){

        $Service = $this->Service;

        if ($Service->GetStatus(new \StructType\GetStatus()) !== false) {
            $result = $Service->getResult();
            return $result->getGetStatusResult();
        } else {
            $error = $Service->getLastError();
            $error = $error['ServiceType\Get::GetStatus'];
            return $error->getMessage();
        }
    }

    public function GetExpiration($jobId){

        $Service = $this->Service;

        if ($Service->GetExpiration(new \StructType\GetExpiration($jobId)) !== false) {
            $result = $Service->getResult();
            return $result->getGetExpirationResult();
        } else {
            $error = $Service->getLastError();
            $error = $error['ServiceType\Get::GetExpiration'];
            return $error->getMessage();
        }
    }

    public function GetAllJobs(){

        $Service = $this->Service;

        if ($Service->GetAllJobs(new \StructType\GetAllJobs()) !== false) {
            $result = $Service->getResult();
            return $result->getGetAllJobsResult();
        } else {
            $error = $Service->getLastError();
            $error = $error['ServiceType\Get::GetAllJobs'];
            return $error->getMessage();
        }
    }

    public function GetAllJobsEx(){

        $Service = $this->Service;

        if ($Service->GetAllJobsEx(new \StructType\GetAllJobsEx()) !== false) {
            $result = $Service->getResult();
            return $result->getGetAllJobsExResult()->getJob();
        } else {
            $error = $Service->getLastError();
            $error = $error['ServiceType\Get::GetAllJobsEx'];
            return $error->getMessage();
        }
    }

    

}