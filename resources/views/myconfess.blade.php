@section('title', 'My Confess')

@extends('layouts.app')



@section('content')


<div class="container">

    <div class="row">
        <div class="content">
        <div class="col-md-12">

            <div class="panel panel-primary">
                <center><span class="label label-success" id="delConfirm" style="font-size: 15px"></span></center>

                <div class="panel-heading">Confess Timeline</div>
                <div class="panel-body">
                    <table class="table table-hover" id="myConfessTable">
                        @foreach($myPosts as $posts)
                        <tr class="">
                            <td><p><i class="fa fa-arrows-alt"></i>  {{$posts->posts}} <br/> on {{$posts->created_at->diffForHumans()}}</p></td>
                            <td><button data-id="{{$posts->id}}" class="btn btn-danger delete" data-toggle="modal" data-target="#myModal"><i class="fa fa-minus-circle" aria-hidden="true"></i> Remove</button></td>

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



<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" >
        <div class="modal-content">

            <div class="modal-body">
                <input type="hidden" id="delepostInputField">
                <h4>Do you want to delete this post?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
                <button type="button" class="btn btn-danger deletePost">Yes</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

    <script src="{{asset('js/Posts.js')}}"></script>
    <script src="{{asset('js/html2canvas.js')}}"></script>
    <script>
        var token='{{\Illuminate\Support\Facades\Session::token()}}';

//        $(document).ready(function () {
//            setInterval(function(){
//                $('#myConfessTable').load(location.href + ' #myConfessTable');
//            },8000);
//
//        })
    </script>
@endsection

