@props(['total' => 0])

<span  {{ $attributes->merge(['class' => 'flex items-center justify-center py-[3px] px-[7px] rounded-[20px] min-w-[20px] text-xs text-white bg-alert-success ']) }}>
    {{$total}}
</span>
