<!DOCTYPE html>
<html lang="en">

<head>

    <base href="/public">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
   
    <link rel="stylesheet" href="css/tailwind.css">

      <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.5/dist/flowbite.min.css" />
    <script src="../path/to/flowbite/dist/flowbite.js"></script>
    <script src="https://unpkg.com/flowbite@1.5.5/dist/flowbite.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Antique Bakery Cafe</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500;600&family=Oswald:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/tooplate-antique-cafe.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>

<body>    
    <div id="intro" class="parallax-window" data-parallax="scroll" data-image-src="img/antique-cafe-bg-01.jpg">
        <!-- //tadi ada di id ada tm-nav nyambung js yg di bawah jadi di hapus -->
        <nav id="" class="fixed w-full">
            <div class="tm-container mx-auto px-2 md:py-6 text-right">

                <button class="md:hidden py-2 px-2" id="menu-toggle">

            <i class="fas fa-2x fa-bars tm-text-gold"></i>

                </button>

                <ul class="mb-3 md:mb-0 text-2xl font-normal flex justify-end flex-col md:flex-row">

                    <li class="inline-block mb-4 mx-4">
                        <a href="#intro" class="tm-text-gold py-1 md:py-3 px-4">Intro</a>
                    </li>

                    <li class="inline-block mb-4 mx-4"><a href="#menu" class="tm-text-gold py-1 md:py-3 px-4">Menu</a>
                    </li>

                    <li class="inline-block mb-4 mx-4"><a href="#about" class="tm-text-gold py-1 md:py-3 px-4">About</a>
                    </li>

                    <li class="inline-block mb-4 mx-4"><a href="#contact" class="tm-text-gold py-1 md:py-3 px-4">Contact</a>
                    </li>

                    <li class="scroll-to-section" style="background-color: red;"><a href="">
                        
                    @auth


                    <a href="{{url('/showcart'.Auth::user()->id)}}">

                        Cart{{$count}}

                    </a>
                
                    @endauth

                    @guest

                        Cart[0]

                    @endguest

                    </a>
                </li>

                    <a href="" class="flex items-center">
                        <svg class="w-5 h-5 text-purple-600" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                       <span class="text-red-700"></span> 
                    </a>

                 <li>

                @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth

                    @else

                       <li> <a href="{{route('login')}}" class="tm-text-gold py-1 md:py-3 px-4  underline">Log in</a></li>

                        <br>

                        @if (Route::has('register'))
                          <li><a href="{{route('register')}}" class="tm-text-gold underline">Register</a></li>
                        @endif

                    @endauth
                </div>
            @endif

                    </li>

                </ul>
            </div>            
        </nav>

<div  id="top" class="container h-96 relative mx-auto overflow-x-auto mt-96 flex justify-center items-center shadow-md sm:rounded-lg">
    <table  align="center" style="top: 155px;" bgcolor="yellow" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">

        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

            <tr>
                <th style="padding: 30px;" scope="col" class="py-3 px-6">
                    Food
                </th>
                <th style="padding: 30px;" scope="col" class="py-3 px-6">
                    Price
                </th>
                <th style="padding: 30px;" scope="col" class="py-3 px-6">
                    Quantity
                </th>
                <th style="padding: 30px;" scope="col" class="py-3 px-6">
                    Action
                </th>
            </tr>
            
        </thead>
  
</div>

                <form action="{{url('orderconfirm')}}" method="post">

                    @csrf

                @foreach($data as $data)

                <tr align="center">

                        <td>
                            <input type="text" name="foodname[]" value="{{$data->title}}" hidden="">
                            {{$data->title}}
                        </td>

                        <td>
                            <input type="text" name="price[]" value="{{$data->price}}" hidden="">
                            {{$data->price}}
                        </td>

                        <td>
                            <input type="text" name="quantity[]" value="{{$data->quantity}}" hidden="">
                            {{$data->quantity}}
                        </td>
                        
                    </tr>
                    @endforeach
    
                    @foreach($data2 as $data2)
    
                        <tr style="position: relative; top: -55px; right: -1111px;">
                           <td class="py-7 px-3">
                        <a href="{{url('/remove',$data2->id)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Remove</a>
                            </td>
                        </tr>
    
                    @endforeach

            </table>

            <div style="position: absolute; down: 33; top: 533px; left: 555px; right: 555px; padding: 10px" align="center">

                <button id="dropdownDefault" data-dropdown-toggle="dropdown" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">Order Now <svg class="ml-2 w-4 h-4" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>

<!-- Dropdown menu -->

<div id="dropdown" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
    
  <div style="padding: 10px;">
                        <label for="">Name</label>
                        <input type="text" name="name" placeholder="Name">
                    </div>

                    <div style="padding: 10px;">
                        <label for="">Phone</label>
                        <input type="number" name="phone" placeholder="Phone Number">
                    </div>

                    <div style="padding: 10px;">
                        <label for="">Address</label>
                        <input type="text" name="address" placeholder="Address">
                    </div>

                               <div style="padding: 10px;">
                                   <!-- <input class="btn btn-succes" type="submit" value="Order Confirm"> -->
                    
                                    <button class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-green-400 to-blue-600 group-hover:from-green-400 group-hover:to-blue-600 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800">
  <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
      Order Confirm
  </span>
</button>

            </div>
                </div>
                
            </div>
            <div @click="open = !open" x-data="{open:false}" id="appear" align="center" style="display: ; position: absolute; down: 33; top: 555px; left: 555px; right: 555px; padding: 10px;" class="dropdown-toggle from-select">
            
               </div>

        </form>

            <script type="text/javascript">

            </script>

        <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/parallax.min.js"></script>
    <script src="js/jquery.singlePageNav.min.js"></script>
    <script>

        function checkAndShowHideMenu() {
            if(window.innerWidth < 768) {
                $('#tm-nav ul').addClass('hidden');                
            } else {
                $('#tm-nav ul').removeClass('hidden');
            }
        }

              $("#order").click(

                    function()
                    {
                        $("appear").show();
                    }
                );

                $("#close").click(

                    function()
                    {
                        $("appear").hide();
                    }
                );

        $(function(){
            var tmNav = $('#tm-nav');
            tmNav.singlePageNav();

            checkAndShowHideMenu();
            window.addEventListener('resize', checkAndShowHideMenu);

            $('#menu-toggle').click(function(){
                $('#tm-nav ul').toggleClass('hidden');
            });

            $('#tm-nav ul li').click(function(){
                if(window.innerWidth < 768) {
                    $('#tm-nav ul').addClass('hidden');
                }                
            });

            $(document).scroll(function() {
                var distanceFromTop = $(document).scrollTop();

                if(distanceFromTop > 100) {
                    tmNav.addClass('scroll');
                } else {
                    tmNav.removeClass('scroll');
                }
            });
            
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();

                    document.querySelector(this.getAttribute('href')).scrollIntoView({
                        behavior: 'smooth'
                    });
                });
            });
        });
    </script>
</body>
</html>