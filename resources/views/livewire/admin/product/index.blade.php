<!-- Table Section -->
<div class="max-w-[85rem] px-4 py-6 sm:px-6 lg:px-8 lg:py-14 mx-auto ">
    <!-- Card -->
    <div class="flex flex-col">
      <div class="-m-1.5 overflow-x-auto scrollbar-thin scrollbar-thumb-gray-300 scrollbar-track-gray-100">
        <div class="p-1.5 min-w-full inline-block align-middle">
          <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden dark:bg-neutral-900 dark:border-neutral-700">
            <!-- Header -->
            <div class="px-6 py-4 border-b border-gray-200 dark:border-neutral-700">
              <h2 class="text-xl font-semibold text-gray-800 dark:text-neutral-200">
               Products Prices by Market Cap
              </h2>

            </div>
            <!-- End Header -->
            <div class="px-6 py-4">
                <a href="{{ route('products.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-500">
                    Add New Product
                </a>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto ">
              <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                <thead class="bg-gray-50 dark:bg-neutral-800">
                  <tr>
                    <th scope="col" class="px-6 py-3 text-start whitespace-nowrap">
                      <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                        #
                      </span>
                    </th>
                    <th scope="col" class="px-6 py-3 text-start whitespace-nowrap min-w-64">
                      <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                        Products
                      </span>
                    </th>
                    <th scope="col" class="px-6 py-3 text-start whitespace-nowrap">
                      <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                        Price
                      </span>
                    </th>
                    <th scope="col" class="px-6 py-3 text-start whitespace-nowrap">
                      <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                        Categories
                      </span>
                    </th>
                    <th scope="col" class="px-6 py-3 text-start whitespace-nowrap">
                      <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                        Description
                      </span>
                    </th>
                    <th scope="col" class="px-6 py-3 text-start whitespace-nowrap">
                      <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                        Stock
                      </span>
                    </th>
                    <th scope="col" class="px-6 py-3 text-start whitespace-nowrap">
                      <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                        Image
                      </span>
                    </th>
                    <th scope="col" class="px-6 py-3 text-start whitespace-nowrap">
                      <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                        Size
                      </span>
                    </th>
                    <th scope="col" class="px-6 py-3 text-start whitespace-nowrap">
                      <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                        Actions
                      </span>
                    </th>
                  </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                  @foreach($products as $product)
                  <tr>
                    <td class="size-px whitespace-nowrap px-6 py-3">
                      <span class="text-sm text-gray-800 dark:text-neutral-200">{{ $loop->iteration }}</span>
                    </td>
                    <td class="size-px whitespace-nowrap px-6 py-3">
                      <div class="flex items-center gap-x-3">
                        <span class="font-semibold text-sm text-gray-800 dark:text-white">{{ $product->name }}</span>
                      </div>
                    </td>
                    <td class="size-px whitespace-nowrap px-6 py-3">
                      <span class="text-sm text-gray-800 dark:text-white">Rp {{ $product->price }}</span>
                    </td>
                    <td class="size-px whitespace-nowrap px-6 py-3">
                      <span class="text-sm text-red-500">{{ $product->category->name }}</span>
                    </td>
                    <td class="size-px whitespace-nowrap px-6 py-3">
                      <span class="text-sm text-gray-800 dark:text-white">{{ $product->description }}</span>
                    </td>
                    <td class="size-px whitespace-nowrap px-6 py-3">
                      <span class="text-sm text-red-500">{{$product->stock}}</span>
                    </td>
                    <td class="size-px whitespace-nowrap px-6 py-3">
                      <img src="{{ asset('storage/' . $product->image) }}" class="w-16 h-16">
                    </td>
                    <td class="size-px whitespace-nowrap px-6 py-3">
                      <span class="text-sm text-gray-800 dark:text-white">{{ $product->size }}</span>
                    </td>
                    <td class="size-px whitespace-nowrap px-6 py-3">
                      <x-danger-button wire:click="deleteProduct({{ $product->id }})">Remove</x-danger-button>
                      <x-primary-button wire:click="edit({{ $product->id }})">Edit</x-primary-button>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- End Table -->
          </div>
        </div>
      </div>
    </div>
    <!-- End Card -->
  </div>
<!-- Preline JS -->
<script src="{{ asset('node_modules/preline/dist/preline.js') }}"></script>
