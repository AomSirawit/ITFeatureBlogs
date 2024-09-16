@extends('./layouts/layout')
@section('title', 'Website')
@section('content')

    <div class="w-full px-4 mt-8 flex-grow">
        <div class="text-center mb-8">
            <h1 class="text-2xl font-semibold">Webiste</h1>
        </div>

        <div class="container mx-auto sm:px-60">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                @forelse ($website as $blog)
                <div class="card bg-base-100 shadow-xl w-66">
                    <figure>
                        <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}"
                            class="w-full h-96 object-cover">
                    </figure>
                    <div class="card-body justify-start">
                        @if ($blog->cate_id == 1)
                            <div class="badge badge-primary text-white p-3">Website</div>
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
                            <div class="text-danger">No Category</div>
                        @endif
                        <h2 class="card-title">
                            {{ $blog->title }}
                        </h2>
                        <div class="card-actions justify-end">
                            <a class="btn btn-primary text-white" href="{{ route('blog.show', $blog->id) }}">Read
                                More</a>
                        </div>
                    </div>
                </div>
            @empty
            <div class="flex items-center justify-center">
                <p class="text-gray-500">ไม่มีข้อมูล</p>
            </div>
            @endforelse
            </div>
        </div>
    </div>


@endsection
