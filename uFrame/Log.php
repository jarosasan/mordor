<?php

namespace uFrame;

class Log
{

    protected $logFile;

    public function __construct()
    {
        $this->logFile = fopen("log.txt", "a") or die("Unable to open log.txt file!");
    }

    public function error(string $msg)
    {
        fwrite($this->logFile, date("Y-m-d H:m:s") . ", ERROR, " . $msg . "\n");
    }

    public function warning(string $msg)
    {
        fwrite($this->logFile, date("Y-m-d H:m:s") . ", WARNING, " . $msg . "\n");
    }

    public function debug(string $msg)
    {
        fwrite($this->logFile, date("Y-m-d H:m:s") . ", DEBUG, " . $msg . "\n");
    }

}
