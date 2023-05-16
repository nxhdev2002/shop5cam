@include('layouts.header')
<div class="container mx-auto my-3 bg-white rounded-lg">
    <div class="flex flex-col p-3">
        <h3 class="p-3 text-lg font-medium">Lịch sử giao dịch</h3>
        <div>

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Thời gian
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Ghi chú
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Số tiền
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Số dư
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Trạng thái
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($trans as $tran)
                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$tran->created_at}}
                            </th>
                            <td class="px-6 py-4">
                                {{$tran->note}}
                            </td>
                            <td class="px-6 py-4">
                                {{$tran->type . number_format($tran->amount)}} VNĐ
                            </td>
                            <td class="px-6 py-4">
                                {{number_format($tran->balance)}} VNĐ
                            </td>
                            <td class="px-6 py-4">
                                @if ($tran->status == 0)
                                <span
                                    class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:text-white dark:bg-orange-600">
                                    Chờ duyệt
                                </span>
                                @endif
                                @if ($tran->status == 1)
                                <span
                                    class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                    Đã duyệt
                                </span>
                                @endif
                                @if ($tran->status == 2)
                                <span
                                    class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700">
                                    Bị từ chối
                                </span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>



@include('layouts.footer')