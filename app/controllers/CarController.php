<?php
namespace App\Controllers;

class CarController
{
    public function index()
    {
        return view('cars/index');
    }

    public function create()
    {
        return view('cars/create');
    }

    public function store()
    {
        redirect('cars');
    }
}
