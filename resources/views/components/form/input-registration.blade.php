@props(['reg' => null, 'country' => 'ie'])

<div class="border-2 border-black bg-white rounded-md mx-auto flex items-center h-[74px] max-w-[330px]">
    
    <span class="h-full w-[50px] flex flex-col items-center justify-center px-1 rounded-l  bg-mcblue-100">
        @if($country == 'ie')
            <img class="max-w-[70%]" src="{{asset('images/eu-stars.svg')}}" />
            <span class="uppercase text-white text-sm font-semibold mt-1">IRL</span>
        @endif
        @if($country == 'uk')
            <img class="max-w-[70%] src="{{asset('images/uk-flag.png')}}" />
            <span class="uppercase text-white text-sm font-semibold mt-1">IRL</span>
        @endif
    </span>

    <span class="w-[280px] px-2 py-3">
        <input 
            type="text" 
            class="w-full px-5 h-full flex items-center text-center rounded-r uppercase text-[36px] text-black font-bold outline-none {{ $country == 'uk' ? 'bg-mcyellow-300' : null}}"
            placeholder="ENTER REG"
            name="regisration"
            wire:model.defer="registration"
            />
    </span>
</div>