<div>
    <x-slot name="header">
        <h1 class="text-gray-900">{{__('Bookings')}}</h1>
    </x-slot>

    <div class="py-4 max-w-7xl mx-auto sm:px-6 lg:px-8 ">
        {{-- Date Filters --}}
        {{-- <h1>oldest: {{ $fromDate2 }}</h1>
        <h1>newst: {{ $toDate2 }}</h1> --}}
       
        <div class="flex gap-4 justify-end">
            <div class="text-gray-600">Date range</div>
            <x-datetime-picker
                {{-- label="{{ __('From Date') }}" --}}
                placeholder="{{ __('From Date') }}"
                wire:model="fromDate"
                without-time="true"
                parse-format="YYYY-MM-DD"
            />
            <x-datetime-picker
                {{-- label="{{ __('To Date') }}" --}}
                placeholder="{{ __('To Date') }}"
                wire:model="toDate"
                without-time="true"
                parse-format="YYYY-MM-DD"
            />
        </div>

        {{-- Counts --}}
        
        {{-- @foreach ($locations as $item)
            ['name' => '{{ $item->location_name }}',  'id' => '{{ $item->id }}'],
        @endforeach --}}

        <div class="py-4 mb-2">
            <div class="flex gap-4">
                <x-input label="Order ID" wire:model="order" placeholder="Order ID" />
                <x-input label="Name" wire:model="name" placeholder="Name" />
                <x-input label="Email" wire:model="email" placeholder="Email" />

                {{-- <x-select
                    label="From Location"
                    placeholder="Select From"
                    :options="[
                       
                            ['name' => 'Prueba',  'id' => 1],
                            ['name' => 'Prueba',  'id' => 2],
                            ['name' => 'Prueba',  'id' => 3],
                            ['name' => 'Prueba',  'id' => 4],
                            ['name' => 'Prueba',  'id' => 5],
                            ['name' => 'Prueba',  'id' => 6],
                            ['name' => 'Prueba',  'id' => 7],
                            ['name' => 'Prueba',  'id' => 8],
                        
                    ]"
                    option-label="name"
                    option-value="id"
                    wire:model.defer="model"
                /> --}}
                {{-- <x-datetime-picker
                    label="{{ __('Arrival Date') }}"
                    placeholder="{{ __('Arrival Date') }}"
                    wire:model="arrivalDate"
                    without-time="true"
                    parse-format="YYYY-MM-DD"
                /> --}}
{{-- 
                <input wire:model="order" class="focus:rwing-2 focus:ring-blue-500 focus:outline-none appearance-none w-full text-sm leading-6 text-slate-900 placeholder-slate-400 rounded-md py-2 pl-10 ring-1 ring-slate-200 shadow-sm mb-2" type="number" aria-label="Filter projects" placeholder="Order">
                <input wire:model="email" class="focus:rwing-2 focus:ring-blue-500 focus:outline-none appearance-none w-full text-sm leading-6 text-slate-900 placeholder-slate-400 rounded-md py-2 pl-10 ring-1 ring-slate-200 shadow-sm mb-2" type="text" placeholder="Email">
                <input wire:model="email" class="focus:rwing-2 focus:ring-blue-500 focus:outline-none appearance-none w-full text-sm leading-6 text-slate-900 placeholder-slate-400 rounded-md py-2 pl-10 ring-1 ring-slate-200 shadow-sm mb-2" type="text" placeholder="Email"> --}}
            </div>
        </div>

        <div class="flex gap-4 py-2">
            <div class="text-center bg-white shadow-sm py-2 px-6 rounded">
                <p>{{ __('All Bookings') }}</p>
                <h2 class="text-xl font-bold">{{ $bookingsCount }}</h2>
            </div>

            <div class="text-center bg-white shadow-sm py-2 px-6  rounded">
                <p>{{ __('Peding') }}</p>
                <h2 class="text-xl font-bold">{{ $pendingCount }}</h2>
            </div>

            <div class="text-center bg-white shadow-sm py-2 px-6  rounded">
                <p>{{ __('Paid') }}</p>
                <h2 class="text-xl font-bold">{{ $paidCount }}</h2>
            </div>
        </div>

        <div class="pt-4 pb-2 flex">
            <x-select
                label="Per page"
                {{-- placeholder="Select one status" --}}
                :options="['15', '25', '50', '100']"
                wire:model="perPage"
            />
            <div></div>
        </div>

        {{-- <div class="py-4">
            Showing {{ $bookings->firstItem() }} to {{ $bookings->lastItem() }} of {{ $bookings->total() }} results 
        </div> --}}

        @foreach ($bookings as $booking)
            <div class="bg-white border-b border-gray-200 rounded shadow mb-4">
                <div class="px-4 py-2">
                    <div class="flex gap-4 mb-2 border-b border-gray-100 py-2">
                        <div>
                            <div class="text-xs text-gray-500">ID</div>
                            <div>
                                {{ $booking->id }}
                            </div>
                        </div>
                        <div>
                            <div class="text-xs text-gray-500">BOOKING TYPE</div>
                            <div>
                                {{ $booking->bookingtype }}
                            </div>
                        </div>
                        <div>
                            <div class="text-xs text-gray-500">TYPE</div>
                            <div>
                                {{ $booking->type }}
                            </div>
                        </div>

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
                    {{-- <div class="flex gap-4 mb-2 border-b border-gray-100 py-2">
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
                    </div> --}}

                    <div>
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
                    </div>
        
                </div>
                
                <div class="bg-gray-100 px-4 py-2"> 
                    <div class="flex gap-4">
                        <div>
                            <a class="inline-flex items-center px-4 py-2 bg-gray-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-400 active:bg-gray-600 focus:outline-none focus:border-gray-600 focus:ring focus:ring-gray-300 disabled:opacity-25 transition" href="{{ url('booking/'.$booking->id) }}" target="_blank">Open</a>
                        </div>
                        
                        <div class="text-gray-500 align-middle py-2">
                            {{ $booking->created_at->diffForHumans() }}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        
        {{ $bookings->links() }}
       
    </div>
