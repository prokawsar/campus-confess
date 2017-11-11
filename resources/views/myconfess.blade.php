@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="content">
        <div class="col-md-12">
            <div class="panel panel-primary">

                @if(session('deletePost'))
                    <div class="alert alert-success">{{session('deletePost')}}</div>
                @endif
                <div class="panel-heading">Confess Timeline</div>
                <div class="panel-body">
                    <table id="postsTable">
                        @foreach($myPosts as $posts)
                        <tr>
                            <td><strong>  </strong><br/> <p>{{$posts->posts}} on {{$posts->created_at}}</p></td>

                            <td> <a href="{{url('deletePost/'.$posts->id)}}" class="btn btn-danger">Remove this post</a></td>
                        </tr>
                        @endforeach
                    </table>
                    {{$myPosts->links()}}

                </div>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection

