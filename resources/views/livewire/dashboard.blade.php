<div>
    <div class="py-4 max-w-7xl mx-auto sm:px-6 lg:px-8 ">
        {{-- Date Filters --}}
        {{-- <div class="flex gap-4 justify-end">
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
        </div> --}}

        {{-- Counts --}}
        {{-- <div class="flex gap-4 justify-end py-4">
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
        </div> --}}

        <div class="grid grid-cols-5 gap-4 mt-5">
    
            <!-- status -->
            <div class="bg-white shadow px-4 py-2 rounded col-span-1">
                <div class="card-body">
                    <h5 class="uppercase text-xs tracking-wider font-extrabold">today</h5>
                    <h1 class="capitalize text-lg mt-1 mb-1">$<span class="num-3">510</span>  <span class="text-xs tracking-widest font-extrabold"> / <span class="num-2">54</span> orders</span></h1>
                    <p class="capitalize text-xs text-gray-500">( $<span class="num-2">75</span> in the last year )</p>
                </div>
            </div>
            <!-- status -->
        
            <!-- status -->
            <div class="bg-white shadow px-4 py-2 rounded col-span-1">
                <div class="card-body">
                    <h5 class="uppercase text-xs tracking-wider font-extrabold">yesterday</h5>
                    <h1 class="capitalize text-lg mt-1 mb-1">$<span class="num-3">842</span>  <span class="text-xs tracking-widest font-extrabold"> / <span class="num-2">16</span> orders</span></h1>
                    <p class="capitalize text-xs text-gray-500">( $<span class="num-2">53</span> in the last year )</p>
                </div>
            </div>
            <!-- status -->
        
            <!-- status -->
            <div class="bg-white shadow rounded px-4 py-2 col-span-1">
                <div class="card-body">
                    <h5 class="uppercase text-xs tracking-wider font-extrabold">last week</h5>
                    <h1 class="capitalize text-lg mt-1 mb-1">$<span class="num-3">520</span>  <span class="text-xs tracking-widest font-extrabold"> / <span class="num-2">45</span> orders</span></h1>
                    <p class="capitalize text-xs text-gray-500">( $<span class="num-2">55</span> in the last year )</p>
                </div>
            </div>
            <!-- status -->
        
            <!-- status -->
            <div class="bg-white shadow rounded px-4 py-2 col-span-1">
                <div class="card-body">
                    <h5 class="uppercase text-xs tracking-wider font-extrabold">last month</h5>
                    <h1 class="capitalize text-lg mt-1 mb-1">$<span class="num-3">621</span>  <span class="text-xs tracking-widest font-extrabold"> / <span class="num-2">77</span> orders</span></h1>
                    <p class="capitalize text-xs text-gray-500">( $<span class="num-2">4</span> in the last year )</p>
                </div>
            </div>
            <!-- status -->
        
            <!-- status -->
            <div class="bg-white shadow rounded px-4 py-2 col-span-1">
                <div class="card-body">
                    <h5 class="uppercase text-xs tracking-wider font-extrabold">last 90-days</h5>
                    <h1 class="capitalize text-lg mt-1 mb-1">$<span class="num-3">723</span>  <span class="text-xs tracking-widest font-extrabold"> / <span class="num-2">6</span> orders</span></h1>
                    <p class="capitalize text-xs text-gray-500">( $<span class="num-2">77</span> in the last year )</p>
                </div>
            </div>
            <!-- status -->
            
         
        </div>

    </div>
   
</div>
