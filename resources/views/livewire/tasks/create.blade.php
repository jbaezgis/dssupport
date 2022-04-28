<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-300">
    <div class="flex justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>

        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <form>
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    {{-- <input type="hidden" name="status_id" wire:model="status_id"> --}}

                    <x-select
                        label="Select Project"
                        placeholder="Select one project"
                        wire:model.defer="project_id"
                    >
                        @foreach ($projects as $project)
                            
                        @endforeach
                        <x-select.option label="{{ $project->name }}" value="{{ $project->id }}" />
                    </x-select>
                    <x-input class="mb-2" label="Name" placeholder="your name" id="name" wire:model="name"/>
                    <x-textarea label="Details" placeholder="Write your details" id="details" wire:model="details"/>

                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <x-button wire:click.prevent="saveTask()" icon="check" primary label="{{ __('Save') }}" />

                        <x-button  class="mr-2" wire:click="closeModal()" icon="x" label="{{ __('Cancel') }}" />
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>