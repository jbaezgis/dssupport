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
                        <x-select.option label="{{ $item->location_name }}" value="{{ $item->location_id }}" />
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
                        <x-select.option label="{{ $item->location_name }}" value="{{ $item->location_id }}" />
                    @endforeach
                   
                </x-select>
            </div>

        </div>

        @if($services->count())
            <div class="bg-white p-4 shadow">
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

                <div class="w-custom mx-auto flex justify-center items-end gap-4 px-4">
                    <label class="w-48 ">
                        <div class="bg-white rounded-lg px-4 py-2 border border-gray-200 hover:bg-blue-50 focus:shadow-blue-400 hover:border-blue-600 peer-checked:bg-blue-200 mb-8">
            
                            <x-icon name="arrow-narrow-right" class="w-5 h-5" />
                            <div class="flex justify-between items-center mb-3">
                                <h1 class="uppercase text-base tracking-wide text-gray-600">{{ __('One Way') }}</h1>
                                <input class="peer" type="radio" name="type" value="oneway" checked wire:model="type">
                            </div>
                        </div>
                        {{-- <div class="text-2xl">$250</div> --}}
                    </label>
            
                    <label class="w-48 bg-white rounded-lg px-4 py-2 border border-gray-200 hover:bg-blue-50 focus:shadow-blue-400 hover:border-blue-600 mb-8">
                        <x-icon name="switch-horizontal" class="w-5 h-5" />
                        <div class="flex justify-between items-center mb-3">
                            <h1 class="uppercase text-base tracking-wide text-gray-600">{{ __('Round Trip') }}</h1>
                            <input class="peer" type="radio" name="type" value="roundtrip" wire:model="type">
                        </div>
                        {{-- <div class="text-2xl">$500</div> --}}
                    </label>
                </div>
                
                @foreach ($services as $item)
                    <div class="mb-4 flex justify-center">
                        <div class="">
                            <div class="flex">
                                <div class="text-blue-600 p-2">
                                    <x-icon name="location-marker" class="w-5 h-5" />
                                </div>
                                <div class="p-2">
                                    {{ $item->fromLocation->location_name }}
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
                                    {{ $item->toLocation->location_name }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4 flex justify-center py-4 gap-6">
                        
                        <div class="">
                            <div class="text-sm text-gray-500 text-center">{{ __('DRIVING TIME') }}</div>
                            {{-- {{formatDrivingTime($item->driving_time)}} --}}
                            <div class="text-xl font-bold text-center">
                                {{ date('H \h i \m\i\n', mktime(0,$item->driving_time_minutes)) }}
                            </div>
                        </div>
                        <div ></div>
                        <div class="">
                            <div class="text-sm text-gray-500 text-center">{{ __('PRICE') }}</div>
                            @if($type == 'oneway')
                                <div class="text-xl font-bold text-center">${{number_format($item->prices->first()['oneway_price'],2,'.',',')}}</div>
                            @else
                                <div class="text-xl font-bold text-center">${{number_format($item->prices->first()['roundtrip_price'],2,'.',',')}}</div>
                            @endif
                        </div>
                    </div>
                    <div class="flex justify-center">
                        <a 
                            class="inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-400 active:bg-blue-600 focus:outline-none focus:border-blue-600 focus:ring focus:ring-blue-300 disabled:opacity-25 transition" 
                            href="{{url('request-ground-transfer-service?service='.$item->id.'&way=oneway&aFrom='.$fromLocation.'&aTo='.$toLocation)}}">
                            {{ __('Continue') }}
                        </a>
                    </div>
                @endforeach

            @endif
        </div>
    </div>

    {{-- <h1>Testing</h1> --}}
</div>
