<div>
    <form wire:submit.prevent="submit" class="flex flex-col w-full pt-4 space-y-4">
        <div>
            <label for="name" class="block mb-2 text-sm font-medium text-white dark:text-white">Nom</label>
            <input type="text" id="name"
            class="bg-gray-50 border border-gray-300 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
            />
        </div>
        <div>
            <label for="firstname" class="block mb-2 text-sm font-medium text-white dark:text-white">Prénom</label>
            <input type="text" id="firstname" required wire:model.defer="user.firstname"
            class="bg-gray-50 border border-gray-300 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
            />
        </div>
        <div>
            <label for="email" class="block mb-2 text-sm font-medium text-white dark:text-white">Email</label>
            <input type="text" id="email" required wire:model.defer="user.email"
            class="bg-gray-50 border border-gray-300 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"/>
        </div>

        <div class="flex justify-between">
            <button class="bg-green-500 text-white px-4 py-2 rounded" type="submit">
                {{ trans('global.save') }}
            </button>
            <a href="{{ route('admin.users.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">
                {{ trans('global.cancel') }}
            </a>
        </div>
    </form>
</div>
