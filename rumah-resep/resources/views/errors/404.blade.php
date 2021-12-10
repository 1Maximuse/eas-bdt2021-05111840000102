<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Not Found') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="w-100 pt-10 text-center text-xl text-gray-500">
                {{ __('We cannot find the resource you\'re looking for.') }}
            </div>
        </div>
    </div>
</x-app-layout>
