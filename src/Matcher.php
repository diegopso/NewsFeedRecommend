<?php

class Matcher
{
    protected $sampleset;
    
    protected static $instance = null;
    
    public static function instance()
    {
        if(!self::$instance) {
            $reader = Reader::factory();
            $instance = new self();
            $instance->sampleset = $reader->getAllProfiles();
            self::$instance = $instance;
        }
        
        return self::$instance;
    }
    
    protected function __construct() { }
    
    public function match(Profile $source)
    {
        $sink = null;
        $maxScore = 0;
        
        foreach ($this->sampleset as $profile) {
            $comparator = new Comparator($source, $profile);
            
            $score = $comparator->compare();
            $score = number_format($score, 3);
            
            if($score > $maxScore && $score != 1.0) {
                $maxScore = $score;
                $sink = $profile;
            }
        }
        
        return $sink;
    }
}