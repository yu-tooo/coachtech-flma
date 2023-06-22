@props ([
'name',
'labelName',
'type' => 'text',
'pattern' => '.*',
'placeholder' => ''
])

<div class="w-full mb-8">
  <label class="block text-lg font-bold cursor-pointer hover:text-gray-600" for="{{ $name }}">{{ $labelName }}</label>
  <input class="w-full rounded-md focus:ring-0" type="{{ $type }}" id="{{ $name }}" name="{{ $name }}" pattern="{{ $pattern }}" placeholder="{{ $placeholder }}">
</div>