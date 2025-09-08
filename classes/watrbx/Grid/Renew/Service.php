<?php

namespace watrbx\Grid\Renew;

use watrbx\Grid\Grid;

class Service {

    private $GetService; 
    private $Service;
    private $Target = "127.0.0.1:64989";

    function __construct($Target) {

        $Grid = new Grid;
        $config = $Grid->getConfig();

        $this->Service = new \ServiceType\Renew($config);
        $this->Service->setLocation($Target);

    }

    public function RenewLease(string $id, float $expirationInSeconds,){

        $Renew = new \StructType\RenewLease($id, $expirationInSeconds);

        $Service = $this->Service;

        if ($Service->RenewLease(new \StructType\RenewLease($id, $expirationInSeconds)) !== false) {
            $result = $Service->getResult();
            return $result->getRenewLeaseResult();
        } else {
            $error = $Service->getLastError();
            $error = $error['ServiceType\Renew::RenewLease'];
            return $error->getMessage();
        }
    }


}