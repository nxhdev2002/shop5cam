@include('layouts.header')
<div class="container p-3 mx-auto">
    <ol class="flex items-center w-full text-sm font-medium text-center text-gray-500 dark:text-gray-400 sm:text-base">
        <li
            class="flex md:w-full items-center text-blue-600 dark:text-blue-500 sm:after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10 dark:after:border-gray-700">
            <span
                class="flex items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200 dark:after:text-gray-500">
                <svg aria-hidden="true" class="w-4 h-4 mr-2 sm:w-5 sm:h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                        clip-rule="evenodd"></path>
                </svg>
                Giỏ <span class="hidden sm:inline-flex sm:ml-2">hàng</span>
            </span>
        </li>
        <li
            class="flex md:w-full items-center text-blue-600 dark:text-blue-500 sm:after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10 dark:after:border-gray-700">
            <span
                class="flex items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200 dark:after:text-gray-500">
                <svg aria-hidden="true" class="w-4 h-4 mr-2 sm:w-5 sm:h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                        clip-rule="evenodd"></path>
                </svg>
                Thanh <span class="hidden sm:inline-flex sm:ml-2">toán</span>
            </span>
        </li>
        <li class="flex items-center">
            <span class="mr-2">3</span>
            Xác <span class="hidden sm:inline-flex sm:ml-2">nhận</span>
        </li>
    </ol>
</div>

<div class="container relative w-full mx-auto bg-white">
    <div class="grid min-h-screen grid-cols-10">
        <div class="px-4 py-6 col-span-full sm:py-12 lg:col-span-6 lg:py-24">
            <div class="w-full max-w-lg mx-auto">
                <h1 class="relative text-2xl font-medium text-gray-700 sm:text-3xl">Checkout<span
                        class="block w-10 h-1 mt-2 bg-teal-600 sm:w-20"></span></h1>
                <form action="{{route('user.cart.confirm')}}" class="flex flex-col mt-10 space-y-4" method="POST">
                    @csrf
                    <div><label for="email" class="text-xs font-semibold text-gray-500">Email nhận hàng</label><input
                            type="email" id="email" name="email" value="{{auth()->user()->email}}"
                            class="block w-full px-4 py-3 mt-1 text-sm placeholder-gray-300 transition border-gray-300 rounded shadow-sm outline-none bg-gray-50 focus:ring-2 focus:ring-teal-500" />
                    </div>
                    <div><label for="name" class="sr-only">Name</label><input type="text" id="name" name="name"
                            value="{{auth()->user()->name}}"
                            class="block w-full px-4 py-3 mt-1 text-sm placeholder-gray-300 transition border-gray-300 rounded shadow-sm outline-none bg-gray-50 focus:ring-2 focus:ring-teal-500" />
                    </div>
                    <p class="mt-10 text-sm font-semibold text-center text-gray-500">By placing this order you agree to
                        the
                        <a href="#" class="text-teal-400 underline whitespace-nowrap hover:text-teal-600">Terms and
                            Conditions</a>
                    </p>
                    <button type="submit"
                        class="mt-4 inline-flex w-full items-center justify-center rounded bg-teal-600 py-2.5 px-4 text-base font-semibold tracking-wide text-white text-opacity-80 outline-none ring-offset-2 transition hover:text-opacity-100 focus:ring-2 focus:ring-teal-500 sm:text-lg">Tiến
                        hành thanh toán</button>
                </form>
            </div>
        </div>
        <div class="relative flex flex-col py-6 pl-8 pr-4 col-span-full sm:py-12 lg:col-span-4 lg:py-24">
            <h2 class="sr-only">Order summary</h2>
            <div>
                <img src="https://images.unsplash.com/photo-1581318694548-0fb6e47fe59b?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=880&q=80"
                    alt="" class="absolute inset-0 object-cover w-full h-full" />
                <div class="absolute inset-0 w-full h-full bg-gradient-to-t from-teal-800 to-teal-400 opacity-95"></div>
            </div>
            <div class="relative">
                <ul class="h-64 space-y-5 ">
                    @foreach($carts as $cart)
                    <li class="flex justify-between">
                        <div class="inline-flex">
                            <img src="{{$cart->product->picture_url}}" alt="" class="max-h-16" />
                            <div class="flex flex-col ml-3">
                                <p class="text-base font-semibold text-white">{{$cart->product->name}}</p>
                                <p class="text-xs font-medium text-white text-opacity-80">
                                    {{substr($cart->product->description, 0, 20)}}...</p>
                            </div>
                        </div>
                        <p class="text-sm font-semibold text-white">{{number_format($cart->product->price *
                            $cart->quantity)}} VNĐ</p>
                    </li>
                    @endforeach
                </ul>
                <div class="my-5 h-0.5 w-full bg-white bg-opacity-30"></div>
                <div class="space-y-2">
                    <p class="flex justify-between text-sm font-medium text-white"><span>
                            Giảm giá:</span><span>0 VNĐ</span></p>
                    <p class="flex justify-between text-sm font-medium text-white"><span>Vat:
                            0%</span><span>0 VNĐ</span></p>
                    <p class="flex justify-between text-lg font-bold text-white"><span>
                            Tổng:</span><span>{{number_format($total)}} VNĐ</span></p>
                </div>
            </div>
            <div class="relative flex mt-10">
                <p class="flex flex-col"><span class="text-sm font-bold text-white">Bảo hành hoàn tiền</span><span
                        class="text-xs font-medium text-white">trong vòng 7 ngày giao dịch</span></p>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')