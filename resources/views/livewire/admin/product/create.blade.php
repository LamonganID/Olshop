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

          <select id="categories_id" wire:model="categories_id"  class="py-2 px-3 pe-9 block w-full sm:w-auto border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
            <option value="">Select Category</option>
            @foreach($categories as $category)
              <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
          </select>
            @error('name')
                <p class="text-red-500 text-sm mt-1">{{$message}}</p>
            @enderror
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

      <div class="space-y-2">
        <label for="images" class="inline-block text-sm font-medium text-gray-800 mt-2.5 dark:text-neutral-200">
          Preview image
        </label>

        <label for="images" class="group p-4 sm:p-7 block cursor-pointer text-center border-2 border-dashed border-gray-200 rounded-lg focus-within:outline-none focus-within:ring-2 focus-within:ring-blue-500 focus-within:ring-offset-2 dark:border-neutral-700">
          <input wire:model="images" id="images" name="images" type="file" class="sr-only">
          <svg class="size-10 mx-auto text-gray-400 dark:text-neutral-600" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M7.646 5.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708l2-2z"/>
            <path d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383zm.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z"/>
          </svg>
          <span class="mt-2 block text-sm text-gray-800 dark:text-neutral-200">
            Browse your device or <span class="group-hover:text-blue-700 text-blue-600">drag 'n drop'</span>
          </span>
          <span class="mt-1 block text-xs text-gray-500 dark:text-neutral-500">
            Maximum file size is 2 MB
          </span>
        </label>
        @error('images')
          <p class="text-red-500 text-sm mt-1">{{$message}}</p>
        @enderror
      </div>

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
