@include('admin.layouts.header')
@include('admin.layouts.sidebar')
<main class="p-4 sm:ml-64">
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Dashboard
        </h2>
        <!-- Cards -->
        <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
            <!-- Card -->
            <a href="{{route('admin.user.index')}}"
                class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <div
                    class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                        </path>
                    </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                        Total users
                    </p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                        {{ $totalUsers }}
                    </p>
                </div>
            </a>
            <!-- Card -->
            <a href="{{route('admin.ads.index')}}"
                class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                        Total Running Ads
                    </p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                        {{count($adsRunning)}}
                    </p>
                </div>
            </a>
            <!-- Card -->
            <a href="{{route('admin.user.upgrade_request')}}"
                class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
                    </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                        Seller Requests
                    </p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                        {{$sellerReq}}
                    </p>
                </div>
            </a>
            <!-- Card -->
            <a href="{{route('admin.deposit.index')}}"
                class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <div
                    class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                        </path>
                    </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                        Deposit Requests
                    </p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                        {{$depositRequests}}
                    </p>
                </div>
            </a>
        </div>

        <div class="flex justify-around">
            <div class="chart-container">
                <canvas id="user"></canvas>
            </div>
            <div class="chart-container">
                <canvas id="money"></canvas>
            </div>
            <div class="chart-container">
                <canvas id="ads"></canvas>
            </div>
            <script>
                var data = {
                    labels: ["1-3", "4-6", "7-9", "10-12"],
                    datasets: [{
                        label: "User registered (month)",
                        backgroundColor: "rgba(255,99,132,0.2)",
                        borderColor: "rgba(255,99,132,1)",
                        borderWidth: 2,
                        hoverBackgroundColor: "rgba(255,99,132,0.4)",
                        hoverBorderColor: "rgba(255,99,132,1)",
                        data: [
                            ("{{$userRegisteredByMonth[0]}}"),
                            ("{{$userRegisteredByMonth[1]}}"),
                            ("{{$userRegisteredByMonth[2]}}"),
                            ("{{$userRegisteredByMonth[3]}}")
                        ],
                    }]
                };

                var options = {
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            stacked: true,
                            grid: {
                                display: true,
                                color: "rgba(255,99,132,0.2)"
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            }
                        }
                    }
                };

                new Chart('user', {
                    type: 'bar',
                    options: options,
                    data: data
                });
                new Chart('money', {
                    type: 'doughnut',
                    options: options,
                    data: data
                });
                new Chart('ads', {
                    type: 'line',
                    options: options,
                    data: data
                });
            </script>
        </div>

        <div class="flex justify-between">
            <div class="mr-2 overflow-hidden rounded-lg shadow-xs md:basis-2/3 basis-full">
                <div class="w-full overflow-x-auto">
                    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                        Deposit History
                    </h2>
                    <table class="w-full whitespace-no-wrap">
                        <thead>
                            <tr
                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3">User Name</th>
                                <th class="px-4 py-3">Amount</th>
                                <th class="px-4 py-3">Status</th>
                                <th class="px-4 py-3">Note</th>
                                <th class="px-4 py-3">Date</th>
                            </tr>
                        </thead>

                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">

                            @if (count($listDeposit) == 0)
                            <tr>
                                <td colspan="5" class="text-center">Không có bản ghi được ghi nhận.</td>
                            </tr>
                            @else
                            @foreach($listDeposit as $q)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3">
                                    {{$q->user->name}}
                                </td>

                                <td class="px-4 py-3 text-sm">
                                    {{number_format($q->amount)}} VNĐ
                                </td>

                                <td class="px-4 py-3 text-xs">
                                    @if ($q->status == 0)
                                    <span
                                        class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:text-white dark:bg-orange-600">
                                        Chờ duyệt
                                    </span>
                                    @endif
                                    @if ($q->status == 1)
                                    <span
                                        class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                        Đã duyệt
                                    </span>
                                    @endif
                                    @if ($q->status == 2)
                                    <span
                                        class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700">
                                        Bị từ chối
                                    </span>
                                    @endif
                                </td>

                                <td class="px-4 py-3 text-sm">
                                    {{$q->note}}
                                </td>

                                <td class="px-4 py-3 text-sm">
                                    {{$q->updated_at}}
                                </td>

                            </tr>
                            @endforeach
                            @endif
                        </tbody>

                    </table>
                </div>
            </div>

            <div class="overflow-hidden rounded-lg shadow-xs md:basis-1/3 basis-full">
                <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                    New user registered
                </h2>
                <div class="w-full overflow-x-auto">
                    <table class="w-full whitespace-no-wrap">
                        <thead>
                            <tr
                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3">ID</th>
                                <th class="px-4 py-3">Name</th>
                                <th class="px-4 py-3">Email</th>
                                <th class="px-4 py-3">Date</th>
                            </tr>
                        </thead>
                        @foreach($newUsers as $user)
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3">
                                    {{$user->id}}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{$user->name}}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{$user->email}}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{$user->created_at}}
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>