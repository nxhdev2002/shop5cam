@push('script')
<script>
    $(document).ready(function () {
        getStatistic("{{$ad->id}}")
    });

    const getStatistic = (adId) => {
        $.get("/admin/ads/" + adId + "/statistic", (data) => {
            $('.skeleton').addClass('hidden')
            setViewChart(data.data.view)
            setOrderChart(data.data.order)
        })
    }

    const setOrderChart = (data) => {
        $('#order_count').removeClass('hidden')
        var dateArr = Object.keys(data);
        var dataArr = Object.values(data);
        var data = {
            labels: dateArr,
            datasets: [{
                label: "Tổng order (ngày)",
                data: dataArr,
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

        new Chart('order', {
            type: 'bar',
            options: options,
            data: data
        });

        $('#order-chart-container').height('300px');
    }

    const setViewChart = (data) => {
        $('#view_count').removeClass('hidden')
        let dateArr = []
        let dataArr = []
        data.forEach(element => {
            let date = new Date(element.created_at)
            dateArr.push(date.getDate() + '/' + (date.getMonth() + 1))
            dataArr.push(element.view_count)
        });
        var data = {
            labels: dateArr,
            datasets: [{
                label: "Tổng view (ngày)",
                data: dataArr,
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

        new Chart('view', {
            type: 'bar',
            options: options,
            data: data
        });

        $('#view-chart-container').height('300px');
    }
</script>
@endpush
@include('admin.layouts.header')
@include('admin.layouts.sidebar')
<main class="p-4 sm:ml-64">
    <div class="flex">
        <div class="flex p-3 basis-full md:basis-1/3">
            <div
                class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <img class="rounded-t-lg" src="{{$ad->products->picture_url}}" alt="" />
                </a>
                <div class="p-5">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            {{$ad->products->name}}
                            @if ($ad->status)
                            <span
                                class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-green-400 border border-green-400">Running</span>

                            @else
                            <span
                                class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-red-400 border border-red-400">Stopped</span>
                            @endif
                        </h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$ad->products->description}}</p>
                    <a href="{{route('products.show', $ad->products->id)}}"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Xem sản phẩm
                        <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <div class="grid gap-2 md:grid-cols-2 basis-full md:basis-2/3">

            <!-- Count by view -->
            <div class="view-count">
                <div role="status"
                    class="max-w-sm p-4 border border-gray-200 rounded shadow skeleton animate-pulse md:p-6 dark:border-gray-700">
                    <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-700 w-32 mb-2.5"></div>
                    <div class="w-48 h-2 mb-10 bg-gray-200 rounded-full dark:bg-gray-700"></div>
                    <div class="flex items-baseline mt-4 space-x-6">
                        <div class="w-full bg-gray-200 rounded-t-lg h-72 dark:bg-gray-700"></div>
                        <div class="w-full h-56 bg-gray-200 rounded-t-lg dark:bg-gray-700"></div>
                        <div class="w-full bg-gray-200 rounded-t-lg h-72 dark:bg-gray-700"></div>
                        <div class="w-full h-64 bg-gray-200 rounded-t-lg dark:bg-gray-700"></div>
                        <div class="w-full bg-gray-200 rounded-t-lg h-80 dark:bg-gray-700"></div>
                        <div class="w-full bg-gray-200 rounded-t-lg h-72 dark:bg-gray-700"></div>
                        <div class="w-full bg-gray-200 rounded-t-lg h-80 dark:bg-gray-700"></div>
                    </div>
                    <span class="sr-only">Loading...</span>
                </div>

                <div id="view_count"
                    class="hidden max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex flex-row">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                        </svg>
                        <h3 class="font-semibold">Số lượt xem</h3>
                    </div>
                    <div class="my-3 chart-container" id="view-chart-container">
                        <canvas id="view"></canvas>
                    </div>
                </div>
            </div>


            <!-- Count by order -->
            <div class="order-count">
                <div role="status"
                    class="max-w-sm p-4 border border-gray-200 rounded shadow skeleton animate-pulse md:p-6 dark:border-gray-700">
                    <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-700 w-32 mb-2.5"></div>
                    <div class="w-48 h-2 mb-10 bg-gray-200 rounded-full dark:bg-gray-700"></div>
                    <div class="flex items-baseline mt-4 space-x-6">
                        <div class="w-full bg-gray-200 rounded-t-lg h-72 dark:bg-gray-700"></div>
                        <div class="w-full h-56 bg-gray-200 rounded-t-lg dark:bg-gray-700"></div>
                        <div class="w-full bg-gray-200 rounded-t-lg h-72 dark:bg-gray-700"></div>
                        <div class="w-full h-64 bg-gray-200 rounded-t-lg dark:bg-gray-700"></div>
                        <div class="w-full bg-gray-200 rounded-t-lg h-80 dark:bg-gray-700"></div>
                        <div class="w-full bg-gray-200 rounded-t-lg h-72 dark:bg-gray-700"></div>
                        <div class="w-full bg-gray-200 rounded-t-lg h-80 dark:bg-gray-700"></div>
                    </div>
                    <span class="sr-only">Loading...</span>
                </div>

                <div id="order_count"
                    class="hidden max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex flex-row">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                        </svg>
                        <h3 class="font-semibold">Số lượt đặt hàng</h3>
                    </div>
                    <div class="my-3 chart-container" id="order-chart-container">
                        <canvas id="order"></canvas>
                    </div>
                </div>
            </div>

            <div class="flex items-center w-2/3 p-4 bg-gray-300 rounded-lg shadow-xs">
                <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                        Số tiền đã chi
                    </p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                        {{number_format($ad->price)}} VNĐ
                    </p>
                </div>
            </div>
        </div>
    </div>
</main>