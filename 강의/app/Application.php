<?php

class App_Application
{

    public function getEnvCode(): string
    {
        if($_SERVER['DOCUMENT_ROOT'] == '/serverRoot') {
            return 'prod';
        }

        return "dev";
    }

    public function getDbConnectionByEnv(): mysqli
    {
        $envCode = $this->getEnvCode();


        if($envCode === "dev")
        {
            $dbHost = '127.0.0.1';
            $dbId = 'root';
            $dbPw = '1234';
            $dbName = 'php_test';
        }
        else if($envCode === "prod")
        {
            $dbHost = '127.0.0.1';
            $dbId = 'root';
            $dbPw = '????';
            $dbName = 'php_test';
        }

        $dbConn =  mysqli_connect($dbHost, $dbId, $dbPw, $dbName) or die("connection error");
        return $dbConn;
    }
}