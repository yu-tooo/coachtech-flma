<x-owner.main-layout :role="$role">
  <h1 class="text-xl font-bold mb-4 text-center">商品一覧</h1>
  <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-x-8 gap-y-8">
    @foreach($items as $item)
    <a href="{{ route('owner.item_detail', ['item_id' => $item->id]) }}">
      <img src="{{ asset('storage/image/'. $item->img_url) }}" class="w-full h-48 shadow-md object-cover">
      <p class="flex pt-4">
        <img src="{{ asset('storage/image/'. $item->user->profile->getUrl()) }}" class="w-8 h-8 rounded-full mr-2 object-cover">
        <input class="h-8 w-full bg-gray-100 rounded-sm outline-none pl-2 font-bold" value="{{ $item->name }}" readonly>
      </p>
    </a>
    @endforeach
  </div>
</x-owner.main-layout>