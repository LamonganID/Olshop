{{-- @extends('layouts.app')
@section('content') --}}
<div class="container mx-auto px-6 py-8 shadow-lg rounded-lg bg-white">
    <h1 class="text-3xl font-bold mb-6 text-center">Create Product</h1>
    <form wire:model="createProduct">
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">
                <i class="fas fa-box"></i> Name
            </label>
            <input type="text" id="name" wire:model="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 transition">
            @error('name')
                <p class="text-red-500 text-sm mt-1">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="category_id" class="block text-sm font-medium text-gray-700">
                <i class="fas fa-tags"></i> Category
            </label>
            <select id="category_id" wire:model="category_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 transition">
                <option value="">Select a category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="price" class="block text-sm font-medium text-gray-700">
                <i class="fas fa-dollar-sign"></i> Price
            </label>
            <input type="number" id="price" wire:model="price" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 transition">
            @error('price')
                <p class="text-red-500 text-sm mt-1">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="stock" class="block text-sm font-medium text-gray-700">
                <i class="fas fa-boxes"></i> Stock
            </label>
            <input type="number" id="stock" wire:model="stock" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 transition">
            @error('stock')
                <p class="text-red-500 text-sm mt-1">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">
                <i class="fas fa-pencil-alt"></i> Description
            </label>
            <textarea id="description" wire:model="description" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 transition"></textarea>
            @error('description')
                <p class="text-red-500 text-sm mt-1">{{$message}}</p>
            @enderror
        </div>
        <div class="flex justify-end">
            <button type="submit" class="bg-blue-500 text-white px-6 py-3 rounded hover:bg-blue-600 transition">Create Product</button>
        </div>
    </form>
</div>
{{-- @endsection --}}
