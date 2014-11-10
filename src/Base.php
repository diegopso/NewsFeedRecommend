<?php

class Base
{
    public function __get($name)
    {
        $method = 'get' . ucfirst($name);
        
        if(method_exists($this, $method)) {
            return $this->$method();
        } else {
            return $this->$name;
        }
    }
    
    public function __set($name, $value)
    {
        $method = 'set' . ucfirst($name);
        
        if(method_exists($this, $method)) {
            $this->$method($value);
        } else {
            $this->$name = $value;
        }
    }
}