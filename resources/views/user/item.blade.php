<x-user-item-detail>
  <x-slot name="first">
    <img class="block mx-auto w-96" src="storage/img/sample.png" alt="画像が見つかりません">
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

    <x-user.button name="購入する" />
    <h2 class="text-xl font-bold pt-8">商品説明</h2>
    <p class="pt-4">カラー：グレー</p>
    <p class="pt-4">新品<br>商品の状態は良好です。傷もありません。</p>
    <p class="pt-4">購入後、即発送いたします。</p>
    <h2 class="text-xl font-bold pt-8">商品の情報</h2>
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