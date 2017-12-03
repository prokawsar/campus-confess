@section('title', 'Category')

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @php
                $categories=\App\PostCategory::orderBy('cat_name')->get();
            @endphp

            <div class="list-group">
                <a href="#" class="list-group-item active">
                    All Category
                    <div class="pull-right">
                        Number of posts
                    </div>
                </a>
               
                @foreach($categories as $category)
                    <a href="#" class="list-group-item">{{ $category->cat_name}}
                    <span class="badge">1</span>
                    </a>
                @endforeach
               
            </div>

        </div>
    </div>
</div>
@endsection
