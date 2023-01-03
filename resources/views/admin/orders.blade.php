<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- TAILWIND CSS -->
    @include("admin.admincss")

    <!-- ALPINE JS -->

    @include("admin.adminscript")

    <title>Admin Coffea</title>
</head>
<body class="antialiased bg-gray-100">
    <div class="flex relative" x-data="{navOpen: false}">
        <!-- NAV -->
        @include("admin.navbar");
        <!-- END OF NAV -->

        <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
    

           <form action="{{url('/search')}}" method="get">

            @csrf

               <div class="relative">
            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor"
                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                        clip-rule="evenodd"></path>
                    </svg>
                </div>
                
                <input class="block p-2 pl-10 w-80 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Search for items" type="text" name="search" style="color:blue;"> 
                
            </div>
    
            </form>

            <br>

    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>

                <th scope="col" class="py-3 px-6">
                    Name
                </th>
                <th scope="col" class="py-3 px-6">
                    Phone
                </th>
                <th scope="col" class="py-3 px-6">
                    Address
                </th>
                <th scope="col" class="py-3 px-6">
                    Food Name
                </th>
                <th scope="col" class="py-3 px-6">
                    Price
                </th>
                <th scope="col" class="py-3 px-6">
                    Quantity
                </th>
                <th scope="col" class="py-3 px-6">
                    Total Price
                </th>
                <!-- <th scope="col" class="py-3 px-6">
                    Action
                </th> -->
            </tr>

             @foreach($data as $d)

        <tr align="center" style="background-color: ;">

            <td>{{$d->name}}</td>
            <td>{{$d->phone}}</td>
            <td>{{$d->address}}</td>
            <td>{{$d->foodname}}</td>
            <td>Rp.{{$d->price}}</td>
            <td>{{$d->quantity}}</td>
            <td>Rp.{{$d->price * $d->quantity}}</td>

        </tr>

        @endforeach

        </thead>

    </table>
</div>
              
    </div>

        <!-- PAGE CONTENT -->
        <main class="flex-1 h-screen overflow-y-scroll overflow-x-hidden">

        </main>
    </div>
</body>
</html>