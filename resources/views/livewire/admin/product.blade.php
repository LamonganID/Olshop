@extends('layouts.app')
@section('content')
<div class="p-4">
    <button wire:click="store" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah Produk</button>

    {{-- <h1>{{ $title }}</h1> --}}
    @if(session()->has('message'))
        <div class="bg-green-300 text-green-800 p-2 mt-2">{{ session('message') }}</div>
    @endif

    <table class="w-full border mt-4">
        <thead>
            <tr class="bg-gray-200">
                <th class="border p-2">Nama</th>
                <th class="border p-2">Kategori</th>
                <th class="border p-2">Harga</th>
                <th class="border p-2">Stok</th>
                <th class="border p-2">Aksi</th>
            </tr>
        </thead>
        <tbody >
            @foreach($products as $product)
                <tr class="tex-white">
                    <td class="border p-2">{{ $product ? $product->name : 'N/A' }}</td>
                    <td class="border p-2">{{ $product->slug ?? 'N/A' }}</td>
                    <td class="border p-2">Rp{{ number_format($product->price, 0, ',', '.0') }}</td>
                    <td class="border p-2">{{ $product->stock }}</td>
                    <td class="border p-2">
                        <button wire:click="edit({{ $product->id }})" class="bg-yellow-500 px-2 text-white">Edit</button>
                        <button wire:click="delete({{ $product->id }})" class="bg-red-500 px-2 text-white">Hapus</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
