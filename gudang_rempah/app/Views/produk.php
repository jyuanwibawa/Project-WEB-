<?php $this->extend('layout/templateUser'); ?>

<?php $this->section('content'); ?>

<div class="flex shadow-3xl">
    <div class="w-[586px] h-[340px] mr-8">
        <img src="/img/<?= $gambar; ?>" class="w-full h-full rounded-4 object-cover ">
    </div>
    <div class=" py-12 w-135">
        <h1 class="font-semibold font-nunito-sans text-8 text-kuning-1"><?= $nama; ?></h1>
        <h1 class="font-monda text-5"><?= $deskripsi; ?></h1>
    </div>
</div>
<h1 class="text-center font-poppins text-12 my-4">Produk Olahan Dari Bahan Utama <br>
    & Pelengkap
</h1>

<div class="flex flex-wrap gap-[35px]">
    <?php foreach ($produk as $index => $p) : ?>
        <div class="relative">
            <div class="bg-cover bg-center p-5 flex flex-col justify-end w-[375px] h-[276px]" style="background-image: url('/img/<?= $p['foto_produk']; ?>');">
                <h1 class="font-suez-one text-7 w-52 text-white"><?= $p['nama_produk']; ?></h1>
                <button id="modalButton<?= $index ?>" class="self-end px-7 py-2 bg-kuning-1 text-white rounded-full">Explore</button>
            </div>
            <!-- Modal -->
            <div id="modal<?= $index ?>" class="fixed z-10 inset-0 overflow-y-auto hidden">
                <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                    <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                    </div>
                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                    <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-5xl sm:w-full">
                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <div class="sm:flex sm:items-start">
                                <div class="mt-3 flex gap-5 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                    <img src="/img/<?= $p['foto_produk']; ?>" class="w-1/2">
                                    <div class="mt-2">
                                        <h3 class="text-[30px] leading-6 font-medium text-gray-900 font-plus-jakarta-sans"><?= $p['nama_produk']; ?></h3>
                                        <div class="mt-2">
                                            <p class="text-lg font-semibold text-gray-900 font-plus-jakarta-sans ">Rp.<?= number_format($p['harga'], 0, ',', '.'); ?></p>
                                            <p class="text-sm text-black"><?= $p['deskripsi']; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="absolute top-0 right-0 m-4">
                            <button id="closeModal<?= $index ?>" class="text-gray-500 hover:text-gray-700 focus:outline-none">
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Modal -->

        </div>

        <script>
            const modal<?= $index ?> = document.getElementById('modal<?= $index ?>');
            const modalButton<?= $index ?> = document.getElementById('modalButton<?= $index ?>');
            const closeModal<?= $index ?> = document.getElementById('closeModal<?= $index ?>');

            modalButton<?= $index ?>.addEventListener('click', function() {
                modal<?= $index ?>.classList.remove('hidden');
            });

            closeModal<?= $index ?>.addEventListener('click', function() {
                modal<?= $index ?>.classList.add('hidden');
            });

            window.addEventListener('keydown', function(event) {
                if (event.key === 'Escape') {
                    modal<?= $index ?>.classList.add('hidden');
                }
            });
        </script>
    <?php endforeach ?>
</div>
<?php $this->endSection(); ?>