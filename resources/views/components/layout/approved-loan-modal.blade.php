@props([
'title'
])

<div x-data="{ open: false }" class="flex">
    <!-- Trigger -->
    <span x-on:click="open = true">
        <button type="button" class="flex items-center rounded-md bg-alert-info hover:bg-mcinfo-200 text-white text-sm px-4 py-2.5 shadow">
            <x-icons.trash-empty-icon class="w-5 h-5" />
            <span class="ml-3">Approve Loan</span>
        </button>
    </span>

    <!-- Modal -->
    <div x-show="open" style="display: none" x-on:keydown.escape.prevent.stop="open = false" role="dialog" aria-modal="true" x-id="['modal-title']" :aria-labelledby="$id('modal-title')" class="fixed inset-0 z-10 overflow-y-auto">
        <!-- Overlay -->
        <div x-show="open" x-transition.opacity class="fixed inset-0 bg-black bg-opacity-70"></div>

        <!-- Panel -->
        <div x-show="open" x-transition x-on:click="open = false" class="relative flex min-h-screen items-center justify-center p-4">
            <div x-on:click.stop x-trap.noscroll.inert="open" class="relative w-full max-w-xl overflow-y-auto rounded bg-white p-12 shadow text-sm">
                <h2 {{ $title->attributes->class(['text-mcred-300 text-3xl font-bold mb-10']) }}>
                    {{ $title }}
                </h2>

                {{$slot}}

                <!-- Buttons -->
                <div class="mt-8 flex flex-col space-y-2">
                    <button type="button" x-on:click="open = false" class="w-full py-6 flex items-center justify-center rounded-sm bg-mc-dark hover:bg-mc-black text-base font-semibold uppercase text-mcgray-300">
                        Cancel
                    </button>

                    <button type="button" x-on:click="open = false" wire:click="approvedLoan" class="w-full py-6 flex items-center justify-center rounded-sm bg-alert-success hover:bg-mcgreen-50 text-base font-semibold uppercase text-white">
                        Confirm
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
