<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ToolController extends Controller
{
    // Baby weight and height calculator
    public function babyHeightCalc()
    {
        $title = 'Baby Weight and Height Calculator';

        return $this->loadTheme('tools.baby-weight', compact('title'));
    }

    // Child Height Predictor 
    
    // conception date calculator
    public function conceptionDate()
    {
        $title = 'Conception Date Calculator';

        return $this->loadTheme('tools.conception', compact('title'));
    }

    // ovulation calculator
    public function ovulationCalc()
    {
        $title = 'Ovulation Calculator';

        return $this->loadTheme('tools.ovulation', compact('title'));
    }

    // Pregnancy Weight Gain Calculator
    public function pregnancyWeightCalc()
    {
        $title = 'Pregnancy Weight Gain Calculator';

        return $this->loadTheme('tools.pregnancy-weight', compact('title'));
    } 
}
