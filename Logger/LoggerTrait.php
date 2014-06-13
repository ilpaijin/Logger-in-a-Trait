<?php

namespace Logger;

class LoggerException extends \Exception{}

trait LoggerTrait
{
    /**
     * [$LoggerPrefix description]
     * @var string
     */
    private $LoggerPrefix = "LoggerLog";

    /**
     * [__call description]
     * @param  [type] $method [description]
     * @param  [type] $args   [description]
     * @return [type]         [description]
     */
    public function __call($method, $args)
    {
        $class = get_called_class();
        $method = lcfirst(str_replace($this->LoggerPrefix, "", $method));

        if(!LOG)
        {
            return call_user_func_array(array($class, $method), $args);
        }

        if(!method_exists($class, $method))
        {
            throw new LoggerException("Class {$class} doesn't have '{$method}' method");
        }

        $this->log("START", compact('class','method'));


        ob_start();

        try {

            $result = call_user_func_array(array($class, $method), $args);

            $output = ob_get_contents();

            $result = $output . $result;

            $this->log("END", compact('class','method'), $result);

        } catch( \Exception $e)
        {   
            $this->log("END", compact('class','method'), $e->getMessage());
        }

        ob_get_clean();
    }

    /**
     * [log description]
     * @param  [type] $data [description]
     * @return [type]       [description]
     */
    private function log($cmd, $ref, $data)
    {
        $file = dirname(__DIR__)."/log.txt";

        if (!$fh = fopen($file, 'a'))
        {
            echo "File missing";
        }

        $data = ($data) ? " ::: " . $data : "" ;

        fwrite($fh, date("d-m-Y H:i:s ", time()) . "[Logger][{$cmd}][" . implode('::', $ref) . "] {$data} \r\n");

        fclose($fh);
    }
}