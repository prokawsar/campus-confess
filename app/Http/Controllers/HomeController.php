<?php

namespace App\Http\Controllers;

use App\UserPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{


    /**
     *
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allPosts=UserPost::with('user')->orderBy('created_at', 'DESC')->paginate(100);
        return view('home',compact('allPosts'));
    }

    public function storePosts(Request $request){
        $userPost=new UserPost();
        $userPost->posts=$request->posts;
        $userPost->user_id=$request->user_id;
        $userPost->save();
        return response()->json([
            'message'=>'Confess Successful'
        ]);
    }

    public function myconfess(){
        $id = Auth::id();
        $myPosts=UserPost::with('user')->where('user_id',$id)->paginate(5);
        return view('myconfess', compact('myPosts'));
    }

    public function deletePost($id){
        UserPost::find($id)->delete();
        return redirect('myconfess')->with('deletePost',"Your post has been deleted !!");

    }
}
