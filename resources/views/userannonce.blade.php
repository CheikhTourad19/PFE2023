<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Vos Annonces Publiées') }}
        </h2>
    </x-slot>



    @if(count($userannonces) > 0)
        <ul>
            @foreach($userannonces as $annonce)
                <li class="mb-4">
                    <div class="bg-white dark:bg-gray-800 p-4 rounded shadow">
                        <h2 class="text-xl font-semibold text-gray-800 dark:text-white">{{ $annonce->titre }}</h2>
                        <p class="text-gray-600 dark:text-gray-300">Prix :{{ $annonce->prix }} FCFA</p>
                        <p class="text-gray-600 dark:text-gray-300">Image: </p>
                    </div>
                </li>
            @endforeach
        </ul>
    @else
        <p class="text-gray-600 dark:text-gray-300">Pas d'annonce.</p>
    @endif



</x-app-layout>
