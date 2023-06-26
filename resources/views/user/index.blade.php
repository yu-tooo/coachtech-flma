<x-user-catalog :isAuth="$isAuth">
  <div class="w-full border-b-2 border-gray-400 mt-8 px-8 py-2 md:px-16 lg:px-32">
    <button @click="isSecond = false" class="mx-4 font-bold outline-none" :class="{'text-red-500': ! isSecond }">おすすめ</button>
    <button @click="isSecond = true" class="mx-4 font-bold outline-none" :class="{'text-red-500': isSecond }">マイリスト</button>
  </div>

  <!-- 出品商品 -->
  <div x-show="! isSecond" class="grid my-8 gap-8 px-16 grid-cols-1 sm:grid-cols-2 md:grid-cols-4 lg:gap-16 lg:px-32">
    <div class="border-2 max-w-xs mx-auto">
      <img src="{{ asset('storage/img/exhibit.png') }}">
    </div>
    <div class="border-2 max-w-xs mx-auto">
      <img src="{{ asset('storage/img/exhibit.png') }}">
    </div>
    <div class="border-2 max-w-xs mx-auto">
      <img src="{{ asset('storage/img/exhibit.png') }}">
    </div>
    <div class="border-2 max-w-xs mx-auto">
      <img src="{{ asset('storage/img/exhibit.png') }}">
    </div>
    <div class="border-2 max-w-xs mx-auto">
      <img src="{{ asset('storage/img/exhibit.png') }}">
    </div>
    <div class="border-2 max-w-xs mx-auto">
      <img src="{{ asset('storage/img/exhibit.png') }}">
    </div>
    <div class="border-2 max-w-xs mx-auto">
      <img src="{{ asset('storage/img/exhibit.png') }}">
    </div>
    <div class="border-2 max-w-xs mx-auto">
      <img src="{{ asset('storage/img/exhibit.png') }}">
    </div>
    <div class="border-2 max-w-xs mx-auto">
      <img src="{{ asset('storage/img/exhibit.png') }}">
    </div>
  </div>


  <!-- 購入商品 -->
  <div x-show="isSecond" class="grid my-8 gap-8 px-16 grid-cols-1 sm:grid-cols-2 md:grid-cols-4 lg:gap-16 lg:px-32">
    <div class="border-2 max-w-xs mx-auto">
      <img src="{{ asset('storage/img/purchase.png') }}">
    </div>
    <div class="border-2 max-w-xs mx-auto">
      <img src="{{ asset('storage/img/purchase.png') }}">
    </div>
    <div class="border-2 max-w-xs mx-auto">
      <img src="{{ asset('storage/img/purchase.png') }}">
    </div>
    <div class="border-2 max-w-xs mx-auto">
      <img src="{{ asset('storage/img/purchase.png') }}">
    </div>
    <div class="border-2 max-w-xs mx-auto">
      <img src="{{ asset('storage/img/purchase.png') }}">
    </div>
  </div>
</x-user-catalog>