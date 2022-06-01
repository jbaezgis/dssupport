<div>
    <div class="max-w-3xl mx-auto p-4">
        <div class="bg-white rounded">
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
                <div class="">
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

                <div class="">
                    <div class="text-sm text-gray-500">{{ __('Driving Time') }}</div>
                    {{-- {{formatDrivingTime($item->driving_time)}} --}}
                    <div class="">
                        @if ($booking->service->driving_time_minutes < 60)
                            {{date('i'.' \m\i\n\s', mktime(0,$service->driving_time_minutes))}}
                        @elseif ($booking->service->driving_time_minutes < 120)
                            {{date('H'.' \h\o\u\r '. 'i'.' \m\i\n\s', mktime(0,$booking->service->driving_time_minutes))}}
                        @else
                            {{date('H'.' \h\o\u\r\s '. 'i'.' \m\i\n\s', mktime(0,$booking->service->driving_time_minutes))}}
                        @endif 
                    </div>
                </div>

                <div class="">
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

                <div class="">
                    <div class="text-sm text-gray-500">{{ __('Order Total') }}</div>
                    {{-- {{formatDrivingTime($item->driving_time)}} --}}
                    <div class="">
                        ${{ number_format($booking->order_total, 2, '.', ',') }}
                    </div>
                </div>
            </div>

            {{-- <div class="flex justify-center gap-6 py-4">

            </div> --}}
        </div>{{-- bg-white --}}

        {{-- Form --}}
        <div class="mt-4">
            <form>
                <div class="text-lg font-bold text-gray-600 my-6 border-b border-gray-200">
                    {{ __('Contact Details') }}
                </div>
                <div class="mb-2">
                    <x-input placeholder="Full name" />
                </div>
                
                <div class="mb-2">
                    <x-input placeholder="Email" />
                </div>
                <div class="mb-2">
                    <x-inputs.phone placeholder="Phone"  />
                </div>

                <div class="mb-2">
                    <x-select
                        {{-- label="Select Status" --}}
                        placeholder="Preferred language"
                        wire:model="language"
                    >
                        <x-select.option label="English" value="en" />
                        <x-select.option label="Español" value="es" />
                    </x-select>
                </div>

                <div class="text-lg font-bold text-gray-600 my-6 border-b border-gray-200">
                    {{ __('Arrival Information') }}
                </div>

                <div class="mb-2">
                    <x-datetime-picker
                        {{-- label="{{ __('To Date') }}" --}}
                        placeholder="{{ __('Arrival date') }}"
                        wire:model="toDate"
                        without-time="true"
                        parse-format="YYYY-MM-DD"
                    />
                </div>

                <div class="mb-2">
                    <x-time-picker
                        placeholder="Arrival time"
                        wire:model.defer="timePicker"
                    />
                </div>
                <div class="mb-2">
                    <x-input placeholder="Arrival airline" />
                </div>
                <div class="mb-2">
                    <x-input placeholder="Arrival flight" />
                </div>

                <div class="mb-2">
                    <div class="text-sm text-gray-600">
                        {{ __('Please enter the name of your hotel or the address of your drop off location, as well as any additional information we should know.') }}
                    </div>
                    <x-textarea placeholder="More information" />
                </div>
            </form>
        </div>

        <div class="flex justify-center mt-4">
            <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                <button type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-blue-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-blue-800 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                    {{__('Save and Continue')}}
                </button>
                {{-- <button wire:click.prevent="save()" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-blue-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-blue-800 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                    {{__('Save and Continue')}}
                </button> --}}
            </span>
        </div>

    </div>{{-- main div --}}
</div>
