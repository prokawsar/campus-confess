@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-info">
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
            <div class="panel panel-info">
                <div class="panel-heading">Recent posts</div>
                <div class="panel-body">
                    <table id="postsTable">
                        @foreach($allPosts as $posts)
                        <tr>
                            <td><strong>Posted by <i class="fa fa-user" aria-hidden="true"></i>{{$posts->user->display_name}}  </strong><br/> <p>{{$posts->posts}}</p></td>
                        </tr>
                        @endforeach
                    </table>
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

