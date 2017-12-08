@section('title', 'Category')

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @php
                $categories=\App\PostCategory::orderBy('cat_name')->get();
                $total=\App\PostCategory::post_count(); # Working with raw query
            
            @endphp

            <div class="list-group">
                <a href="#" class="list-group-item active">
                    All Category
                    <div class="pull-right">
                        Number of posts
                    </div>
                </a>
               
                <!-- ($categories as $category) -->
                @foreach($total as $card)
                    <a href="/category/{{$card->cat_name}}" class="list-group-item">{{ $card->cat_name}}
                    <span class="badge badge-success">{{ $card->total}}</span>
                    </a>
                @endforeach
               
            </div>

        </div>
    </div>
</div>
@endsection
