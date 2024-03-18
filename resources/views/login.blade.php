<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-900 flex items-center justify-center h-screen">
    <div class="lg:p-10 sm:p-0 w-10/12 h-full flex flex-col justify-center items-center ">

        <form class="flex flex-col bg-white w-full p-10 justify-around h-auto lg:w-6/12"
            action="{{ url('login') }}" method="post">
            @csrf
            <h1 class="pb-5 text-center font-sans text-2xl ">Welcome back!</h1>
            <label class="font-medium font-sans text-md text-gray-900 " for="">Email:</label>
            <input class="  mt-5 mb-5 p-2  border-b-slate-900 " type="text" name="email" id="email" required>
            <label class="font-medium font-sans text-md text-gray-900" for="">Password:</label>
            <input class=" mt-5 mb-5 p-2" type="password" name="password" id="password" required>

            <input class="w-90 bg-gray-900 p-2 text-white hover:bg-slate-800 cursor-pointer" type="submit"
                value="Login">

            @if (isset($mensaje))
               
                @if($mensaje == 2)
                    <div class=" divMensaje w-full   bg-yellow-600 mt-3 p-2 text-center font-sans text-white">
                        <span>Usuario o contraseña
                            incorrectos</span></div>
                @elseif($mensaje == 3)
                    <div class=" divMensaje w-full   bg-red-600 mt-3 p-2 text-center font-sans text-white">Ingrese todos
                        los campos
                    </div>
                @endif

                {{$mensaje = '';}}
            @endif

        </form>
    </div>
</body>

</html>

<script>
    const divmensaje = document.querySelector('.divMensaje');
   
    if (divmensaje.classList.contains('divMensaje')) {
        console.log(divmensaje);
        setTimeout(() => {
            divmensaje.classList.add('hidden');
        },3000)
    }
</script>
