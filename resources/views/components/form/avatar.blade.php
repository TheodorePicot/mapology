<div class="relative flex flex-col items-center justify-center" x-data="{clickDiv() { $refs.input.click() }}">
    <label class="relative cursor-pointer" @click="clickDiv()">
        <div class="flex items-center justify-center w-[100px] h-[100px] rounded-full bg-cover bg-center bg-no-repeat"
             style="background-image: url('{{ $this->avatar && ! $errors->has('avatar') ? $this->avatar->temporaryUrl() : asset('images/default-avatar.webp') }}')"></div>
        <div
            class="absolute top-0 left-0 flex items-center justify-center transition-opacity duration-300 bg-black bg-opacity-50 rounded-full opacity-0 hover:opacity-100"
            style="width: 100%; height: 100%;">
            <x-heroicon-o-camera class="size-7 text-white"/>
        </div>
        <div wire:loading.flex wire:target="avatar"
            class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 flex items-center justify-center transition-opacity duration-300 bg-black bg-opacity-50 rounded-full opacity-100"
            style="width: 100%; height: 100%;">
            <x-icon.spinner class="size-7 text-white"/>
        </div>
    </label>
    <input wire:model="avatar" type="file" class="hidden" x-ref="input">
    @error('avatar')
        <div class="absolute w-full h-4 mt-2 text-xs text-center text-red-500 -bottom-5"> {{ $message }} </div>
    @enderror
</div>
