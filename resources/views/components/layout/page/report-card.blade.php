@props(['url' => null, 'type' => null, 'reg' => null, 'country' => 'ie', 'date' => null, 'vehicleName' => null, 'icons' => []])

<div  
    class="flex flex-col bg-mcgray-250 p-6 rounded-sm shadow cursor-pointer text-mc-dark group border-l-4 {{ $type }}"
    >
    {{-- green border = alert-success
    amber border = alert-warning
    red border = alert-error --}}
    
    <a href="#">
        <div class="flex items-center flex-wrap">
            <div>
                <x-sections.reg-input :reg="$reg" :country="$country" />
            </div>

            <x-icons.guarantee-icon class="ml-3 w-5 h-5 text-mcgray-300" /> 
            <x-icons.doc-text-icon class="ml-3 w-5 h-5 text-mcgray-300" /> 
        </div>

        <div class="text-xs text-mcgray-350 my-2.5">
            {{ $date }}
        </div>

        <div class="font-semibold text-lg text-mc-dark uppercase ">
            {{ $vehicleName }}
        </div>
    </a>

    <div class="flex w-[242px] items-center border border-mcgray-700 mt-1.5">
        {{-- Finance Outstanding --}}
        <a href="#" class="h-10 w-12 flex items-center justify-center bg-mcgray-100 hover:bg-mcgray-600 border-r border-mcgray-700">
            <x-icons.alert-finance-icon class="w-4 h-4 text-mcgray-300" />
        </a>

        {{-- Write off condition --}}
        <a href="#" class="h-10 w-12 flex items-center justify-center bg-mcgray-100 hover:bg-mcgray-600 border-r border-mcgray-700">
            <x-icons.car-write-off-icon class="w-4 h-4 text-mcgray-300" />
        </a>

        {{-- Condtion alert --}}
        <a href="#" class="h-10 w-12 flex items-center justify-center bg-mcgray-100 hover:bg-mcgray-600 border-r border-mcgray-700">
            <x-icons.attention-circled-icon class="w-4 h-4 text-mcgray-300" />
        </a>

        {{-- Mileage alert --}}
        <a href="#" class="h-10 w-12 flex items-center justify-center bg-mcgray-100 hover:bg-mcgray-600 border-r border-mcgray-700">
            <x-icons.alert-mileage-2-icon class="w-4 h-4 text-mcgray-300" />
        </a>        

        {{-- Mileage alert --}}
        <a href="#" class="h-10 w-12 flex items-center justify-center bg-mcgray-100 hover:bg-mcgray-600">
            <x-icons.car-stolen-icon class="w-4 h-4 text-mcgray-300" />
        </a>        
    </div>
</div>