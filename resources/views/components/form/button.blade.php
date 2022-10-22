<button {{ $attributes->merge([
    'type' => 'submit',
    'class' => 'py-2.5 px-4 rounded-sm outline-offset-3 outline-slate-500 text-base uppercase font-semibold leading-5 text-white'
]) }}>
    {{ $slot }}
</button>