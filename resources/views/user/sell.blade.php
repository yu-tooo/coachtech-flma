<x-user-entry>
  <h1 class="mb-8 text-2xl font-extrabold">商品の出品</h1>

  <form method="POST" action="{{ route('user.sell') }}" enctype="multipart/form-data" class="w-full">
    @csrf
    <h2 class="text-lg font-bold">商品画像</h2>
    <div x-data="switchImg" class="relative w-full h-36 border border-black border-dashed rounded-sm mt-1 mb-12">
      <img class="absolute w-full h-36 object-cover" id="img">
      <label for="image" class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-red-500 font-medium border-2 py-1 px-4 rounded-lg border-red-500 hover:text-white hover:bg-red-500 cursor-pointer">
        画像を選択する
      </label>
      <input @change="change" type="file" id="image" class="hidden">
    </div>

    <x-user.partition name="商品の詳細" />
    <div x-data="addInput" class="mb-8">
      <label for="category1" class="block w-full text-lg font-bold cursor-pointer hover:text-gray-600">
        カテゴリー
      </label>
      <input @click="plus = true" type="text" id="category1" class="w-full rounded-md focus:border-black focus:ring-0" name="categories[]">

      <div id="addContent" class="hidden">
        <span x-show="plus" @click="add" class="inline-block w-8" id="addBtn"><x-plus-icon /></span>
        <span x-show="minus" @click="remove" class="inline-block"><x-minus-icon /></span>
        <span x-show="isEmpty" class="inline-block ml-4 text-red-500 text-lg">
          Error: 入力してください
        </span>
        <span x-show="maximum" class="inline-block ml-4 text-red-500 text-lg">
          Message: カテゴリーは最大5個まで登録可能です
        </span>
      </div>
    </div>

    <x-user.form-group name="status" labelName="商品の状態" />

    <x-user.partition name="商品名と説明" />
    <x-user.form-group name="name" labelName="商品名" />
    <x-user.form-textarea name="description" labelName="商品の説明" />

    <x-user.partition name="販売価格" />

    <span class="inline-block pb-0.5 translate-x-2 translate-y-16 text-lg">￥</span>
    <x-user.form-group name="price" labelName="販売価格" class="pl-8" />

    <div class="w-full mt-8">
      <x-user.button name="出品する" />
    </div>
  </form>

</x-user-entry>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    const target = document.querySelector('#addContent');
    target.classList.remove('hidden');
  });

  document.addEventListener('alpine:init', () => {
    Alpine.data('switchImg', () => ({
      change() {
        const file = event.target.files[0];
        const localUrl = window.URL.createObjectURL(file);
        const img = document.querySelector('#img');
        img.src = localUrl;
      },
    }))
    Alpine.data('addInput', () => ({
      id: 1,
      plus: false,
      minus: false,
      maximum: false,
      isEmpty: false,
      add() {
        const oldInput = document.querySelector(`#category${this.id}`);
        if (this.id > 4) {
          this.maximum = true;
          setTimeout(() => this.maximum = false, 5000);
          return;
        } else if (!oldInput.value) {
          this.isEmpty = true;
          setTimeout(() => this.isEmpty = false, 5000);
          return;
        }
        this.id++;
        const newLabel = document.createElement('label');
        newLabel.textContent = `カテゴリー ${this.id}`;
        newLabel.id = `categoryLabel${this.id}`;
        newLabel.className = "block w-full text-lg font-bold cursor-pointer hover:text-gray-600";
        newLabel.htmlFor = `category${this.id}`;

        const newForm = document.createElement('input');
        newForm.type = 'text';
        newForm.id = `category${this.id}`;
        newForm.className = "w-full rounded-md focus:border-black focus:ring-0";
        newForm.name = 'categories[]';

        const addBtn = document.querySelector("#addBtn");
        document.querySelector('#addContent').insertBefore(newLabel, addBtn);
        document.querySelector('#addContent').insertBefore(newForm, addBtn);

        this.isEmpty = false;
        this.maximum = false;
        this.minus = true;
      },
      remove() {
        const targetLabel = document.querySelector(`#categoryLabel${this.id}`);
        const targetForm = document.querySelector(`#category${this.id}`);
        document.querySelector('#addContent').removeChild(targetLabel);
        document.querySelector('#addContent').removeChild(targetForm);

        if (--this.id == 1) this.minus = false;
      }
    }))
  })
</script>