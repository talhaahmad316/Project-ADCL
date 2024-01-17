<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;
class AdclTeamsController extends Controller
{
    public function home()
    {
        return view('welcome');
    }

    public function rulesRegulations()
    {
        return view('ADCL/RulesAndRegulations');
    }

    public function contact()
    {
        return view('ADCL/Contact');
    }
    public function about()
    {
        return view('ADCL/About');
    }

    public function ranking()
    {
        return view('ADCL/ranking');
    }



}
