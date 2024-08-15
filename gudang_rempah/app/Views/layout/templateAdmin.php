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

<body class="antialiased font-monda leading-default bg-[#F6F6F6] text-black">
    <div class="absolute w-full min-h-75"></div>
    <!-- sidenav  -->
    <aside class="fixed bg-carrot-2 inset-y-0 flex-wrap items-center justify-between block w-full p-0 overflow-y-auto antialiased transition-transform duration-200 -translate-x-full border-0 shadow-2xl  max-w-64 ease-nav-brand z-990  xl:left-0 xl:translate-x-0" aria-expanded="false">
        <div class="h-19">
            <i class="absolute top-0 right-0 p-4 opacity-50 cursor-pointer fas fa-times  text-slate-400 xl:hidden" sidenav-close></i>
            <a class="flex justify-center items-center px-8 py-6 m-0 text-sm whitespace-nowrap  text-black" href="#">
                <div class="flex gap-2">
                    <img src="/img/logo.png" class="w-10 h-12">
                    <div>
                        <h1 class="font-monda text-4">Gudang</h1>
                        <h1 class="font-monda text-6">Rempah</h1>
                    </div>
                </div>
            </a>
        </div>
        <hr class="h-1 mt-0 bg-white" />
        <div class="items-center block w-auto max-h-screen overflow-auto h-sidenav grow basis-full">
            <ul class="flex flex-col pl-0 font-gowun-batang gap-2 mb-0">
                <li class="mt-0.5 w-full">
                    <a class="py-2.7  text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap transition-colors hover:bg-kuning-2  
                    <?= $menu == 'dashboard' ? 'font-bold text-white bg-kuning-1' : '' ?> " href="<?= base_url('kelola_produk') ?>">
                        <div class="mr-2 flex h-8 w-8 items-center justify-center bg-center stroke-0 text-center xl:p-2.5">
                            <i class="relative top-0 text-sm leading-normal text-blue-500 ni ni-tv-2"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 text-5 pointer-events-none ease">Kelola Produ</span>
                    </a>
                </li>                

                <li class="absolute bottom-2 mt-0.5 w-full font-gowun-batang bg-carrot-2">
                    <a class="py-2.7  text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap  transition-colors hover:bg-white hover" href="<?= base_url('logout') ?>">
                        <div class="flex h-8 w-8 items-center justify-center bg-center stroke-0 text-center xl:p-2.5">
                            <i class="relative top-0 text-sm leading-normal text-red-600 ni ni-world-2"></i>
                        </div>
                        <span class=" flex items-center text-5 font-bold duration-300 opacity-100 pointer-events-none ease">
                            Keluar</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>

    <!-- end sidenav -->

    <main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl">
        <div class="w-full px-10 py-6 mx-auto">
            <?php $this->renderSection('content'); ?>
        </div>
    </main>
</body>
<!-- main script file  -->
<script src="<?= base_url() ?>js/main.js"></script>
<script>
    function previewImg() {
        const gambar = document.querySelector('#gambar');
        const gambarLabel = document.querySelector('label[for="gambar"]');
        const imgPreview = document.querySelector('.img-preview');

        gambarLabel.textContent = gambar.files[0].name;

        const fileGambar = new FileReader();
        fileGambar.readAsDataURL(gambar.files[0]);

        fileGambar.onload = function(e) {
            imgPreview.src = e.target.result;
        }
    }
</script>

</html>