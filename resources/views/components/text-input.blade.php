@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'bg-nova-black border-nova-line text-nova-white placeholder-nova-muted focus:border-nova-red focus:ring-nova-red rounded-none']) }}>