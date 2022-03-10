<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BbsController extends Controller
{
    public function index()
    {
        return response('Здесь будет перечень объявлениий.')
            ->header('Content-Type', 'text/plain');
    }
}
