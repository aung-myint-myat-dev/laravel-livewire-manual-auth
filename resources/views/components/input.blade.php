@props([
    'type' => 'text',
    'model' => '',
    'label' => 'Label',
    'placeholder' => 'Placeholder',
    'value' => null,
])
<div>
    <label for="name" class="block text-sm font-semibold text-gray-900 mb-2">{{$label}}</label>
    <input wire:model="{{$model}}" required type="{{$type}}"
        class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-gray-900 focus:border-transparent outline-none transition-all placeholder:text-gray-400"
        placeholder="{{$placeholder}}">
    <div class="text-sm text-red-500 mt-2 pl-4">
        @error($model)
            {{ $message }}
        @enderror
    </div>
</div>
