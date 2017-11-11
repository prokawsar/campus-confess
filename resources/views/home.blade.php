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

                    @foreach($allPosts as $posts)
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="panel panel-default">
                                <div class="panel-heading"><strong>Posted by <img src="{{asset('img/p_logo.jpg')}}" alt="profile">{{$posts->user->display_name}} &nbsp</strong>
                                 {{$posts->created_at->diffForHumans()}} 
                                </div>
                                <div class="panel-body">
                                    <p>{{$posts->posts}}</p>
                                    <div class="well well-sm">
                                        Like
                                    </div>
                                    <input id="comment" placeholder="Write a comment..." type="text" class="form-control" name="comment" >

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
@endsection

