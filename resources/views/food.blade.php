<section>

    <div id="menu" class="parallax-window" data-parallax="scroll" data-image-src="img/antique-cafe-bg-02.jpg">
        <div class="container mx-auto tm-container py-24 sm:py-48">
            <div class="text-center mb-16">
                <h2 class="bg-white tm-text-brown py-6 px-12 text-4xl font-medium inline-block rounded-md">قائمة الكافيه لدينا</h2>
            </div>            

            <!-- //akan dijadikan di database -->

            @foreach($data as $data)

            <form action="{{url('addcart', $data->id)}}" method="post">

            @csrf

            <div class="flex flex-col lg:flex-row justify-around items-center">
                <div class="flex-1 m-5 rounded-xl px-4 py-6 sm:px-8 sm:py-10 tm-bg-brown tm-item-container">
                    <div class="flex items-start mb-6 tm-menu-item">
                        
                        <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-6">
                    <img src="{{Storage::url($data->image)}}" height="111" width="111" alt="Image" class="rounded-md">
                </th>
                <th scope="col" class="title">
                    {{$data->title}}
                </th>
                <th scope="col" class="price">
                    {{$data->price}}
                </th>
                <th scope="col" class="description">
                    {{$data->description}}
                </th>
            </tr>
        </thead>

    </table>
</div>
                        
                          <input style="width: 80px;" name="quantity" type="number" id="first_product"
                                class="bg-gray-50 w-14 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-2.5 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="1" required>
                        <input type="submit" value="add cart">

                    </div>

                    </form>
        </div>
        </div>        
    </div>
    </div>                                                        
                    @endforeach

            </div>
        </div>        
    </div>

</section>