<?php

namespace App\Http\Controllers;

use App\Like_Post;
use App\PostComment;
use App\User;
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
        $allPosts=UserPost::with('user')->orderBy('created_at', 'DESC')->paginate(3); // will make infinite scroll
        return view('home',compact('allPosts'));
    }

    public function storePosts(Request $request){
        $userPost=new UserPost();
        $userPost->posts=$request->posts;
        $userPost->user_id=$request->user_id;
        $userPost->cat_id=$request->cat_id;        
        $userPost->save();

        return response()->json([
            'message'=>'Confess Successful'
        ]);
    }

    public function myconfess(){
        $id = Auth::id();
        $myPosts=UserPost::with('user')->where('user_id',$id)->orderBy('created_at', 'desc')->paginate(5);
        return view('myconfess', compact('myPosts'));
    }

    public function category(){
        return view('category');
    }

    public function deletePost(Request $request){

        $userPost=new UserPost();

        UserPost::find($userPost->id=$request->id)->delete();
        return redirect('myconfess')->with('deletePost',"Your confess has been deleted !!");
    }


    public function post_like(Request $request){


        $likepost=new Like_Post();
        $post_id=$request['post_id'];
        $user_id=$request['user_id'];

        $user=Auth::user();
        $like=$user->likepost()->where( ['post_id' => $post_id])->get()->count();

        $likepost->post_id=$post_id;
        $likepost->user_id=$user_id;

        if($like==1){
            return response()->json([
                    'message'=>'data exist'
                ]
            );
        }else{
            $likepost->save();

            return response()->json([
                    'message'=>'data inserted'
                ]
            );
        }
    }

    public function dislike(Request $request){
        $likepost=new Like_Post();
        $post_id=$request['post_id'];
        $user_id=$request['user_id'];

        $user=Auth::user();
        $like=$user->likepost()->where(['post_id' => $post_id])->delete();

//        $like;

        return response()->json([
            'data'=>$like
        ]);

//
    }
    public function postComment(Request $request){

        $postComment=new PostComment();

        $post_id=$request['post_id'];
        $comment=$request['comment'];
        $user_id=$request['user_id'];
        
        $postComment->post_id=$post_id;
        $postComment->comment=$comment;
        $postComment->user_id=$user_id;
        $postComment->save();

    }
}
