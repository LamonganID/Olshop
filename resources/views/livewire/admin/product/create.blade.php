<div class="grid grid-cols-3 gap-4">
    {{-- <div class="row-span-3 ...">
        <div class="py-4">
            <h1 class="text-gray-800 text-2xl font-bold">Add Create Product</h1>
        </div>
        <img src="" class="max-w-40 max-h-52 min-h-48 rounded-md" alt="">
    </div> --}}
    <div class="col-span-2 row-span-2 ...">
        <div class="container mx-auto px-6 py-8 shadow-lg rounded-lg bg-white">
            <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Create New Product</h1>
            <form wire:submit.prevent="createProduct">
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700 flex items-center">
                        <i class="fas fa-box mr-2"></i> Product Name
                    </label>
                    <input type="text" id="name" wire:model="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 transition">
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="size" class="block text-sm font-medium text-gray-700 flex items-center">
                        <i class="fas fa-box mr-2"></i> Product Size
                    </label>
                    <input type="text" id="size" wire:model="size" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 transition">
                    @error('size')
                        <p class="text-red-500 text-sm mt-1">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="category_id" class="block text-sm font-medium text-gray-700 flex items-center">
                        <i class="fas fa-tags mr-2"></i> Product Category
                    </label>
                    <select id="category_id" wire:model="categories_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 transition">
                        <option value="">Select a category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="price" class="block text-sm font-medium text-gray-700 flex items-center">
                        <i class="fas fa-dollar-sign mr-2"></i> Product Price
                    </label>
                    <input type="number" id="price" wire:model="price" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 transition">
                    @error('price')
                        <p class="text-red-500 text-sm mt-1">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="stock" class="block text-sm font-medium text-gray-700 flex items-center">
                        <i class="fas fa-boxes mr-2"></i> Product Stock
                    </label>
                    <input type="number" id="stock" wire:model="stock" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 transition">
                    @error('stock')
                        <p class="text-red-500 text-sm mt-1">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700 flex items-center">
                        <i class="fas fa-pencil-alt mr-2"></i> Product Description
                    </label>
                    <textarea id="description" wire:model="description" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 transition"></textarea>
                    @error('description')
                        <p class="text-red-500 text-sm mt-1">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="image" class="block text-sm font-medium text-gray-700 flex items-center">
                        <i class="fas fa-image mr-2"></i> Product Image
                    </label>
                    <input type="file" id="image" wire:model="image" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 transition">
                    @error('image')
                        <p class="text-red-500 text-sm mt-1">{{$message}}</p>
                    @enderror
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="bg-green-500 text-white px-6 py-3 rounded hover:bg-green-600 transition">Create Product</button>
                </div>
            </form>
        </div>
    </div>
</div>
