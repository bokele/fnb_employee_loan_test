@props([
    'options' => [], 
    'selected' => null,
    'show_default' => false,
    'default_value' => null,
    'default_text' => null
])

<select {!! $attributes->merge(['class' => 'w-full h-10 py-1.5 px-3 border border-slate-300 drop-shadow-sm outline-offset-3 outline-slate-500 text-sm leading-5 text-mc-black']) !!}>
    @if ($show_default)
        <option value="{{ $default_value ?? null}}">{{ $default_text ?? ''}}</option>
    @endif
    
    @foreach($options as $key => $option)        
        <option value="{{ $key }}" @selected($key == $selected)>
            {{$option}}
        </option>
    @endforeach
</select>