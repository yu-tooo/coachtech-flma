<x-owner.main-layout :ownerName="$ownerName">
  <h1 class="text-xl font-bold mb-8 text-center">{{ $item->name }}</h1>
  <div class="block md:flex md:justify-between px-0 sm:px-8">
    <div class="w-4/5 sm:w-3/5 md:w-2/5 mb-12 mx-auto">
      <img src="{{ asset('storage/image/'. $item->img_url) }}" class="shadow-md">
    </div>
    <div class="w-full md:w-3/5 md:pl-16">
      <a href="" class="flex items-center w-64 mx-auto md:mx-8 space-x-8">
        <img src="{{ asset('storage/image/'. $item->user->profile->getUrl()) }}" class="w-20 h-20 rounded-full object-cover">
        <h2 class="text-xl font-bold -translate-y-1/4">{{ $item->user->name }}</h2>
      </a>
      <div class="flex space-x-8 my-4 w-fit mx-auto md:mx-2">
        <div class="flex items-end space-x-2">
          <x-star-icon class="stroke-yellow-500 fill-yellow-400" />
          <x-cross-icon class="-translate-y-1/3 translate-x-1/4" />
          <span class="text-xl font-bold">{{ $item->like_count }}</span>
        </div>
        <div class="flex items-end space-x-2">
          <x-bubble-icon />
          <x-cross-icon class="-translate-y-1/3 translate-x-1/4" />
          <span class="text-xl font-bold">{{ $item->comment_count }}</span>
        </div>
      </div>
      <h2 class="text-lg font-semibold">コメント</h2>
      <div class="w-full lg:w-10/12">
        @foreach($item->comments as $comments)
        <input class="w-full py-1.5 px-2 mb-4 bg-gray-200 rounded-sm outline-none" value="{{ $comments->comment }}">
        @endforeach
      </div>
    </div>
  </div>
</x-owner.main-layout>