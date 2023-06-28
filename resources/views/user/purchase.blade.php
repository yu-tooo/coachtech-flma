<x-user-purchase>
  <x-slot name="first">
    <div class="flex">
      <img class="w-32 mx-4 shadow-md" src="{{ asset('/storage/image/'. $item->img_url) }}">
      <div class="p-2 ml-4">
        <h1 class="pb-4 font-bold text-lg">{{ $item->name }}</h1>
        <p>￥{{ number_format($item->price) }}</p>
      </div>
    </div>
    <div class="flex justify-between mt-8">
      <h2 class="font-bold">支払い方法</h2>
      <p><a class="text-blue-500" href="#">変更する</a></p>
    </div>
    <div class="flex justify-between mt-8">
      <h2 class="font-bold">配送先</h2>
      <p><a class="text-blue-500" href="{{ route('user.address', ['item_id' => $item->id]) }}">変更する</a></p>
    </div>
  </x-slot>

  <x-slot name="second">
    <table class="w-full border-2 border-gray-300 border-separate border-spacing-y-4">
      <tr>
        <th>商品代金</th>
        <td>￥{{ number_format($item->price) }}</td>
      </tr>
      <tr>
        <th>支払代金</th>
        <td>￥{{ number_format($item->price) }}</td>
      </tr>
      <tr>
        <th>支払い方法</th>
        <td>コンビニ払い</td>
      </tr>
    </table>
    <div class="w-full mt-8 md:mt-16">
      <x-user.button name="購入する" />
    </div>
  </x-slot>
</x-user-purchase>