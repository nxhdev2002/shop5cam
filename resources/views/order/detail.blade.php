@include('layouts.header')
<div class="container mx-auto my-3 bg-white rounded-lg">
    <div class="flex flex-col p-3">
        <h3 class="p-3 text-lg font-medium">Chi tiết giao dịch</h3>
        <div class="bg-slate-400">
            <p class="p-3">Đơn hàng được thanh toán vào <b>{{$order->created_at}}</b> và sẽ được thanh toán cho người
                bán vào
                <b>{{$order->paydate}}</b>
            </p>
            <p class="p-3">Để tránh rủi ro hệ thống, vào thời điểm thanh toán cho người bán đơn hàng cũng sẽ xoá khỏi hệ
                thống. Bạn có thể kiểm tra lại email để xem chi tiết đơn hàng sau khi hệ thống thực hiện xoá giao dịch.
            </p>
        </div>
        <div class="flex items-center">
            @if(!$success)
            <!-- <p>404</p> -->
            <p>Đơn hàng đã bị xoá khỏi hệ thống!</p>
            @else
            <div class="relative pt-3 mx-auto overflow-x-auto">
                <button onclick="downloadExcel()"
                    class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-teal-300 to-lime-300 group-hover:from-teal-300 group-hover:to-lime-300 dark:text-white dark:hover:text-gray-900 focus:ring-4 focus:outline-none focus:ring-lime-200 dark:focus:ring-lime-800">
                    <span
                        class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                        Download Excel
                    </span>
                </button>
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
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$order->product->name}}
                            </th>
                            <td class="px-6 py-4">
                                {{$productDetail->id}}
                            </td>
                            <td class="px-6 py-4">
                                <div class="relative mb-6">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z">
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
            </div>
            @endif
        </div>
    </div>
</div>

@if ($success)
@push('scripts')
<script lang="javascript" src="/js/xlsx.full.min.js"></script>
<script>
    function downloadExcel() {
        const wb = XLSX.utils.book_new();
        const ws = XLSX.utils.aoa_to_sheet([["Tên sản phẩm", "ID Chi tiết", "Nội dung đơn hàng", "Thời gian"]]);
        // @foreach($productDetails as $key => $productDetail) //
        XLSX.utils.sheet_add_aoa(ws, [["{{$order->product->name}}", "{{$productDetail->id}}", "{{$productDetail->detail}}", "{{$productDetail->updated_at}}"]], { origin: "A{{$key + 2}}" });
        // @endforeach //
        XLSX.utils.book_append_sheet(wb, ws, "Sheet1");
        XLSX.writeFile(wb, "DonHang#{{$order->id}}.xlsx");
    }
</script>
@endpush
@endif
@include('layouts.footer')