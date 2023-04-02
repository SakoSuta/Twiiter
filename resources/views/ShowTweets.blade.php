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
                    <div>
                    <a href="{{ route('timeline') }}" class="p-2 px-4 bg-indigo-500 font-semibold rounded-lg">Go Back</a>
                        <h1 class="py-9 font-bold text-3xl">{{ $user->username }} alias {{ $user->name }}</h1>
                        <p class="font-semibold text-xl">{{ $tweets->count() }} Tweets</p>
                        @if($tweets->count() > 0)
                            @foreach($tweets as $tweet)
                                <div class="my-9">
                                    <div class="flex my-2">
                                        <a href="{{ route('tweets.users', ['username' => $tweet->user->username ]) }}" class="font-semibold">{{ $tweet->user->username }}</a>&nbsp;<span class="text-slate-400">{{ $tweet->created_at->diffForHumans() }}</span>
                                    </div>
                                    <h3 class="my-4 mb-6">{{ $tweet->text }}</h3>
                                    @if($auth->id === $tweet->user->id)
                                        <a href="/delete/{{ $tweet->id }}" class="p-2 px-4 bg-red-700 rounded-lg">Delete</a>
                                    @endif
                                </div>
                            @endforeach
                            {{ $tweets->links() }}
                        @else
                        <div>
                            <p>No Tweets anymore :(</p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
