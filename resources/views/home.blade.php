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

                                    <div class="form-group pull-right">
                                        <input type="button" class="btn btn-success" value="Post" id="addPost">
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
                <div class="panel-heading">Recent posts</div>
                <div id="postsTable" class="panel-body">

                    @php
                        $i=1;
                    @endphp

                    @foreach($allPosts as $posts)

                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="panel panel-default">
                                <div class="panel-heading"><strong>Posted by <img src="{{asset('img/p_logo.jpg')}}" alt="profile">{{$posts->user->display_name}} &nbsp</strong>
                                 {{$posts->created_at->diffForHumans()}} 
                                </div>
                                <div class="panel-body"  id="postDiv">
                                    <div class="well well-sm">
                                    <p>{{$posts->posts}}</p>

                                        {{--<a style="cursor: pointer" class="showButton" id="show"><i class="fa fa-plus" aria-hidden="true"></i> View </a>--}}
                                        {{--<a style="cursor: pointer" class="hideButton"   id="hide{{$posts->id}}"><i class="fa fa-minus-square-o" aria-hidden="true"></i> Hide</a>--}}

                                    </div>

                                    <div class="comments" id="comments{{$posts->id}}">
                                        <p>hello</p>
                                    </div>

                                    <div id="reload">

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
                                    </div>

                                    <span id="{{$posts->id}}commentArea" data-id="{{$posts->id}}"  data-id1="{{\Illuminate\Support\Facades\Auth::id()}}">

                                        <input id="{{$posts->id}}comment" placeholder="Write a comment..." type="text" class="form-control" name="comment" onclick="submit()">

                                    </span>



                                </div>
                                
                            </div>
                        </div>
                    </div>
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

    </script>
@endsection

