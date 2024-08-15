<?php $this->extend('layout/templateAdmin'); ?>

<?php $this->section('content'); ?>

<h1 class="text-9 font-bold mb-20">Tambah Produk</h1>

<?php
$errors = session()->getFlashdata('errors');
if ($errors !== null && is_array($errors)) :
?>
    <div class="alert flex p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 " role="alert">
        <svg class="flex-shrink-0 inline w-4 h-4 me-3 mt-[2px]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
        </svg>
        <span class="sr-only">Danger</span>
        <div>
            <span class="font-medium">Perhatikan error berikut:</span>
            <ul class="mt-1.5 list-disc list-inside">
                <?php foreach ($errors as $error) : ?>
                    <li class=""><?= esc($error) ?></li>
                <?php endforeach ?>
            </ul>
        </div>
    </div>
<?php endif; ?>


<form action="/save_produk" method="post" class="w-180 mb-11" enctype="multipart/form-data">

    <label class="custom-file-label hidden mb-2 text-sm font-medium text-gray-900 dark:text-white" for="gambar">Gambar:</label>
    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="gambar">Gambar:</label>
    <div class="flex gap-10">
        <input onchange="previewImg()" class="custom-file-input block h-8 w-full text-sm text-gray-900 border border-gray-300 rounded-sm cursor-pointer bg-gray-50" id="gambar" name="gambar" type="file">
        <div class="w-36 h-36">
            <img src="/img/default-img.png" class="img-preview w-full h-full object-cover">
        </div>
    </div>


    <label for="nama_produk" class="block mb-2 text-sm font-medium text-gray-900">Nama Produk:</label>
    <input type="text" name="nama_produk" id="nama_produk" value="<?= old('nama_produk'); ?>" class="bg-gray-50 mb-3 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">

    <label for="kategori">Kategori:</label>
    <select class="mb-3" id="kategori" name="kategori">
        <option value="">Pilih Kategori</option>
        <?php foreach ($kategori as $index => $k) : ?>
            <option value="<?= $k['id_kategori']; ?>" <?= old('kategori') === $k['id_kategori'] ? 'selected' : '' ?>><?= $k['nama_kategori']; ?></option>
        <?php endforeach ?>
    </select>

    <label for="deskripsi" class="block mb-2 text-sm font-medium text-gray-900">Deskripsi Produk:</label>
    <textarea name="deskripsi" id="deskripsi" rows="10" class="bg-gray-50 mb-3 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "><?= old('deskripsi'); ?></textarea>

    <label for="harga" class="block mb-2 text-sm font-medium text-gray-900">Harga Produk:</label>
    <input type="number" name="harga" value="<?= old('harga'); ?>" id="harga" class="bg-gray-50 mb-3 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">

    <button type="submit" class="py-2.5 px-5 bg-kuning-2 hover:bg-kuning-1 font-medium text-xs rounded-1 text-white transition duration-200 ease-in-out">Simpan</button>
</form>

<?php $this->endSection(); ?>