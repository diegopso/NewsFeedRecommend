<?php

function __autoload($class)
{
    include __DIR__ . '/src/' . $class . '.php';
}