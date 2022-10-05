<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            User &raquo; {{ $item->name }} &raquo; Edit 
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div>
            @if ($errors->any())
            <div class="mb-f" role="alert">
                <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                    There something wrong
                </div>
                <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                    <p>
                        <ul>
                             @foreach ($errors->all() as $error)
                             <li>{{ $error }}</li>
                             @endforeach
                        </ul>
                    </p>
                </div>
            </div>
            @endif
            <form action="{{ route('users.update', $item->id) }}" class="w-full" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="flex flex-warp -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-4" for="grid-last-name">
                            Name
                        </label>
                        <input value="{{ old('name') ?? $item->name }}" name="name" class="apperance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 " id="grid-last-name" type="text" placeholder="User Name">
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-4" for="grid-last-name">
                            Email
                        </label>
                        <input value="{{ old('email') ?? $item->email  }}" name="email" class="apperance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 loading-tight focus:outline-none focus:bg-white focus:border-gray-500 " id="grid-last-name " type="email" placeholder="Email">
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-4" for="grid-last-name">
                            Image 
                        </label>
                        <input value="{{ old('profile_photo_path') }}" name="profile_photo_path" class="apperance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 laoding-tight focus:ouline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="file" placeholder="Image">
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-4" for="grid-last-name">
                            Password
                        </label>
                        <input value="{{ old('password') }}" name="password" class="apperance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 laoding-tight focus:ouline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="password" placeholder="Password">
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-4" for="grid-last-name">
                            Password Confirmation
                        </label>
                        <input value="{{ old('password_confirmation') }}" name="password_confirmation" class="apperance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 laoding-tight focus:ouline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="password" placeholder="User password Confirmation">
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-4" for="grid-last-name">
                            Address
                        </label>
                        <input value="{{ old('address') ?? $item->address }}" name="address" class="apperance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 laoding-tight focus:ouline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="Address">
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-4" for="grid-last-name">
                            House Number
                        </label>
                        <input value="{{ old('houseNumber') ?? $item->houseNumber }}" name="houseNumber" class="apperance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 laoding-tight focus:ouline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="House Number">
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-4" for="grid-last-name">
                            City
                        </label>
                        <input value="{{ old('city') ?? $item->city }}" name="city" class="apperance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 laoding-tight focus:ouline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="City">
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-4" for="grid-last-name">
                            Phone Number
                        </label>
                        <input value="{{ old('phoneNumber') ?? $item->phoneNumber }}" name="phoneNumber" class="apperance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 laoding-tight focus:ouline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="Phone Number">
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-4" for="grid-last-name">
                            Roles
                        </label>
                       <select name="roles" class="apperance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 laoding-tight focus:ouline-none focus:bg-white focus:border-gray-500" id="grid-last-name">
                        <option value="{{ $item->roles }}">{{$item->roles }}</option>
                        <option value="USER">User</option>
                        <option value="ADMIN">Admin</option>
                       </select>
                    </div>
                </div> 
                <div class="flex flex-warp -mx-3 mb-6">
                    <div class="w-full px-3 text-right">
                        <button type="submit" class="bg-green-500 hover:bg-green-700 font-bold text-white py-2 px-4 rounded ">
                             Update User
                            </button>
                    </div>
                </div>  
            </form>

            </div>
        </div>
    </div>
</x-app-layout>
