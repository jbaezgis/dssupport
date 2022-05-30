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

        <div class="bg-white p-4 shadow">
            <div class="w-custom mx-auto pt-4 pb-6 flex justify-center items-end gap-4 px-4">
                <label class="w-48 ">
                    <div class="bg-white rounded-lg px-4 py-2 border border-gray-200 hover:bg-blue-50 focus:shadow-blue-400 hover:border-blue-600 peer-checked:bg-blue-200 mb-8">
        
                        <x-icon name="arrow-narrow-right" class="w-5 h-5" />
                        <div class="flex justify-between items-center mb-3">
                            <h1 class="uppercase text-base tracking-wide text-gray-600">{{ __('One Way') }}</h1>
                            <input class="peer" type="radio" name="test" value="small" checked>
                        </div>
                    </div>
                    {{-- <div class="text-2xl">$250</div> --}}
                </label>
        
                <label class="w-48 bg-white shadow-lg px-4 py-2 border border-gray-200 hover:bg-blue-50 focus:shadow-blue-400 hover:border-blue-600 mb-8">
                    <x-icon name="switch-horizontal" class="w-5 h-5" />
                    <div class="flex justify-between items-center mb-3">
                        <h1 class="uppercase text-base tracking-wide text-gray-600">{{ __('Round Trip') }}</h1>
                        <input class="peer" type="radio" name="test" value="small">
                    </div>
                    {{-- <div class="text-2xl">$500</div> --}}
                </label>
            </div>
            
            @foreach ($services as $item)
                <div>
                    {{ $item->fromlocation->location_name }}
                </div>
            @endforeach
        </div>
    </div>

    {{-- <h1>Testing</h1> --}}
</div>
