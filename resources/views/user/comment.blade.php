<x-user-item-detail>
  <x-slot name="first">
    <img class="block mx-auto w-96" src="{{ asset('/storage/img/sample.png') }}" alt="画像が見つかりません">
  </x-slot>

  <x-slot name="second">
    <h1 class="text-2xl font-extrabold">商品名</h1>
    <p>ブランド名</p>
    <h3 class="text-lg my-2">￥47,000(値段)</h3>

    <div class="flex px-2 mt-4">
      <div class="flex flex-col items-center mx-4">
        <x-star-icon />
        <p>3</p>
      </div>
      <div class="flex flex-col items-center mx-4">
        <x-bubble-icon />
        <p>14</p>
      </div>
    </div>

    <div class="mt-4 w-full">
      <p class="flex items-end">
        <img class="w-8 h-8 rounded-full mr-4" src="{{ asset('storage/img/person.png') }}">
        山田太郎
      </p>
      <input class="w-full my-2 p-2 bg-gray-200 rounded-sm outline-none" value="" readonly>
    </div>

    <div class="mt-4 w-full">
      <p class="flex items-end">
        <img class="w-8 h-8 rounded-full mr-4" src="{{ asset('storage/img/person.png') }}">
        岩城正美
      </p>
      <input class="w-full my-2 p-2 bg-gray-200 rounded-sm outline-none" value="" readonly>
    </div>

    <div class="mt-4 w-full">
      <p class="flex items-end">
        <img class="w-8 h-8 rounded-full mr-4" src="{{ asset('storage/img/person.png') }}">
        里中悟
      </p>
      <input class="w-full my-2 p-2 bg-gray-200 rounded-sm outline-none" value="" readonly>
    </div>

    <div class="w-full mt-8">
      <x-user.form-textarea name="comment" labelName="商品へのコメント" />
    </div>

    <div class="w-full -mt-4">
      <x-user.button name="コメントを送信する" />
    </div>

  </x-slot>
</x-user-item-detail>