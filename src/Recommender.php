<?php

class Recommender
{
    protected $source;
    protected $sink;
    protected $recommendations;
    
    public function __construct(Profile $source)
    {
        $this->source = $source;
    }
    
    public function recommend()
    {
        $matcher = Matcher::instance();
        $this->sink = $matcher->match($this->source);
        $this->recommendations = array_diff($this->sink->preferences, $this->source->preferences);
        return $this->recommendations;
    }
    
    public function toArray()
    {
        return array(
                'source' => $this->source->toArray(),
                'sink' => $this->sink->toArray(),
                'recommendations' => $this->recommendations
            );
    }
}