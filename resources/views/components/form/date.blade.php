@props(['date' => null])

<div
    x-data="{
        value: '{{ $date ?? null}}',
        init() {
            let picker = flatpickr(this.$refs.picker, {
                mode: 'single',
                dateFormat: 'd/m/Y',
                defaultDate: this.value
            })
            this.$watch('value', () => picker.setDate(this.value))
        },
    }"
    class="max-w-sm w-full"
> 
    <input class="w-full rounded-md border border-gray-200 px-3 py-2.5" x-ref="picker" type="text">
</div>