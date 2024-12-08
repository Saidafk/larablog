<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}  
                    <button class="bg-black text-white py-2 px-4 rounded hover:bg-gray-800">
                    <a  href="{{ route('public.index', Auth::user()->id) }}">
                    Page articles
                    </a>
                    </button>


                        <!-- Message flash -->
    @if (session('success'))
        <div class="bg-green-500 text-white p-4 rounded-lg mt-6 mb-6 text-center">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
    <div class="bg-red-500 text-white p-4 rounded-lg mt-6 mb-6 text-center">
        {{ session('error') }}
    </div>
    @endif
    
    <!-- Articles -->
     
    @forelse ($articles as $article)
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-4">
        <div class="p-6 text-gray-900">
            <h2 class="text-2xl font-bold">Nom de l'article : {{ $article->title }}</h2>
            <p class="text-gray-700">Descriptif de l'article : {{ substr($article->content, 0, 30)}}... </p>

            <button class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition duration-300">
            <a  href="{{ route('articles.edit', $article->id) }}">
            Modifier
            </a>
            </button>

            <button class="bg-red-500 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50 transition duration-300">
            <a href="{{ route('articles.remove', $article->id) }}">
            Supprimer
            </a>
            </button>

        </div>
    </div>
    @empty
    <p>Aucun article trouvé.</p>
    @endforelse

{{ $articles->links() }}
                    
    </div>
    </div>
   </div>

    </div>
    </div>
    </div>
</x-app-layout>
