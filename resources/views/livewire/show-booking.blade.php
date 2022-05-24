<div>
    {{-- <x-slot name="header">
        
    </x-slot> --}}
    
    <div class="py-4 max-w-7xl mx-auto sm:px-6 lg:px-8 ">
        <div class="flex gap-2 justify-end">
            <x-button primary icon="pencil" label="Edit" />
            <x-button icon="check" label="Button 1" />
            <x-button icon="information-circle" label="Button 2" />
        </div>

        <div class="mt-4">
            <div>
                <h1 class="text-gray-900 text-center text-3xl">{{$booking->fullname}}</h1>
            </div>
            <div class="text-center">
                <span class="text-gray-500">{{__('Booking ID')}}: <strong>{{ $booking->id }}</strong></span>
            </div>
            <div class="flex gap-4 text-center justify-center">
                <span class="text-gray-500">{{__('Email')}}: <strong>{{ $booking->email }}</strong></span>
                <span class="text-gray-500">{{__('Phone')}}: <strong>{{ $booking->phone }}</strong></span>
            </div>
        </div>

        <div class="mb-4 mt-4">
            <div class="px-4 py-2">
                <div class="grid grid-cols-3 gap-4">
                    {{-- Col 1 --}}
                    <div class="col-span-2 bg-white shadow-sm rounded px-4 py-6">
                        
                        <div class="flex gap-4 mb-2 border-b border-gray-200">
        
                            <div>
                                <div class="text-xs text-gray-500">ID</div>
                                <div>
                                    {{ $booking->id }}
                                </div>
                            </div>
                            <div>
                                <div class="text-xs text-gray-500">TYPE</div>
                                <div>
                                    {{ $booking->bookingtype }}
                                </div>
                            </div>
                            {{-- <div>
                                <div class="text-xs text-gray-500">BOOKED</div>
                                <div>
                                    5 monts ago
                                </div>
                            </div> --}}
        
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
                            
                        </div>
                        <div class="flex gap-4 mb-2 ">
                            <div>
                                <div class="text-xs text-gray-500">{{ __('ARRIVAL DATE') }}</div>
                                <div>
                                    {{ date('l j, F Y', strtotime($booking->arrival_date)) }}, {{ date('g:i A', strtotime($booking->arrival_time)) }}
                                </div>
                            </div>
                            <div>
                                <div class="text-xs text-gray-500">{{ __('ARRIVAL AIRLINE') }}</div>
                                <div>
                                Delta 
                                </div>
                            </div>
                            <div>
                                <div class="text-xs text-gray-500">{{ __('PASSENGERS') }}</div>
                                <div>
                                2 
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Col 2 --}}
                    <div class="">
                        <div class="col-span-2 bg-white shadow-sm rounded px-4 py-6">
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
