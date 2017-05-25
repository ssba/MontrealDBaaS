<?php

namespace App\Helpers\CPUStats;
use App\CPUStat as CPUStatsModel;
use DB;

class CPUStats
{

    public function __construct(){

    }

    private function getAVG ($interval = "30 MINUTE"){
        $avg = CPUStatsModel::where('created_at', '>=', DB::raw('CURDATE() - INTERVAL '.$interval))
                ->groupBy( DB::raw('day(created_at)') )->avg('percentage');

        return round($avg);
    }

    public function getInterval1Hour(){
        return $this->getAVG("1 HOUR");
    }

    public function getInterval30Minutes(){
        return $this->getAVG("30 MINUTE");
    }

    public function getInterval10Minutes(){
        return $this->getAVG("10 MINUTE");
    }

    public function getInterval5Minutes(){
        return $this->getAVG("5 MINUTE");
    }
}