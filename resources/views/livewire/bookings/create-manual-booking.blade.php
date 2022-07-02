@section('title', __('Create new booking'))
@section('description', 'Best Private Transfers in the DR!')
@section('keywords', 'Dominican Shuttles, Private Transfers, Airport Pickup, Tourist, Transfers, Airport, Dominican, Tourism, Beach, Hotel, Private, Shuttle', 'Safety')
@section('og-image', asset('images/image-cover.png'))
@section('og-image-url', asset('images/image-cover.png'))
<div>
    <div class="bg-gray-50 py-6">
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
                <span>{{ __('Create new booking') }}</span>
            </div>
            <div class="mb-4">
                {{-- Title --}}
                <h1 class="text-3xl font-bold text-gray-700">{{__('Create new booking')}}</h1>
            </div>
            <div class="">
                <div>
                    {{-- Form --}}
                    <div class="">
                        
                        <div class="mb-4 bg-white p-4 shadow">
                            <div class="">

                                <div class="">
                                    <x-select
                                        label="{{ __('FROM - PICK UP LOCATION') }}"
                                        placeholder="{{ __('Select location') }}"
                                        {{-- icon="location-marker" --}}
                                        wire:model="fromLocation"
                                    >
                                        @foreach ($locAlias as $item)
                                            <x-select.option label="{{ $item->location_name }}" value="{{ $item->id }}" />
                                        @endforeach
                                       
                                    </x-select>
                                </div>
                    
                                <div class="mt-4">
                                    <x-select
                                        label="{{ __('TO - DROP OFF LOCATION') }}"
                                        placeholder="{{ __('Select location') }}"
                                        {{-- icon="location-marker" --}}
                                        wire:model="toLocation"
                                    >
                                        @foreach ($locAlias as $item)
                                            <x-select.option label="{{ $item->location_name }}" value="{{ $item->id }}" />
                                        @endforeach
                                       
                                    </x-select>
                                </div>
                            </div>
                
                            <div class="grid grid-cols-2 mt-4 gap-2">
                                <div class="">
                                    <x-datetime-picker
                                        label="{{ __('Arrival Date') }}"
                                        placeholder="{{ __('Arrival Date') }}"
                                        icon="calendar"
                                        wire:model="arrivalDate"
                                        without-time="true"
                                        parse-format="YYYY-MM-DD"
                                    />
                                    {{-- <label class="mb-1 block text-sm font-medium text-secondary-700 dark:text-gray-400">{{ __('Arrival Date')}}</label>
                                    <input wire:model="arrivalDate" class="py-2 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full sm:py-1.5" type="date" name="arrivalDate" > --}}
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
                            </div>
                
                        </div>
                    </div>
                    {{-- End form --}}
                </div>
            </div>
        
        </div>
    </div>
    
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        @if ($service)
            <div class="flex justify-center mb-2">
                <div wire:loading>
                    <div class="">
                        <img class="mx-auto h-5 w-5 animate-spin" src="{{ asset('images/spiner.png') }}" alt="Spiner">
                    </div>
                    <div class="text-sm text-gray-500">
                        {{ __('Processing') }}...
                    </div>
                </div>
            </div>
        @endif
        
        @if($service and $arrivalDate and $passengers)

            <div class="flex justify-center">
                <button class="px-4 py-2 bg-yellow-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-400 active:bg-yellow-600 focus:outline-none focus:border-yellow-600 focus:ring focus:ring-yellow-300 disabled:opacity-25 transition" type="button" wire:click="cleanFields">{{ __('Clean Fields') }}</button>
            </div>
            <div class="px-2">
                @foreach ($servicePrices as $item)
                    <div class="bg-white shadow-lg mt-4 border">

                        <div class="py-4">
                            @if ($item->price_option_id == 3)
                                <img class="mx-auto w-52" src="{{ asset('images/vehicles/Minivan.png') }}" alt="Minivan">
                                <div class="text-xl font-bold text-center">
                                    {{ __('Minivan') }}
                                </div>
                            @elseif ($item->price_option_id == 5)
                                <img class="mx-auto w-52" src="{{ asset('images/vehicles/crafter.png') }}" alt="Crafter">
                                <div class="text-xl font-bold text-center">
                                    {{ __('Minibus') }}
                                </div>
                            @endif
                        </div>
                        <div class="flex justify-center gap-6 py-4">
                            <div class="text-center">
                                <div class="text-sm text-gray-500">{{ __('Vehicle Size') }}</div>
                                <div class="">
                                    {{ $item->priceOption->name }}
                                </div>
                            </div>
    
                            <div class="text-center">
                                <div class="text-sm text-gray-500">{{ __('Driving Time') }}</div>
                                {{-- {{formatDrivingTime($item->driving_time)}} --}}
                                <div class="">
                                    @if ($service->driving_time_minutes < 60)
                                        {{date('i'.' \m\i\n\s', mktime(0,$service->driving_time_minutes))}}
                                    @elseif ($service->driving_time_minutes < 120)
                                        {{date('H'.' \h\o\u\r '. 'i'.' \m\i\n\s', mktime(0,$service->driving_time_minutes))}}
                                    @else
                                        {{date('H'.' \h\o\u\r\s '. 'i'.' \m\i\n\s', mktime(0,$service->driving_time_minutes))}}
                                    @endif 
                                </div>
                            </div>
                        </div>
                        <div ></div>
                        <div class="p-4 bg-gray-100">
                            <div class="text-gray-600 text-center mb-4 text-xs">
                                {{ __('Please select an option') }}
                            </div>
                            <div class="flex justify-center gap-2">


                                <div class="">
                                    {!! Form::open(['method' => 'POST', 'url' => '/booking/oneway-manual'])  !!}
                    
                                        {{ Form::hidden('service_id', $service->id) }}
                                        {{ Form::hidden('service_price_id', $item->id) }}
                                        {{ Form::hidden('from_place', $service->from) }}
                                        {{ Form::hidden('alias_location_from', $locAliasFrom->location_name) }}
                                        {{ Form::hidden('to_place', $service->to) }}
                                        {{ Form::hidden('alias_location_to', $locAliasTo->location_name) }}
                                        {{ Form::hidden('arrival_date', $arrivalDate) }}
                                        {{ Form::hidden('passengers', $passengers) }}
                                        {{ Form::hidden('oneway_price', $item->oneway_price) }}
                    
                                        {!! Form::button(__('One Way') . ' $' . $item->oneway_price, array(
                                                'type' => 'submit',
                                                'class' => 'inline-flex items-center px-2 py-2 bg-blue-500 border border-transparent rounded-md text-xs text-white tracking-widest hover:bg-blue-400 active:bg-blue-600 focus:outline-none focus:border-blue-600 focus:ring focus:ring-blue-300 disabled:opacity-25 transition'
                                        )) !!}
                                    {!! Form::close() !!}
                                </div>

                                <div class="">
                                    {!! Form::open(['method' => 'POST', 'url' => '/booking/roundtrip-manual'])  !!}
                    
                                        {{ Form::hidden('service_id', $service->id) }}
                                        {{ Form::hidden('service_price_id', $item->id) }}
                                        {{ Form::hidden('from_place', $service->from) }}
                                        {{ Form::hidden('alias_location_from', $locAliasFrom->location_name) }}
                                        {{ Form::hidden('to_place', $service->to) }}
                                        {{ Form::hidden('alias_location_to', $locAliasTo->location_name) }}
                                        {{ Form::hidden('arrival_date', $arrivalDate) }}
                                        {{ Form::hidden('passengers', $passengers) }}
                                        {{ Form::hidden('roundtrip_price', $item->roundtrip_price) }}
                    
                                        {!! Form::button(__('Round Trip') . ' $' . $item->roundtrip_price, array(
                                                'type' => 'submit',
                                                'class' => 'inline-flex items-center px-2 py-2 bg-green-500 border border-transparent rounded-md text-xs text-white tracking-widest hover:bg-green-400 active:bg-green-600 focus:outline-none focus:border-green-600 focus:ring focus:ring-green-300 disabled:opacity-25 transition'
                                        )) !!}
                                    {!! Form::close() !!}
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
