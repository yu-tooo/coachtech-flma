<x-user-catalog>
  <div class="w-full border-b-2 border-gray-400 mt-8 px-8 py-2 md:px-16 lg:px-32">
    <button @click="isSecond = false" class="mx-4 font-bold outline-none" :class="{'text-red-500': ! isSecond }">おすすめ</button>
    <button @click="isSecond = true" class="mx-4 font-bold outline-none" :class="{'text-red-500': isSecond }">マイリスト</button>
  </div>

  <!-- 出品商品 -->
  <div x-show="! isSecond" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-x-4 gap-y-8 px-12 xl:px-20 py-12">
    @foreach ($items as $item)
    <a href="">
      <img class="w-full h-48 shadow-xl object-cover" src="{{ asset('storage/image/'. $item->img_url) }}">
    </a>
    @endforeach
  </div>


  <!-- 購入商品 -->
  <!-- <div x-show="isSecond" class="grid my-12 gap-4 px-16 grid-cols-1 sm:grid-cols-2 md:grid-cols-4 lg:gap-16 lg:px-32">
    <div class="border-2 max-w-xs mx-auto">
      <img src="{{ asset('storage/image/purchase.png') }}">
    </div>
    <div class="border-2 max-w-xs mx-auto">
      <img src="{{ asset('storage/image/purchase.png') }}">
    </div>
    <div class="border-2 max-w-xs mx-auto">
      <img src="{{ asset('storage/image/purchase.png') }}">
    </div>
    <div class="border-2 max-w-xs mx-auto">
      <img src="{{ asset('storage/image/purchase.png') }}">
    </div>
    <div class="border-2 max-w-xs mx-auto">
      <img src="{{ asset('storage/image/purchase.png') }}">
    </div>
  </div> -->
</x-user-catalog>