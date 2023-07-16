@props([
  'labelName' => "",
  'value' => ""
])
<div class="mt-4 w-full">
  <p class="flex items-end">{{ $labelName }}</p>
  <input class="w-full pt-2 pl-1 border-t border-gray-800 outline-none" value="{{ $value }}" readonly>
</div>