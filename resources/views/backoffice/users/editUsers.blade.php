<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Users') }}
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white rounded-xl shadow-md py-5">
            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                @method('PATCH')
        
                <div class="form-group">
                    <label for="name">Name</label>
                    <input class="input input-bordered w-full" type="text" name="name" id="name" class="form-control" value="{{ $user->name }}">
                </div>
        
                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="input input-bordered w-full" type="email" name="email" id="email" class="form-control" value="{{ $user->email }}">
                </div>

                <button type="submit" class="btn btn-primary my-5 text-white">Update</button>
            </form>

            
        </div>
    </div>
</x-app-layout>
