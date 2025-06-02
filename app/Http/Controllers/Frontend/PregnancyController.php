<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PregnancyController extends Controller
{
    //
    public function index()
    {
        $first = range(1, 12);
        $second = range(13, 25);
        $third = range(26, 40);

        $title = 'Pregnancy';

        return $this->loadTheme('pregnancy.index', compact('title', 'first', 'second', 'third',));
    }

    public function tracker($semester)
    {
        $title = 'Pregnancy';

        return $this->loadTheme('pregnancy.tracker', compact('title', 'first', 'second', 'third',));
    }

    public function show()
    {
        $title = 'Pregnancy';

        return $this->loadTheme('pregnancy.detail', compact('title', 'first', 'second', 'third',));
    }
}
