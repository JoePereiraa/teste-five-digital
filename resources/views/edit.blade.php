<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Aprovar') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
        <x-alert.root/>
    </div>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 flex gap-4 flex-wrap justify-center">
                    @forelse($files as $file)
                        <x-cards.file.root>
                            <x-cards.file.content />
                            <x-cards.file.footer
                                title="{{ Str::limit($file->original_name, 20) }}"
                            />
                            <x-cards.file.actions
                                routeApprove="{{ route('file.approve', $file->id) }}"
                                routeReject="{{ route('file.reject', $file->id) }}"
                            />
                        </x-cards.file.root>
                    @empty
                        <x-cards.empty.root text="Nenhum arquivo disponível"/>
                    @endforelse
                </div>
            </div>
            <div class="mt-4">
                {{ $files->links() }}
            </div>
        </div>
    <div></div>
</x-app-layout>
