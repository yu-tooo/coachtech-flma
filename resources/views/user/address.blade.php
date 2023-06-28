<x-user-entry>
  <h1 class="mb-8 text-2xl font-extrabold">住所の変更</h1>

  <form method="POST" action="{{ route('user.address', ['item_id' => $item_id]) }}" class="w-full">
    @csrf

    <x-user.form-group name="postcode" labelName="郵便番号" value="{{ $user->postcode }}" pattern="\d{3}-\d{4}" />
  <x-user.form-group name="address" labelName="住所" value="{{ $user->address }}" />
  <x-user.form-group name="building" labelName="建物" value="{{ $user->building }}" />

  <div class="w-full mt-8">
    <x-user.button name="更新する" />
  </div>
  </form>

</x-user-entry>