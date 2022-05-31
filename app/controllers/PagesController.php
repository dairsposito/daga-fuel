<?php

namespace App\Controllers;

use App\Core\Auth;

class PagesController
{
    /**
     * Show the home page.
     */
    public function home()
    {
        return view('index');
    }

    /**
     * Show the cars page.
     */
    public function cars()
    {
        $company = 'Laracasts';

        return view('cars', ['company' => $company]);
    }

    /**
     * Show the fill-ups page.
     */
    public function fillUps()
    {
        return view('fill-ups');
    }

    /**
     * Show the reports page.
     */
    public function reports()
    {
        return view('reports');
    }
}
