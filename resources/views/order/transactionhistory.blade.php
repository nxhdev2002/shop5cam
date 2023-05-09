@include('layouts.header')
<div class="bg-white">
    <div class="py-16 sm:py-24">
        <div class="max-w-7xl mx-auto sm:px-2 lg:px-8">
            <div class="max-w-2xl mx-auto px-4 lg:max-w-4xl lg:px-0">
                <h1 class="text-2xl font-extrabold tracking-tight text-gray-900 sm:text-3xl">Lịch sử giao dịch</h1>
                <p class="mt-2 text-sm text-gray-500">Kiểm tra trạng thái của các đơn đặt hàng gần đây, quản lý hàng trả
                    lại</p>
            </div>
        </div>

        <div class="mt-16">
            <div class="max-w-7xl mx-auto sm:px-2 lg:px-8">
                <div class="max-w-2xl mx-auto space-y-8 sm:px-4 lg:max-w-4xl lg:px-0">
                    <div class="bg-white border-t border-b border-gray-200 shadow-sm sm:rounded-lg sm:border">

                        <div
                            class="flex items-center p-4 border-b border-gray-200 sm:p-6 sm:grid sm:grid-cols-4 sm:gap-x-6">
                            <dl
                                class="flex-1 grid grid-cols-2 gap-x-6 text-sm sm:col-span-3 sm:grid-cols-3 lg:col-span-2">
                                <div>
                                    <dt class="font-medium text-gray-900">Mã giao dịch</dt>
                                    <dd class="mt-1 text-gray-500">#Mã</dd>
                                </div>
                                <div class="hidden sm:block">
                                    <dt class="font-medium text-gray-900">Ngày đặt</dt>
                                    <dd class="mt-1 text-gray-500">
                                        <time datetime="">Ngày giao dịch</time>
                                    </dd>
                                </div>
                                <div>
                                    <dt class="font-medium text-gray-900">Tổng tiền</dt>
                                    <dd class="mt-1 font-medium text-gray-900">$Giá</dd>
                                </div>
                            </dl>
                            <!-- View Detail transaction and Invoice -->
                            <div class="relative flex justify-end lg:hidden">

                                <div class="origin-bottom-right absolute right-0 mt-2 w-40 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                                    role="menu" aria-orientation="vertical" aria-labelledby="menu-0-button"
                                    tabindex="-1">
                                    <div class="py-1" role="none">
                                        <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                                        <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem"
                                            tabindex="-1" id="menu-0-item-0">Xem</a>
                                        <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem"
                                            tabindex="-1" id="menu-0-item-1">Hóa đơn</a>
                                    </div>
                                </div>
                            </div>

                            <div class="hidden lg:col-span-2 lg:flex lg:items-center lg:justify-end lg:space-x-4">
                                <a href="#"
                                    class="flex items-center justify-center bg-white py-2 px-2.5 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    <span>Xem chi tiết giao dịch</span>
                                    <span class="sr-only">#Mã</span>
                                </a>
                                <a href="#"
                                    class="flex items-center justify-center bg-white py-2 px-2.5 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    <span>Xem hóa đơn</span>
                                    <span class="sr-only">cho Mã giao dịch</span>
                                </a>
                            </div>
                        </div>

                        <!-- Products -->
                        <h4 class="sr-only">Sản phẩm</h4>
                        <ul role="list" class="divide-y divide-gray-200">
                            <li class="p-4 sm:p-6">
                                <div class="flex items-center sm:items-start">
                                    <div
                                        class="flex-shrink-0 w-20 h-20 bg-gray-200 rounded-lg overflow-hidden sm:w-40 sm:h-40">
                                        <img src="/resources/img/baal2.png" alt=""
                                            class="w-full h-full object-center object-cover">
                                    </div>
                                    <div class="flex-1 ml-6 text-sm">
                                        <div class="font-medium text-gray-900 sm:flex sm:justify-between">
                                            <h5>Tên sản phẩm</h5>
                                            <p class="mt-2 sm:mt-0">$Giá</p>
                                        </div>
                                        <p class="hidden text-gray-500 sm:block sm:mt-2">Lorem ipsum dolor sit amet
                                            consectetur adipisicing elit. Dicta laborum culpa, cum doloribus labore
                                            minus tenetur! Consectetur modi maiores quo aliquam placeat accusantium
                                            deleniti? Hic necessitatibus sed quaerat accusantium id.</p>
                                    </div>
                                </div>

                                <div class="mt-6 sm:flex sm:justify-between">
                                    <div class="flex items-center">
                                        <!-- Heroicon name: solid/check-circle -->
                                        <svg class="w-5 h-5 text-green-500" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <p class="ml-2 text-sm font-medium text-gray-500">Thanh toán thành công
                                    </div>

                                    <div
                                        class="mt-6 border-t border-gray-200 pt-4 flex items-center space-x-4 divide-x divide-gray-200 text-sm font-medium sm:mt-0 sm:ml-4 sm:border-none sm:pt-0">
                                        <div class="flex-1 flex justify-center">
                                            <a href="#"
                                                class="text-indigo-600 whitespace-nowrap hover:text-indigo-500">Xem sản
                                                phẩm</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')