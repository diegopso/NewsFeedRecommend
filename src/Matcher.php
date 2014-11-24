<?php

class Matcher
{
    protected $sampleset;
    
    protected static $instance = null;
    
    const SCORES_FILE = 'data/out/similarity_scores.csv';
    
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
        
        file_put_contents(self::SCORES_FILE, $maxScore . "\n", FILE_APPEND);
        return $sink;
    }
}