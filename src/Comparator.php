<?php

class Comparator
{
    protected $alpha;
    protected $beta;
    
    public function __construct($alpha, $beta)
    {
        $this->alpha = (object) $alpha;
        $this->beta = (object) $beta;
    }
    
    public function compare()
    {
        $keywords = array_unique(array_merge($this->alpha->preferences, $this->beta->preferences));
        $alphaScores = [];
        $betaScores = [];
        
        foreach ($keywords as $i => $word) {
            if(array_search($word, $this->alpha->preferences) !== false)
                $alphaScores[$i] = 1;
            else
                $alphaScores[$i] = 0;
                
            if(array_search($word, $this->beta->preferences) !== false)
                $betaScores[$i] = 1;
            else
                $betaScores[$i] = 0;
        }
        
        return CossineSimilarity::get($alphaScores, $betaScores);
    }
}