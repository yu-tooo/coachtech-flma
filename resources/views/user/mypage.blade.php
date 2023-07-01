<x-user-catalog>
  <div class="my-8 lg:px-32">
    <div class="flex flex-col justify-between items-center sm:flex-row">
      <div class="flex flex-col items-center sm:ml-32 md:flex-row">
        <img class="w-24 h-24 rounded-full object-cover" src="{{ asset('storage/image/'. $user->profile->getUrl()) }}">
        <p class="text-xl font-extrabold mt-2 md:mt-0 md:translate-x-8 md:-translate-y-2">
          {{ $user->name }}
        </p>
      </div>
      <div class="mt-4 w-48 sm:mt-0 sm:mr-24">
        <a href="{{ route('user.profile') }}">
          <x-user.edit-button name="プロフィールを編集" />
        </a>
      </div>
    </div>
  </div>

  <div class="w-full border-b-2 border-gray-400 px-8 py-2 md:px-16 lg:px-32">
    <button @click="isSecond = false" class="mx-4 font-bold outline-none" :class="{'text-red-500': ! isSecond }">出品した商品</button>
    <button @click="isSecond = true" class="mx-4 font-bold outline-none" :class="{'text-red-500': isSecond }">購入した商品</button>
  </div>

  <!-- 出品商品 -->
  <div x-show="! isSecond" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-x-4 gap-y-8 px-12 xl:px-20 py-12">
    @foreach ($s_items as $item)
    <img class="w-full h-48 shadow-xl object-cover" src="{{ asset('storage/image/'. $item->img_url) }}">
    @endforeach
  </div>

  <!-- 購入商品 -->
  <div x-show="isSecond" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-x-4 gap-y-8 px-12 xl:px-20 py-12">
    @foreach ($p_items as $item)
    <img class="w-full h-48 shadow-xl object-cover" src="{{ asset('storage/image/'. $item->img_url) }}">
    @endforeach
  </div>
</x-user-catalog>