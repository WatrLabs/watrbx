<?php

declare(strict_types=1);
/**
 * Class which returns the class map definition
 */
class ClassMap
{
    /**
     * Returns the mapping between the WSDL Structs and generated Structs' classes
     * This array is sent to the \SoapClient when calling the WS
     * @return string[]
     */
    final public static function get(): array
    {
        return [
            'HelloWorld' => '\\StructType\\HelloWorld',
            'HelloWorldResponse' => '\\StructType\\HelloWorldResponse',
            'GetVersion' => '\\StructType\\GetVersion',
            'GetVersionResponse' => '\\StructType\\GetVersionResponse',
            'GetStatus' => '\\StructType\\GetStatus',
            'GetStatusResponse' => '\\StructType\\GetStatusResponse',
            'Status' => '\\StructType\\Status',
            'OpenJob' => '\\StructType\\OpenJob',
            'OpenJobEx' => '\\StructType\\OpenJobEx',
            'Job' => '\\StructType\\Job',
            'ScriptExecution' => '\\StructType\\ScriptExecution',
            'ArrayOfLuaValue' => '\\ArrayType\\ArrayOfLuaValue',
            'ArrayOfJob' => '\\ArrayType\\ArrayOfJob',
            'LuaValue' => '\\StructType\\LuaValue',
            'OpenJobResponse' => '\\StructType\\OpenJobResponse',
            'OpenJobExResponse' => '\\StructType\\OpenJobExResponse',
            'RenewLease' => '\\StructType\\RenewLease',
            'RenewLeaseResponse' => '\\StructType\\RenewLeaseResponse',
            'Execute' => '\\StructType\\Execute',
            'ExecuteResponse' => '\\StructType\\ExecuteResponse',
            'ExecuteEx' => '\\StructType\\ExecuteEx',
            'ExecuteExResponse' => '\\StructType\\ExecuteExResponse',
            'CloseJob' => '\\StructType\\CloseJob',
            'CloseJobResponse' => '\\StructType\\CloseJobResponse',
            'BatchJob' => '\\StructType\\BatchJob',
            'BatchJobResponse' => '\\StructType\\BatchJobResponse',
            'BatchJobEx' => '\\StructType\\BatchJobEx',
            'BatchJobExResponse' => '\\StructType\\BatchJobExResponse',
            'GetExpiration' => '\\StructType\\GetExpiration',
            'GetExpirationResponse' => '\\StructType\\GetExpirationResponse',
            'GetAllJobs' => '\\StructType\\GetAllJobs',
            'GetAllJobsResponse' => '\\StructType\\GetAllJobsResponse',
            'GetAllJobsEx' => '\\StructType\\GetAllJobsEx',
            'GetAllJobsExResponse' => '\\StructType\\GetAllJobsExResponse',
            'CloseExpiredJobs' => '\\StructType\\CloseExpiredJobs',
            'CloseExpiredJobsResponse' => '\\StructType\\CloseExpiredJobsResponse',
            'CloseAllJobs' => '\\StructType\\CloseAllJobs',
            'CloseAllJobsResponse' => '\\StructType\\CloseAllJobsResponse',
            'Diag' => '\\StructType\\Diag',
            'DiagResponse' => '\\StructType\\DiagResponse',
            'DiagEx' => '\\StructType\\DiagEx',
            'DiagExResponse' => '\\StructType\\DiagExResponse',
        ];
    }
}
