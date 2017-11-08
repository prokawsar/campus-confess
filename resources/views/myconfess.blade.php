@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="content">
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading">Confess Timeline</div>
                <div class="panel-body">
                    <table id="postsTable">
                        @foreach($myPosts as $posts)
                        <tr>
                            <td><strong>Posted by <i class="fa fa-user" aria-hidden="true"></i>{{$posts->user->display_name}}  </strong><br/> <p>{{$posts->posts}}</p></td>
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

