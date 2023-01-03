<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- TAILWIND CSS -->

    @include("admin.admincss")

    <!-- ALPINE JS -->

    <title>Admin Coffea</title>
</head>
<body class="antialiased bg-gray-100">
    <div class="flex relative" x-data="{navOpen: false}">
        <!-- NAV -->
        
        <!-- END OF NAV -->

        @include("admin.navbar")

        <!-- PAGE CONTENT -->
     
            <div class="container-scroller">

            @include("admin.adminscript")

                <div style="position: absolute; top: 60px; right: 333px">

                    <form action="{{url('/uploadfood')}}" method="post" enctype="multipart/form-data">

                    @csrf

                         <div class="relative z-0 mb-6 w-full group">
        <input type="text" name="title" id="floating_first_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="Write a title " required />
        <label for="floating_first_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"></label>
    </div>

                         <div class="w-full">
                  <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"></label>
                  <input type="number" name="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Rp.2999" required="">
              </div>

                        <div>

                        <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"></label>
<textarea id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Leave a Description..." type="text" name="description" required></textarea>

                        </div>

                         <div>
                        
                           <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="small_size"></label>
<input class="block w-full mb-5 text-xs text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="small_size" type="file" name="image" required>
<p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG or GIF (MAX. 800x400px).</p>

                        </div>

                         <div>
                            <button type="Submit" value="Save" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Submit</button>
                        </div>

                    </form>

                    <br>



                        <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr class="w-full">
                <th style="padding: 30px" scope="col" class="py-3 px-6">
                    Food Name
                </th>
                <th style="padding: 30px" scope="col" class="py-3 px-6">
                    Price
                </th>
                <th style="padding: 30px" scope="col" class="py-3 px-6">
                    Description
                </th>
                <th style="padding: 30px" scope="col" class="py-3 px-6">
                    Image
                </th>
                <th style="padding: 30px" colspan="2" scope="col" class="py-3 px-6">
                    Action
                </th>
            </tr>
        </thead>

        <tbody>


        @foreach($data as $d)
     
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                
                <td class="py-4 px-6">
                    {{$d->title}}
                </td>

                <td class="py-4 px-6">
                    {{$d->price}}
                </td>

                <td class="py-4 px-6">
                    {{$d->description}}
                </td>

                <td><img height="200" width="200" src="{{Storage::url($d->image)}}" alt=""></td>

                <td class="py-4 px-6 text-right">
                    <a href="{{route('updateview',$d->id)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                </td>
                <td class="py-4 px-6 text-right">
                    <a href="{{route('deletemenu',$d->id)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Delete</a>
                </td>
            </tr>
            @endforeach

                </div>
                
            </div>

    </div>
</body>
</html>