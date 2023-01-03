<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.5/dist/flowbite.min.css" />
    <script src="../path/to/flowbite/dist/flowbite.js"></script>
    
    <!-- TAILWIND CSS -->

    @include("admin.admincss")

    <!-- ALPINE JS -->

    @include("admin.navbar")

    <title>Admin Coffea</title>
</head>
<body class="antialiased bg-gray-100">
    <div class="flex relative" x-data="{navOpen: false}">

        <!-- NAV -->
        <!-- END OF NAV -->

        <!-- PAGE CONTENT -->
        <main class="flex-1 h-screen overflow-y-scroll overflow-x-hidden">

        </main>

        <div>

         @include("admin.adminscript")

        <div style="position: relative; top: 60px; right: 333px;">

        <div style="position: relative; top: -555px; right: 333px;" class="overflow-x-auto relative">
    <table class="w-full text-left text-red-500 dark:text-red-400">
        <thead class="text-xs text-red-700 uppercase bg-red-50 dark:bg-red-700 dark:text-red-400">
            <tr>
                <th scope="col" class="py-3 px-6">
                    Name
                </th>
                <th scope="col" class="py-3 px-6">
                    Email
                </th>
                <th scope="col" class="py-3 px-6">
                    Action
                </th>
            </tr>
        </thead>

        <tbody>
             @foreach($data as $d)
              
                    <tr align="center">
                        <td>{{ $d->name }}</td>
                        <td>{{ $d->email }}</td>

                        @if($d->usertype=="0")
                        <td><a href="{{ url('/deleteuser', $d->id) }}">delete</a></td>
                        @else
                        <td><a>Not Allowed</a></td>

                        @endif

                    </tr>

                    @endforeach
           
        </tbody>
    </table>
</div>

        </div>

        </div>

    </div>
</body>
</html>