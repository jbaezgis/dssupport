<div>
    <div class="max-w-3xl mx-auto py-4">
        <div class="mb-4 bg-white p-4 shadow rounded">
            <div class="mb-4">
                <x-select
                    label="FROM - PICK UP LOCATION"
                    placeholder="Select from location"
                    wire:model="fromLocation"
                >
                    @foreach ($locAlias as $item)
                        <x-select.option label="{{ $item->location_name }}" value="{{ $item->id }}" />
                    @endforeach
                   
                </x-select>
            </div>

            <div class="">
                <x-select
                    label="TO - DROP OFF LOCATION"
                    placeholder="Select to location"
                    wire:model="toLocation"
                >
                    @foreach ($locAlias as $item)
                        <x-select.option label="{{ $item->location_name }}" value="{{ $item->id }}" />
                    @endforeach
                   
                </x-select>
            </div>

        </div>

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

        @if($service)

            {{-- <div class="bg-white py-4 px-2 shadow rounded">

                <div class="w-custom mx-auto flex justify-center items-end gap-4 px-4">
                    <label class="w-48 ">
                        <div class="bg-white rounded-lg px-4 py-2 border border-gray-200 hover:bg-blue-50 focus:shadow-blue-400 hover:border-blue-600 peer-checked:bg-blue-200 mb-8">
            
                            <x-icon name="arrow-narrow-right" class="w-5 h-5" />
                            <div class="flex justify-between items-center mb-3">
                                <h1 class="uppercase text-base tracking-wide text-gray-600">{{ __('One Way') }}</h1>
                                <input class="peer" type="radio" name="type" value="oneway" checked wire:model="type">
                            </div>
                        </div>
                    </label>
            
                    <label class="w-48 bg-white rounded-lg px-4 py-2 border border-gray-200 hover:bg-blue-50 focus:shadow-blue-400 hover:border-blue-600 mb-8">
                        <x-icon name="switch-horizontal" class="w-5 h-5" />
                        <div class="flex justify-between items-center mb-3">
                            <h1 class="uppercase text-base tracking-wide text-gray-600">{{ __('Round Trip') }}</h1>
                            <input class="peer" type="radio" name="type" value="roundtrip" wire:model="type">
                        </div>
                    </label>
                </div>
                
            </div> --}}

            <div class="px-2">
                @foreach ($servicePrices as $item)
                    <div class="bg-white shadow-lg mt-4 rounded-t-lg ">
                        <div class="pt-4 flex justify-center">
                            <div class="">
                                <div class="flex">
                                    <div class="text-blue-600 p-2">
                                        <x-icon name="location-marker" class="w-5 h-5" />
                                    </div>
                                    <div class="p-2">
                                        {{ $locAliasFrom->location_name }}
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
                                        {{ $locAliasTo->location_name }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-center gap-6 py-4">
                            <div class="text-center">
                                <div class="text-sm text-gray-500">{{ __('VEHICLE SIZE') }}</div>
                                <div class="">
                                    {{ $item->priceOption->name }}
                                </div>
                            </div>
    
                            <div class="text-center">
                                <div class="text-sm text-gray-500">{{ __('DRIVING TIME') }}</div>
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
                        {{-- <div class="">
                            <div class="text-sm text-gray-500">{{ __('PRICE') }}</div>
                            @if($type == 'oneway')
                                <div class="text-xl font-bold">${{number_format($service->prices->first()['oneway_price'],2,'.',',')}}</div>
                            @else
                                <div class="text-xl font-bold">${{number_format($service->prices->first()['roundtrip_price'],2,'.',',')}}</div>
                            @endif
                        </div> --}}
                        <div class="p-4 bg-gray-100">
                            <div class="text-gray-600 text-center mb-4">
                                {{ __('Please select an option') }}
                            </div>
                            <div class="flex justify-center gap-4">
                                <a 
                                    class="inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md text-xs text-white tracking-widest hover:bg-blue-400 active:bg-blue-600 focus:outline-none focus:border-blue-600 focus:ring focus:ring-blue-300 disabled:opacity-25 transition" 
                                    href="{{url('request-ground-transfer-service?service='.$service->id.'&way=oneway&aFrom='.$fromLocation.'&aTo='.$toLocation)}}">
                                    {{ __('One Way') }} ${{ $item->oneway_price }}
                                </a>
    
                                <a 
                                    class="inline-flex items-center px-4 py-2 bg-green-500 border border-transparent rounded-md text-xs text-white tracking-widest hover:bg-green-400 active:bg-green-600 focus:outline-none focus:border-green-600 focus:ring focus:ring-green-300 disabled:opacity-25 transition" 
                                    href="{{url('request-ground-transfer-service?service='.$service->id.'&way=roundtrip&aFrom='.$fromLocation.'&aTo='.$toLocation)}}">
                                    {{ __('Round Trip') }} ${{ $item->roundtrip_price }}
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    {{-- <h1>Testing</h1> --}}
</div>
