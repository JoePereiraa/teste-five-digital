<button
    {{ $attributes->merge(['type' => 'submit']) }}
    class="primary-button {{$variation ?? ''}}"
    x-data="buttonEffects()"
    @click="handleClick"
    :class="{'bg-gray-500': clicked}"
>
    {{$slot}}
</button>
