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

                    <!-- Articles -->
                    @if ($articles->isEmpty())
    <p>Aucun article trouvé.</p>
@else
    @foreach ($articles as $article)
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-4">
        <div class="p-6 text-gray-900">
            <h2 class="text-2xl font-bold">Nom de l'article : {{ $article->title }}</h2>
            <p class="text-gray-700">Descriptif de l'article : {{ $article->content}} </p>
            <a class=primary-button  href="{{ route('articles.edit') }}"> modifier un article </a>
        </div>
    </div>
    @endforeach
@endif

{{ $articles->links() }}
                    
    </div>
        <a class=primary-button  href="{{ route('articles.create') }}"> creer un article </a>
        


    </div>
    </div>
    </div>
</x-app-layout>
