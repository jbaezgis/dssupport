@section('title', 'Home')
@section('description', 'Best Transfers in the DR!')
@section('keywords', 'Airport, Transportation, Private Shuttle, Transfer Service')
@section('og-image', asset('images/image-cover.png'))
@section('og-image-url', asset('images/image-cover.png'))
<div>
    <div class="bg-gray-50 py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="">
                <div>
                    {{-- Form --}}
                    <div class="px-2">
                        <div class="mb-4 bg-white p-4 shadow">
                            <div class="">
                                <x-select
                                    label="FROM - PICK UP LOCATION"
                                    placeholder="Select from location"
                                    icon="location-marker"
                                    wire:model="fromLocation"
                                >
                                    @foreach ($locAlias as $item)
                                        <x-select.option label="{{ $item->location_name }}" value="{{ $item->id }}" />
                                    @endforeach
                                   
                                </x-select>
                            </div>
                
                            <div class="mt-4">
                                <x-select
                                    label="TO - DROP OFF LOCATION"
                                    placeholder="Select to location"
                                    icon="location-marker"
                                    wire:model="toLocation"
                                >
                                    @foreach ($locAlias as $item)
                                        <x-select.option label="{{ $item->location_name }}" value="{{ $item->id }}" />
                                    @endforeach
                                   
                                </x-select>
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
                                </div>
                
                                <div class="">
                                    <x-select
                                        label="Passengers"
                                        placeholder="Passengers"
                                        wire:model="passengers"
                                        {{-- clearable --}}
                                        icon="users"
                                        :options="['1', '2', '3', '4', '5', '6', '7', '8', '9', '10']"
                                    />
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
        <div class="flex justify-center mb-2">
            <div wire:loading>
                <div class="">
                    <img class="mx-auto h-5 w-5 animate-spin" src="{{ asset('images/spiner.png') }}" alt="">
                </div>
                <div class="text-sm text-gray-500">
                    {{ __('Processing') }}...
                </div>
            </div>
        </div>
        
        @if($service and $arrivalDate and $passengers)

            <div class="px-2">
                @foreach ($servicePrices as $item)
                    <div class="bg-white shadow-lg mt-4 border">

                        <div class="py-4">
                            @if ($item->price_option_id == 3)
                                <img class="mx-auto w-52" src="{{ asset('images/vehicles/Minivan.png') }}" alt="">
                                <div class="text-xl font-bold text-center">
                                    {{ __('Minivan') }}
                                </div>
                            @elseif ($item->price_option_id == 5)
                                <img class="mx-auto w-52" src="{{ asset('images/vehicles/crafter.png') }}" alt="">
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
                                    {!! Form::open(['method' => 'POST', 'url' => '/booking/oneway'])  !!}
                    
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
                                    {!! Form::open(['method' => 'POST', 'url' => '/booking/roundtrip'])  !!}
                    
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

    {{-- <h1>Testing</h1> --}}
</div>
