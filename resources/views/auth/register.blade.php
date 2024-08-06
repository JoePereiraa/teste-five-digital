<x-guest-layout>
    <x-form.root method="POST" action="{{ route('register') }}">
        @csrf

        <div class="title">
            <h2>Faça seu registro</h2>
            <h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h3>
        </div>

        <!-- Name -->
        <x-form.inputs.root>
            <x-form.inputs.label for="name" :value="__('Nome')" />
            <x-form.inputs.text
                id="name"
                type="text"
                name="name"
                :value="old('name')"
                required autofocus autocomplete="name"
            />
            <x-form.inputs.error :messages="$errors->get('name')" />
        </x-form.inputs.root>

        <!-- Email Address -->
        <x-form.inputs.root>
            <x-form.inputs.label for="email" :value="__('Email')" />
            <x-form.inputs.text
                id="email"
                type="email"
                name="email"
                :value="old('email')"
                required autocomplete="username"
            />
            <x-form.inputs.error :messages="$errors->get('email')" />
        </x-form.inputs.root>

        <!-- Password -->
        <x-form.inputs.root>
            <x-form.inputs.label for="password" :value="__('Senha')" />
            <x-form.inputs.text
                id="password"
                type="password"
                name="password"
                required autocomplete="new-password"
            />
            <x-form.inputs.error :messages="$errors->get('password')"/>
        </x-form.inputs.root>

        <!-- Confirm Password -->
        <x-form.inputs.root>
            <x-form.inputs.label for="password_confirmation" :value="__('Confirme a Senha')" />
            <x-form.inputs.text
                id="password_confirmation"
                type="password"
                name="password_confirmation"
                required autocomplete="new-password"
            />
            <x-form.inputs.error :messages="$errors->get('password_confirmation')" />
        </x-form.inputs.root>

        <div class="flex items-center justify-end">
            <a class="underline text-sm text-gray-800 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-500 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Já possuí uma conta?') }}
            </a>
        </div>

        <x-buttons.primary.root>
            <x-buttons.primary.content text="{{ __('Registrar') }}"/>
        </x-buttons.primary.root>
    </x-form.root>
</x-guest-layout>
