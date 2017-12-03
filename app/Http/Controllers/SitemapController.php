<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class SitemapController extends Controller
{

    public function index()
    {
        return view('pc.sitemap.index');
    }
}