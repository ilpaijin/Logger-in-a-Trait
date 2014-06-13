<?php

namespace App;

/**
* App Description
*
* @author ilpaijin <ilpaijin@gmail.com>
*/
class App 
{
    /**
     * 
     */
    use \Logger\LoggerTrait;

    /**
     * [doSomething description]
     * @return [type] [description]
     */
    public function doSomething()
    {
        echo "Doing something from App";
    }

    /**
     * [doSomethingNotLogged description]
     * @return [type] [description]
     */
    public function doSomethingNotLogged()
    {
        echo "Doing something not logged from App <br>";
    }

    /**
     * [doSomethingElseWithArgs description]
     * @param  [type] $arg1 [description]
     * @param  [type] $arg2 [description]
     * @return [type]       [description]
     */
    public function doSomethingElseWithArgs($arg1, $arg2)
    {
        return implode(", ", func_get_args());
    }

    /**
     * [doSomethingThrowException description]
     * @return [type] [description]
     */
    public function doSomethingThrowsException()
    {
        throw new \Exception("doDomething is throwing an exception <br>");
    }
}