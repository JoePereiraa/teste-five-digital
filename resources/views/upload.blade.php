<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Upload') }}
        </h2>
    </x-slot>

    <div class="p-5 flex justify-between items-start flex-wrap gap-4">
        <x-upload.root />

       <x-alert.root />
    </div>
</x-app-layout>
