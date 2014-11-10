<?php

class CossineSimilarity
{
    public static function get(array $alpha, array $beta)
    {
        if(count($alpha) != count($beta))
            return false;
            
        $sum = 0;
        $squaredAlpha = 0;
        $squaredBeta = 0;
        
        foreach ($alpha as $i => $value) {
            $sum += $value * $beta[$i];
            $squaredAlpha += $value * $value;
            $squaredBeta += $beta[$i] * $beta[$i];
        }
        
        if(!$squaredAlpha && !$squaredBeta)
            return 1;
            
        return $sum / sqrt($squaredAlpha) / sqrt($squaredBeta);
    }
}