<div>
    <x-slot name="header">
        <h1 class="text-gray-900">{{__('Bookings')}}</h1>
    </x-slot>

    <div class="py-4 max-w-7xl mx-auto sm:px-6 lg:px-8 ">

        <div class="py-4 mb-2">
            <div class="flex gap-4">
                <x-input label="Order ID" wire:model="order" placeholder="Order ID" />
                <x-input label="Name" wire:model="name" placeholder="Name" />
                <x-input label="Email" wire:model="email" placeholder="Email" />
                <x-datetime-picker
                    label="{{ __('Arrival Date') }}"
                    placeholder="{{ __('Arrival Date') }}"
                    wire:model="arrivalDate"
                    without-time="true"
                />
{{-- 
                <input wire:model="order" class="focus:rwing-2 focus:ring-blue-500 focus:outline-none appearance-none w-full text-sm leading-6 text-slate-900 placeholder-slate-400 rounded-md py-2 pl-10 ring-1 ring-slate-200 shadow-sm mb-2" type="number" aria-label="Filter projects" placeholder="Order">
                <input wire:model="email" class="focus:rwing-2 focus:ring-blue-500 focus:outline-none appearance-none w-full text-sm leading-6 text-slate-900 placeholder-slate-400 rounded-md py-2 pl-10 ring-1 ring-slate-200 shadow-sm mb-2" type="text" placeholder="Email">
                <input wire:model="email" class="focus:rwing-2 focus:ring-blue-500 focus:outline-none appearance-none w-full text-sm leading-6 text-slate-900 placeholder-slate-400 rounded-md py-2 pl-10 ring-1 ring-slate-200 shadow-sm mb-2" type="text" placeholder="Email"> --}}
            </div>
        </div>

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
                            <div>
                                {{$booking->alias_location_from}}
                            </div>
                        </div>
                        <div>
                            <div class="text-xs text-gray-500">{{ __('TO') }}</div>
                            <div>
                                {{$booking->alias_location_to}}
                            </div>
                        </div>
                        <div>
                            <div class="text-xs text-gray-500">{{ __('ARRIVAL DATE') }}</div>
                            <div>
                            20 April 2022, 2:30 pm
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

                        <x-button
                            href="https://google.com"
                            target="_blank"
                            label="{{ __('Open') }}"
                            icon="eye"
                        />
                        <div class="text-gray-500 align-middle py-2">
                            {{ $booking->created_at->diffForHumans() }}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        
        {{ $bookings->links() }}
       
    </div>
