<x-user-entry>
  <h1 class="mb-8 text-2xl font-extrabold">商品の出品</h1>

  <form class="w-full" action="/">

    <x-user.form-group name="image" labelName="商品画像" placeholder="要変更！" />

    <x-user.partition name="商品の詳細" />
    <x-user.form-group name="category" labelName="カテゴリー" />
    <x-user.form-group name="status" labelName="商品の状態" />

    <x-user.partition name="商品名と説明" />
    <x-user.form-group name="name" labelName="商品名" />
    <x-user.form-textarea name="description" labelName="商品の説明" />

    <x-user.partition name="販売価格" />
    <x-user.form-group name="price" labelName="販売価格" placeholder="￥" />

    <div class="w-full mt-8">
      <x-user.button name="出品する" />
    </div>
  </form>

</x-user-entry>