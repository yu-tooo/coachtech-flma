<x-user-purchase>
  <x-slot name="first">
    <div class="flex">
      <img class="w-32 mx-4" src="storage/img/sample.png">
      <div class="p-2 ml-4">
        <h1 class="pb-4 font-bold text-lg">商品名</h1>
        <p>￥47,000</p>
      </div>
    </div>
    <div class="flex justify-between mt-8">
      <h2 class="font-bold">支払い方法</h2>
      <p><a class="text-blue-500" href="#">変更する</a></p>
    </div>
    <div class="flex justify-between mt-8">
      <h2 class="font-bold">配送先</h2>
      <p><a class="text-blue-500" href="#">変更する</a></p>
    </div>
  </x-slot>

  <x-slot name="second">
    <table class="w-full border-2 border-gray-300 border-separate border-spacing-y-4">
      <tr>
        <th>商品代金</th>
        <td>￥47,000</td>
      </tr>
      <tr>
        <th>支払代金</th>
        <td>￥47,000</td>
      </tr>
      <tr>
        <th>支払い方法</th>
        <td>コンビニ払い</td>
      </tr>
    </table>
    <x-user.button name="購入する"/>
  </x-slot>
</x-user-purchase>