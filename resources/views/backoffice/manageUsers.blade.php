<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Users') }}
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{url('/register')}}" class="btn btn-success text-white"><i class="fa-solid fa-plus"></i>Add Users</a>

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
                            <th>Name</th>
                            <th>Email</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- row 1 -->
                        @foreach ($usersTable as $user)
                        <tr>
                                <th>{{ $user->id }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td>
                                    <div class="flex gap-2">
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning text-white"><i class="fa-solid fa-pen-to-square"></i>Edit</a>
                                    <form action="{{route('users.destroy',$user->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-error text-white" type="submit"><i class="fa-solid fa-trash"></i>Delete</button>
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
