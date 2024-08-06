<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <x-form.root
        method="POST"
        action="{{ route('login') }}"
    >
        @csrf

        <div class="title">
            <h2>Bem vindo de Volta</h2>
            <h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce consequat magna id libero sodales.</h3>
        </div>

        <!-- Email Address -->
        <x-form.inputs.root>
            <x-form.inputs.label for="email" :value="__('Email')"/>
            <x-form.inputs.text id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-form.inputs.error :messages="$errors->get('email')" />
        </x-form.inputs.root>

        <!-- Password -->
        <x-form.inputs.root>
            <x-form.inputs.label for="password" :value="__('Senha')"/>
            <x-form.inputs.text
                id="password"
                type="password"
                name="password"
                required autocomplete="current-password"
            />
            <x-form.inputs.error :messages="$errors->get('password')" />
        </x-form.inputs.root>

        <!-- Remember Me -->
        <div class="flex items-center justify-between">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Lembre-se') }}</span>
            </label>
            @if (Route::has('password.request'))
                <a
                    class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                    href="{{ route('password.request') }}"
                >
                    {{ __('Esqueçeu sua senha?') }}
                </a>
            @endif
        </div>

        <x-buttons.primary.root>
            <x-buttons.primary.content text="{{ __('Fazer Login') }}"/>
        </x-buttons.primary.root>
    </x-form.root>

    <div class="or">
        <hr/> ou <hr/>
    </div>
    @if (Route::has('register'))
        <a href="{{ route('register') }}">
            <x-buttons.primary.root variation="sec">
                <x-buttons.primary.content text="{{ __('Registre-se') }}"/>
            </x-buttons.primary.root>
        </a>
    @endif
</x-guest-layout>
