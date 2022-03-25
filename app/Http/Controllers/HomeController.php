<?php

namespace App\Http\Controllers;

use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use App\Models\Bb;

class HomeController extends Controller
{
    private const BB_VALIDATOR = [
        'pic' => 'sometimes|image',
        'title' => 'required|max:50',
        'content' => 'required',
        'price' => 'required|numeric',
    ];

    private const BB_ERROR_MESSAGES = [
        'price.required' => 'Раздавать бесплатно товары нельзя',
        'required' => 'Заполните это поле',
        'max' => 'Значение должно быть длиннее :max символов',
        'numeric' => 'Введите число',
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
    public function index(Request $request)
    {
        $bbs_c = [];
        if ($request->filled('search')) {
            $bbs_c = Bb::search($request->search)->where('user_id', auth()->id())->paginate(6);
        } else {
            $bbs_c = Bb::where('user_id', auth()->id())->paginate(6);
        }
        // $bbs_c = Bb::where('user_id', auth()->id())->paginate(6);

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
        $validated = $request->validate(
            self::BB_VALIDATOR,
            self::BB_ERROR_MESSAGES
        );

        $bb_item = new Bb();
        $bb_item->title = $validated['title'];
        $bb_item->content = $validated['content'];
        $bb_item->price = $validated['price'];
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
        $validated = $request->validate(
            self::BB_VALIDATOR,
            self::BB_ERROR_MESSAGES
        );
        $bb->fill([
            'title' => $validated['title'],
            'content' => $validated['content'], //$request->content,
            'price' => $validated['price'], // $request->price,
            'user_id' => $request->user()->id,
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
