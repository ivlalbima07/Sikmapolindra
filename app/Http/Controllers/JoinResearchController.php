<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JoinResearchController extends Controller
{
        public function JoinResearch()
    {
        return view('admin.implementation.JoinResearch.index');
    }
}