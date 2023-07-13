@props ([
'name',
'labelName',
'type' => 'text',
'pattern' => '.*',
'placeholder' => '',
'value' => ''
])


<label class="block w-full text-md font-bold cursor-pointer hover:text-gray-600" for="{{ $name }}">{{ $labelName }}</label>
<input {{ $attributes->merge(['class' => "w-full h-8 rounded-md placeholder-black mb-4 focus:border-black focus:ring-0"])}} type="{{ $type }}" id="{{ $name }}" name="{{ $name }}" value="{{ $value }}" pattern="{{ $pattern }}" placeholder="{{ $placeholder }}">