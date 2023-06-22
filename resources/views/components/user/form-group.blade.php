@props ([
'name',
'labelName',
'type' => 'text',
'pattern' => '.*',
'placeholder' => ''
])


<label class="block w-full text-lg font-bold cursor-pointer hover:text-gray-600" for="{{ $name }}">{{ $labelName }}</label>
<input class="w-full rounded-md focus:ring-0 placeholder-black mb-8" type="{{ $type }}" id="{{ $name }}" name="{{ $name }}" pattern="{{ $pattern }}" placeholder="{{ $placeholder }}">
