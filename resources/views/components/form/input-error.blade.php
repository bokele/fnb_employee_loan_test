@props(['for'])

@error($for)
<p {{ $attributes->merge(['class' => 'text-sm text-alert-error']) }}>{{ $message }}</p>
@enderror
