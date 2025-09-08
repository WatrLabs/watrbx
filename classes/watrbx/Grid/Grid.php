<?php

namespace watrbx\Grid;


class Grid {

    private $options;

    function __construct($endpoint = null) {
        $this->options = [
            \WsdlToPhp\PackageBase\AbstractSoapClientBase::WSDL_URL => 'https://tjs-nut.pics/i/aj6uj.wsdl',
            \WsdlToPhp\PackageBase\AbstractSoapClientBase::WSDL_CLASSMAP => \ClassMap::get(),
            \WsdlToPhp\PackageBase\AbstractSoapClientBase::WSDL_SOAP_VERSION => SOAP_1_1,
        ];
    }
    
    public function getConfig(){
        return $this->options;
    }

    public function Renew($target) {
        return new \watrbx\Grid\Renew\Service($target);
    }

    public function Open($target) {
        return new \watrbx\Grid\Open\Service($target);
    }

    public function Get($target) {
        return new \watrbx\Grid\Get\Service($target);
    }

    public function Execute($target) {
        return new \watrbx\Grid\Execute\Service($target);
    }

    public function Close($target) {
        return new \watrbx\Grid\Close\Service($target);
    }
}