<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Deletar Conta') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Uma vez que sua conta seja excluída, todos os seus recursos e dados serão permanentemente deletados. Antes de excluir sua conta, por favor, faça o download de qualquer dado ou informação que você deseje reter.') }}
        </p>
    </header>

    <x-buttons.danger.root
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >
        <x-buttons.danger.text text="{{ __('Deletar Conta') }}"/>
    </x-buttons.danger.root>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Você tem certeza de que deseja excluir sua conta?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Uma vez que sua conta seja excluída, todos os seus recursos e dados serão permanentemente deletados. Por favor, digite sua senha para confirmar que você deseja excluir sua conta permanentemente.') }}
            </p>

            <div class="mt-6">
                <x-form.inputs.label for="password" value="{{ __('Senha') }}" class="sr-only" />

                <x-form.inputs.text
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('Senha') }}"
                />

                <x-form.inputs.error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-buttons.secondary.root x-on:click="$dispatch('close')">
                    <x-buttons.secondary.text text="{{ __('Cancelar') }}"/>
                </x-buttons.secondary.root>

                <x-buttons.danger.root class="ms-3">
                    <x-buttons.danger.text text="{{ __('Deletar Conta') }}"/>
                </x-buttons.danger.root>
            </div>
        </form>
    </x-modal>
</section>
