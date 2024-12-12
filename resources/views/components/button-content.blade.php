@if($iconLeft)
    <x-dynamic-component wire:loading.remove wire:target="{{ $wireTarget }}" :component="$iconLeft" class="size-5 mr-2"/>
    <x-icon.spinner wire:loading.flex wire:target="{{ $wireTarget }}" class="size-5 mr-2 text-white" />
@endif
@if ($wireTarget)
    <span wire:loading.class="opacity-50" wire:target="{{ $wireTarget }}">
        {{ $slot }}
    </span>
    @if (!$iconLeft && !$iconRight)
        <x-icon.spinner wire:loading.flex wire:target="{{ $wireTarget }}" class="size-5 ml-2 text-white" />
    @endif
@else
    {{ $slot }}
@endif
@if($iconRight)
    <x-dynamic-component wire:loading.remove wire:target="{{ $wireTarget }}" :component="$iconRight" class="size-5"/>
    <x-icon.spinner wire:loading.flex wire:target="{{ $wireTarget }}" class="size-5 ml-2 text-white" />
@endif
