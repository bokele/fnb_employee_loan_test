@props(['value' => null])

<div class="flex items-center w-full h-10 border border-slate-300 shadow outline-offset-3 outline-slate-500 text-sm leading-5 text-mc-black'">
    <input class="flex-grow py-1.5 px-3" type="text" value="{{$value}}" disabled="true">
    <span class="flex items-center justify-center h-full border-l py-1.5 px-3 border-slate-300 cursor-pointer">

        <x-icons.attention-circled-icon class="w-4 h-4 text-mc-menu" />
        {{-- <popover
            effect="fade"
            placement="bottom"
            title="Info"
            content="{{$message}}"
            trigger="click"
            header="false"
        >
            <a class="clickable-area">
                <i class="icon icon-info-circled"></i>
            </a>
        </popover> --}}
    </span>
</div>