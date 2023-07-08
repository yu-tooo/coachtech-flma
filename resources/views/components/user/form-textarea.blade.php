@props ([
'name',
'labelName',
'value' => ""
])

<label class="block text-lg font-bold cursor-pointer hover:text-gray-600" for="{{ $name }}">{{ $labelName }}</label>
<textarea class="w-full mb-8 rounded-md focus:border-black focus:ring-0 resize-none" name="{{ $name }}" id="{{ $name }}" rows="4">{{ $value }}</textarea>