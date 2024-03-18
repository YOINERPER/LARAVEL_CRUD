<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/004f8ccfaf.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    @vite('resources/css/app.css')
</head>

<body class="w-full h-screen">
    <nav class="w-full h-16  md:lg:h-16  bg-[#24252A] flex  justify-between">
        <div class="h-full lg:w-1/3 md:w-1/3 sm:w-full flex items-center justify-start  ps-4">
            <div class="  rounded-full w-14 h-14 border-2 border-[#0089A6]">
                <img class="rounded-full h-full w-full  "
                    src="https://www.kienyke.com/sites/default/files/styles/interna_contenido_xl_l_m/public/2020-08/diomedes-diaz_0.jpeg?itok=mwLX-lmc"
                    alt="perfil.png">
            </div>
            <div class="flex flex-col pl-3 text-white font-sans size-10 w-auto h-full justify-center">
                <span class="  ">@yield('user_name')</span>
                <span class=" text-[#0089A6]">@yield('usu_rol')</span>
            </div>

        </div>
        <div class="h-full lg:w-1/3  md:w-1/3 sm:w-0 md:flex lg:flex  items-center justify-center  hidden sm:flex">
            <div class="w-full h-auto flex items-center rounded-full bg-white p-1">
                <i class="fa-solid fa-magnifying-glass pl-2 bg-white w-25 "></i>
                <input class="pl-4 w-full h-full border-0 focus:outline-none" type="text" placeholder="Search">
            </div>

        </div>
        <div class="h-full w-1/3 flex items-center justify-end pr-4 text-white">
            <button class="w-20 bg-[#0089A6] rounded-full p-2 hover:text-[#24252A] hover:bg-slate-600"><i
                    class="fa-solid fa-right-from-bracket"></i></button>
        </div>
    </nav>

    <section class="w-full h-4/5 sm:h-3/4 md:lg:h-4/5 flex justify-center items-center">
        @yield('main')

        

    </section>

    
    <footer class="w-full h-20 md:lg:h-14 bg-[#24252A]">
        <div class="w-full h-full flex items-center justify-center">
            <span class="text-white font-sans">@ by Yoiner Pertuz 2024</span>

        </div>

    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
