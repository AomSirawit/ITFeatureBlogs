<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Blogs') }}
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white rounded-xl shadow-md py-5">
            <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                
                <div class="form-group">
                    <label for="id">User</label>
                    <select class="input input-bordered w-full my-3" name="user_id" id="user_id" disabled required>
                        @foreach ($users as $user)
                            <option value="{{ $user->user_id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="title">Title</label>
                    <input class="input input-bordered w-full my-3" type="text" name="title" id="title"
                        class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="image">Image</label>
        
                    <input class="file-input file-input-bordered w-full my-3" type="file" name="image" id="image"
                        class="form-control" accept="image/png, image/jpeg">
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea id="editor" name="description" class="form-control  my-5"></textarea>
                </div>

                <div class="form-group">
                    <label for="category">Category</label>
                    <select class="input input-bordered w-full my-2" name="cate_id" id="cate_id" required>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary my-5 text-white">Submit</button>
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
