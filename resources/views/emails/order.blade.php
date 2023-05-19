<script src="https://cdn.tailwindcss.com"></script>
<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-6 py-3">
                Tên sản phẩm
            </th>
            <th scope="col" class="px-6 py-3">
                ID chi tiết
            </th>
            <th scope="col" class="px-6 py-3">
                Nội dung đơn hàng
            </th>
            <th scope="col" class="px-6 py-3">
                Thời gian
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($productDetails as $productDetail)
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{$order->product->name}}
            </th>
            <td class="px-6 py-4">
                {{$productDetail->id}}
            </td>
            <td class="px-6 py-4">
                <div class="relative mb-6">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z">
                            </path>
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                        </svg>
                    </div>
                    <input type="text" id="input-group-1"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{$productDetail->detail}}" disabled>
                </div>
            </td>
            <td class="px-6 py-4">
                {{$productDetail->updated_at}}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>