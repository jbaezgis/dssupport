<div>
    <x-slot name="header">
        <h1 class="text-gray-900">{{__('Bookings')}}</h1>
    </x-slot>

    <div class="py-4 max-w-7xl mx-auto sm:px-6 lg:px-8 ">
        <div class="flex gap-4">
            <input wire:model="order" class="focus:ring-2 focus:ring-blue-500 focus:outline-none appearance-none w-full text-sm leading-6 text-slate-900 placeholder-slate-400 rounded-md py-2 pl-10 ring-1 ring-slate-200 shadow-sm mb-2" type="text" aria-label="Filter projects" placeholder="Order">
            {{-- <input wire:model="searchStartDate" class="focus:ring-2 focus:ring-blue-500 focus:outline-none appearance-none w-full text-sm leading-6 text-slate-900 placeholder-slate-400 rounded-md py-2 pl-10 ring-1 ring-slate-200 shadow-sm mb-2" type="date">
            <x-buttons.primary class="" wire:click="clearSearch">{{__('X')}} </x-buttons.primary> --}}
        </div>

        <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg px-4 py-4">
                <div class="flex flex-col">
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-hidden">
                            <table class="min-w-full">
                                <thead class="border-b">
                                <tr>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        {{ __('Order ID') }}
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        {{ __('Service') }}
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        {{ __('Name') }}
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        {{ __('Email') }}
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        {{ __('Status') }}
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bookings as $booking)
                                        <tr class="border-b">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $booking->id }}</td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                <strong>{{ $booking->bookingtype }} </strong> <br /> {{$booking->alias_location_from}} to {{$booking->alias_location_to}} <br />
                                                <i><span class="label label-primary">{{ $booking->created_at->diffForHumans() }}</span></i>
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{$booking->fullname}}</td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{$booking->email}}</td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $bookings->links() }}
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
