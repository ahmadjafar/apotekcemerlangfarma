<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {!!__('Drug &raquo; Create') !!}
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
            <form action="{{ route('drug.store') }}" class="w-full" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="flex flex-warp -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-4" for="grid-last-name">
                            Name
                        </label>
                        <input value="{{ old('name') }}" name="name" class="apperance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 " id="grid-last-name" type="text" placeholder="Nama Obat">
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-4" for="grid-last-name">
                            Image 
                        </label>
                        <input value="{{ old('picturePath') }}" name="picturePath" class="apperance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 laoding-tight focus:ouline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="file" placeholder="Image">
                    </div>
                </div>
               <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-4" for="grid-last-name">
                            Descripstion
                        </label>
                        <input value="{{ old('description') }}" name="description" class="apperance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 laoding-tight focus:ouline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="Description">
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-4" for="grid-last-name">
                            Ingredients
                        </label>
                        <input value="{{ old('ingredients') }}" name="ingredients" class="apperance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 laoding-tight focus:ouline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="Ingredients">
                    <p class="text-gray-600 text-xs italic">Dipisahkan dengan koma</p>
                </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-4" for="grid-last-name">
                            Dose
                        </label>
                        <input value="{{ old('dose') }}" name="dose" class="apperance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 laoding-tight focus:ouline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="Dosis">
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-4" for="grid-last-name">
                            How To Use
                        </label>
                        <input value="{{ old('how_to_use') }}" name="how_to_use" class="apperance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 laoding-tight focus:ouline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="Description">
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-4" for="grid-last-name">
                            Price
                        </label>
                        <input value="{{ old('price') }}" name="price" class="apperance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 laoding-tight focus:ouline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="number" placeholder="Food Price" >
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-4" for="grid-last-name">
                            Rate
                        </label>
                        <input value="{{ old('rate') }}" name="rate" class="apperance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 laoding-tight focus:ouline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="number" step="0.01" max="5"  placeholder="Food Rate 1-5">
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-4" for="grid-last-name">
                            Types
                        </label>
                        <input  value="{{ old('types') }}" name="types" class="apperance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 laoding-tight focus:ouline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="Types">
                        <p class="text-gray-600 text-xs italic">Dipisahkan dengan koma, Cotoh :Vitamin, Covid-19</p>
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-4" for="grid-last-name">
                            Manufature
                        </label>
                        <input value="{{ old('manufacture') }}" name="manufacture" class="apperance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 laoding-tight focus:ouline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="manufacture">
                    </div>
                </div>
                <div class="flex flex-warp -mx-3 mb-6">
                    <div class="w-full px-3 text-right">
                        <button type="submit" class="bg-green-500 hover:bg-green-700 font-bold text-white py-2 px-4 rounded ">
                             Save Drug
                            </button>
                    </div>
                </div>  
            </form>

            </div>
        </div>
    </div>
</x-app-layout>
