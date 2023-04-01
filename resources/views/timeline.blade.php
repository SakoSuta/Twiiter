<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Timeline') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="" class="flex flex-col">
                        <label for="" class="font-semibold">Share to the world what you want to say ! 🕊️</label>
                        <textarea name="" id="" cols="30" rows="5" class="my-9 dark:bg-gray-900 rounded-lg focus:ring-indigo-500 border-gray-700 resize-none" maxlength="180" placeholder="Don't be shy !"></textarea>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
