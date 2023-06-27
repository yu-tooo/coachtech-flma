<x-user-detail>
  <h1 class="mb-8 text-2xl font-extrabold">プロフィール設定</h1>

  <form class="w-full" method="POST" action="{{ route('user.profile') }}" enctype="multipart/form-data">
    @csrf
    <div x-data="switchImg" class="flex gap-x-12 items-center mb-8">
      <img class="w-32 h-32 rounded-full object-cover" id="img" src="{{ asset('storage/image/'. $user->profile->getUrl()) }}">
      
      <label for="file" class="text-lg font-semibold rounded-md bg-white text-red-500 border-2 py-1 px-4 border-red-500 hover:bg-red-500 hover:text-white cursor-pointer">画像を選択する</label>
      <input @change="change" class="hidden" type="file" id="file" name="image" accept="image/*">
    </div>

    <x-user.form-group name="name" labelName="ユーザー名" value="{{ $user->name }}" />
    <x-user.form-group name="postcode" labelName="郵便番号" pattern="\d{3}-\d{4}" value="{{ $user->profile->getPostCode() }}" placeholder="例) 123-4567" />
    <x-user.form-group name="address" labelName="住所" value="{{ $user->profile->getAddress() }}" />
    <x-user.form-group name="building" labelName="建物" value="{{ $user->profile->getBuilding() }}" />

    <div class="w-full mt-8">
      <x-user.button name="更新する" />
    </div>
  </form>

</x-user-detail>

<script>
  document.addEventListener('alpine:init', () => {
    Alpine.data('switchImg', () => ({
      change() {
        let file = event.target.files[0];
        let localUrl = window.URL.createObjectURL(file);
        let img = document.querySelector('#img');
        img.src = localUrl;
      },
    }))
  })
</script>