<?php

class Recommender
{
    protected $source;
    protected $sink;
    
    public function __construct(Profile $source)
    {
        $this->source = $source;
    }
    
    public function recommend()
    {
        $matcher = Matcher::instance();
        $this->sink = $matcher->match($this->source);
        return array_diff($this->sink->preferences, $this->source->preferences);
    }
}