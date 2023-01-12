<?php

namespace App\Http\Controllers;

use App\Models\Bb;
use Illuminate\Http\Request;

class BbsController extends Controller
{
    public function index(Request $request)
    {
        if ($request->filled('search')) {
            $bbs = Bb::search($request->search)->paginate(6);
        } else {
            $bbs = Bb::paginate(6);
        }
        // $context = ['bbs' => Bb::latest()->get()];
        // $bbs = Bb::paginate(6);
        // $context = ['bbs' => $bbs,
        //              ];

        return view('index', compact('bbs')); //$context);
    }

    public function detail(Bb $bb)
    {
        return view('detail', ['bb' => $bb]);
    }

    public function store(Request $request)
    {
    }
}
