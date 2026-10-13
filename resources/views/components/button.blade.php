@props(['variant' => 'primary'])

@php
$variants = [
    'primary' => 'bg-brand text-white hover:bg-brand-dark shadow-sm',
    'outline' => 'bg-white border border-line text-ink hover:bg-canvas-alt',
];
$variantClasses = $variants[$variant] ?? $variants['primary'];
@endphp

<button {{ $attributes->merge(['type' => 'button', 'class' => "inline-flex w-full items-center justify-center gap-2 rounded-xl px-4 py-2.5 text-sm font-semibold transition-colors $variantClasses"]) }}>
    {{ $slot }}
</button>
