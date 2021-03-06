<?php
    require_once('../src/Hprose.php');
    function hello($name) {
        echo "Hello $name!";
        return "Hello $name!";
    }
    function e() {
        throw new Exception("I am Exception");
    }
    function ee() {
        require("andot");
    }
    function asyncHello($name, $callback) {
        sleep(3);
        $callback("Hello async $name!");
    }
    $server = new HproseSwooleServer("ws://0.0.0.0:8080");
    $server->setErrorTypes(E_ALL);
    $server->setDebugEnabled();
    $server->addFunction('hello');
    $server->addFunctions(array('e', 'ee'));
    $server->addAsyncFunction('asyncHello');
    $server->start();
?>
