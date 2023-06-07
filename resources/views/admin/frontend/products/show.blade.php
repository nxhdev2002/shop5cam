@include('admin.layouts.header')
@include('admin.layouts.sidebar')
<main class="p-4 sm:ml-64">
    <div class="container grid grid-cols-3 gap-4 px-6 mx-auto">
        <div
            class="max-w-sm col-span-3 bg-white border border-gray-200 rounded-lg shadow md:col-span-1 dark:bg-gray-800 dark:border-gray-700">
            <a href="#">
                <img class="rounded-t-lg" src="{{$product->picture_url}}" alt="" />
            </a>
            <div class="p-5">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$product->name}}
                    </h5>
                </a>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$product->description}}</p>
                <a href="{{route('products.show', $product->id)}}"
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
        <div class="col-span-3 md:col-span-2">
            <p>Chi tiết sản phẩm</p>
            <textarea id="message" rows="16"
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                disabled>{{$product->content}}</textarea>
            @if (!$product->is_removed)
            @if ($product->status)
            <button type="submit" form="stopForm" id="stopButton"
                class="mt-6 relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-cyan-500 to-red-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-cyan-200 dark:focus:ring-cyan-800">
                <span
                    class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                    Ngừng bán
                </span>
            </button>
            @endif
            <button type="submit" form="deleleForm"
                class="mt-6 relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-cyan-500 to-red-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-cyan-200 dark:focus:ring-cyan-800">
                <span
                    class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                    Xoá sản phẩm
                </span>
            </button>
            @else
            <p>Sản phẩm đã bị xoá khỏi hệ thống và sẽ không xuất hiện trong danh sách sản phẩm.</p>
            @endif
        </div>
    </div>
</main>
<form action="{{route('admin.product.remove', $product->id)}}" method="POST" id="deleleForm">@csrf</form>
<form action="{{route('admin.product.stop', $product->id)}}" method="POST" id="stopForm">@csrf</form>
<script>
    document.getElementById("stopButton").addEventListener("click", function (event) {
        if (!confirm('Ngừng bán là thao tác 1 chiều và không thể hoàn tác. Tiếp tục?'))
            event.preventDefault()
    });
</script>