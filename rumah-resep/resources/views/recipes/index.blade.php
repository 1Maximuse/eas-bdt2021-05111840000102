<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Recipes List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex justify-end pb-5">
            <a href="{{ route('recipes.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                <x-heroicon-o-plus-circle class="w-6 h-6 mr-1 inline" style="transform: translateY(-1px)" />
                {{ __('Add New Recipe') }}
            </a>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach($recipes as $recipe)
                @php($categories = collect($recipe->categories))
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-8">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="flex items-center justify-between">
                            <div class="flex-1">
                                <h3 class="text-lg leading-6 font-medium text-gray-900">
                                    <a class="hover:underline" href="{{ route('recipes.show', $recipe->id) }}">
                                        {{ $recipe->title }}
                                    </a>
                                </h3>
                                <p class="mt-1 text-base leading-6 text-gray-500">
                                    @if($categories->count() > 3)
                                        {{ $categories->take(3)->implode(',  ') . ', . . .' }}
                                    @else
                                        {{ $categories->implode(',  ') }}
                                    @endif
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
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="flex items-center justify-between">
                            <div class="flex-1">
                                @if ($recipe->directions)
                                    <p class="text-sm leading-5 text-gray-500">
                                        {{ __('Directions') }}
                                    </p>
                                    <p class="mt-1 text-base leading-6 text-gray-900">
                                        {{ $recipe->directions[0] }}
                                    </p>
                                @endif
                                <p class="mt-1 text-base leading-6 text-gray-500">
                                    <a class="hover:underline" href="{{ route('recipes.show', $recipe->id) }}">
                                        {{ __('Read more') }}
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                {{ $recipes->onEachSide(1)->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
