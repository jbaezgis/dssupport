@section('title', __('Logs'))
<div>
    <div class="max-w-7xl mx-auto px-2 py-6">
        <div class="">
            <div class="flex justify-between">
                <div>
                    {{-- Title --}}
                    <h1 class="text-3xl font-bold text-gray-700">{{__('Logs for this month')}}</h1>
            </div>
            </div>

            <div class="flex gap-4 py-2 rounded-b mb-2 text-gray-600">
                {{-- Counts --}}
                <div class="shadow rounded p-2">
                    <div>
                        <strong>{{ __('Totay') }}:</strong> {{ $today }} {{ __('visits') }}
                    </div>
                    {{-- <div class="flex gap-2">
                        <div>
                            {{ __('Mobile') }}: <span class="font-bold">{{ $todayMobile }}</span>
                        </div>
                        <div>
                            |
                        </div>
                        <div class="text-green-600">
                            {{ __('PC') }}: <span class="font-bold">{{ $todayPC }}</span>
                        </div>
                    </div> --}}

                    <div>
                        {{ __('Only') }} {{ $todayRequest }} ({{ number_format($todayPercentage, 1, '.', '') }}%) {{ __('sent a booking request.') }}
                    </div>
                </div>

                <div class="shadow rounded p-2">
                    <div>
                        <strong>{{ __('This month') }}:</strong> {{ $thisMonth }} {{ __('visits') }}
                    </div>
                    {{-- <div class="flex gap-2">
                        <div>
                            {{ __('Mobile') }}: <span class="font-bold">{{ $thisMonthMobile }}</span>
                        </div>
                        <div>
                            |
                        </div>
                        <div class="text-green-600">
                            {{ __('PC') }}: <span class="font-bold">{{ $thisMonthPC }}</span>
                        </div>
                    </div> --}}

                    <div>
                        {{ __('Only') }} {{ $thisMonthRequest }} ({{ number_format($thisMonthPercentage, 1, '.', '') }}%) {{ __('sent a booking request.') }}
                    </div>
                </div>

                
            </div>

            <div class="flex gap-2 mb-4">
                <x-jet-input id="search" class="block mt-1" type="text" name="search"
                    wire:model.debounce.500ms="search" placeholder="Device or Action"/>
                
                <x-yellow-button wire:click="resetSearch">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                    </svg>
                </x-yellow-button>
            </div>
            {{-- table --}}
            <div class="flex justify-center text-gray-500">
                <svg wire:loading xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 animate-spin mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                </svg>
                <span wire:loading class="text-sm mb-2">
                    {{ __('Loading') }}...
                </span>
            </div>
            <div>
                <div class="shadow-sm overflow-hidden my-8">
                    <table class="border-collapse table-auto w-full text-sm">
                    <thead>
                        <tr>
                            <th class="border-b font-medium p-4 pb-3 text-left">{{ __('Date') }}</th>
                            <th class="border-b font-medium p-4 pb-3 text-left">{{ __('Type') }}</th>
                            <th class="border-b font-medium p-4 pb-3 text-left">{{ __('Module') }}</th>
                            <th class="border-b font-medium p-4 pb-3 text-left">{{ __('IP') }}</th>
                            <th class="border-b font-medium p-4 pb-3 text-left">{{ __('Action') }}</th>
                            <th class="border-b font-medium p-4 pb-3 text-left">{{ __('Device') }}</th>
                        </tr>
                    </thead>
                        <tbody class="bg-white">
                            @foreach ($logs as $item)
                                <tr>
                                    <td class="border-b border-gray-100 p-4 text-gray-500">{{ $item->created_at }}</td>
                                    <td class="border-b border-gray-100 p-4 text-gray-900">{{ $item->type }}</td>
                                    <td class="border-b border-gray-100 p-4 text-gray-900">{{ $item->module }}</td>
                                    <td class="border-b border-gray-100 p-4 text-gray-900">{{ $item->ip }}</td>                                
                                    <td class="border-b border-gray-100 p-4 text-gray-900">{{ $item->action }}</td>                                                               
                                    <td class="border-b border-gray-100 p-4 text-gray-900">{{ $item->user_agent }}</td>                                                               
                                </tr>
                                
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $logs->links() }}
            </div> {{-- end table --}}
        </div>
    </div>
</div>
