<?php

namespace App\Http\Controllers;

class AdminController extends Controller
{
    public function index()
    {
        return view('dashbords.admin'); // <--- correspond à ton fichier !!
    }
}
