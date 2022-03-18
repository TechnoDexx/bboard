<?php

namespace App\Http\Controllers;

use App\Models\Bb;

class BbsController extends Controller
{
    public function index()
    {
        $context = ['bbs' => Bb::latest()->get()->paginate(6)];

        return view('index', $context);
    }

    public function detail(Bb $bb)
    {
        return view('detail', ['bb' => $bb]);
    }
}
