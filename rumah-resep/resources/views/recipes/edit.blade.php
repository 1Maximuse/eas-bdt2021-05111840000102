<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @if ($mode == 'create')
                {{ __('Create New Recipe') }}
            @else
                {{ __('Edit Recipe') }}
            @endif
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-8">
                <form id="form" method="POST" action="@if ($mode == 'create'){{ route('recipes.store') }}@elseif ($mode == 'edit'){{ route('recipes.update', ['id' => $recipe->id]) }}@endif">
                    @csrf
                    <div class="flex">
                        <div class="flex-1 flex flex-col p-6 bg-white border-b border-gray-200">
                            <div class="flex-col align-top">
                                <label for="title" class="text-sm flex items-center font-medium text-gray-500 py-2">
                                    {{ __('Recipe Title') }}
                                </label>
                                <input id="title" name="title" required class="p-2 w-full form-input text-base border border-gray-300 rounded-lg"
                                       @if ($mode == 'edit') value="{{ $recipe->title }}" @endif
                                />
                            </div>
                            <div class="flex-col mt-2 align-top">
                                <label for="tags" class="text-sm flex items-center font-medium text-gray-500 py-2">
                                    {{ __('Tags (comma separated)') }}
                                </label>
                                <input id="tags" name="tags" required class="p-2 w-full form-input text-sm border border-gray-300 rounded-lg"
                                       @if ($mode == 'edit') value="{{ implode(", ", $recipe->categories) }}" @endif
                                />
                            </div>
                        </div>
                        <div class="flex flex-col p-6 bg-white border-b border-l border-gray-200 items-center justify-center">
                            <label for="rating" class="text-sm flex items-center font-medium text-gray-500 py-2">
                                {{ __('Rating (1-5)') }}
                            </label>
                            <input id="rating" name="rating" required placeholder="0.00" class="p-2 form-input text-sm border border-gray-300 rounded-lg placeholder-gray-300 text-center" style="width: 10ch"
                                   @if ($mode == 'edit') value="{{ $recipe->rating }}" @endif
                            />
                        </div>
                    </div>
                    <div class="p-6 bg-white border-b border-gray-200 flex items-center justify-evenly">
                        <div class="flex flex-col items-center justify-around">
                            <x-heroicon-s-fire class="w-10 h-10" style="color:#ff593f" />
                            <div class="flex-col items-center">
                                <label for="calories" class="text-sm flex justify-center items-center font-medium text-gray-500 py-2">
                                    {{ __('Calories (kcal)') }}
                                </label>
                                <input id="calories" name="calories" required class="p-1 form-input text-sm border border-gray-300 rounded-lg"
                                       @if ($mode == 'edit') value="{{ $recipe->calories }}" @endif
                                />
                            </div>
                        </div>
                        <div class="flex flex-col items-center justify-around">
                            <x-heroicon-s-beaker class="w-10 h-10" style="color:#5b381c" />
                            <div class="flex-col items-center">
                                <label for="protein" class="text-sm flex justify-center items-center font-medium text-gray-500 py-2">
                                    {{ __('Protein (grams)') }}
                                </label>
                                <input id="protein" name="protein" required class="p-1 form-input text-sm border border-gray-300 rounded-lg"
                                       @if ($mode == 'edit') value="{{ $recipe->protein }}" @endif
                                />
                            </div>
                        </div>
                        <div class="flex flex-col items-center justify-around">
                            <x-heroicon-o-scale class="w-10 h-10" style="color:#ffca54" />
                            <div class="flex-col items-center">
                                <label for="fat" class="text-sm flex justify-center items-center font-medium text-gray-500 py-2">
                                    {{ __('Fat (grams)') }}
                                </label>
                                <input id="fat" name="fat" required class="p-1 form-input text-sm border border-gray-300 rounded-lg"
                                       @if ($mode == 'edit') value="{{ $recipe->fat }}" @endif
                                />
                            </div>
                        </div>
                        <div class="flex flex-col items-center justify-around">
                            <x-heroicon-o-cube class="w-10 h-10" style="color:#C0C0D0" />
                            <div class="flex-col items-center">
                                <label for="sodium" class="text-sm flex justify-center items-center font-medium text-gray-500 py-2">
                                    {{ __('Sodium (grams)') }}
                                </label>
                                <input id="sodium" name="sodium" required class="p-1 form-input text-sm border border-gray-300 rounded-lg"
                                       @if ($mode == 'edit') value="{{ $recipe->sodium }}" @endif
                                />
                            </div>
                        </div>
                    </div>
                    <div class="p-6 flex flex-col bg-white border-b border-gray-200">
                        <label for="description" class="text-sm font-medium text-gray-500 py-2">
                            {{ __('Recipe description') }}
                        </label>
                        <textarea id="description" name="description" required class="mt-1 text-sm leading-6 text-gray-900 rounded-lg resize-y border-gray-300">@if ($mode == 'edit'){{ $recipe->desc }}@endif</textarea>
                    </div>
                    <div class="p-6 flex flex-col bg-white border-b border-gray-200">
                        <label for="ingredients" class="text-sm font-medium text-gray-500 py-2">
                            {{ __('Ingredients (one per line)') }}
                        </label>
                        <textarea id="ingredients" name="ingredients" required placeholder="1 fresh tomato, diced&#10;1 2 cloves of garlic" class="mt-1 text-sm leading-6 text-gray-900 rounded-lg resize-y border-gray-300 placeholder-gray-300" style="height: 100px">@if ($mode == 'edit'){{ implode("\n", $recipe->ingredients) }}@endif</textarea>
                    </div>
                    <div class="p-6 flex flex-col bg-white border-b border-gray-200">
                        <label for="directions" class="text-sm font-medium text-gray-500 py-2">
                            {{ __('Directions (one per line)') }}
                        </label>
                        <textarea id="directions" name="directions" required placeholder="Mince garlic into a paste.&#10;Add a pinch or two of salt, mix well." class="mt-1 text-sm leading-6 text-gray-900 rounded-lg resize-y border-gray-300 placeholder-gray-300" style="height: 100px">@if ($mode == 'edit'){{ implode("\n", $recipe->directions) }}@endif</textarea>
                    </div>
                </form>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex justify-end pb-5">
            <button type="submit" form="form" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                <x-heroicon-o-check-circle class="w-6 h-6 mr-1 inline" style="transform: translateY(-1px)" />
                {{ __('Save Recipe') }}
            </button>
        </div>
    </div>
</x-app-layout>
