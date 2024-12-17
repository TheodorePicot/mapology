<div class="absolute top-4 right-4 z-50 flex flex-col items-end space-y-2">
    @foreach (['error', 'warning', 'success', 'info'] as $type)
        @session($type)
            <div class="transition-transform transform-gpu ease-in-out duration-300 z-50 lg:max-w-xl"
                 wire:key="{{$type . \Illuminate\Support\Str::random(5)}}" >
                <x-dynamic-component component="flash.{{ $type }}" :value="__($value)" />
            </div>
        @endsession
    @endforeach
</div>
