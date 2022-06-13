<div>
    <div class="text-xl text-center py-2 mb-4 text-white bg-red-400 rounded-lg">
        <span class="font-bold">{{ __('Contact us') }}</span>
        <span>{{ __('for special prices') }}</span>
    </div>
    <div class="">
        <div class="flex gap-4 mb-4">
            <div class="pt-2 pr-2"><img class="h-6" src="{{ asset('images/icons/telephone.png') }}" alt="Telephone"></div>
            <div>
                <div class="text-sm text-gray-400">{{ __('Phone') }}</div>
                <div class="text-gray-600">+1 829 820 5200</div>
            </div>
        </div>
        <div class="flex gap-6">
            <div class="pt-2"><img class="h-6" src="{{ asset('images/icons/email.png') }}" alt=""></div>
            <div>
                <div class="text-sm text-gray-400">{{ __('Email') }}</div>
                <div class="text-gray-600">info@dominicanshuttles.com</div>
            </div>
        </div>
    </div>

    <div class="mt-4">
        {{-- Form --}}
        <form wire:submit.prevent="submitForm" action="/contact" method="POST">
            @csrf
            <div class="mb-2">
                <x-input wire:model="fullname" label="Full name" name="fullname"/>
                {{-- @error('fullname')
                    <span class="text-sm text-red-400">{{ $message }}</span>
                @enderror --}}
            </div>
        
            <div class="mb-2 ">
                <label class="mb-1 block text-sm font-medium {{ $errors->has('email') ? 'text-negative-600' : 'text-secondary-700' }}  dark:text-gray-400" for="arrival_time">{{ __('Email') }}</label>
                <input class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full" 
                    type="email" 
                    name="email" id="email"
                    wire:model="email"
                >
                @error('email')
                    <span class="text-sm text-negative-600">{{ $message }}</span>
                @enderror
            </div>
        
            <div class="mb-2">
                <x-inputs.phone wire:model="phone" label="Phone"  name="phone"/>
                {{-- @error('phone')
                    <span class="text-sm text-red-400">{{ $message }}</span>
                @enderror --}}
            </div>
        
            <div class="mb-2">
                <x-textarea wire:model="message" label="Message" name="message"/>
                {{-- @error('message')
                    <span class="text-sm text-red-400">{{ $message }}</span>
                @enderror --}}
            </div>
        
            <div class="flex w-full mt-4 rounded-md shadow-sm sm:w-auto">
                <button wire:loading.attr="disabled" type="submit" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-red-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-red-800 focus:outline-none focus:border-re-700 focus:shadow-outline-red transition ease-in-out duration-150 sm:text-sm sm:leading-5">{{__('Quick Contact')}}</button>
                {{-- <div wire:loading>
                    <button type="submit" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-red-300 text-base leading-6 font-medium text-red-800 shadow-sm" disabled><img class="mx-auto h-4 w-4 animate-spin" src="{{ asset('images/spiner.png') }}" alt="Spiner"> &nbsp; {{__('Sending...')}}</button>
                </div> --}}
            </div>
        </form>
    </div>



</div>
