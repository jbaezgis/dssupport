<div>
    <div class="mt-4">
        <div>
            <h1 class="text-gray-900 text-center text-3xl">{{$booking->fullname}}</h1>
        </div>
        {{-- <div class="text-center">
            <span class="text-gray-500">{{__('Booking ID')}}: <strong>{{ $booking->id }}</strong></span>
        </div> --}}
        <div class="">
            <div class="text-center text-gray-500">{{__('Email')}}: <strong>{{ $booking->email }}</strong></div>
            <div class="text-center text-gray-500">{{__('Phone')}}: <strong>{{ $booking->phone }}</strong></div>
            <div class="text-center text-gray-500">{{__('Preferred language')}}: 
                <strong>
                    @if ($booking->language == 'es')
                        Español
                    @else
                        English
                    @endif
                </strong>
            </div>
        </div>
        <div class="flex gap-4 text-center justify-center">
        </div>
    </div>

    <div class="mb-4 mt-4">
        <div class="px-4 py-2">
            
            <div class="">
                {{-- Col 1 --}}
                <div class="">
                    
                    <div class="bg-white shadow-sm rounded px-4 py-6 mb-4">
                        <div class="pt-4 flex justify-center">
                            <div class="">
                                <div class="flex">
                                    <div class="text-blue-600 p-2">
                                        <x-icon name="location-marker" class="w-5 h-5" />
                                    </div>
                                    <div class="p-2">
                                        {{ $booking->alias_location_from }}
                                    </div>
                                </div>
                                <div class="text-gray-400 pl-2">
                                    <x-icon name="arrow-narrow-down" style="solid" class="w-5 h-5" />
                                </div>
            
                                <div class="flex">
                                    <div class="text-blue-600 p-2">
                                        <x-icon name="location-marker" style="solid" class="w-5 h-5" />
                                    </div>
                                    <div class="p-2">
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
            
                        </div>
                        
                        <div class="flex justify-center gap-6 py-4">
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
                
                            {{-- <div class="text-center">
                                <div class="text-sm text-gray-500">{{ __('Order Total') }}</div>
                                <div class="">
                                    ${{ number_format($booking->order_total, 2, '.', ',') }}
                                </div>
                            </div> --}}
            
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
                               

                            </div>

                            <div class="flex gap-4 mb-2 ">
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

                            </div>

                            <div class="flex gap-4 mb-2 ">
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
                                            {{$booking->return_airline}} 
                                        </div>
                                    </div>
                                    <div>
                                        <div class="text-xs text-gray-500">{{ __('2ND TRIP FLIGHT NUMBER') }}</div>
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
                                    

                                </div>
                                <div class="flex gap-4 mb-2 ">
                                    <div>
                                        <div class="text-xs text-gray-500">{{ __('FLIGHT NUMBER') }}</div>
                                        <div>
                                            {{$booking->return_flight_number}}
                                        </div>
                                    </div>

                                    <div>
                                        <div class="text-xs text-gray-500">{{ __('I (WE) WANT TO ARRIVE') }}</div>
                                        <div>
                                            @if ($booking->return_want_to_arrive_2 == 90)
                                                1 hour 30 min
                                            @elseif ($booking->return_want_to_arrive_2 == 120)
                                                2 hours 00 min
                                            @elseif ($booking->return_want_to_arrive_2 == 150)
                                                2 hours 30 min
                                            @elseif ($booking->return_want_to_arrive_2 == 180)
                                                3 hours 00 min
                                            @elseif ($booking->return_want_to_arrive_2 == 210)
                                                3 hours 30 min
                                            @endif
                                        </div>
                                    </div>

                                    <div>
                                        <div class="text-xs text-gray-500">{{ __('PICK UP TIME') }}</div>
                                        <div>
                                            {{ date('g:i A', strtotime($booking->return_pickup_time_2)) }}
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
                <div class="mt-4">
                    <div class="bg-white shadow-sm rounded px-4 py-6">
                        <div class="text-center shadow rounded py-4 bg-gray-50 font-bold text-gray-600">{{ __('Booking summary') }} - #{{ $booking->id }} </div>
                        
                        <div class="grid grid-cols-2 mt-4 py-2 text-gray-600">
                            <div>{{ __('Booking date') }}</div>
                            <div class="text-right">{{ date('j F Y', strtotime($booking->created_at)) }}</div>
                        </div>

                        <div class="grid grid-cols-2 py-2 text-gray-600">
                            <div>{{ __('Passengers') }}</div>
                            <div class="text-right">{{ $booking->passengers }}</div>
                        </div>

                        <div class="grid grid-cols-2 py-1 text-gray-600">
                            <div>{{ __('Vehicle size') }}</div>
                            <div class="text-right">{{ $booking->servicePrice->priceOption->name }}</div>
                        </div>

                        <div class="border-b border-gray-200"></div>

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
