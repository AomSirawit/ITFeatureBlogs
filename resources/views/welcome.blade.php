@extends('./layouts/layout')
@section('title', 'ITFeaute Blogs')
@section('content')

<div class="flex justify-center items-center mt-10">
    <div class="relative w-full max-w-5xl h-96">
        <!-- Gradient Border -->
        <div class="absolute inset-0 border-4 border-transparent rounded-lg bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500"></div>
        
        <!-- Hero Section with Image -->
        <div class="relative hero w-full h-full rounded-lg overflow-hidden" style="background-image: url(https://img.daisyui.com/images/stock/photo-1507358522600-9f71e620c44e.webp);">
            <div class="hero-overlay bg-opacity-60"></div>
            <div class="hero-content text-neutral-content text-center">
                <div class="max-w-2xl">
                    <h1 class="mb-5 text-5xl font-bold text-white">ITFEATURE</h1>
                    <p class="mb-5">
                        เรียนรู้การเขียนโปรแกรมอย่างง่ายดายกับเรา ไม่ว่าคุณจะเป็นมือใหม่ที่เพิ่งเริ่มต้นหรือมืออาชีพที่ต้องการอัปเกรดทักษะ เรามีบทความและทรัพยากรที่ครอบคลุมทุกเรื่อง ตั้งแต่พื้นฐานไปจนถึงเทคนิคขั้นสูง พร้อมตัวอย่างโค้ดและคำแนะนำที่เข้าใจง่าย เป้าหมายของเราคือช่วยให้คุณเขียนโค้ดได้อย่างมั่นใจและสามารถนำไปใช้งานได้จริง
                    </p>
                    <a href={{url('/search')}} class="btn glass bg-primary text-white">Get Start</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="w-full px-4 mt-8">
    <div class="text-center mb-8">
        <h1 class="text-2xl font-semibold">Lastest Blogs</h1>
    </div>
    
    <div class="container mx-auto sm:px-60">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
            @foreach($blogs as $blog)
            <div class="card bg-base-100 shadow-xl w-66">
                <figure>
                    <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}" class="w-full h-96 object-cover">
                </figure>
                <div class="card-body justify-start">
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
                    <h2 class="card-title text-lg">
                        {{$blog->title}}
                    </h2>
                    <div class="card-actions justify-end">
                        <a class="btn btn-primary text-white" href="{{ route('blog.show', $blog->id) }}">Read More</a>
                    </div>
                </div>
            </div>
            @endforeach      
        </div>
    </div>
</div>



@endsection
