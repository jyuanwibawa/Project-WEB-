<?php $this->extend('layout/templateAdmin'); ?>

<?php $this->section('content'); ?>

<h1 class="text-9 font-bold mb-20">Edit Artikel</h1>

<form action="/simpan_edit" method="post" class="w-180" enctype="multipart/form-data">
    <input type="hidden" name="id_produk" id="id_produk" class="" value="<?= $produk['id_produk']; ?>">
    <input type="hidden" name="gambarLama" value="<?= $produk['foto_produk']; ?>">
    <label class="custom-file-label hidden mb-2 text-sm font-medium text-gray-900 dark:text-white" for="gambar">Gambar:</label>
    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="gambar">Gambar:</label>
    <div class="flex gap-10">
        <input onchange="previewImg()" value="<?= $produk['foto_produk']; ?>" class="custom-file-input block h-8 w-full text-sm text-gray-900 border border-gray-300 rounded-sm cursor-pointer bg-gray-50" id="gambar" name="gambar" type="file">
        <div class="w-36 h-36">
            <img src="/img/default-img.png" class="img-preview w-full h-full object-cover">
        </div>
    </div>


    <label for="nama_produk" class="block mb-2 text-sm font-medium text-gray-900">Nama Produk:</label>
    <input type="text" name="nama_produk" id="nama_produk" value="<?= $produk['nama_produk']; ?>" class="bg-gray-50 mb-3 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">

    <label for="kategori">Kategori:</label>
    <select class="mb-3" id="kategori" name="kategori">        
        <?php foreach ($kategori as $index => $k) : ?>
            <option value="<?= $k['id_kategori']; ?>" <?= $produk['id_kategori'] === $k['id_kategori'] ? 'selected' : '' ?>><?= $produk['id_kategori'] === $produk['id_kategori'] ? $k['nama_kategori'] : '' ?></option>
        <?php endforeach ?>
    </select>

    <label for="deskripsi" class="block mb-2 text-sm font-medium text-gray-900">Deskripsi Produk:</label>
    <textarea name="deskripsi" id="deskripsi" rows="10" class="bg-gray-50 mb-3 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "><?= $produk['deskripsi']; ?></textarea>

    <label for="harga" class="block mb-2 text-sm font-medium text-gray-900">Harga Produk:</label>
    <input type="number" name="harga" value="<?= $produk['harga']; ?>" id="harga" class="bg-gray-50 mb-3 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">

    <button type="submit" class="py-2.5 px-5 bg-kuning-2 hover:bg-kuning-1 font-medium text-xs rounded-1 text-white transition duration-200 ease-in-out">Simpan</button>
</form>

<?php $this->endSection(); ?>