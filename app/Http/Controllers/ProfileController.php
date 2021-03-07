<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\User;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(Auth::user()->user_id);

        $posts = Post::all()->where('user_id', $user->user_id);

        return view('public.profile', compact('posts'))->with('user',$user);
//        $user_id = Auth::user()->user_id;
//        $posts = Post::find($user_id);

//        $posts = Post::all()->where('user_id', $user_id);
//        return view('public.profile', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        $posts = Post::all()->where('user_id', $user->user_id);

        return view('public.profile', compact('posts'))->with('user',$user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
//        dd($id);
        if(!empty($request -> file('user_image'))){

            if (Auth::user()->user_image !== 'no-image.png') {
                File::delete(public_path('images/' . Auth::user()->user_image));
            }
            $file = $request->file('user_image');
            $fileName =  time() . '.' .  $file -> getClientOriginalExtension() ;
            $file->move(public_path('/images'),$fileName);

            $user = new User();
            $user::find(Auth::user()->user_id) -> update(['user_image' => $fileName]) ;
            Auth::user() -> user_image = $fileName ;

        }

        return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
