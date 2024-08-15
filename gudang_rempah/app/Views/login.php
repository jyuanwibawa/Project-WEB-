<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Monda:wght@400;700&family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Suez+One&display=swap" rel="stylesheet">
    <title>Login Admin</title>
    <link href="<?= base_url() ?>css/style.css" rel="stylesheet" />
</head>

<body class=" antialiased font-normal leading-default bg-[#F6F6F6] text-black">
    <div class="flex justify-center items-center h-screen bg-gray-100">
        <div class="bg-white rounded-lg shadow-lg  w-1/2 p-8 max-w-md">
            <h2 class="text-2xl font-bold mb-4">Login Admin</h2>

            <!-- pesan error -->
            <?php
            $errors = session()->getFlashdata('errorslogin');
            if ($errors !== null && is_array($errors)) :
            ?>
                <div class="alert flex p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                    <svg class="flex-shrink-0 inline w-4 h-4 me-3 mt-[2px]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="sr-only">Danger</span>
                    <div>
                        <span class="font-medium">Terdapat beberapa hal yang perlu anda perhatikan:</span>
                        <ul class="mt-1.5 list-disc list-inside">
                            <?php foreach ($errors as $error) : ?>
                                <li class=""><?= esc($error) ?></li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                </div>
            <?php endif; ?>
            <?php if (session()->has('pesanlogin')) : ?>
                <div class="alert alert-success flex items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 " role="alert">
                    <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                        <span class="font-medium"><?= session()->get('pesanlogin') ?></span>
                    </div>
                </div>
            <?php endif ?>
            <?php echo form_open('auth/cek_login'); ?>
            <div class="mt-4">
                <label for="name" class="block text-sm font-semibold text-gray-600">Username</label>
                <input type="text" name="name" class="w-full rounded-full bg-gray-100 border-2 border-gray-200 focus:outline-none focus:border-blue-500 px-4 py-2 mt-2">
            </div>
            <div class="mt-4">
                <label for="password" class="block text-sm font-semibold text-gray-600">Password</label>
                <input type="password" name="password" class="w-full rounded-full bg-gray-100 border-2 border-gray-200 focus:outline-none focus:border-blue-500 px-4 py-2 mt-2">
            </div>
            <div class="mt-6">
                <button type="submit" class="w-full rounded-full bg-kuning-2 hover:bg-kuning-1 transition-colors text-white font-semibold px-4 py-2">Sign In</button>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 3000);
    </script>
</body>

</html>