<x-user-catalog>
  <div class="w-full border-b-2 border-gray-400 mt-8 px-8 py-2 md:px-16 lg:px-32">
    <button @click="isSecond = false" class="mx-4 font-bold outline-none" :class="{'text-red-500': ! isSecond }">おすすめ</button>
    <button @click="isSecond = true" class="mx-4 font-bold outline-none" :class="{'text-red-500': isSecond }">マイリスト</button>
  </div>

  <!-- すべて -->
  <div x-show="! isSecond" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-x-4 gap-y-8 px-12 xl:px-20 py-12">
    @foreach ($items as $item)
    <a href="{{ route('user.item', ['item_id' => $item->id]) }}">
      <img class="w-full h-48 shadow-xl object-cover" src="{{ asset('storage/image/'. $item->img_url) }}">
    </a>
    @endforeach
  </div>

  <!-- お気に入り -->
  <div x-show="isSecond" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-x-4 gap-y-8 px-12 xl:px-20 py-12">
    @foreach ($l_items as $item)
    <a href="{{ route('user.item', ['item_id' => $item->id]) }}">
      <img class="w-full h-48 shadow-xl object-cover" src="{{ asset('storage/image/'. $item->img_url) }}">
    </a>
    @endforeach
  </div>
</x-user-catalog>