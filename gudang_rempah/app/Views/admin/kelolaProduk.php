<?php $this->extend('layout/templateAdmin'); ?>

<?php $this->section('content'); ?>

<h1 class="text-9 font-bold mb-5">Kelola Produk</h1>
<div class="w-full flex flex-col">
    <div class="flex mb-7 self-end">
        <a href="/tambah_produk" class="flex gap-1 bg-kuning-1  transition-colors hover:bg-kuning-2 items-center text-white rounded-1 font-monda font-medium py-2 px-4">
            Tambah produk
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="white" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
        </a>
    </div>
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800" role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <div>
                <span class="font-medium"><?= session()->getFlashdata('pesan') ?></span>
            </div>
        </div>
    <?php endif ?>
    <!-- table -->
    <table class="w-full text-left">
        <thead class="text-sm text-white bg-kuning-1">
            <tr>
                <th scope="col" class="px-6 py-3 font-bold">
                    Gambar
                </th>
                <th scope="col" class="px-6 py-3 font-bold">
                    Nama Produk
                </th>
                <th scope="col" class="px-6 py-3 font-bold">
                    Deskripsi Produk
                </th>
                <th scope="col" class="px-6 py-3 font-bold">
                    Harga
                </th>
                <th scope="col" class="px-6 py-3 mr-19 text-center font-bold">
                    Tindakan
                </th>
            </tr>
        </thead>

        <tbody class="divide-y divide-gray-200">
            <?php foreach ($produk as $index => $p) : ?>
                <tr class="<?= $index % 2 === 0 ? 'bg-white' : 'bg-[#FFE7B8]' ?> border-b mr-6">
                    <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap truncate max-w-[100px]">
                        <img src="/img/<?= $p['foto_produk']; ?>" alt="" class="w-3/4">
                    </th>
                    <td class="px-6 py-4 font-medium text-black truncate max-w-[100px]">
                        <?= $p['nama_produk']; ?>
                    </td>
                    <td class="px-6 py-4 font-medium text-black truncate max-w-[100px]">
                        <?= $p['deskripsi']; ?>
                    </td>
                    <td class="px-6 py-4 font-medium text-black truncate max-w-[100px]">
                        Rp <?= number_format($p['harga'], 0, ',', '.'); ?>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex justify-center">
                            <div class="flex justify-center">
                                <a class="mr-2" href="/edit_produk/<?= $p['id_produk']; ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-blue-600">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                    </svg>
                                </a>
                                <a class="mr-2" href="/hapus_produk/<?= $p['id_produk']; ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-500">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg>

                                </a>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<?php $this->endSection(); ?>