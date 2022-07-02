<div>
    {{-- <x-slot name="header">
        
    </x-slot> --}}
    
    <div class="py-4 max-w-7xl mx-auto sm:px-6 lg:px-8 ">
        {{-- <div class="flex gap-2 justify-end">
            <x-button primary icon="pencil" label="Edit" />
            <x-button icon="check" label="Button 1" />
            <x-button icon="information-circle" label="Button 2" />
        </div> --}}

        <div class="flex gap-2 text-xs text-gray-500 mb-2">
            <span>{{ __('Bookings') }} </span>
            <span class="pt-0.5">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                </svg>
            </span>
            <span>{{ __('Show Booking') }}</span>
        </div>

        <div class="flex justify-between border-b pb-2">
            <div>
                <a wire:click="openSnapnishEmailContent()" class="cursor-pointer inline-flex items-center px-4 py-2 bg-gray-100 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-200 active:bg-gray-300 focus:outline-none focus:border-gray-300 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                    {{ __('Email template') }}
                </a>
                <a wire:click="openSnapnishEmailContent()" class="cursor-pointer  inline-flex items-center px-4 py-2 bg-gray-100 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-200 active:bg-gray-300 focus:outline-none focus:border-gray-300 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                    {{ __('Spanish email template') }}
                </a>
                
                {{-- <x-buttons.primary wire:click="openSnapnishEmailContent()">{{ __('Spanish email template') }}</x-buttons.primary> --}}
            </div>

            {{-- Modals --}}
            @if($spanishEmailContent)
                <div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-300">
                    <div class="flex justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                        <div class="fixed inset-0 transition-opacity">
                            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                        </div>
                
                        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>
                
                        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-4xl sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                                <div>
                                    <div class="flex justify-end border-b">
                                        <a wire:click="closeSnapnishEmailContent()" class="p-4 cursor-pointer text-gray-400 hover:text-gray-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                    <div class="mb-4">
                                        @include('emails_templates.airport-to-location-oneway')
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            @endif

            {{-- Actions buttons --}}
            <div>
                <a href="{{ url('bookings/edit/'.$booking->id.'?bookingkey='.$booking->bookingkey) }}" class="inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-400 active:bg-blue-600 focus:outline-none focus:border-blue-600 focus:ring focus:ring-blue-300 disabled:opacity-25 transition">
                    {{-- <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg> --}}
                    {{ __('Edit') }}
                </a>
            </div>
        </div>

        <div class="mt-4">
            <div>
                <h1 class="text-gray-900 text-center text-3xl">{{$booking->fullname}}</h1>
            </div>
            {{-- <div class="text-center">
                <span class="text-gray-500">{{__('Booking ID')}}: <strong>{{ $booking->id }}</strong></span>
            </div> --}}
            <div class="flex gap-4 text-center justify-center">
                <span class="text-gray-500">{{__('Email')}}: <strong>{{ $booking->email }}</strong></span>
                <span class="text-gray-500">{{__('Phone')}}: <strong>{{ $booking->phone }}</strong></span>
            </div>
            <div class="flex gap-4 text-center justify-center">
                <span class="text-gray-500">{{__('Preferred language')}}: 
                    <strong>
                        @if ($booking->language == 'es')
                            Español
                        @else
                            English
                        @endif
                    </strong>
                </span>
            </div>
        </div>

        <div class="mb-4 mt-4">
            <div class="px-4 py-2">
                <div class="grid grid-cols-3 gap-4">
                    {{-- Col 1 --}}
                    <div class="col-span-2 ">
                        
                        <div class="bg-white shadow-sm rounded px-4 py-6 mb-4">
                            <div class="flex gap-4 ">
                                
                                <div>
                                    <div class="text-xs text-gray-500">{{ __('FROM') }}</div>
                                    <div class="font-bold">
                                        {{$booking->alias_location_from}}
                                    </div>
                                </div>
                                <div>
                                    <div class="text-xs text-gray-500">{{ __('TO') }}</div>
                                    <div class="font-bold">
                                        {{$booking->alias_location_to}}
                                    </div>
                                </div>
                                <div>
                                    <div class="text-xs text-gray-500">TYPE</div>
                                    <div>
                                        {{ $booking->type }}
                                    </div>
                                </div>
                                
                            </div>
                        </div>

                        <div class="bg-white shadow-sm rounded px-4 py-6">
                            
                            {{-- Conditions --}}
                            @if ($booking->service->fromlocation->is_airport and $booking->service->tolocation->is_airport) 
                                <h2 class="text-xl font-weight-bold text-gray-700 font-bold">{{ $booking->type == 'roundtrip' ? __('1st Trip Arrival Information') : __('Arrival Information') }}</h2>
                                <div class="pt-2 mb-2 border-b border-gray-200"></div>
                                <div class="flex gap-4 mb-2 ">
                                    <div>
                                        <div class="text-xs text-gray-500">{{ __('ARRIVAL DATE') }}</div>
                                        <div>
                                            {{ date('j F Y', strtotime($booking->arrival_date)) }}
                                        </div>
                                    </div>
                                    <div>
                                        <div class="text-xs text-gray-500">{{ __('ARRIVAL TIME') }}</div>
                                        <div>
                                            {{ date('g:i A', strtotime($booking->arrival_time)) }} 
                                        </div>
                                    </div>
                                    <div>
                                        <div class="text-xs text-gray-500">{{ __('ARRIVAL AIRLINE') }}</div>
                                        <div>
                                            {{$booking->arrival_airline}} 
                                        </div>
                                    </div>
                                    <div>
                                        <div class="text-xs text-gray-500">{{ __('FLIGHT NUMBER') }}</div>
                                        <div>
                                            {{$booking->flight_number}}
                                        </div>
                                    </div>

                                </div>

                                <div class="flex gap-4 mb-2 ">
                                    <div>
                                        <div class="text-xs text-gray-500">{{ __('ADITIONAL INFORMATION') }}</div>
                                        <div>
                                            {{$booking->more_information}}
                                        </div>
                                    </div>
                                </div> 
                            @elseif ($booking->service->fromlocation->is_airport)
                                <h2 class="text-xl font-weight-bold text-gray-700 font-bold">{{ __('Arrival Information') }}</h2>
                                <div class="pt-2 mb-2 border-b border-gray-200"></div>
                                <div class="flex gap-4 mb-2 ">
                                    <div>
                                        <div class="text-xs text-gray-500">{{ __('ARRIVAL DATE') }}</div>
                                        <div>
                                            {{ date('j F Y', strtotime($booking->arrival_date)) }}
                                        </div>
                                    </div>
                                    <div>
                                        <div class="text-xs text-gray-500">{{ __('ARRIVAL TIME') }}</div>
                                        <div>
                                            {{ date('g:i A', strtotime($booking->arrival_time)) }} 
                                        </div>
                                    </div>
                                    <div>
                                        <div class="text-xs text-gray-500">{{ __('ARRIVAL AIRLINE') }}</div>
                                        <div>
                                            {{$booking->arrival_airline}} 
                                        </div>
                                    </div>
                                    <div>
                                        <div class="text-xs text-gray-500">{{ __('FLIGHT NUMBER') }}</div>
                                        <div>
                                            {{$booking->flight_number}}
                                        </div>
                                    </div>

                                </div>

                                <div class="flex gap-4 mb-2 ">
                                    <div>
                                        <div class="text-xs text-gray-500">{{ __('ADITIONAL INFORMATION') }}</div>
                                        <div>
                                            {{$booking->more_information}}
                                        </div>
                                    </div>
                                </div> 
                            @elseif ($booking->service->tolocation->is_airport)
                                <h2 class="text-xl font-weight-bold text-gray-700 font-bold">{{ __('Departure Information') }}</h2>
                                <div class="pt-2 mb-2 border-b border-gray-200"></div>
                                <div class="flex gap-4 mb-2 ">
                                    <div>
                                        <div class="text-xs text-gray-500">{{ __('DEPARTURE DATE') }}</div>
                                        <div>
                                            {{ date('j F Y', strtotime($booking->arrival_date)) }}
                                        </div>
                                    </div>
                                    <div>
                                        <div class="text-xs text-gray-500">{{ __('DEPARTURE TIME') }}</div>
                                        <div>
                                            {{ date('g:i A', strtotime($booking->arrival_time)) }} 
                                        </div>
                                    </div>
                                    <div>
                                        <div class="text-xs text-gray-500">{{ __('DEPARTURE AIRLINE') }}</div>
                                        <div>
                                            {{$booking->arrival_airline}} 
                                        </div>
                                    </div>
                                    <div>
                                        <div class="text-xs text-gray-500">{{ __('FLIGHT NUMBER') }}</div>
                                        <div>
                                            {{$booking->flight_number}}
                                        </div>
                                    </div>

                                    <div>
                                        <div class="text-xs text-gray-500">{{ __('I (WE) WANT TO ARRIVE') }}</div>
                                        <div>
                                            @if ($booking->want_to_arrive == 90)
                                                1 hour 30 min
                                            @elseif ($booking->want_to_arrive == 120)
                                                2 hours 00 min
                                            @elseif ($booking->want_to_arrive == 150)
                                                2 hours 30 min
                                            @elseif ($booking->want_to_arrive == 180)
                                                3 hours 00 min
                                            @elseif ($booking->want_to_arrive == 210)
                                                3 hours 30 min
                                            @endif
                                        </div>
                                    </div>

                                    <div>
                                        <div class="text-xs text-gray-500">{{ __('PICK UP TIME') }}</div>
                                        <div>
                                            {{ date('g:i A', strtotime($booking->pickup_time)) }}
                                        </div>
                                    </div>

                                </div>

                                <div class="flex gap-4 mb-2 ">
                                    <div>
                                        <div class="text-xs text-gray-500">{{ __('ADITIONAL INFORMATION') }}</div>
                                        <div>
                                            {{$booking->more_information}}
                                        </div>
                                    </div>
                                </div> 
                            @else
                                <h2 class="text-xl font-weight-bold text-gray-700 font-bold">{{ $booking->type == 'roundtrip' ? __('1st Trip') : '' }} {{ __('Pick-up Information') }}</h2>
                                <div class="pt-2 mb-2 border-b border-gray-200"></div>
                                <div class="flex gap-4 mb-2 ">
                                    <div>
                                        <div class="text-xs text-gray-500">{{ __('PICK UP DATE') }}</div>
                                        <div>
                                            {{ date('j F Y', strtotime($booking->arrival_date)) }}
                                        </div>
                                    </div>
                                    <div>
                                        <div class="text-xs text-gray-500">{{ __('PICK UP TIME') }}</div>
                                        <div>
                                            {{ date('g:i A', strtotime($booking->arrival_time)) }} 
                                        </div>
                                    </div>
                                </div>

                                <div class="flex gap-4 mb-2 ">
                                    <div>
                                        <div class="text-xs text-gray-500">{{ __('ADITIONAL INFORMATION') }}</div>
                                        <div>
                                            {{$booking->more_information}}
                                        </div>
                                    </div>
                                </div> 
                            @endif
                            {{-- End Arribal information --}}

                            {{-- Deaperture information --}}
                            @if ($booking->type == 'roundtrip')

                                @if ($booking->service->fromlocation->is_airport and $booking->service->tolocation->is_airport)
                                    <h2 class="text-xl font-weight-bold text-gray-700 mt-6 font-bold">{{ __('2nd Trip Arrival Information') }}</h2>
                                    <div class="pt-2 mb-2 border-b border-gray-200"></div>

                                    <div class="flex gap-4 mb-2 ">
                                        <div>
                                            <div class="text-xs text-gray-500">{{ __('2ND TRIP ARRIVAL DATE') }}</div>
                                            <div>
                                                {{ date('j F Y', strtotime($booking->return_date)) }}
                                            </div>
                                        </div>
                                        <div>
                                            <div class="text-xs text-gray-500">{{ __('2ND TRIP ARRIVAL TIME') }}</div>
                                            <div>
                                                {{ date('g:i A', strtotime($booking->return_time_2)) }} 
                                            </div>
                                        </div>
                                        <div>
                                            <div class="text-xs text-gray-500">{{ __('2ND TRIP ARRIVAL AIRLINE') }}</div>
                                            <div>
                                                {{$booking->arrival_airline}} 
                                            </div>
                                        </div>
                                        <div>
                                            <div class="text-xs text-gray-500">{{ __('2ND TRIP FLIGHT NUMBER') }}</div>
                                            <div>
                                                {{$booking->flight_number}}
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="flex gap-4 mb-2 ">
                                        <div>
                                            <div class="text-xs text-gray-500">{{ __('ADITIONAL INFORMATION') }}</div>
                                            <div>
                                                {{$booking->return_more_information}}
                                            </div>
                                        </div>
                                    </div> 

                                
                                @elseif ($booking->service->fromlocation->is_airport)
                                <h2 class="text-xl font-weight-bold text-gray-700 mt-6 font-bold">{{ __('Departure Information') }}</h2>
                                    <div class="pt-2 mb-2 border-b border-gray-200"></div>

                                    <div class="flex gap-4 mb-2 ">
                                        <div>
                                            <div class="text-xs text-gray-500">{{ __('DEPARTURE DATE') }}</div>
                                            <div>
                                                {{ date('j F Y', strtotime($booking->return_date)) }}
                                            </div>
                                        </div>
                                        <div>
                                            <div class="text-xs text-gray-500">{{ __('DEPARTURE TIME') }}</div>
                                            <div>
                                                {{ date('g:i A', strtotime($booking->return_time_2)) }} 
                                            </div>
                                        </div>
                                        <div>
                                            <div class="text-xs text-gray-500">{{ __('DEPARTURE AIRLINE') }}</div>
                                            <div>
                                                {{$booking->return_airline}} 
                                            </div>
                                        </div>
                                        <div>
                                            <div class="text-xs text-gray-500">{{ __('FLIGHT NUMBER') }}</div>
                                            <div>
                                                {{$booking->return_flight_number}}
                                            </div>
                                        </div>

                                        <div>
                                            <div class="text-xs text-gray-500">{{ __('I (WE) WANT TO ARRIVE') }}</div>
                                            <div>
                                                @if ($booking->want_to_arrive == 90)
                                                    1 hour 30 min
                                                @elseif ($booking->want_to_arrive == 120)
                                                    2 hours 00 min
                                                @elseif ($booking->want_to_arrive == 150)
                                                    2 hours 30 min
                                                @elseif ($booking->want_to_arrive == 180)
                                                    3 hours 00 min
                                                @elseif ($booking->want_to_arrive == 210)
                                                    3 hours 30 min
                                                @endif
                                            </div>
                                        </div>

                                        <div>
                                            <div class="text-xs text-gray-500">{{ __('PICK UP TIME') }}</div>
                                            <div>
                                                {{ date('g:i A', strtotime($booking->pickup_time)) }}
                                            </div>
                                        </div>

                                    </div>
    
                                    <div class="flex gap-4 mb-2 ">
                                        <div>
                                            <div class="text-xs text-gray-500">{{ __('ADITIONAL INFORMATION') }}</div>
                                            <div>
                                                {{$booking->return_more_information}}
                                            </div>
                                        </div>
                                    </div> 

                                    
                                @elseif ($booking->service->tolocation->is_airport)
                                    
                                    <h2 class="text-xl font-weight-bold text-gray-700 font-bold mt-6">{{ __('Arrival Information') }}</h2>
                                    <div class="pt-2 mb-2 border-b border-gray-200"></div>
                                    <div class="flex gap-4 mb-2 ">
                                        <div>
                                            <div class="text-xs text-gray-500">{{ __('ARRIVAL DATE') }}</div>
                                            <div>
                                                {{ date('j F Y', strtotime($booking->return_date)) }}
                                            </div>
                                        </div>
                                        <div>
                                            <div class="text-xs text-gray-500">{{ __('ARRIVAL TIME') }}</div>
                                            <div>
                                                {{ date('g:i A', strtotime($booking->return_time_2)) }} 
                                            </div>
                                        </div>
                                        <div>
                                            <div class="text-xs text-gray-500">{{ __('ARRIVAL AIRLINE') }}</div>
                                            <div>
                                                {{$booking->return_airline}} 
                                            </div>
                                        </div>
                                        <div>
                                            <div class="text-xs text-gray-500">{{ __('FLIGHT NUMBER') }}</div>
                                            <div>
                                                {{$booking->return_flight_number}}
                                            </div>
                                        </div>

                                    </div>

                                    <div class="flex gap-4 mb-2 ">
                                        <div>
                                            <div class="text-xs text-gray-500">{{ __('ADITIONAL INFORMATION') }}</div>
                                            <div>
                                                {{$booking->return_more_information}}
                                            </div>
                                        </div>
                                    </div> 
                                @else
                                    <h2 class="text-xl font-weight-bold text-gray-700 font-bold mt-6">{{ __('2nd Trip Pick-up Information') }}</h2>
                                    <div class="pt-2 mb-2 border-b border-gray-200"></div>
                                    <div class="flex gap-4 mb-2 ">
                                        <div>
                                            <div class="text-xs text-gray-500">{{ __('RETURN DATE') }}</div>
                                            <div>
                                                {{ date('j F Y', strtotime($booking->return_date)) }}
                                            </div>
                                        </div>
                                        <div>
                                            <div class="text-xs text-gray-500">{{ __('RETURN TIME') }}</div>
                                            <div>
                                                {{ date('g:i A', strtotime($booking->return_time_2)) }} 
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex gap-4 mb-2 ">
                                        <div>
                                            <div class="text-xs text-gray-500">{{ __('ADITIONAL INFORMATION') }}</div>
                                            <div>
                                                {{$booking->return_more_information}}
                                            </div>
                                        </div>
                                    </div> 
                                @endif
                                {{-- endif conditions --}}
                            @endif 
                            {{-- endif rountrip --}}
                        </div>
                        
                    </div>
                    {{-- end col --}}

                    {{-- Col 2 --}}
                    <div class="">
                        <div class="bg-white shadow-sm rounded px-4 py-6">
                            <div class="text-center shadow rounded py-4 bg-gray-50 font-bold text-gray-600">{{ __('Booking summary') }} - #{{ $booking->id }} </div>
                            
                            <div class="grid grid-cols-2 mt-4 py-2 text-gray-600">
                                <div>{{ __('Booking date') }}</div>
                                <div class="text-right font-semibold">{{ date('j F Y', strtotime($booking->created_at)) }}</div>
                            </div>

                            <div class="grid grid-cols-2 py-1 text-gray-600">
                                <div>{{ __('Vehicle size') }}</div>
                                <div class="text-right font-semibold">{{ $booking->servicePrice->priceOption->name }}</div>
                            </div>

                            <div class="grid grid-cols-2 py-1 text-gray-600">
                                <div>{{ __('Passengers') }}</div>
                                <div class="text-right font-semibold">{{ $booking->passengers }}</div>
                            </div>

                            {{-- <div class="border-b border-gray-200"></div> --}}

                        </div>
                        <div class="bg-gray-200 p-4 shadow-sm rounded font-bold">
                            <div class="grid grid-cols-2 text-gray-600">
                                <div>{{ __('Total Fare') }}</div>
                                <div class="text-right"><span class="text-blue-500">USD</span> {{number_format($booking->order_total, 2, '.', ',')}}</div>
                            </div>
                        </div>

                    </div>
                </div>

                {{-- <div>
                    <h4 class="text-gray-500">{{ __('CLIENT DETAILS') }}</h4>
                </div>

                <div class="flex gap-4 py-2">
                    <div>
                        <div class="text-xs text-gray-500">{{ __('NAME') }}</div>
                        <div>
                            <h3 class="">{{$booking->fullname}}</h3>
                        </div>
                    </div>
                    <div>
                        <div class="text-xs text-gray-500">{{ __('EMAIL') }}</div>
                        <div>
                            <h3 class="">{{$booking->email}}</h3>
                        </div>
                    </div>
                    <div>
                        <div class="text-xs text-gray-500">{{ __('PHONE') }}</div>
                        <div>
                            <h3 class="">809-321-1234</h3>
                        </div>
                    </div>
                </div> --}}
    
            </div>
            
        </div>
    </div>
</div>
