<x-user-detail>
  <h1 class="mb-8 text-2xl font-extrabold">プロフィール設定</h1>

  <x-user.form-group name="image" labelName="人物画像" placeholder="要変更！" />

  <x-user.form-group name="name" labelName="ユーザー名" />
  <x-user.form-group name="postcode" labelName="郵便番号" pattern="\d{3}-\d{4}" />
  <x-user.form-group name="address" labelName="住所" />
  <x-user.form-group name="building" labelName="建物" />

  <x-user.button name="更新する" />
</x-user-detail>