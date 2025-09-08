<?php

namespace watrbx\Grid\Close;

use watrbx\Grid\Grid;

class Service {

    private $GetService; 
    private $Service;
    private $Target = "127.0.0.1:64989";

    function __construct($Target) {

        $Grid = new Grid;
        $config = $Grid->getConfig();

        $this->Service = new \ServiceType\Close($config);
        $this->Service->setLocation($Target);

    }

    public function CloseExpiredJobs(){

        $Service = $this->Service;

        if ($Service->CloseExpiredJobs(new \StructType\CloseExpiredJobs()) !== false) {
            $result = $Service->getResult();
            return $result->getCloseExpiredJobsResult();
        } else {
            $error = $Service->getLastError();
            $error = $error['ServiceType\Close::CloseExpiredJobs'];
            return $error->getMessage();
        }
    }

    public function CloseAllJobs(){

        $Service = $this->Service;

        if ($Service->CloseAllJobs(new \StructType\CloseAllJobs()) !== false) {
            $result = $Service->getResult();
            return $result->getCloseAllJobsResult();
        } else {
            $error = $Service->getLastError();
            $error = $error['ServiceType\Close::CloseAllJobs'];
            return $error->getMessage();
        }
    }

    public function CloseJob($jobId){

        $Service = $this->Service;

        if ($Service->CloseJob(new \StructType\CloseJob($jobId)) !== false) {
            $result = $Service->getResult();
            return $result;
        } else {
            $error = $Service->getLastError();
            $error = $error['ServiceType\Close::CloseJob'];
            return $error->getMessage();
        }
    }



}