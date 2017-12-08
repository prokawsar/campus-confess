<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vote;
use App\VoteOption;

class VoteController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    { 
        $allVotes = Vote::orderBy('created_at', 'DESC')->paginate(3);
        return view('vote', compact('allVotes'));
    }

    public function CreateVote(Request $request){
        $vote = new Vote();
        $voteOption = new VoteOption();

        if($request->title!='' && $request->description!=''){
            $vote->create(['title'=>$request->title,'vote_description'=>$request->description]);
        }
        $vote_id = $vote::select('id')->orderBy('created_at', 'DESC')->first(); // on this vote I have to save options        
        $data=$request->options;

        for($i=0; $i<sizeof($data); $i++) {
            $voteOption->create(['vote_id'=>$vote_id->id,'opt_name'=>$data[$i]]);
        }

        return response()->json([
            'message'=>'Vote Created'
        ]);
    }
}
