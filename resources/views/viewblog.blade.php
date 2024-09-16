@extends('./layouts/layout')
@section('title', 'blog')
@section('content')

<div class="max-w-3xl mx-auto p-6 bg-white shadow-lg rounded-lg mt-6">

    <!-- Category Badge -->
    <div class="mb-4">
        @if($blog->cate_id == 1)
        <div class="badge badge-primary text-white p-3">Webiste</div>
     
        @elseif($blog->cate_id == 2)
        <div class="badge badge-secondary text-white p-3">Mobile</div>
  
        @elseif($blog->cate_id == 3)
        <div class="badge badge-info text-white p-3">Technology</div>
  
        @elseif($blog->cate_id == 4)
        <div class="badge badge-success text-white p-3">Study</div>
        
        @elseif($blog->cate_id == 5)
        <div class="badge badge-error text-white p-3">Career</div>
        
        @elseif($blog->cate_id == 6)
        <div class="badge badge-warning text-white p-3">Other</div>

        @else
        <div class="text-danger">ไม่มีหมวดหมู่</div>
        @endif
    </div>
    
    <!-- Title -->
    <h1 class="text-3xl font-bold text-gray-900 mb-4">{{$blog->title}}</h1>

    <!-- Author and Date -->
    <div class="flex items-center mb-6">
        <div>
            <p class="text-sm text-gray-700">{{$user->name}}</p>
            <p class="text-sm text-gray-500">{{$blog->created_at}}</p>
        </div>
    </div>

    <!-- Image -->
    <div class="mb-6">
        <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}" class="w-full h-auto">
    </div>

    <!-- Content -->
    <div class="prose prose-lg text-gray-800">
        {!! $blog->description !!}
    </div>

</div>
@endsection
