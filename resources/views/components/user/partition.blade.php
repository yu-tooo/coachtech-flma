@props(['name'])

<h2 {{ $attributes->merge(['class' => "text-xl font-bold pb-1 text-gray-600 border-b border-gray-600"])}}>
  {{ $name }}
</h2>