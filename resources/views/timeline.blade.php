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
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                    <form action="{{ route('create.tweets') }}" class="flex flex-col items-center py-4" method="POST">
                        @csrf
                        <label for="" class="w-full font-semibold text-left">Share to the world what you want to say ! 🕊️</label>
                        <textarea name="text" id="" cols="30" rows="5" class="my-9 w-full dark:bg-gray-900 rounded-lg focus:ring-indigo-500 border-gray-700 resize-none" maxlength="180" placeholder="Don't be shy !"></textarea>
                        <button type="submit" class="bg-indigo-500 rounded-lg w-4/12 py-2">Publish</button>
                    </form>
                    <div>
                        <h1 class="my-4 font-bold text-xl">All tweets of the world :</h1>
                        @if($tweets->count() > 0)
                            @foreach($tweets as $tweet)
                                <div class="my-9">
                                    <div class="flex my-2">
                                        <h2 class="font-semibold">{{ $tweet->user->username }}</h2>&nbsp;<span class="text-slate-400">{{ $tweet->created_at->diffForHumans() }}</span>
                                    </div>
                                    <h3 class="my-4 mb-6">{{ $tweet->text }}</h3>
                                    <a href="/delete/{{ $tweet->id }}" class="p-2 px-4 bg-red-700 rounded-lg">Delete</a>
                                </div>
                            @endforeach
                        @else
                        <div>
                            <p>Be the first to tweet in the world 😉👆!</p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
