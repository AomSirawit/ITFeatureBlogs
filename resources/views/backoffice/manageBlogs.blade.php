<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Blogs') }}
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ url('/addblog') }}" class="btn btn-success text-white">
                <i class="fa-solid fa-plus"></i> Add Blog
            </a>
        </div>
    </div>

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-x-auto bg-white rounded-md shadow-md">
                <table class="table table-zebra w-full">
                    <!-- head -->
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($blogsTable as $blog)
                        <tr>
                            <th>{{ $blog->id }}</th>
                            <td>{{ $blog->title }}</td>
                            <td>
                                @if ($blog->image)
                                    <img src="{{ asset('storage/' . $blog->image) }}" alt="Blog Image" class="w-32 h-32 object-cover">
                                @else
                                    No Image
                                @endif
                            </td>
                            <td>{{ $blog->created_at->format('Y-m-d H:i:s') }}</td>
                            <td>
                                <div class="flex gap-2">
                                    <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-warning text-white">
                                        <i class="fa-solid fa-pen-to-square"></i> Edit
                                    </a>
                                    <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-error text-white" type="submit">
                                            <i class="fa-solid fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
