<?php

namespace App\Http\Controllers;

use GuzzleHttp\Promise\Create;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Bb;
use Illuminate\Database;

class HomeController extends Controller
{

    private const BB_VALIDATOR = [
        'title' => 'required|max:50',
        'content' => 'required',
        'price' => 'required|numeric'
    ];

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $bbs_c = [];
        $bbs_c = Bb::where('user_id', auth()->id())->get();


        return view(
            'home',
            ['bbs' => $bbs_c]
        );
    }

    public function showAddBbForm()
    {
        return view('bb_add');
    }
    public function storeBb(Request $request)
    {

        $bb_item = new Bb;
        $bb_item->title = $request->title;
        $bb_item->content = $request->content;
        $bb_item->price = $request->price;
        $bb_item->user_id = $request->user()->id;
        $bb_item->save();

        return redirect()->route('home');
    }
    public function showEditBbForm(Bb $bb)
    {
        return view('bb_edit', ['bb' => $bb]);
    }
    public function updateBb(Request $request, Bb $bb)
    {
        $bb->fill([
            'title' => $request->title,
            'content' => $request->content,
            'price' => $request->price,
            'user_id' => $request->user()->id
        ]);
        $bb->save();
        return redirect()->route('home');
    }
    public function showDeleteBbForm(Bb $bb)
    {
        return view('bb_delete', ['bb' => $bb]);
    }
    public function destroyBb(Bb $bb)
    {
        $bb->delete();
        return redirect()->route('home');
    }
}
