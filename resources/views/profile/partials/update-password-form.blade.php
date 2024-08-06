<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Atualize sua Senha') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Certifique-se de que sua conta está usando uma senha') }}
            <br>
            {{ __('longa e aleatória para manter a segurança.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <x-form.inputs.label for="update_password_current_password" :value="__('Senha Atual')" />
            <x-form.inputs.text id="update_password_current_password" name="current_password" type="password" class="mt-1 block w-full" autocomplete="current-password" />
            <x-form.inputs.error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <x-form.inputs.label for="update_password_password" :value="__('Nova Senha')" />
            <x-form.inputs.text id="update_password_password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <x-form.inputs.error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <x-form.inputs.label for="update_password_password_confirmation" :value="__('Confirmar Senha')" />
            <x-form.inputs.text id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <x-form.inputs.error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-buttons.primary.root>
                <x-buttons.primary.content text="{{ __('Save') }}"/>
            </x-buttons.primary.root>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Salvo.') }}</p>
            @endif
        </div>
    </form>
</section>
