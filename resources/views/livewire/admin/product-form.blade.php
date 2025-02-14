<div class="p-6 bg-white rounded shadow">
    <h2 class="text-lg font-semibold">{{ $isEdit ? 'Edit' : 'Tambah' }} Produk</h2>

    <form wire:submit="simpan" class="space-y-4">
        <div>
            <label class="block">Nama Produk</label>
            <input type="text" wire:model="name" class="w-full border p-2 rounded">
            @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block">Slug</label>
            <input type="text" wire:model="slug" class="w-full border p-2 rounded">
            @error('slug') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block">Deskripsi</label>
            <textarea wire:model="description" class="w-full border p-2 rounded"></textarea>
            @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block">Harga</label>
            <input type="number" wire:model="price" class="w-full border p-2 rounded">
            @error('price') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block">Stok</label>
            <input type="number" wire:model="stock" class="w-full border p-2 rounded">
            @error('stock') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block">Kategori</label>
            <select wire:model="category_id" class="w-full border p-2 rounded">
                <option value="">Pilih Kategori</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block">Gambar</label>
            <input type="file" wire:model="image" class="w-full border p-2 rounded">
            @error('image') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">
            {{ $isEdit ? 'Update' : 'Save' }}
        </button>
    </form>
</div>
