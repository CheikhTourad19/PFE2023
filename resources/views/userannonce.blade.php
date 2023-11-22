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
                        <div id="annonce-{{ $annonce->id }}">
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
                        <x-danger-button
                            x-data=""
                            x-on:click.prevent="$dispatch('open-modal', 'confirm-annonce-deletion')"
                        >
                            {{ __('Supprimer annonce') }}
                        </x-danger-button>
                        <x-modal name="confirm-annonce-deletion" :show="$errors->annonceDeletion->isNotEmpty()" focusable>
                            <form method="post" action="{{ route('annonces.supprimer', ['id' => $annonce->id]) }}" class="p-6">
                                @csrf
                                @method('delete')

                                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                    {{ __('Êtes-vous sûr de vouloir supprimer cette annonce?') }}
                                </h2>

                                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                    {{ __('Une fois l\'annonce supprimée, elle ne pourra pas être récupérée. Veuillez confirmer ') }}
                                </p>

                                <div class="mt-6 flex justify-end">
                                    <x-secondary-button x-on:click="$dispatch('close')">
                                        {{ __('Annuler') }}
                                    </x-secondary-button>

                                    <x-danger-button class="ms-3">
                                        {{ __('Supprimer Annonce') }}
                                    </x-danger-button>
                                </div>
                            </form>

                        </x-modal>
                            <x-primary-button
                                x-data=""
                                x-on:click.prevent="$dispatch('open-modal', 'edit-annonce')"
                            >
                                {{ __('Éditer annonce') }}
                            </x-primary-button>
                            <x-modal name="edit-annonce" :show="$errors->editAnnonce->isNotEmpty()" focusable>
                                <form method="post" action="{{ route('annonces.update', ['id' => $annonce->id]) }}" class="p-6">
                                    @csrf
                                    @method('put')

                                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                        {{ __('Éditer cette annonce') }}
                                    </h2>

                                    <!-- Ajoutez ici les champs de votre formulaire d'édition d'annonce -->
                                    <x-input-label for="titre" value="{{ __('Titre') }}" />
                                    <x-text-input
                                        id="titre"
                                        name="titre"
                                        type="text"
                                        class="mt-1 block w-3/4"
                                        :value="$annonce->titre"
                                    />

                                    <x-input-label for="description" value="{{ __('Description') }}" />
                                    <textarea id="description" name="description" class="mt-1 block w-3/4">{{ $annonce->description }}</textarea>

                                    <div class="mt-6">
                                        <x-input-label for="categorie" value="{{ __('Catégorie') }}" />

                                        <select id="categorie" name="categorie" class="mt-1 block w-3/4">
                                            <option value="option1" {{ $annonce->categorie === 'option1' ? 'selected' : '' }}>Option 1</option>
                                            <option value="option2" {{ $annonce->categorie === 'option2' ? 'selected' : '' }}>Option 2</option>
                                            <option value="option3" {{ $annonce->categorie === 'option3' ? 'selected' : '' }}>Option 3</option>
                                            <option value="option3" {{ $annonce->categorie === 'option3' ? 'selected' : '' }}>Option 4</option>

                                        </select>
                                    </div>

                                    <x-input-label for="prix" value="{{ __('Prix') }}" />
                                    <x-text-input
                                        id="prix"
                                        name="prix"
                                        type="decimal"
                                        class="mt-1 block w-3/4"
                                        :value="$annonce->prix"
                                    />



                                    <div class="mt-6 flex justify-end">
                                        <x-secondary-button x-on:click="$dispatch('close')">
                                            {{ __('Annuler') }}
                                        </x-secondary-button>

                                        <x-primary-button class="ms-3">
                                            {{ __('Sauvegarder') }}
                                        </x-primary-button>
                                    </div>
                                </form>
                            </x-modal>




                        </div>

                    </div>
                </li>


@endforeach
        </ul>
    @else
        <p class="text-gray-600 dark:text-gray-300">Pas d'annonce.</p>
    @endif


</x-app-layout>

