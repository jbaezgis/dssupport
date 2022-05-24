<div>
    <div class="py-4 max-w-7xl mx-auto sm:px-6 lg:px-8 ">
        {{-- Date Filters --}}
        <div class="flex gap-4 justify-end">
            <x-datetime-picker
                label="{{ __('From Date') }}"
                placeholder="{{ __('From Date') }}"
                wire:model="fromDate"
                without-time="true"
            />
            <x-datetime-picker
                label="{{ __('To Date') }}"
                placeholder="{{ __('To Date') }}"
                wire:model="toDate"
                without-time="true"
            />
        </div>

        {{-- Counts --}}
        <div class="flex gap-4 justify-end py-4">
            <x-card>
                <p>{{ __('All Bookings') }}</p>
                <h2 class="text-xl font-bold">{{ $bookingsCount }}</h2>
            </x-card>
            <x-card>
                <p>{{ __('Peding') }}</p>
                <h2 class="text-xl font-bold">{{ $pendingCount }}</h2>
            </x-card>
            <x-card>
                <p>{{ __('Paid') }}</p>
                <h2 class="text-xl font-bold">{{ $paidCount }}</h2>
            </x-card>
        </div>
    </div>
   
</div>
