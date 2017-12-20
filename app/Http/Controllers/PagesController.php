<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $title = 'Welcome to Laravel App';

        // Send content to template (bad method)
        // return view('pages.index', compact('title'));

        // Send content to template (good method for single param)
        return view('pages.index')->with('title', $title);
    }

    public function about()
    {
        return view('pages.about');
    }

    public function services()
    {
        $data = array(
            'title' => 'Services',
            'services' => array('Web Design', 'Programming', 'SEO')
        );

        return view('pages.services')->with($data);
    }
}
