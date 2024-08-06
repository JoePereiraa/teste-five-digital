<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <!-- Password -->
        <div>
            <x-form.inputs.label for="password" :value="__('Password')" />

            <x-form.inputs.text id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-form.inputs.error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex justify-end mt-4">
            <x-buttons.primary.root>
                <x-buttons.primary.content text="{{ __('Confirmar') }}"/>
            </x-buttons.primary.root>
        </div>
    </form>
</x-guest-layout>
