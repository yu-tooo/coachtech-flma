<x-owner.main-layout :ownerName="$ownerName">
  <h1 class="text-xl font-bold mb-8 text-center">{{ $item->name }}</h1>
  <div class="flex justify-between px-8">
    <div class="w-2/5">
      <img src="{{ asset('storage/image/'. $item->img_url) }}" class="shadow-md">
    </div>
    <div class="w-3/5 px-12">
      <a href="" class="flex items-center w-64 px-8 space-x-8">
        <img src="{{ asset('storage/image/'. $item->user->profile->getUrl()) }}" class="w-20 h-20 rounded-full object-cover">
        <h2 class="text-xl font-bold -translate-y-1/4">{{ $item->user->name }}</h2>
      </a>

      <div class="flex space-x-8 my-4 px-8">
        <div class="flex items-end space-x-2">
          <x-star-icon class="stroke-yellow-500 fill-yellow-400" />
          <x-cross-icon class="-translate-y-1/3 translate-x-1/4" />
          <span class="text-xl font-bold">8</span>
        </div>
        <div class="flex items-end space-x-2">
          <x-bubble-icon />
          <x-cross-icon class="-translate-y-1/3 translate-x-1/4" />
          <span class="text-xl font-bold">3</span>
        </div>
      </div>
    </div>
  </div>
</x-owner.main-layout>