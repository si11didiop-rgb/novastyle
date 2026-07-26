@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-nova-muted uppercase tracking-wide']) }}>
    {{ $value ?? $slot }}
</label>