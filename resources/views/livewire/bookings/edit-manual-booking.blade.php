@section('title', __('Edit booking'))
@section('description', 'Best Private Transfers in the DR!')
@section('keywords', 'Dominican Shuttles, Private Transfers, Airport Pickup, Tourist, Transfers, Airport, Dominican, Tourism, Beach, Hotel, Private, Shuttle', 'Safety')
@section('og-image', asset('images/image-cover.png'))
@section('og-image-url', asset('images/image-cover.png'))
<div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        {{-- <div class="py-4">
            <div class="flex justify-end gap-2 pr-2">
                <a class="inline-flex items-center px-4 py-2 {{ app()->getLocale() == 'en' ? 'bg-blue-100 border border-blue-400 text-blue-400 tracking-widest hover:bg-blue-200 active:bg-blue-300 focus:border-blue-400 focus:ring focus:ring-blue-300' : 'bg-gray-50 hover:bg-gray-200 active:bg-gray-300 focus:border-gray-300 focus:ring focus:ring-gray-300' }} border rounded-md font-semibold text-xs tracking-widest focus:outline-none focus:ring disabled:opacity-25 transition" href="{{ url('locale/en') }}" title="English"><img class="h-4 mr-2" src="{{ asset('images/flags/um.svg') }}" alt="English"> EN</a>
                <a class="inline-flex items-center px-4 py-2 {{ app()->getLocale() == 'es' ? 'bg-blue-100 border border-blue-400 text-blue-400 tracking-widest hover:bg-blue-200 active:bg-blue-300 focus:border-blue-400 focus:ring focus:ring-blue-300' : 'bg-gray-50 hover:bg-gray-200 active:bg-gray-300 focus:border-gray-300 focus:ring focus:ring-gray-300' }} border rounded-md font-semibold text-xs tracking-widest focus:outline-none focus:ring disabled:opacity-25 transition" href="{{ url('locale/es') }}" title="Spanish"><img class="h-4 mr-2" src="{{ asset('images/flags/es.svg') }}" alt="English"> ES</a>
            </div>
        </div> --}}
        <div class="flex gap-2 text-xs text-gray-500 mb-2">
            <span>{{ __('Bookings') }} </span>
            <span class="pt-0.5">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                </svg>
            </span>
            <span>{{ __('Edit booking') }}</span>
        </div>

        <div class="flex justify-between border-b pb-2">
            <div>
                {{-- Title --}}
                <h1 class="text-3xl font-bold text-gray-700">{{__('Edit booking')}}</h1>
            </div>

            {{-- Actions buttons --}}
            <div>
                <a href="{{ url('bookings/create') }}" class="inline-flex items-center px-4 py-2 bg-red-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-400 active:bg-red-600 focus:outline-none focus:border-red-600 focus:ring focus:ring-red-300 disabled:opacity-25 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                    {{ __('Delete') }}
                </a>
            </div>
        </div>


        <div class="bg-white rounded">
            <div class="pt-4 flex justify-center">
                <div class="flex gap-4">
                    <div class="flex">
                        <div class="text-blue-600 px-1 pt-3">
                            <x-icon name="location-marker" class="w-5 h-5" />
                        </div>
                        <div class="p-2 text-xl">
                            {{ $booking->alias_location_from }}
                        </div>
                    </div>
                    <div class="text-gray-400 pt-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </div>
    
                    <div class="flex">
                        <div class="text-blue-600 px-1 pt-3">
                            <x-icon name="location-marker" style="solid" class="w-5 h-5" />
                        </div>
                        <div class="p-2 text-xl">
                            {{ $booking->alias_location_to }}
                        </div>
                    </div>
                </div>
    
                
            </div>
            <div class="flex gap-6 py-4 justify-center">
                <div class="text-center">
                    <div class="text-sm text-gray-500">
                        @if ($booking->servicePrice->priceOption->id == 3)
                            {{-- <img class="mx-auto w-52" src="{{ asset('images/vehicles/Minivan.png') }}" alt=""> --}}
                            <div class="">
                                {{ __('Minivan') }}
                            </div>
                        @elseif ($booking->servicePrice->priceOption->id == 5)
                            {{-- <img class="mx-auto w-52" src="{{ asset('images/vehicles/crafter.png') }}" alt=""> --}}
                            <div class="">
                                {{ __('Minibus') }}
                            </div>
                        @endif
                    </div>
                    <div class="">
                        {{ $booking->servicePrice->priceOption->name }}
                    </div>
                </div>

                <div class="text-center">
                    <div class="text-sm text-gray-500">
                        <div class="">
                            {{ __('Passengers') }}
                        </div>
                    </div>
                    <div class="">
                        {{ $booking->passengers }}
                    </div>
                </div>
    
                <div class="text-center">
                    <div class="text-sm text-gray-500">{{ __('Driving Time') }}</div>
                    {{-- {{formatDrivingTime($item->driving_time)}} --}}
                    <div class="">
                        @if ($booking->service->driving_time_minutes < 60)
                            {{date('i'.' \m\i\n\s', mktime(0,$booking->service->driving_time_minutes))}}
                        @elseif ($booking->service->driving_time_minutes < 120)
                            {{date('H'.' \h\o\u\r '. 'i'.' \m\i\n\s', mktime(0,$booking->service->driving_time_minutes))}}
                        @else
                            {{date('H'.' \h\o\u\r\s '. 'i'.' \m\i\n\s', mktime(0,$booking->service->driving_time_minutes))}}
                        @endif 
                    </div>
                </div>

                <div class="text-center">
                    <div class="text-sm text-gray-500">{{ __('Type') }}</div>
                    {{-- {{formatDrivingTime($item->driving_time)}} --}}
                    <div class="">
                        @if ($booking->type == 'oneway')
                            {{ __('One Way') }}
                        @else
                            {{ __('Round Trip') }}
                        @endif
                    </div>
                </div>
    
                <div class="text-center">
                    <div class="text-sm text-gray-500">{{ __('Order Total') }}</div>
                    {{-- {{formatDrivingTime($item->driving_time)}} --}}
                    <div class="">
                        ${{ number_format($booking->order_total, 2, '.', ',') }}
                    </div>
                </div>

            </div>
            
           
        </div>{{-- bg-white --}}


        {{-- form  --}}
    
        {!! Form::model($booking, ['method' => 'PATCH', 'url' => ['bookings/save', $booking->id], 'class' => '']) !!}
        
            <div class="text-lg font-bold text-gray-600 my-6 border-b border-gray-200">
                    {{ __('Contact Details') }}
                </div>
                <div class="grid grid-cols-2 gap-2">
                    <div class="mb-2">
                        {{-- <x-input wire:model="fullname" label="Full name" name="fullname" value="{{ old('fullname', $booking->fullname) }}"/> --}}
                        <label class="mb-1 block text-sm font-medium {{ $errors->has('fullname') ? 'text-negative-600' : 'text-secondary-700' }} dark:text-gray-400" for="fullname">{{ __('Full name') }}</label>
                        <input class="{{ $errors->has('fullname') ? 'border-red-600' : 'border-gray-300' }} focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full" 
                            type="text" 
                            name="fullname" id="fullname"
                            wire:model="fullname"
                            {{-- value="{{ old('fullname',$booking->fullname) }}" --}}
                        >
                    </div>
                    
                    <div class="mb-2 ">
                        <label class="mb-1 block text-sm font-medium {{ $errors->has('email') ? 'text-negative-600' : 'text-secondary-700' }} dark:text-gray-400" for="email">{{ __('Email') }}</label>
                        <input class="{{ $errors->has('email') ? 'border-red-600' : 'border-gray-300' }} focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full" 
                            type="email" 
                            name="email" id="email"
                            wire:model="email"
                            {{-- value="{{ old('email', $booking->email) }}" --}}
                        >
                        @error('email')
                            <span class="text-sm text-red-400">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
    
                <div class="grid grid-cols-3 gap-2">
                    <div class="">
                        <x-inputs.phone wire:model="phone" label="Phone"  name="phone"/>
                    </div>
                    <div class="">
                        <label class="mb-1 block text-sm font-medium text-secondary-700 dark:text-gray-400">{{ __('Passengers')}}</label>
                        <select class="py-2 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full sm:py-1.5" name="passengers" id="passengers" wire:model="passengers">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select> 
                    </div>
                    <div class="">
                        {{-- <x-select
                            label="Language"
                            name="language"
                        >
                            <x-select.option label="English" value="en" {{ $booking->language == 'en' ? 'selected' : '' }}/>
                            <x-select.option label="Español" value="es" {{ $booking->language == 'es' ? 'selected' : '' }}/>
                        </x-select> --}}
    
                        <label class="mb-1 block text-sm font-medium text-secondary-700 dark:text-gray-400">{{ __('Preferred language')}}</label>
                        <select class="py-1.5 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full" name="language" wire:model="language">
                            <option value="en" >English</option>
                            <option value="es">Español</option>
                        </select> 
                    </div>
                </div>
    
    
                {{-- Conditions One Way --}}
                @if ($booking->service->fromlocation->is_airport and $booking->service->tolocation->is_airport)
                    <div class="text-lg font-bold text-gray-600 my-6 border-b border-gray-200">
                        {{$booking->type == 'roundtrip' ? __('1st Trip Arrival Information') : 'Arrival Information'}}
                    </div>
                    <div class="grid grid-cols-2 gap-2">
                        <div class="mb-2">
                            {{-- <div class="block text-sm font-medium text-secondary-700 dark:text-gray-400 mb-1" for="arrival_date">
                                {{$booking->type == 'roundtrip' ? __('1st Trip arrival date') : 'Arrival date'}}
                            </div> --}}
                            {{-- <div class="border border-gray-300 bg-white p-2 rounded-md shadow-sm w-full">
                                {{ date('j F Y', strtotime($booking->arrival_date)) }}
                            </div> --}}
                            <x-datetime-picker
                                label="{{$booking->type == 'roundtrip' ? __('1st Trip arrival date') : 'Arrival date'}}"
                                {{-- icon="calendar" --}}
                                wire:model="arrival_date"
                                without-time="true"
                                {{-- parse-format="Y-m-d" --}}
                            />
                        </div>
        
                        <div class="mb-2">
                            {{-- <label class="mb-1 block text-sm font-medium text-secondary-700 dark:text-gray-400" for="arrival_time">{{$booking->type == 'roundtrip' ? __('1st Trip arrival time') : 'Arrival time'}}</label>
                            <input class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full" 
                                type="time" 
                                name="arrival_time"
                                wire:model="arrival_time"
                            > --}}

                            <x-time-picker
                                label="{{$booking->type == 'roundtrip' ? __('1st Trip arrival time') : 'Arrival time'}}"
                                placeholder="12:00 AM"
                                wire:model="arrival_time"
                            />
                        </div>
                    </div>
    
                    <div class="grid grid-cols-2 gap-2">
                        <div class="mb-2">
                            <x-input label="{{$booking->type == 'roundtrip' ? __('1st Trip arrival airline') : 'Arrival airline'}}"  name="arrival_airline"  wire:model="arrival_airline"/>
                        </div>
                        <div class="mb-2">
                            <x-input label="Flight flight"  name="flight_number" wire:model="flight_number"/>
                        </div>
                    </div>
    
                    <div class="mb-2">
                        {{-- <label class="mb-1 block text-sm font-medium text-secondary-700 dark:text-gray-400" for="arrival_time">{{ __('More') }}</label> --}}
                        <x-textarea label="More information" name="more_information" wire:model="more_information"/>
                        {{-- <textarea id="txtid" name="more_information" rows="4" cols="50" maxlength="200">
                            A nice day is a nice day.
                            Lao Tseu
                        </textarea> --}}
    
                        <div class="text-sm text-gray-600">
                            {{ __('Please enter the name of your hotel or the address of your drop off location, as well as any additional information we should know.') }}
                        </div>
                    </div>
    
                    
                @elseif ($booking->service->fromlocation->is_airport)
                    <div class="text-lg font-bold text-gray-600 my-6 border-b border-gray-200">
                        {{ __('Arrival Information') }}
                    </div>
                    <div class="grid grid-cols-2 gap-2">
                        <div class="mb-2">
                            {{-- <div class="block text-sm font-medium text-secondary-700 dark:text-gray-400 mb-1" for="arrival_time">
                                {{ __('Arrival date') }}
                            </div> --}}
                            {{-- <div class="border border-gray-300 bg-white p-2 rounded-md shadow-sm w-full">
                                {{ date('j F Y', strtotime($booking->arrival_date)) }}
                            </div> --}}
                            <x-datetime-picker
                                label="{{ __('Arrival date') }}"
                                {{-- icon="calendar" --}}
                                wire:model="arrival_date"
                                without-time="true"
                                {{-- parse-format="Y-m-d" --}}
                            />
                        </div>
        
                        <div class="mb-2">
                        {{-- <label class="mb-1 block text-sm font-medium text-secondary-700 dark:text-gray-400" for="arrival_time">{{ __('Arrival time') }}</label>
                            <input class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full" 
                                type="time" 
                                name="arrival_time" id="arrival_time"
                                wire:model="arrival_time"
                                
                            >
                             --}}
                            <x-time-picker
                                label="{{ __('Arrival time') }}"
                                placeholder="12:00 AM"
                                wire:model="arrival_time"
                            />
                        </div>
                    </div>
    
                    <div class="grid grid-cols-2 gap-2">
                        <div class="mb-2">
                            <x-input label="{{ $booking->service->fromlocation->is_airport ? __('Arrival Airline') : __('Departure Airline') }}"  name="arrival_airline" wire:model="arrival_airline"/>
                        </div>
                        <div class="mb-2">
                            <x-input label="Flight flight"  name="flight_number" wire:model="flight_number"/>
                        </div>
                    </div>
    
                    <div class="mb-2">
                        {{-- <label class="mb-1 block text-sm font-medium text-secondary-700 dark:text-gray-400" for="arrival_time">{{ __('More') }}</label> --}}
                        <x-textarea label="More information" name="more_information" wire:model="more_information"/>
                        {{-- <textarea id="txtid" name="more_information" rows="4" cols="50" maxlength="200">
                            A nice day is a nice day.
                            Lao Tseu
                        </textarea> --}}
    
                        <div class="text-sm text-gray-600">
                            {{ __('Please enter the name of your hotel or the address of your drop off location, as well as any additional information we should know.') }}
                        </div>
                    </div>
        
                {{-- End if formlocation is airport --}}
        
                {{-- Start if tolocation is airport --}}
                @elseif ($booking->service->tolocation->is_airport)
                    <div class="text-lg font-bold text-gray-600 my-6 border-b border-gray-200">
                        {{ __('Departure Information') }}
                    </div>
                    <div class="grid grid-cols-2 gap-2">
                        <div class="mb-2">
                            {{-- <div class="block text-sm font-medium text-secondary-700 dark:text-gray-400 mb-1" for="arrival_date">
                                {{ __('Departure Date') }}
                            </div>
                            <div class="border border-gray-300 bg-white p-2 rounded-md shadow-sm w-full">
                                {{ date('j F Y', strtotime($booking->arrival_date)) }}
                            </div> --}}
                            <x-datetime-picker
                                label="{{ __('Departure date') }}"
                                {{-- icon="calendar" --}}
                                wire:model="arrival_date"
                                without-time="true"
                                {{-- parse-format="Y-m-d" --}}
                            />
                        </div>
        
                        <div class="mb-2">
                        {{-- <label class="mb-1 block text-sm font-medium text-secondary-700 dark:text-gray-400" for="arrival_time">{{ __('Departure time') }}</label>
                            <input class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full" 
                                type="time" 
                                name="arrival_time" id="arrival_time"
                                wire:model="arrival_time"
                            > --}}

                            <x-time-picker
                                label="{{ __('Departure time') }}"
                                placeholder="12:00 AM"
                                wire:model="arrival_time"
                            />
                        </div>
                    </div>
    
                    <div class="grid grid-cols-2 gap-2">
                        <div class="mb-2">
                            <x-input label="Departure airline"  name="arrival_airline" wire:model="arrival_airline"/>
                        </div>
                        <div class="mb-2">
                            <x-input label="Flight number"  name="flight_number" wire:model="flight_number"/>
                        </div>
                    </div>
    
                    <div class="mb-2">
                        <div>
                            <label class="mb-1 block text-sm font-medium text-secondary-700 dark:text-gray-400" for="want_to_arrive">{{ __('I would like to be at the airport') }}</label>             
                            <select class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full" name="want_to_arrive" wire:model="want_to_arrive">
                                @foreach($willArriveData as $k => $v)
                                    <option value="{{$k}}">{{$v}}</option>
                                @endforeach
                            </select>
                        </div>
    
                        <div>
                            <div class="text-sm font-medium text-secondary-700 dark:text-gray-400">{{ __('before the flight departure time') }}</div> 
                        </div>
    
                    </div>
    
    
                    <div class="mb-2">
                        {{-- <label class="mb-1 block text-sm font-medium text-secondary-700 dark:text-gray-400" for="arrival_time">{{ __('More') }}</label> --}}
                        <x-textarea label="More information" name="more_information" wire:model="more_information"/>
                        {{-- <textarea id="txtid" name="more_information" rows="4" cols="50" maxlength="200">
                            A nice day is a nice day.
                            Lao Tseu
                        </textarea> --}}
    
                        <div class="text-sm text-gray-600">
                            {{ __('Please enter the name of your hotel or the address of your drop off location, as well as any additional information we should know.') }}
                        </div>
                    </div>
    
                {{-- End if tolocation is airport --}}
                @else
                    <div class="text-lg font-bold text-gray-600 my-6 border-b border-gray-200">
                        {{$booking->type == 'roundtrip' ? __('1st') : ''}} {{ __('Trip out pick-up information') }}
                    </div>
                    <div class="grid grid-cols-2 gap-2">
                        <div class="mb-2">
                            {{-- <div class="block text-sm font-medium text-secondary-700 dark:text-gray-400 mb-1" for="arrival_date">
                                {{$booking->type == 'roundtrip' ? __('1st') : ''}} {{ __('Trip out pick-up date') }}
                            </div>
                            <div class="border border-gray-300 bg-white p-2 rounded-md shadow-sm w-full">
                                {{ date('j F Y', strtotime($booking->arrival_date)) }}
                            </div> --}}
                            <x-datetime-picker
                                label="{{$booking->type == 'roundtrip' ? __('1st') : ''}} {{ __('Trip out pick-up date') }}"
                                {{-- icon="calendar" --}}
                                wire:model="arrival_date"
                                without-time="true"
                                {{-- parse-format="Y-m-d" --}}
                            />
                        </div>
        
                        <div class="mb-2">
                            {{-- <label class="mb-1 block text-sm font-medium text-secondary-700 dark:text-gray-400" for="arrival_time">{{$booking->type == 'roundtrip' ? __('1st') : ''}} {{ __('Trip out pick-up time') }}</label>
                            <input class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full" 
                                type="time" 
                                name="arrival_time"
                                wire:model="arrival_time"
                            > --}}
                            <x-time-picker
                                label="{{$booking->type == 'roundtrip' ? __('1st') : ''}} {{ __('Trip out pick-up time') }}"
                                placeholder="12:00 AM"
                                wire:model="arrival_time"
                            />
                        </div>
                    </div>  
    
                    <div class="mb-2">
                        {{-- <label class="mb-1 block text-sm font-medium text-secondary-700 dark:text-gray-400" for="arrival_time">{{ __('More') }}</label> --}}
                        <x-textarea label="More information" name="more_information" wire:model="more_information"/>
                        {{-- <textarea id="txtid" name="more_information" rows="4" cols="50" maxlength="200">
                            A nice day is a nice day.
                            Lao Tseu
                        </textarea> --}}
    
                        <div class="text-sm text-gray-600">
                            {{ __('Please enter the name of your pick-up hotel or address AND the name of your drop-off hotel or location, as well as any additional information we should know.') }}
                        </div>
                    </div>
                @endif
    
                {{-- Round Trip conditions --}}
                @if ($booking->type == 'roundtrip')
                    @if ($booking->service->fromlocation->is_airport and $booking->service->tolocation->is_airport)
                        <div class="text-lg font-bold text-gray-600 my-6 border-b border-gray-200">
                            {{ __('2nd Trip Pick-up Information') }}
                        </div>
                        <div class="grid grid-cols-2 gap-2">
                            <div class="mb-2">
                                
                                <label class="mb-1 block text-sm font-medium text-secondary-700 dark:text-gray-400" for="return_date">{{ __('2nd Trip arrival date') }}</label>
                                <input class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full" 
                                    type="date" 
                                    name="return_date" 
                                    wire:model="return_date"
                                >
                            </div>
            
                            <div class="mb-2">
                            <label class="mb-1 block text-sm font-medium text-secondary-700 dark:text-gray-400" for="return_time_2">{{__('2nd Trip arrival time')}}</label>
                                <input class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full" 
                                    type="time" 
                                    name="return_time_2" id="return_time_2"
                                    value="{{ old('return_time_2', $booking->return_time_2) }}"
                                >
                            </div>
                        </div>
    
                        <div class="grid grid-cols-2 gap-2">
                            <div class="mb-2">
                                <x-input label="{{ __('2nd Trip arrival airline') }}"  name="return_airline" value="{{ old('return_airline', $booking->return_airline) }}"/>
                            </div>
                            <div class="mb-2">
                                <x-input label="Flight flight"  name="return_flight_number" value="{{ old('return_flight_number', $booking->return_flight_number) }}"/>
                            </div>
                        </div>
    
                        <div class="mb-2">
                            <label class="mb-1 block text-sm font-medium text-secondary-700 dark:text-gray-400" for="arrival_time">{{ __('Additional information') }}</label>
                            <textarea class="border border-gray-300 bg-white p-2 rounded-md shadow-sm w-full" name="return_more_information" rows="4" cols="50" ></textarea>
        
                            {{-- <div class="text-sm text-gray-600">
                                {{ __('Please enter the name of your hotel or the address of your drop off location, as well as any additional information we should know.') }}
                            </div> --}}
                        </div>
    
                            
                    @elseif ($booking->service->fromlocation->is_airport)
                            <div class="text-lg font-bold text-gray-600 my-6 border-b border-gray-200">
                                {{ __('Departure Information') }}
                            </div>
                            <div class="grid grid-cols-2 gap-2">
                                <div class="mb-2">
                                    
                                    <label class="mb-1 block text-sm font-medium text-secondary-700 dark:text-gray-400" for="return_date">{{ __('Departure date') }}</label>
                                    <input class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full" 
                                        type="date" 
                                        name="return_date" id="return_date"
                                        value="{{ old('return_date', date('Y-m-d')) }}"
                                    >
                                </div>
                
                                <div class="mb-2">
                                <label class="mb-1 block text-sm font-medium text-secondary-700 dark:text-gray-400" for="return_time_2">{{__('Departure time')}}</label>
                                    <input class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full" 
                                        type="time" 
                                        name="return_time_2" id="return_time_2"
                                        value="{{ old('return_time_2', $booking->return_time_2) }}"
                                    >
                                </div>
                            </div>  
    
                            <div class="grid grid-cols-2 gap-2">
                                <div class="mb-2">
                                    <x-input label="{{ __('Departure airline') }}"  name="return_airline" value="{{ old('return_airline', $booking->return_airline) }}"/>
                                </div>
                                <div class="mb-2">
                                    <x-input label="Flight number"  name="return_flight_number" value="{{ old('return_flight_number', $booking->return_flight_number) }}"/>
                                </div>
                            </div>
    
                            <div class="mb-2">
                                <div>
                                    <label class="mb-1 block text-sm font-medium text-secondary-700 dark:text-gray-400" for="return_want_to_arrive_2">{{ __('I would like to be at the airport') }}</label>             
                                    <select class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full" name="return_want_to_arrive_2" id="return_want_to_arrive_2">
                                        @foreach($willArriveData as $k => $v)
                                            <option value="{{$k}}" {{old('return_want_to_arrive_2') == '' && $k=='120' ? 'selected' : ''}} {{old('return_want_to_arrive_2') == $k ? 'selected' : ''}}>{{$v}}</option>
                                        @endforeach
                                    </select>
                                </div>
        
                                <div>
                                    <div class="text-sm font-medium text-secondary-700 dark:text-gray-400">{{ __('before the flight departure time') }}</div> 
                                </div>
        
                            </div>
    
                            <div class="mb-2">
                                <label class="mb-1 block text-sm font-medium text-secondary-700 dark:text-gray-400" for="arrival_time">{{ __('Additional information') }}</label>
                                <textarea class="border border-gray-300 bg-white p-2 rounded-md shadow-sm w-full" name="return_more_information" rows="4" cols="50" ></textarea>
            
                                <div class="text-sm text-gray-600">
                                    {{ __('Enter Hotel or Address and other additional Information if different from arrival drop-off information.') }}
                                </div>
                            </div>
    
                    @elseif ($booking->service->tolocation->is_airport)
                        <div class="text-lg font-bold text-gray-600 my-6 border-b border-gray-200">
                            {{ __('Arrival Information') }}
                        </div>
                        <div class="grid grid-cols-2 gap-2">
                            <div class="mb-2">
                                
                                <label class="mb-1 block text-sm font-medium text-secondary-700 dark:text-gray-400" for="return_date">{{ __('Arrival date') }}</label>
                                <input class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full" 
                                    type="date" 
                                    name="return_date" id="return_date"
                                    value="{{ old('return_date', date('Y-m-d')) }}"
                                >
                            </div>
            
                            <div class="mb-2">
                            <label class="mb-1 block text-sm font-medium text-secondary-700 dark:text-gray-400" for="return_time_2">{{__('Arrival time')}}</label>
                                <input class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full" 
                                    type="time" 
                                    name="return_time_2" id="return_time_2"
                                    value="{{ old('return_time_2', $booking->return_time_2) }}"
                                >
                            </div>
                        </div>  
    
                        <div class="grid grid-cols-2 gap-2">
                            <div class="mb-2">
                                <x-input label="{{ __('Arrival Airline') }}"  name="return_airline" value="{{ old('return_airline', $booking->return_airline) }}"/>
                            </div>
                            <div class="mb-2">
                                <x-input label="Flight Number"  name="return_flight_number" value="{{ old('return_flight_number', $booking->return_flight_number) }}"/>
                            </div>
                        </div>
    
                        <div class="mb-2">
                            <label class="mb-1 block text-sm font-medium text-secondary-700 dark:text-gray-400" for="arrival_time">{{ __('Additional information') }}</label>
                            <textarea class="border border-gray-300 bg-white p-2 rounded-md shadow-sm w-full" name="return_more_information" rows="4" cols="50" ></textarea>
        
                            <div class="text-sm text-gray-600">
                                {{ __('Enter Hotel or Address and other additional information if different from first trip pick-up information.') }}
                            </div>
                        </div>
    
                    {{-- End if tolocation is airport --}}
                    @else
                        <div class="text-lg font-bold text-gray-600 my-6 border-b border-gray-200">
                            {{ __('2nd Trip Pick-up Information') }}
                        </div>
    
                        <div class="grid grid-cols-2 gap-2">
                            <div class="mb-2">
                                
                                <label class="mb-1 block text-sm font-medium text-secondary-700 dark:text-gray-400" for="return_date">{{ __('2nd Trip back pick-up date') }}</label>
                                <input class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full" 
                                    type="date" 
                                    name="return_date" id="return_date"
                                    value="{{ old('return_date', date('Y-m-d')) }}"
                                >
                            </div>
            
                            <div class="mb-2">
                            <label class="mb-1 block text-sm font-medium text-secondary-700 dark:text-gray-400" for="return_time_2">{{__('2nd Trip back pick-up time')}}</label>
                                <input class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full" 
                                    type="time" 
                                    name="return_time_2" id="return_time_2"
                                    value="{{ old('return_time_2', $booking->return_time_2) }}"
                                >
                            </div>
                        </div> 
    
                        <div class="mb-2">
                            <label class="mb-1 block text-sm font-medium text-secondary-700 dark:text-gray-400" for="arrival_time">{{ __('Additional information') }}</label>
                            <textarea class="border border-gray-300 bg-white p-2 rounded-md shadow-sm w-full" name="return_more_information" rows="4" cols="50" ></textarea>
        
                            <div class="text-sm text-gray-600">
                                {{ __('Enter Hotel or Address and other additional Information if different from trip out drop-off information.') }}
                            </div>
                        </div>
                    @endif
        
                    
                @endif
                {{-- end roundtrip information --}}
    
            <div class="flex justify-center mt-4">
                <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                    <button 
                        type="submit" 
                        class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-blue-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-blue-800 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5"
                        {{ (!empty($fullname) && !empty($email) && !empty($phone) ? '' : 'disabled') }}
                        >
                        {{__('Save and Continue')}}
                    </button>
                    {{-- <button wire:click.prevent="save()" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-blue-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-blue-800 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                        {{__('Save and Continue')}}
                    </button> --}}
                </span>
            </div>
            
        {!! Form::close() !!}
    </div>

</div>
