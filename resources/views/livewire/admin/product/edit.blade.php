<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-6">Edit Product</h1>
    <form wire:submit.prevent="updateProduct">
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" id="name" wire:model="product.name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        </div>
        <div class="mb-4">
            <label for="category_id" class="block text-sm font-medium text-gray-700">Category</label>
            <select id="category_id" wire:model="product.category_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                <option value="">Select a category</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
            <input type="number" id="price" wire:model="product.price" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        </div>
        <div class="mb-4">
            <label for="stock" class="block text-sm font-medium text-gray-700">Stock</label>
            <input type="number" id="stock" wire:model="product.stock" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        </div>
        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea id="description" wire:model="product.description" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"></textarea>
        </div>
        <div class="flex justify-end">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Update Product</button>
        </div>
    </form>
</div>
