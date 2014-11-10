<?php

class Reader
{
    protected $count = 0;
    
    protected $location;
    
    private function __construct()
    {
        
    }
    
    public function factory($location = null)
    {
        $reader = new Reader();
        
        if(!$location)
            $reader->location = __DIR__ . "/../data/";
        else
            $reader->location = $location;
            
        return $reader;
    }
    
    public function next()
    {
        $this->count++;
        
        $file = $this->location . $this->count . ".json";
        
        if(!file_exists($file))
            return false;
        
        return new Profile($file);
    }
    
    public function getAllProfiles()
    {
        $next = 1;
        $profiles = array();
        
        while($next = $this->next())
        {
            array_push($profiles, $next);
        }
        
        return $profiles;
    }
}