<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Monda:wght@400;700&family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Suez+One&display=swap" rel="stylesheet">
    <title><?= $title; ?></title>
    <link href="<?= base_url() ?>css/style.css" rel="stylesheet" />
</head>

<body class="font-normal leading-default bg-white text-black flex flex-col min-h-screen">
    <!-- navbar -->
    <nav class="flex w-full h-16 px-10 mt-12 gap-100 items-end">
        <div class="flex gap-2">
            <img src="/img/logo.png" class="w-10 h-12">
            <div>
                <h1 class="font-monda text-6 font-bold">Gudang</h1>
                <h1 class="font-monda text-10 -mt-5 font-bold">Rempah</h1>
            </div>
        </div>
        <div class="flex gap-16 font-abrill text-6 ">
            <a href="/" class="border-b-2 font-monda h-10 <?= $menu == 'home' ? 'text-kuning-1 border-kuning-1' : 'border-transparent' ?> ">Home</a>
            <div class="relative">
                <a href="#" class="border-b-2 <?= $menu == 'produk' ? 'text-kuning-1 border-kuning-1' : 'border-transparent' ?> font-monda h-10"><?= $nama_menu; ?></a>
                <div class="absolute hidden bg-gradient-to-r from-kuning-2 to-kuning-1 rounded-4 shadow-md py-2 w-85" id="produkSubMenu">
                    <?php foreach ($kategori as $index => $k) : ?>
                        <a href="/produk/<?= $k['id_kategori']; ?>" class="block px-4 py-2 text-white hover:bg-kuning-1/70 font-monda"><?= $k['nama_kategori']; ?></a>
                    <?php endforeach ?>
                </div>
            </div>
            <a href="#footer" class="border-b-2 font-monda border-transparent h-10">Kontak Kami</a>
        </div>
    </nav>


    <!-- main -->
    <main class="flex-grow py-20 px-25">
        <?php $this->renderSection('content'); ?>
    </main>
    <!-- footer -->
    <footer id="footer" class="border-t-[1px] border-black transition-transform transform translate-y-0 transition-duration-500 transition-delay-100">
        <div class="flex justify-between px-8 py-11">
            <div class="flex gap-2 ml-20">
                <img src="/img/logo.png" class="w-10 h-12">
                <div>
                    <h1 class="font-monda text-6 font-bold">Gudang</h1>
                    <h1 class="font-monda text-10 -mt-5 font-bold">Rempah</h1>
                </div>
            </div>
            <div class="flex gap-5">
                <div class="flex flex-col items-center  gap-3">
                    <a href="#" class="font-monda text-6">Home</a>
                    <a href="https://api.whatsapp.com/send/?phone=6281359622852&text&type=phone_number&app_absent=0" target="_blank">
                        <img src="/img/whatsapp.png" alt="">
                    </a>
                </div>
                <div class="flex flex-col items-center  gap-3">
                    <a href="#" class="font-monda text-6">Produk</a>
                    <a href="https://shopee.co.id/gudangrempah08?uls_trackid=4vosusdd02sr&utm_content=3Jc7kGuM1jLBojXA59oPyc2B8TAw" target="_blank">
                        <img src="/img/shopee.png" alt="">
                    </a>
                </div>
                <div class="flex flex-col items-center  gap-3">
                    <a href="#" class="font-monda text-6">Kontak</a>
                    <a href="https://www.tiktok.com/@gudangrempah5?_t=8mJgL4YrUky&_r=1" target="_blank">
                        <img src="/img/tiktok.png" alt="">
                    </a>
                </div>
            </div>
            <div class="w-[329px]">
                <h1 class="font-monda text-6">About</h1>
                <p class="font-monda text-5 ">Jl. Veteran no12, Lokawakru,Kota Malang, Jawa Timur</p>
            </div>
        </div>
        <div class="bg-kuning-2 text-center py-5 font-monda text-5">
            ©2024 Frizi || All Rights Reserved
        </div>
    </footer>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const produkMenu = document.querySelector('.font-abrill .relative');

            produkMenu.addEventListener('mouseover', function() {
                const subMenu = document.getElementById('produkSubMenu');
                subMenu.classList.remove('hidden');
            });

            produkMenu.addEventListener('mouseout', function() {
                const subMenu = document.getElementById('produkSubMenu');
                subMenu.classList.add('hidden');
            });
        });
    </script>
</body>

</html>