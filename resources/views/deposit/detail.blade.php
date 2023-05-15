@include('layouts.header')

<div class="container mx-auto my-3 bg-white rounded-lg">
    <div class="flex flex-col p-3">
        <h1 class="p-3 text-lg font-medium">{{$gateway->name}}</h1>
        <p class="p-3">{{$gateway->description}}</p>
        <div class="flex flex-col items-center justify-center p-5">
            {!! $gateway->content !!}
            <div class="relative z-0 w-1/3 pb-3">
                <input type="text" id="floating_standard"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " />
                <label for="floating_standard"
                    class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nhập
                    số tiền cần nạp</label>
            </div>
            <button type="button"
                class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Nạp
                tiền</button>
        </div>
    </div>
</div>

@include('layouts.footer')