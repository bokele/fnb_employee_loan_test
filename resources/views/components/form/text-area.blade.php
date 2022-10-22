@props(['rows' => 3, 'cols' => 50])


<textarea {!! $attributes->merge([
    'class' => 'w-full min-h-[2.5rem] py-1.5 px-3 border border-slate-300 shadow outline-offset-3 outline-slate-500 text-sm leading-5 text-mc-black'
    ]) !!} rows="{{ $rows }}" cols="{{ $cols }}"></textarea>