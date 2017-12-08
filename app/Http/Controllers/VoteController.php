<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vote;
use App\VoteOption;

class VoteController extends Controller
{   
    public function index()
    { 
        $allVotes = Vote::orderBy('created_at', 'DESC')->paginate(3);
        return view('vote', compact('allVotes'));
    }

    public function CreateVote(Request $request){
        $vote = new Vote();
        $voteOption = new VoteOption();
        
        $vote->title = $request->title;        
        $vote->vote_description = $request->description;               
        $vote->save();

        $vote_id = $vote::select('id')->orderBy('created_at', 'DESC')->first(); // on this vote I have to save options
        

        // foreach($request->options as $option){ // saving all options in that vote_id
        //     $voteOption->opt_name = $option;
        //     $voteOption->vote_id = $vote_id;
        //     $voteOption->save();
        // }

        return response()->json([
            'message'=>'Vote Created'
            
        ]);
    }
}
