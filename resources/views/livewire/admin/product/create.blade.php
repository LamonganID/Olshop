<!-- Card Section -->
<div class="max-w-4xl px-4 py-10 sm:px-6 lg:px-8 mx-auto">
  <!-- Card -->
  <div class="bg-white rounded-xl shadow p-4 sm:p-7 dark:bg-neutral-800">
    <div class="mb-8">
      <h2 class="text-xl font-bold text-gray-800 dark:text-neutral-200">
        Create Products
      </h2>
    </div>

    <form wire:submit.prevent="createProduct">
      <!-- Grid -->
      <div class="sm:col-span-3">
        <div class="inline-block">
          <label for="name" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
            Products Name
          </label>
        </div>
      </div>
      <!-- End Col -->

      <div class="sm:col-span-9">
        <div class="sm:flex">
          <input id="name" wire:model="name" type="text" class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Products Name">
            @error('name')
                <p class="text-red-500 text-sm mt-1">{{$message}}</p>
            @enderror
          <select id="categories_id" wire:model="categories_id"  class="py-2 px-3 pe-9 block w-full sm:w-auto border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
            <option value="">Select Category</option>
            @foreach($categories as $category)
              <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
          </select>

        </div>
      </div>

      <!-- Price -->
      <div class="sm:col-span-3">
          <label for="price" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
            Price
          </label>
      </div>
      <div class="sm:col-span-9">
        <input id="price" wire:model="price" type="number" class="py-2 px-3 block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Price">
        @error('price')
          <p class="text-red-500 text-sm mt-1">{{$message}}</p>
        @enderror
      </div>
      <!-- End Price -->

      <!-- Size -->
      <div class="sm:col-span-3">
        <label for="size" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
          Size
        </label>
      </div>
      <div class="sm:col-span-9">
        <input id="size" wire:model="size" type="text" class="py-2 px-3 block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Size">
        @error('size')
          <p class="text-red-500 text-sm mt-1">{{$message}}</p>
        @enderror
      </div>
      <!-- End Size -->

      <!-- Stock -->
      <div class="sm:col-span-3">
        <label for="stock" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
          Stock
        </label>
      </div>
      <div class="sm:col-span-9">
        <input id="stock" wire:model="stock" type="number" class="py-2 px-3 block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Stock">
        @error('stock')
          <p class="text-red-500 text-sm mt-1">{{$message}}</p>
        @enderror
      </div>
      <!-- End Stock -->

      <!-- Description -->
      <div class="sm:col-span-3">
        <label for="description" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
          Description
        </label>
      </div>
      <div class="sm:col-span-9">
        <textarea wire:model="description" id="description" class="py-2 px-3 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" rows="6" placeholder="Description Details..."></textarea>
        @error('description')
          <p class="text-red-500 text-sm mt-1">{{$message}}</p>
        @enderror
      </div>
      <!-- End Description -->
      </div>
      <!-- End Grid -->

      <div class="mt-5 flex justify-end gap-x-2">
        <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800">
          Cancel
        </button>
        <button type="submit" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700">
          Create Product
        </button>
      </div>
    </form>
  </div>
  <!-- End Card -->
</div>
<!-- End Card Section -->
