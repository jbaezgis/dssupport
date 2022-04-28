<x-slot name="header">
    <h1 class="text-gray-900">{{__('Task Status')}}</h1>
</x-slot>

<div class="py-4 max-w-7xl mx-auto sm:px-6 lg:px-8 ">
    <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg px-4 py-4">
        @if(session()->has('message'))
            <div class="bg-teal-100 rounded-b text-teal-900 px-4 py-4 shadow-md mb-2" role="alert">
                <div class="flex">
                    <div>
                        <h4>{{ session('message')}}</h4>
                    </div>
                </div>
            </div>
        @endif
        
        {{-- <div class="flex gap-4">
            <input wire:model="search" class="focus:ring-2 focus:ring-blue-500 focus:outline-none appearance-none w-full text-sm leading-6 text-slate-900 placeholder-slate-400 rounded-md py-2 pl-10 ring-1 ring-slate-200 shadow-sm mb-2" type="text" aria-label="Filter tasks" placeholder="Filter projects...">
            <x-buttons.primary class="" wire:click="clearSearch">{{__('X')}} </x-buttons.primary>
        </div> --}}

        <x-buttons.primary wire:click="create()">New</x-buttons.primary>
        @if($modal)
            @include('livewire.task-status.create-status')
        @endif
        
        @if($taskStatus->count())
            <table class="table-fixed w-full mt-2">
                <thead>
                    <tr class="bg-gray-100 text-gray-800 text-left">
                        <th class="border px-4 py-2">ID</th>
                        <th class="border px-4 py-2">{{__('Name')}}</th>
                        <th class="border px-4 py-2">{{__('Actions')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($taskStatus as $status)
                        <tr>
                            <td class="border px-4 py-2">{{$status->id}}</td>
                            <td class="border px-4 py-2">{{$status->name}}</td>
                    
                            <td class="border px-4 py-2">
                                <x-buttons.primary wire:click="edit({{$status->id}})">{{__('Edit')}} </x-buttons.primary>
                                <x-buttons.danger wire:click="delete({{$status->id}})">{{__('Delete')}} </x-buttons.danger>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="px-4 py-3 border-t border-gray-200 sm:px-6 mt-4 text-gray-500">
                {{__('Try another search or add some data!')}}
            </div>
        @endif
    </div>
</div>