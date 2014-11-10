<?php

class Profile extends Base
{
    protected $preferences;
    protected $name;
    protected $filename;
    
    public function __construct($filename)
    {
        $string = file_get_contents($filename);
        $json = (object) json_decode($string, true);
        
        $this->filename = $filename;
        $this->preferences = $json->preferences;
        $this->name = $json->name;
    }
    
    
}