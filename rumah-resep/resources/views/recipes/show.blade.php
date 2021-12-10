<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View Recipe') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex justify-end pb-5">
            <a href="{{ route('recipes.edit', ['id' => $recipe->id]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                <x-heroicon-o-pencil-alt class="w-6 h-6 mr-1 inline" style="transform: translateY(-1px)" />
                {{ __('Edit Recipe') }}
            </a>
            <form action="{{ route('recipes.destroy', ['id' => $recipe->id]) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="ml-2 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                    <x-heroicon-o-x-circle class="w-6 h-6 mr-1 inline" style="transform: translateY(-1px)" />
                    {{ __('Delete Recipe') }}
                </button>
            </form>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @php($categories = collect($recipe->categories))
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-8">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex items-center justify-between">
                        <div class="flex-1">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">
                                {{ $recipe->title }}
                            </h3>
                            <p class="mt-1 text-base leading-6 text-gray-500">
                                <span class="text-sm">Tags:&nbsp; </span>
                                {{ $categories->implode(',  ') }}
                            </p>
                        </div>
                        <div class="flex flex-col items-center justify-around">
                            <div class="mx-auto">
                                <h4 class="text-base leading-5 font-medium text-gray-900">
                                    {{ round($recipe->rating, 2) }}
                                </h4>
                            </div>
                            <div class="flex-shrink-0 flex flex-row">
                                @for ($i = 0; $i < floor($recipe->rating); $i++)
                                    <svg class="h-5 w-5 text-orange-500" fill="#fcc100" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-6 bg-white @if (!$recipe->desc) border-b @endif border-gray-200 flex items-center justify-evenly">
                    <div class="flex flex-col items-center justify-around">
                        <x-heroicon-s-fire class="w-10 h-10" style="color:#ff593f" />
                        <p class="mt-1 text-lg leading-6 text-gray-900">
                            <span class="text-sm">Calories:&nbsp; </span>
                            {{ $recipe->calories }}
                            <span class="text-sm"> kcal</span>
                        </p>
                    </div>
                    <div class="flex flex-col items-center justify-around">
                        <x-heroicon-s-beaker class="w-10 h-10" style="color:#5b381c" />
                        <p class="mt-1 text-lg leading-6 text-gray-900">
                            <span class="text-sm">Protein:&nbsp; </span>
                            {{ $recipe->protein }}
                            <span class="text-sm"> g</span>
                        </p>
                    </div>
                    <div class="flex flex-col items-center justify-around">
                        <x-heroicon-o-scale class="w-10 h-10" style="color:#ffca54" />
                        <p class="mt-1 text-lg leading-6 text-gray-900">
                            <span class="text-sm">Fat:&nbsp; </span>
                            {{ $recipe->fat }}
                            <span class="text-sm"> g</span>
                        </p>
                    </div>
                    <div class="flex flex-col items-center justify-around">
                        <x-heroicon-o-cube class="w-10 h-10" style="color:#C0C0D0" />
                        <p class="mt-1 text-lg leading-6 text-gray-900">
                            <span class="text-sm">Sodium:&nbsp; </span>
                            {{ $recipe->sodium }}
                            <span class="text-sm"> g</span>
                        </p>
                    </div>
                </div>
                @if ($recipe->desc)
                    <div class="p-6 pt-2 bg-white border-b border-gray-200">
                        <p class="mt-1 text-base leading-6 text-gray-900">
                            {{ $recipe->desc }}
                        </p>
                    </div>
                @endif
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-base mb-3 leading-6 font-medium text-gray-500">
                        {{ __('Ingredients') }}
                    </h3>
                    <ul style="column-count: 2; -moz-column-count: 2; -webkit-column-count: 2">
                    @foreach($recipe->ingredients as $ingredient)
                        <li class="list-disc ml-5 mt-1 text-base leading-6 text-gray-900">
                            {{ $ingredient }}
                        </li>
                    @endforeach
                    </ul>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-base leading-6 font-medium text-gray-500">
                        {{ __('Directions') }}
                    </h3>
                    @foreach($recipe->directions as $direction)
                        <p class="my-4 text-base leading-6 text-gray-900">
                            {{ $direction }}
                        </p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
