@section('title', 'Category')

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            
            <div class="list-group">
                <a href="#" class="list-group-item active">
                    All Category
                    <div class="pull-right">
                        Number of posts
                    </div>
                </a>
               
                <a href="#" class="list-group-item">Category 1
                <span class="badge">1</span>
                </a>
                <a href="#" class="list-group-item">Category 2
                <span class="badge">10</span>
                </a>
                
                <a href="#" class="list-group-item">Category 3
                <span class="badge">5</span>
                </a>
                <a href="#" class="list-group-item">Category 4
                <span class="badge">14</span>
                </a>
            </div>

        </div>
    </div>
</div>
@endsection
