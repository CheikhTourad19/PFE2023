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
                        @if(count($annonce->image) > 0)
                            <div class="mt-4">
                                <ul>
                                    @foreach($annonce->image as $image)
                                        <li>
                                            <img style="width: 100px "  src="{{  $image->url_images }}" alt="Image">
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @else
                            <h3>Cette annonce ne contient pas d'images</h3>
                        @endif

                    <x-danger-button >
                        {{ __('Supprimer Annonce') }}
                    </x-danger-button>
                    </div>
                </li>


@endforeach
        </ul>
    @else
        <p class="text-gray-600 dark:text-gray-300">Pas d'annonce.</p>
    @endif


</x-app-layout>

