<div class="overflow-x-auto">
    <table {{ $attributes->merge([
    'class' => 'w-full mb-7 table-auto shadow-md border-collapse border border-mc-gray'
]) }}>
        {{ $slot }}
    </table>
</div>