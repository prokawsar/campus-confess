@section('title', 'My Confess')

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
                    <table class="table table-hover">
                        @foreach($myPosts as $posts)
                        <tr class="">
                            <td><br/><p><i class="fa fa-arrows-alt"></i>  {{$posts->posts}} <br/> on {{$posts->created_at->diffForHumans()}}</p></td>

                            <td> <a href="{{url('deletePost/'.$posts->id)}}" class="btn btn-danger"> <i class="fa fa-minus-circle" aria-hidden="true"></i> Remove this post</a></td>
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

