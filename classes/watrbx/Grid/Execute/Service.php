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

        $this->Service = new \ServiceType\Execute($config);
        $this->Service->setLocation($Target);

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


    public function Execute($jobId, $ScriptInformation){

        $Service = $this->Service;

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

        if ($Service->Execute(new \StructType\Execute($jobId, $Script)) !== false) {
            $result = $Service->getResult();
            return $result->getExecuteResult();
        } else {
            $error = $Service->getLastError();
            $error = $error['ServiceType\Execute::Execute'];
            return $error->getMessage();
        }
    }

    public function ExecuteEx($jobId, $ScriptInformation){

        $Service = $this->Service;

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

        if ($Service->ExecuteEx(new \StructType\ExecuteEx($jobId, $Script)) !== false) {
            $result = $Service->getResult();
            return $result->getExecuteExResult();
        } else {
            $error = $Service->getLastError();
            $error = $error['ServiceType\Execute::ExecuteEx'];
            return $error->getMessage();
        }
    }



}