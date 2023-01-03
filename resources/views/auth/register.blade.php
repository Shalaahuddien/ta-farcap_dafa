<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

    <!-- page title -->
    <title>SignUp</title>
</head>

<body>

    <!-- body starts-->

    <form action="/register" method="POST" class="mt-8" @submit.prevent="submitData">

            <div class="mx-auto max-w-lg ">

            @csrf

        <div class="bg-gray-200 relative min-h-screen antialiased border-t-8 border-black">
            <div class="max-w-sm mx-auto px-6" x-data="getData()">

                <!-- modal starts -->

                <!-- modal ends -->
        
                <!-- form container starts -->

                <div x-show.transition="!status && !isError" class="relative h-screen flex flex-wrap items-center">
                    <div class="w-full relative">
        
                        <div class="mt-6">
                            <div class="text-center font-semibold text-black text-2xl"> SignUp </div>

                            <!-- registration form starts-->

                            <!-- registration form ends -->

                        </div>

                         <div class="py-1">
                                <span class="px-1 text-sm text-gray-600">Username</span>
                                <input  name="name" id="name" placeholder="" type="text" x-model="formData.Username" class="text-md block px-3 py-2 rounded-lg w-full bg-white border-2 
                                              border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500
                                              focus:bg-white focus:border-gray-600 focus:outline-none">
                            </div>

                            <div class="py-1">
                                <span class="px-1 text-sm text-gray-600">Email</span>
                                <input  name="email" type="email" id="email"  placeholder="" type="text" x-model="formData.email" class="text-md block px-3 py-2 rounded-lg w-full bg-white border-2 
                                              border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500
                                              focus:bg-white focus:border-gray-600 focus:outline-none">
                            </div>
                            
                            <div class="py-1">
                                <span class="px-1 text-sm text-gray-600">Password</span>
                                <input name="password" type="password" id="password" placeholder="" type="password" x-model="formData.password" class="text-md block px-3 py-2 rounded-lg w-full bg-white border-2 
                                            border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 
                                              focus:bg-white focus:border-gray-600 focus:outline-none">
                            </div>
                            
                            <div class="py-1">
                                <span class="px-1 text-sm text-gray-600">Password Confirm</span>
                                <input name="password_confirmation" type="password" id="password_confirmation" placeholder="" type="password" x-model="formData.password_confirm" class="text-md block px-3 py-2 rounded-lg w-full bg-white border-2 
                                            border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 
                                            focus:bg-white focus:border-gray-600 focus:outline-none">
                            </div>
                            
                            <!-- validation starts -->

                            <!-- validation ends -->
                            
                            <button class="mt-3 text-lg font-semibold bg-gray-800 w-full text-white 
                                          rounded-lg px-6 py-3 block shadow-xl hover:text-white hover:bg-black" x-text="buttonLabel"
                                :disabled="loading">
                            </button>
                            </div>

                    </div>
                </div>

                <!-- form container ends -->
        
            </div>
        </div>

    <!-- body ends-->
    
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer>
    </script>

        <script>
            function getData() {
                return {
                    formData: {
                        Username: "",
                        email: "",
                        password: "",
                        password_confirm: ""
                    },
                    status: false,
                    loading: false,
                    isError: false,
                    modalHeaderText: "",
                    modalBodyText: "",
                    buttonLabel: 'Submit',
                }
            }
        </script>

        </form>

</body>

</html>