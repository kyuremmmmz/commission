<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Game Information</title>

    <!-- Fonts and Styles -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body class="overflow-hidden font-sans antialiased dark:bg-white dark:text-white/50" onLoad="noBack();" onpageshow="if (event.persisted) noBack();" onUnload="">
    <div class="flex items-center md:w-[83.33%] h-24 overflow-hidden font-sans text-3xl font-semibold text-right text-black bg-gray-300 size-fullflex sm:float-end 2xl:float-end md:float-end xl:float-end">
        <h1 class="relative xl:mx-auto xl:text-center xl:left-11 xl:right-11">Game Information Management System</h1>
    </div>

    <main class="relative h-screen md:h-[30%] xl:h-[30%] rounded-full lg:h-80 sm:h-96 2xl:h-[100%] bg-slate-500 text-black left-[299px] top-[200px]  float-end">
        <h1 class="absolute text-[50px] right-[200px] bottom-[20px] 2xl:left-[-291px] xl:left-[-300px]">Announcements:</h1>
        <div class="relative">
            <div class="absolute grid self-center left-[-300px] grid-cols-3 items-center justify-center grid-rows-3 rounded-tl-lg gap-4 h-[1050px] text-center w-[1600px] bg-slate-500">

                <div class="h-20 mb-16 bg-slate-700">
                    <h1 class=" text-[30px]">Users</h1>
                </div>
                <div class="h-20 mb-16 bg-slate-700">Date Played</div>
                <div class="h-20 mb-16 bg-slate-700">fs</div>
                <div class="h-20 mb-16 bg-slate-700">hi</div>
                <div class="h-20 mb-16 bg-slate-700"><h1>Player Ranks: </h1></div>
            </div>
        </div>
    </main>


    <!-- Side Content -->
   <aside class="relative overflow-hidden text-2xl text-white sm:text-center xl:text-center lg:text-center bg-zinc-800 h-dvh w-80 col-1">
    <div class="relative rounded-full bg-zinc-500 md:h-80 md:w-200px top-2">
        <img src="https://scontent.xx.fbcdn.net/v/t1.15752-9/361839816_594450056207554_5067445039035230165_n.jpg?stp=dst-jpg_p206x206&_nc_cat=109&ccb=1-7&_nc_sid=5f2048&_nc_eui2=AeH7aVd9xyUPlxsDrw1HGupokKj6k4-Hb5-QqPqTj4dvn469EAukG5ZNsWA_cyMs37BNKmn5QYbzvKCBQ6xFxPf4&_nc_ohc=84g4L3woZVQQ7kNvgFDpguu&_nc_ad=z-m&_nc_cid=0&_nc_ht=scontent.xx&oh=03_Q7cD1QF0_aJOy-nhtWjbI392g5lW91ZC99u5NrNgihDT6de4dw&oe=667BA8A9" class="relative object-cover w-full h-full rounded-full" alt="Logo">
        </div>
        <p class="relative top-2">University of Perpetual Help System Dalta - Molino Campus</p>
        <div class="relative">
            <div class="relative flex items-center rounded-tl-full rounded-tr-full rounded-bl-full rounded-br-full cursor-pointer justify-self-auto top-6 hover:bg-sky-700 w-50 focus:bg-sky-700">
                <i class="relative fas fa-tachometer-alt left-20"></i>
                <a href="{{route('game.index')}}" class="relative left-24">Dashboard</a>
            </div>
            <div class="relative flex items-center h-auto gap-1 mt-4 rounded-tl-full rounded-tr-full rounded-bl-full rounded-br-full cursor-pointer justify-self-auto top-6 row col-1 hover:bg-sky-700 w-50">
                <i class="relative fas fa-basketball-ball left-20"></i>
                <a href="{{route('game1.index')}}" class="relative left-24">Games</a>
            </div>
            <div class="relative flex items-center h-auto gap-1 mt-4 rounded-tl-full rounded-tr-full rounded-bl-full rounded-br-full cursor-pointer justify-self-auto top-6 row col-1 hover:bg-sky-700 w-50">
                <i class="relative fas fa-users left-20"></i>
                <a href="#" class="relative left-24">Users</a>
            </div>
            <div class="relative flex items-center h-auto gap-1 mt-4 rounded-tl-full rounded-tr-full rounded-bl-full rounded-br-full cursor-pointer justify-self-auto top-6 row col-1 hover:bg-sky-700 w-50">
                <i class="relative fas fa-trophy left-20"></i>
                <a href="{{route('admin.createUser')}}" class="relative left-24">Team Rankings</a>
            </div>
            <div class="relative flex items-center h-auto gap-1 mt-4 rounded-tl-full rounded-tr-full rounded-bl-full rounded-br-full cursor-pointer justify-self-auto top-6 row col-1 hover:bg-sky-700 w-50">
                <i class="relative fas fa-cog left-20"></i>
                <a href="#" class="relative left-24">Settings</a>
            </div>
            <div class="relative flex items-center h-auto gap-1 mt-4 rounded-tl-full rounded-tr-full rounded-bl-full rounded-br-full cursor-pointer justify-self-auto top-6 row col-1 hover:bg-sky-700 w-50">
                <i class="relative fas fa-sign-out left-20"></i>
                <form action="{{route('admin.login')}}" method="get">
                    @csrf

                    <button type="submit"  class="relative left-24">Sign out</button>
                </form>

            </div>
        </div>
    </aside>
    <script type="text/javascript">
        window.history.forward();
        function noBack()
        {
            window.history.forward();
        }
    </script>
</body>
</html>