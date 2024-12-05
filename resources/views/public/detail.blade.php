<x-guest-layout>
    <div class="text-center">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $article->title }}
        </h2>
    </div>

    <div class="text-gray-500 text-sm">
        Publié le {{ $article->created_at->format('d/m/Y') }} par <a href="{{ route('public.index', $article->user->id) }}">{{ $article->user->name }}</a>
    </div>

    <div>
        <div class="p-6 text-gray-900 dark:text-gray-100">
            <p class="text-gray-700 dark:text-gray-300">{{ $article->content }}</p>
        </div>
    </div>

    <button class="bg-black text-white py-2 px-4 rounded hover:bg-gray-800">
            <a href="{{ route('public.index', $user->id) }}">
            Retour
            </a>
            </button>

            @foreach ($article->comments as $comments)
        <div>
            <div class="p-6 text-gray-900 dark:text-gray-100">
            <h2 class="text-2xl font-bold">{{ $comments->user->name }}</h2>
            <h2 class="text-2xl font-bold">{{ $comments->content }}</h2>
            </div>
        </div>
        <hr>
        @endforeach 

        <form action="{{ route('comments.store') }}" method="POST">
        @csrf <!-- Protection CSRF -->

        <div>
            <label for="content">Taper votre msg ici !!!</label>
            <input type="content" name="content" id="content">
        </div>

        <div>
            <button type="submit">Envoyer</button>
        </div>
    </form>


</x-guest-layout>