<x-user-entry>
  <h1 class="mb-8 text-2xl font-extrabold">住所の変更</h1>

  <form class="w-full" action="/">
    
    <x-user.form-group name="postcode" labelName="郵便番号" pattern="\d{3}-\d{4}" />
    <x-user.form-group name="address" labelName="住所" />
    <x-user.form-group name="building" labelName="建物" />

    <x-user.button name="更新する" />
  </form>

</x-user-entry>