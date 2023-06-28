<x-user-item-detail>
  <x-slot name="first">
    <img class="mx-auto w-96 shadow-md" src="{{ asset('/storage/image/'. $item->img_url) }}" alt="画像が見つかりません">
  </x-slot>

  <x-slot name="second">
    <h1 class="text-2xl font-extrabold">{{ $item->name }}</h1>

    <h3 class="text-lg my-2">￥{{ number_format($item->price) }}(値段)</h3>

    <div class="flex my-2">
      <div class="flex flex-col items-center mr-6">
        <x-star-icon />
        <p class="text-center">3</p>
      </div>
      <div class="flex flex-col items-center">
        <a href="{{ route('user.comment', ['item_id' => $item->id]) }}">
          <x-bubble-icon />
          <p class="text-center">{{ $item->comment->getCount($item->id) }}</p>
        </a>
      </div>
    </div>

    <a class="w-full mt-4" href="{{ route('user.purchase', ['item_id' => $item->id]) }}">
      <x-user.button name="購入する" />
    </a>

    <h2 class="text-xl font-bold pt-8">商品説明</h2>
    <p>{{ $item->description }}</p>
    <h2 class=" text-xl font-bold pt-8">商品の情報</h2>
    <table class="table-fixed border-separate border-spacing-x-1 border-spacing-y-4">
      <tr>
        <th class="w-2/5">カテゴリー</th>
        <td class="bg-gray-300 text-sm rounded-2xl px-2">洋服</td>
        <td class="bg-gray-300 text-sm rounded-2xl px-2">メンズ</td>
        <td class="bg-gray-300 text-sm rounded-2xl px-2">メンズ</td>
      </tr>
      <tr>
        <th>商品の状態</th>
        <td>良好</td>
      </tr>
    </table>
  </x-slot>
</x-user-item-detail>