@section('title', 'Home')

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">Share your speech.....</div>
                        <div class="panel-body">
                            <span class="label label-success postConfirm" style="font-size: 15px"></span>
                            <span class="label label-danger validation" style="font-size: 15px"></span>

                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <form id="cform">
                                {{csrf_field()}}
                                <input type="hidden" value="{{\Illuminate\Support\Facades\Auth::id()}}" name="user_id" id="user_id">

                                <fieldset>
                                    <div class="form-group">
                                        <textarea name="posts" id="posts" cols="10" rows="5" class="form-control"></textarea>
                                    </div>

                                    <div class="form-group">
                                        
                                        <input type="button" class="btn btn-success pull-right" value="Post" id="addPost">
                                    </div>
                                </fieldset>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Confess from (University Name)</div>
                <div id="postsTable" class="panel-body">
                    @foreach($allPosts as $posts)

                    <div class="row" id="eachPost{{$posts->id}}">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="panel panel-default">
                                <div class="panel-heading"><strong>Posted by <img src="{{asset('img/p_logo.jpg')}}" alt="profile">{{$posts->user->display_name}} &nbsp</strong>
                                 {{$posts->created_at->diffForHumans()}} 
                                </div>
                                <div class="panel-body"  id="postDiv">
                                    <blockquote>
                                        
                                        <a class="post_link" href="posts/{{$posts->id}}/show" target="_blank"><p>{{$posts->posts}}</p></a>

                                    </blockquote>

                              
                                    <div id="reload{{$posts->id}}" class="reloadMyWall">

                                        <!-- counting likes -->
                                        
                                    <span id="{{ $posts->id }}areaDefine">
                                             @php
                                                 $count=\App\Like_Post::where('post_id',$posts->id)->count();
                                             @endphp

                                            @if($count==1)

                                                {{$count." Like "}}

                                            @elseif ($count==0)

                                            @else
                                                {{$count." Likes "}}
                                            @endif

                                        @if(Auth::user()->likepost()->where(['post_id' => $posts->id])->get()->count()==0)

                                            <div id="likeArea" style="width: 2%" data-id="{{$posts->id}}"  data-id1="{{\Illuminate\Support\Facades\Auth::id()}}">
                                                <a style="cursor: pointer;text-decoration: none;color: #040b02" id="{{ $posts->id }}like"  title="Like it" ><i class="fa fa-thumbs-up fa-lg"></i></a>
                                            </div>
                                        @else

                                            <div id="unlikeArea" style="width: 2%" data-id="{{$posts->id}}" data-id1="{{\Illuminate\Support\Facades\Auth::id()}}">
                                                <a style="cursor: pointer" title="Unlike"  id="dislike"  ><i class="fa fa-thumbs-down fa-lg"></i></a>
                                            </div>

                                        @endif
                                        </span>

                                       <!-- showing comments -->
                                        @php
                                            $comments=\App\PostComment::where('post_id',$posts->id)->orderBy('created_at', 'asc')->get();
                                        @endphp

                                        @if(count($comments)==0)
                                            <label for="" class="label label-default"> {{count($comments)}} Comment</label>
                                        @else

                                            <label for="" class="label label-primary"> {{count($comments)}} Comments</label>
                                            <a href="#" class="show" data-id="{{$posts->id}}">Show all</a>

                                        @endif
                                        <div class="panel-body" id="commentsSec{{$posts->id}}" >
                                            
                                            <div class="@php if(count($comments)!=0) echo 'well well-sm'; @endphp">
                                            @foreach($comments as $cmt)
                                            
                                                <span class="user"> {{Auth::user()->display_name}}</span> <i class="fa fa-terminal"></i>  {{$cmt->comment}} <br/>
                                                    {{$cmt->created_at->diffForHumans()}} <br/>
                                                    <hr class="style"></hr>
                                                
                                            @endforeach
                                            </div>
                                        </div>

                         
                                        <div  id="commentArea{{$posts->id}}" data-id="{{$posts->id}}"  data-id1="{{\Illuminate\Support\Facades\Auth::id()}}">

                                            <textarea onkeyup="increaseHeight(this);" id="{{$posts->id}}comment" placeholder="Write a comment..." type="text" class="form-control" name="comment"  style="padding-top:10px;"></textarea>
                                            <br/> <a class=" btn btn-primary pull-right" id="commentPostButton{{$posts->id}}" onclick="return postButtonClicked('{{$posts->id}}','{{\Illuminate\Support\Facades\Auth::id()}}')"><i class="fa fa-paper-plane-o" aria-hidden="true"></i> comment</a>
                                            &nbsp;
                                        </div>
 
                                    </div>

                                    {{--</div>--}}

                                </div>
                            </div>
                                
                            </div>
                        </div>
                    {{--</div>--}}


                    @endforeach
                   
                    {{$allPosts->links()}}

                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@section('script')

    <script src="{{asset('js/Posts.js')}}"></script>

    <script>

        var token='{{\Illuminate\Support\Facades\Session::token()}}';

        function increaseHeight(e){
            e.style.height = 'auto';
            var newHeight = (e.scrollHeight > 32 ? e.scrollHeight : 32);
            e.style.height = newHeight.toString() + 'px';
        } ;

        $(document).ready(function () {

//            setInterval(function(){
//                $('.reloadMyWall').load(location.href + ' .postDiv');
//            },8000);

        })

    </script>
@endsection

