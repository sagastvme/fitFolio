<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class MonthlyUsersChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(String $title, String $subtitle,String $titleX,String $titleY, Array $dataX, Array $dataY, Array $axis): \ArielMejiaDev\LarapexCharts\LineChart
    {
        return $this->chart->lineChart()
            ->setTitle($title)
            ->setSubtitle($subtitle)
            ->addData($titleX, $dataX)
            ->addData($titleY, $dataY)
            ->setXAxis($axis);
    }
}
