<?php

namespace App\Http\Controllers;

use App\Models\Bb;

class BbsController extends Controller
{
    public function index()
    {
        $bbs = Bb::paginate(6);

        // $context = ['bbs' => Bb::latest()->get()];
        $context = ['bbs' => $bbs];

        return view('index', $context);
    }

    public function detail(Bb $bb)
    {
        return view('detail', ['bb' => $bb]);
    }
}
