@section('title', 'Filtered Confess')

@extends('layouts.app')

@section('content')

<div class="container">
@php 

@endphp
@foreach($posts as $post)
    
    <div class="row" id="eachPost{{$post->id}}">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default" id="content">
                    <div class="panel-heading"><strong>Posted by <img src="{{asset('img/p_logo.jpg')}}" alt="profile">{{ $post->user->display_name }} &nbsp</strong>
                        {{$post->created_at->diffForHumans()}} 
                            <div class="pull-right">
                              
                                @php
                                    $category=\App\PostCategory::find($post->cat_id);
                                @endphp
                                
                                [ <span class="badge badge-success"><strong>{{ $category->cat_name}}</strong> </span> ]
                            </div> 
                    </div>
                    
                    <div class="panel-body"  id="postDiv">
                        <blockquote>
                            <p>{{$post->posts}}</p>

                        </blockquote>

                    
                        <div id="reload{{$post->id}}">

                                    <!-- counting likes -->
                                    
                            <span id="{{ $post->id }}areaDefine">
                                        @php
                                            $count=\App\Like_Post::where('post_id',$post->id)->count();
                                        @endphp

                                    @if($count==1)

                                        {{$count." Like "}}

                                    @elseif ($count==0)

                                    @else
                                        {{$count." Likes "}}
                                        @endif

                                    @if(Auth::user()->likepost()->where(['post_id' => $post->id])->get()->count()==0)

                                        <div id="likeArea" onmousedown="play()" style="width: 2%" data-id="{{$post->id}}"  data-id1="{{\Illuminate\Support\Facades\Auth::id()}}">
                                            <a style="cursor: pointer;text-decoration: none;color: #040b02" id="{{ $post->id }}like"  title="Like it" ><i class="fa fa-thumbs-up fa-lg"></i></a>
                                        </div>
                                    @else

                                        <div id="unlikeArea" onmousedown="playDislike()" style="width: 2%" data-id="{{$post->id}}" data-id1="{{\Illuminate\Support\Facades\Auth::id()}}">
                                            <a style="cursor: pointer" title="Unlike"  id="dislike"  ><i class="fa fa-thumbs-down fa-lg"></i></a>
                                        </div>

                                    @endif
                                    </span>

                                    <!-- showing comments -->
                                    @php
                                        $comments=\App\PostComment::where('post_id',$post->id)->orderBy('created_at', 'asc')->get();
                                    @endphp

                                    @if(count($comments)==0)
                                        <label for="" class="label label-default"> {{count($comments)}} Comment</label>
                                    @else

                                        <label for="" class="label label-primary"> {{count($comments)}} Comments</label>
                                        <a href="#" class="show" data-id="{{$post->id}}">Show all</a>

                                    @endif
                                    <div class="panel-body" id="commentsSec{{$post->id}}" >
                                        
                                        <div class="@php if(count($comments)!=0) echo 'well well-sm'; @endphp">
                                        @foreach($comments as $cmt)
                                        
                                            <span class="user"> {{Auth::user()->display_name}}</span> <i class="fa fa-terminal"></i>  {{$cmt->comment}} <br/>
                                                {{$cmt->created_at->diffForHumans()}} <br/>
                                                <hr class="style"></hr>
                                            
                                        @endforeach
                                        </div>
                                    </div>

                         
                            <div  id="commentArea{{$post->id}}" data-id="{{$post->id}}"  data-id1="{{\Illuminate\Support\Facades\Auth::id()}}">

                                <textarea onkeyup="increaseHeight(this);" id="{{$post->id}}comment" placeholder="Write a comment..." type="text" class="form-control" name="comment"  style="padding-top:10px;"></textarea>
                                <br/> <a class=" btn btn-primary pull-right" id="commentPostButton{{$post->id}}" onclick="return postButtonClicked('{{$post->id}}','{{\Illuminate\Support\Facades\Auth::id()}}')"><i class="fa fa-paper-plane-o" aria-hidden="true"></i> comment</a>
                                &nbsp;
                            </div>

                        </div>
                    </div>
                </div>                                
            </div>
        </div>
        @endforeach
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
        }
        function play(){
            var audio = new Audio("{{ asset('media/bbm_tone.mp3') }}");
            audio.play();
        }

        function playDislike(){
            var audio = new Audio("{{ asset('media/bbm.mp3') }}");
            audio.play();
        }

    </script>

@endsection