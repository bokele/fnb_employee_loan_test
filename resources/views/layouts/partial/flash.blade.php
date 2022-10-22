@if(session()->has('notification') || session()->has('info'))
<div x-data="{'showAlert' : true }">
    <div x-show="showAlert" class="flex items-center py-2.5 px-5 mb-5 text-white bg-alert-info">
        <x-icons.info-circled-icon class="w-5 h-5 mr-5" />
        <span class="flex-grow">
            {!!session('notification')!!}
            {!! session('info') !!}
        </span>
        <span x-on:click="showAlert = false" class="cursor-pointer">
            <x-icons.cancel-icon class="w-5 h-5" />
        </span>
    </div>
</div>
@endif

@if(session('success'))
<div x-data="{'showAlert' : true }">
    <div x-show="showAlert" class="flex items-center py-2.5 px-5 mb-5 text-white bg-alert-success">
        <x-icons.ok-circled-icon class="w-5 h-5 mr-5" />
        <span class="flex-grow">
            {!!session('success')!!}
        </span>
        <span x-on:click="showAlert = false" class="cursor-pointer">
            <x-icons.cancel-icon class="w-5 h-5" />
        </span>
    </div>
</div>
@endif

@if(session('warning'))
<div x-data="{'showAlert' : true }">
    <div x-show="showAlert" class="flex items-center py-2.5 px-5 mb-5 text-white bg-alert-warning">
        <x-icons.attention-circled-icon class="w-5 h-5 mr-5" />
        <span class="flex-grow">
            {!!session('warning')!!}
        </span>
        <span x-on:click="showAlert = false" class="cursor-pointer">
            <x-icons.cancel-icon class="w-5 h-5" />
        </span>
    </div>
</div>
@endif


@if(session('danger'))
<div x-data="{'showAlert' : true }">
    <div x-show="showAlert" class="flex items-center py-2.5 px-5 mb-5 text-white bg-alert-error">
        <x-icons.attention-circled-icon class="w-5 h-5 mr-5" />
        <span class="flex-grow">
            {!!session('danger')!!}
        </span>
        <span x-on:click="showAlert = false" class="cursor-pointer">
            <x-icons.cancel-icon class="w-5 h-5" />
        </span>
    </div>
</div>
@endif
