@include('admin.layouts.header')
@include('admin.layouts.sidebar')
<main class="p-4 sm:ml-64">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Order Reports
    </h2>
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        User Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Order ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Price
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Date
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reports as $report)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$report->id}}
                    </th>
                    <td class="px-6 py-4">
                        {{$report->user->email}}
                    </td>
                    <td class="px-6 py-4">
                        {{$report->order->id}}
                    </td>
                    <td class="px-6 py-4">
                        {{number_format($report->order->price)}} VNĐ
                    </td>
                    <td class="px-6 py-4">
                        @switch ($report->status)
                        @case (-1)
                        <span
                            class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">Từ
                            chối</span>
                        @break
                        @case (0)
                        <span
                            class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-blue-900 dark:text-blue-300">Đang
                            chờ</span>
                        @break
                        @case (1)
                        <span
                            class="bg-purple-100 text-purple-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-purple-900 dark:text-purple-300">Liên
                            hệ</span>
                        @break
                        @default
                        <span
                            class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">Đã
                            hoàn tiền</span>
                        @endswitch
                    </td>
                    <td class="px-6 py-4">
                        {{$report->created_at}}
                    </td>
                    <td class="px-6 py-4">
                        <a href="{{route('admin.orders.show', $report->id)}}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</main>