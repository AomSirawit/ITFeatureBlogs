<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Blog') }}
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white rounded-xl shadow-md py-5">
            <form action="{{ route('blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="form-group">
                    <label for="title">Title</label>
                    <input class="input input-bordered w-full my-3" type="text" name="title" id="title" value="{{ old('title', $blog->title) }}" required>
                </div>

                <div class="form-group">
                    <label for="image">Image</label>
                    <input class="file-input file-input-bordered w-full my-3" type="file" name="image" id="image" accept="image/png, image/jpeg">
                    @if ($blog->image)
                        <img src="{{ asset('storage/' . $blog->image) }}" alt="Current Image" class="mt-2" style="max-width: 200px;">
                    @endif
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea id="editor" name="description" class="form-control my-5">{{ old('description', $blog->description) }}</textarea>
                </div>

                <div class="form-group">
                    <label for="category">Category</label>
                    <select class="input input-bordered w-full my-2" name="cate_id" id="cate_id" required>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $category->id == $blog->cate_id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary my-5 text-white">Update</button>
            </form>
        </div>
    </div>

    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
</x-app-layout>
