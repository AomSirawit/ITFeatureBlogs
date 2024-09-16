@extends('./layouts/layout')
@section('title', 'Search')
@section('content')

    <div class="flex justify-center items-center mt-10">
        <div class="relative w-full max-w-5xl h-96">
            <!-- Gradient Border -->
            <div
                class="absolute inset-0 border-4 border-transparent rounded-lg bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500">
            </div>

            <!-- Hero Section with Image -->
            <div class="relative hero w-full h-full rounded-lg overflow-hidden"
                style="background-image: url(https://img.daisyui.com/images/stock/photo-1507358522600-9f71e620c44e.webp);">
                <div class="hero-overlay bg-opacity-60"></div>
                <div class="hero-content text-neutral-content text-center">
                    <div class="max-w-xl">
                        <h1 class="mb-5 text-5xl font-bold text-white">ค้นหา Blogs</h1>
                    </div>
                </div>
            </div>

            <div class="flex justify-center items-center my-10">
                <form action="{{ route('search') }}" method="GET">
                    @csrf
                    <input type="text" name="query" placeholder="Type here"
                        class="input input-bordered max-w-xs text-black" />
                    <button class="btn btn-primary text-white" type="submit">
                        <i class="fa-solid fa-magnifying-glass" style="color: #ffffff;"></i> Search
                    </button>
                </form>
            </div>
        </div>
    </div>




@endsection
