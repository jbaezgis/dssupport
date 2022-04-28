<x-slot name="header">
    <h1 class="text-gray-900">{{$project->name}}</h1>
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
        
        <input class="focus:ring-2 focus:ring-blue-500 focus:outline-none appearance-none w-full text-sm leading-6 text-slate-900 placeholder-slate-400 rounded-md py-2 pl-10 ring-1 ring-slate-200 shadow-sm mb-2" type="text" aria-label="Filter projects" placeholder="Filter projects...">

        <x-buttons.primary wire:click="createTask()">New</x-buttons.primary>
        @if($modal)
            @include('livewire.projects.create-task')
        @endif

        <table class="table-fixed w-full mt-2">
            <thead>
                <tr class="bg-gray-100 text-gray-800 text-left">
                    <th class="border px-4 py-2">ID</th>
                    <th class="border px-4 py-2">{{__('Name')}}</th>
                    <th class="border px-4 py-2">{{__('Start Date')}}</th>
                    <th class="border px-4 py-2">{{__('End')}}</th>
                    <th class="border px-4 py-2">{{__('Status')}}</th>
                    <th class="border px-4 py-2">{{__('Progress')}}</th>
                    <th class="border px-4 py-2">{{__('Actions')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                    <tr>
                        <td class="border px-4 py-2">{{$task->id}}</td>
                        <td class="border px-4 py-2">{{$task->name}}</td>
                        <td class="border px-4 py-2">{{$task->start_date}}</td>
                        <td class="border px-4 py-2">{{$task->estimate_end}}</td>
                        <td class="border px-4 py-2">{{$task->status_id}}</td>
                        <td class="border px-4 py-2">
                            <div class="space-y-4">
                                <div class="w-{{$task->progress}} bg-blue-600 shadow rounded text-white text-center">
                                    {{$task->progress}}%
                                </div>
                            </div>
                        </td>
                        <td class="border px-4 py-2">
                            <x-alinks.secondary href="{{ url('task/'.$task->id)}}">{{__('See')}} </x-alinks.secondary>
                            <x-buttons.primary wire:click="editTask({{$task->id}})">{{__('Edit')}} </x-buttons.primary>
                            <x-buttons.danger wire:click="deleteTask({{$task->id}})">{{__('Delete')}} </x-buttons.danger>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>