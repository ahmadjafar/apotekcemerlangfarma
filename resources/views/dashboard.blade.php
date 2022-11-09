git <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="bg-white-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-3">
                    <div class="p-6">
                        <div class="flex items-center">
                            <img src="{{ asset ('img/medicine.svg') }}" alt="">
                            {{-- <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-400"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg> --}}
<<<<<<< HEAD
                            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="{{ route('transactions.index')}}?status=SUCCESS">SUCCESS </a></div>
=======
                            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="{{ route('transactions.index') }}?status=SUCCESS">SUCCESS </a></div>
>>>>>>> ac6c213b2aed1c15a2fa85c3883b9a6fe049567f
                            <div class="ml-4 text-lg text-gray-600 leading-7 font-bold"> {{ $success }}</div>

                        </div>
                
                    </div>
                
                    <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l">
                        <div class="flex items-center">
                            <img src="{{ asset ('img/transaction.svg') }}" alt="" >
<<<<<<< HEAD
                            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="{{ route('transactions.index')}}?status=ON_DELIVERY">ON DELIVERY </a></div>
=======
                            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="{{ route('transactions.index') }}?status=ON_DELIVERY">ON DELIVERY </a></div>
>>>>>>> ac6c213b2aed1c15a2fa85c3883b9a6fe049567f
                            <div class="ml-4 text-lg text-gray-600 leading-7 font-bold"> {{ $onDelivery }}</div>
                        </div>
                
                    </div>
                    <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l">
                        <div class="flex items-center">
                            <img src="{{ asset ('img/transaction.svg') }}" alt="" >
<<<<<<< HEAD
                            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="{{ route('transactions.index')}}?status=CANCELLED">CANCELLED </a></div>
=======
                            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="{{ route('transactions.index') }}?status=CANCELLED">CANCELLED </a></div>
>>>>>>> ac6c213b2aed1c15a2fa85c3883b9a6fe049567f
                            <div class="ml-4 text-lg text-gray-600 leading-7 font-bold"> {{ $cancelled }}</div>
                        </div>
                
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
    <div class="py-6">
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                
                <div class="bg-white-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-1">
                    <div class="p-6">
                        
                        {{-- filter Day --}}
                        <form action="{{ route('dashboard') }}" method="get">
                            
                            
                            @csrf
                            <div class="grid md:grid-cols-3 md:gap-6">
                                <div class="relative z-0 mb-6 w-full group">
                                    <label for="">Start Date</label>
                                    <select name="date" id="date" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline" >
                                      <option value="">{{ date('Y-m-d') }}</option>
                                    
                                  </select>
                                </div>
                                <div class="relative z-0 mb-6 w-full group">
                                    <label for="user">End Date </label>
                                    <select name="date" id="date" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline" required>
                                        <option value="">Select Date</option>
                                        @for($i=1; $i<=30; $i++)
                                        @php
                                          $date = \Carbon\Carbon::now()->subDays($i)->format('Y-m-d');
                                        @endphp
                                        <option value="{{ $date }}" {{ request()->date == $date ? "selected" : "" }}>{{ $date }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="relative z-0 mb-6 w-full  group">
                                    <br>
                                    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Filter</button>

                                </div>
                            </div>
                        </form>

                        {!! $dayTransaction->container() !!}
                        
                    </div>
                    
                    
                    
                </div>
            </div>
        </div>
    </div>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="bg-white-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-1">
                    <div class="p-6">
                        {{-- filter Month --}}
                        <form action="{{ route('dashboard') }}" method="get">
                            
                            
                            @csrf
                            <div class="grid md:grid-cols-3 md:gap-6">
                                <div class="relative z-0 mb-6 w-full group">
                                    <label for="">Start Month</label>
                                    <select  id="month" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline" >
                                        <option value="">{{ date('F') }}</option>
                                    
                                  </select>
                                </div>
                                <div class="relative z-0 mb-6 w-full group">
                                    <label for="user">End Month </label>
                                    <select name="month" id="month" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline" required>
                                        <option value="">Select Month</option>
                                        @for($i=1; $i<=11; $i++)
                                        @php
                                            $month = \Carbon\Carbon::now()->subMonth($i);
                                        @endphp
                                        <option value="{{ $month->format('m') }}" {{ request()->month == $month->format('m') ? "selected" : ""}}>{{ $month->format('F') }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="relative z-0 mb-6 w-full  group">
                                    <br>
                                    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Filter</button>

                                </div>
                            </div>
                        </form>
                        {!! $monthTransaction->container() !!}

                        
                    </div>
                    
                    
                    
                </div>
            </div>
        </div>
    </div>
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-welcome />
            </div>
        </div>
    </div>
{{-- Script Library Chart --}}
<script src="{{ $dayTransaction->cdn() }}"></script>
 
{{ $dayTransaction->script() }}
<script src="{{ $monthTransaction->cdn() }}"></script>
 
{{ $monthTransaction->script() }}
</x-app-layout>


