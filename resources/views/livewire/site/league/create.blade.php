<div>
    <button class="bg-blue-500 text-white px-4 py-2 rounded" wire:click="openModal">Créer une ligue</button>

    @if($isOpen)
        <div class="fixed z-10 inset-0 overflow-y-auto">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                </div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class=" sm:mt-0 sm:ml-4 sm:text-left">
                                <h3 class="text-center text-lg leading-6 font-medium text-gray-900">
                                    Créer une nouvelle ligue
                                </h3>
                                <div class="mt-2">
                                    <label for="title" class="text-gray-900 block mb-2 text-sm font-medium">Titre</label>
                                    <input type="text" id="title" required wire:model="league.title"
                                    class="bg-gray-50 border border-gray-300 text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    />
                                </div>
                                <div>
                                    <label for="firstname" class="text-gray-900 block mb-2 text-sm font-medium">Competition</label>
                                    <x-select-list class="form-control" id="competition" name="competition" wire:model="competition" :options="$this->listsForFields['competition']" />
                                        @error('title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                </div>
                                <div>
                                    <label for="email" class="text-gray-900 block mb-2 text-sm font-medium">Sport</label>
                                    <x-select-list class="form-control" id="sport_id" name="sport_id" wire:model="sport" :options="$this->listsForFields['sport']" button="false" multiple/>
                                        @error('title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button type="button" wire:click="createLeague" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                            Enregistrer
                        </button>
                        <button type="button" wire:click="closeModal" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:mt-0 sm:w-auto sm:text-sm">
                            Annuler
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
