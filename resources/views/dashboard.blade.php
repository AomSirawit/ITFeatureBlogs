<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 text-center">
                    {{ __("You're logged in!") }}
                </div>
            </div>
            <div class="flex flex-col gap-4 py-10">
                <div class="card bg-base-100 shadow-xl w-full text-center">
                    <div class="card-body">
                      <i class="fa-solid fa-user text-8xl my-3"></i>
                      <h2 class="text-center font-semibold text-2xl">Total Users</h2>
                      <hr class="w-56 mx-auto">
                     @if ($users != null)
                     <p>{{$users}} : Users</p>
                     @else
                     <p class="text-error">ไม่มี Users</p>
                     @endif
                           
                      <div class="card-actions justify-center">
                        <a href={{url('/manageusers')}} class="btn btn-primary text-white w-44">Manage</a>
                      </div>
                    </div>
                  </div>

                  <div class="card bg-base-100 shadow-xl w-full text-center">
                    <div class="card-body">
                      <i class="fa-solid fa-book text-8xl my-3"></i>
                      <h2 class="text-center font-semibold text-2xl">Total Blogs</h2>
                      <hr class="w-56 mx-auto">
                      @if ($Blogs != null)
                      <p>{{$Blogs}} : Blogs</p>
                      @else
                      <p class="text-error">ไม่มี Blogs</p>
                      @endif
                            
                      <div class="card-actions justify-center">
                        <a href={{url('/manageblogs')}} class="btn btn-primary text-white w-44">Manage</a>
                      </div>
                    </div>
                  </div>
            </div>
        </div>
    </div>
</x-app-layout>
