<?php

namespace watrbx\Grid\Open;

use watrbx\Grid\Grid;

class Service {

    private $GetService; 
    private $Service;
    private $Target = "127.0.0.1:64989";

    function __construct($Target) {

        $Grid = new Grid;
        $config = $Grid->getConfig();

        try {
            $this->Service = new \ServiceType\Open($config);
            $this->Service->setLocation($Target);
        } catch (\SoapFault $e) {
            return;
        }

    }

    private function convertArguments(array $args): \ArrayType\ArrayOfLuaValue
    {
        $luaValues = [];
        foreach ($args as $value) { // ignore keys
            if (is_bool($value)) {
                $type = \EnumType\LuaType::VALUE_LUA_TBOOLEAN;
                $val = $value ? "true" : "false";
            } elseif (is_numeric($value)) {
                $type = \EnumType\LuaType::VALUE_LUA_TNUMBER;
                $val = (string)$value;
            } else {
                $type = \EnumType\LuaType::VALUE_LUA_TSTRING;
                $val = (string)$value;
            }

            $luaValues[] = new \StructType\LuaValue($type, $val);
        }

        return new \ArrayType\ArrayOfLuaValue($luaValues);
    }



    public function OpenJob(string $id, float $expirationInSeconds, int $category, float $cores){

        $Job = new \StructType\Job($id, $expirationInSeconds, $category, $cores);

        $Service = $this->Service;

        if ($Service->OpenJob(new \StructType\OpenJob($Job)) !== false) {
            $result = $Service->getResult();
            return $result->getOpenJobResult();
        } else {
            $error = $Service->getLastError();
            $error = $error['ServiceType\Get::OpenJob'];
            return $error->getMessage();
        }
    }

    public function OpenJobEx($jobInformation, $ScriptInformation){

        $success = false;

        $id = $jobInformation["Id"];
        $expirationInSeconds = $jobInformation["Expiration"];
        $category = $jobInformation["Category"];
        $cores = $jobInformation["Cores"];

        $Job = new \StructType\Job($id, $expirationInSeconds, $category, $cores);

        $scriptName = $ScriptInformation["Name"];
        $Script = $ScriptInformation["Script"];

        $ScriptInformation['Arguments'] = $this->convertArguments($ScriptInformation['Arguments']);

        if (isset($ScriptInformation['Arguments']) && is_array($ScriptInformation['Arguments'])) {
            $luaArgs = [];
            foreach ($ScriptInformation['Arguments'] as $key => $value) {
                $luaArgs[] = new \StructType\LuaValue($key, $value);
            }
            $ScriptInformation['Arguments'] = new ArrayOfLuaValue($luaArgs);
        }

        $Script = new \StructType\ScriptExecution($scriptName, $Script, $ScriptInformation['Arguments']);

        $Service = $this->Service;

        if ($Service->OpenJobEx(new \StructType\OpenJobEx($Job, $Script)) !== false) {
            $result = $Service->getResult();
            $success = true;
            return [$success, $result->getOpenJobExResult()->getLuaValue()];
        } else {
            $error = $Service->getLastError();
            $error = $error['ServiceType\Open::OpenJobEx'];
            return [$success, $error->getMessage()];
        }
    }


    

}