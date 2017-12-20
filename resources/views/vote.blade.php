@section('title', 'Voting')

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Create a Poll.....</div>
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
                                <input type="text" name="title" class="form-control" id="title" placeholder="Title">
                                <br />
                                <fieldset>
                                    <div class="form-group">
                                        <textarea name="description" id="description" cols="10" rows="3" class="form-control" placeholder="Short description"></textarea>
                                    </div>
                                    
                                    <div class="form-group col-md-4 pull-left">
                                        <div id="options">
                                            <input name="option[]" class="form-control option" placeholder="Option 1">
                                            <!-- <input name="option" class="form-control" placeholder="Option 2"> -->
                                            <br />
                                        </div>
                                        <a class="btn btn-primary pull-right" onClick="addInput('options');"> <i class="fa fa-plus"></i> Add option</a>
                                    
                                    </div>
                                    
                                    <div class="form-group">
                                        
                                        <a class="btn btn-primary pull-right" id="CreateVote"> <i class="fa fa-terminal"></i> Create</a>
                                    </div>
                                </fieldset>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end row -->

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div id="voteTable" class="panel-body">
                   
                    @foreach($allVotes as $votes)

                    <div class="row" id="eachPoll">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                   
                                    <input type="hidden" id="voteID" value="{{ $votes->id }}">
                                    <h5>
                                        {{ $votes->title }}
                                        <small>{{$votes->created_at->diffForHumans()}}</small>
                                    
                                        <span class="cust-badge badge-wrong pull-right">[ You didn't vote ]</span> 
                                    </h5>
                                        
                                </div>
                                <div class="panel-body"  id="postDiv">
                                 
                                    <p class="lead">{{ $votes->vote_description }}</p>
                                    
                                    @php
                                        $options = \App\VoteOption::where('vote_id', $votes->id)->get();
                                    @endphp
                                    <div id="reload" class="reloadMyWall">
                                    @foreach($options as $opt)
                                        <div class="radio{{ $opt->id }}">
                                            <label>
                                                <input type="hidden" id="optionsID" value="{{ $opt->id }}">
                                                <input type="hidden" value="{{\Illuminate\Support\Facades\Auth::id()}}" name="user_id" id="user_id">
                                
                                                <input type="radio" name="optionsRadios" id="optionsRadios" value="{{ $opt->id }}">
                                                {{ $opt->opt_name }} <span class="cust-badge badge-success"> {{ $opt->total }}</span>
                                            </label>
                                        </div>
                                       
                                    @endforeach
                                    </div>
            
                                    <div class="form-group">
                                        <a class="btn btn-primary pull-right" id="doVote{{ $votes->id}}"> <i class="fa fa-thumbs-up"></i> Vote</a>
                                    </div>
                                </div>
                            </div>
                                
                        </div>
                    </div> <!-- end eachPoll -->
                    @endforeach
                    
                    {{$allVotes->links()}}

                </div>
            </div>
        </div>
    </div> <!-- end row -->

</div>
@endsection

@section('script')
    
    <script src="{{asset('js/Votes.js')}}"></script>

    <script>
        var counter = 1;
        var limit = 5;
       // var option=option.val();
        function addInput(divName){
            if (counter == limit)  {
                alert("You have reached the limit of adding " + counter + " options");
            }
            else {
                var newdiv = document.createElement('div');
                newdiv.innerHTML =  "<input type='text' class='form-control option' placeholder='Option " + (counter + 1) +"' name='option[]'> <br />";
                document.getElementById(divName).appendChild(newdiv);
                counter++;
            }
        }
        var token='{{\Illuminate\Support\Facades\Session::token()}}';


    </script>
@endsection

