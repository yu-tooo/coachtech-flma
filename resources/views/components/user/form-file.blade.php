@props([
'message',
'name' => 'image',
])

<label for="{{ $name }}" class="text-lg font-semibold rounded-md bg-white text-red-500 border-2 py-1 px-4 border-red-500 hover:bg-red-500 hover:text-white cursor-pointer">
  {{ $message }}
</label>
<input class="hidden" type="file" id="{{ $name }}" name="{{ $name }}">