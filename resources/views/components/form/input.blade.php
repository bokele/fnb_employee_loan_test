@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' => 'w-full h-10 py-1.5 px-3 border border-slate-300 shadow outline-offset-3 outline-slate-500 text-sm leading-5 text-mc-black'
    ]) !!}>