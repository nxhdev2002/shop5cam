@push('script')
<script>
    const addH1 = () => {
        var headingText = "<h1></h1>"; // Văn bản thô bạn muốn thêm vào <textarea>
        var $textarea = $("#content"); // Tạo một đối tượng jQuery từ thẻ <textarea>

        $textarea.val(function (i, val) {
            return val + headingText; // Thêm văn bản vào giá trị hiện tại của <textarea>
        });
    }
    const addImg = () => {
        var headingText = "<img src=\"replace link here\"></img>"; // Văn bản thô bạn muốn thêm vào <textarea>
        var $textarea = $("#content"); // Tạo một đối tượng jQuery từ thẻ <textarea>

        $textarea.val(function (i, val) {
            return val + headingText; // Thêm văn bản vào giá trị hiện tại của <textarea>
        });
    }
    const addLink = () => {
        var headingText = "<a href=\"replace link here\">Text</a>"; // Văn bản thô bạn muốn thêm vào <textarea>
        var $textarea = $("#content"); // Tạo một đối tượng jQuery từ thẻ <textarea>

        $textarea.val(function (i, val) {
            return val + headingText; // Thêm văn bản vào giá trị hiện tại của <textarea>
        });
    }
</script>
@endpush
@include('admin.layouts.header')
@include('admin.layouts.sidebar')
<main class="p-4 sm:ml-64">
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Gateway
        </h2>
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">

                <div class="relative overflow-x-auto">

                    <form action="{{route('admin.gateway.update', $gateway->id)}}" method="POST">
                        @csrf
                        <div class="grid gap-6 mb-6">
                            <div>
                                <label for="name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                <input type="text" id="name" name="name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    value="{{$gateway->name}}" required>
                            </div>
                            <div>
                                <label for="description"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                                <textarea id="description" rows="4" name="description"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{$gateway->description}}</textarea>
                            </div>
                            <div>

                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" value="1" name="status" class="sr-only peer"
                                        {{$gateway->status ?
                                    "checked" : ""}}>
                                    <div
                                        class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                                    </div>
                                    <span
                                        class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Status</span>
                                </label>

                            </div>
                            <div class="grid gap-6 mb-6 md:grid-cols-2">
                                <div>
                                    <div class="relative">
                                        <input type="text" id="percent_fee" name="percent_fee"
                                            class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                            placeholder=" " value="{{$gateway->currency->percent_fee}}">
                                        <label for="percent_fee"
                                            class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
                                            Percent Fee (%)</label>
                                    </div>
                                </div>
                                <div>
                                    <div class="relative">
                                        <input type="text" id="fixed_fee" name="fixed_fee"
                                            class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                            placeholder=" " value="{{$gateway->currency->fixed_fee}}">
                                        <label for="fixed_fee"
                                            class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
                                            Fixed Fee (VNĐ)</label>
                                    </div>
                                </div>
                                <div>
                                    <div class="relative">
                                        <input type="text" id="min_amount" name="min_amount"
                                            class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                            placeholder=" " value="{{$gateway->currency->min_amount}}">
                                        <label for="min_amount"
                                            class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
                                            Min Amount (VNĐ)</label>
                                    </div>
                                </div>
                                <div>
                                    <div class="relative">
                                        <input type="text" id="max_amount" name="max_amount"
                                            class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                            placeholder=" " value="{{$gateway->currency->max_amount}}">
                                        <label for="max_amount"
                                            class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
                                            Max Amount (VNĐ)</label>
                                    </div>
                                </div>
                            </div>
                            <div>


                                <div
                                    class="w-full mb-4 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
                                    <div
                                        class="flex items-center justify-between px-3 py-2 border-b dark:border-gray-600">
                                        <div
                                            class="flex flex-wrap items-center divide-gray-200 sm:divide-x dark:divide-gray-600">
                                            <div class="flex items-center space-x-1 sm:pr-4">
                                                <button type="button" onclick="addLink()"
                                                    class="p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                    <span class="sr-only">Embed Link</span>
                                                </button>
                                                <button type="button" onclick="addImg()"
                                                    class="p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                                    </svg>
                                                    <span class="sr-only">Embed Image</span>
                                                </button>
                                                <button type="button" onclick="addH1()"
                                                    class="p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-type-h1" viewBox="0 0 16 16">
                                                        <path
                                                            d="M8.637 13V3.669H7.379V7.62H2.758V3.67H1.5V13h1.258V8.728h4.62V13h1.259zm5.329 0V3.669h-1.244L10.5 5.316v1.265l2.16-1.565h.062V13h1.244z" />
                                                    </svg>
                                                    <span class="sr-only">Embed H1 tag</span>
                                                </button>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="px-4 py-2 bg-white rounded-b-lg dark:bg-gray-800">
                                        <label for="editor" class="sr-only">Gateway</label>
                                        <textarea id="content" rows="8" name="content"
                                            class="block w-full px-0 text-sm text-gray-800 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400"
                                            required>{{$gateway->content}}</textarea>
                                    </div>
                                </div>
                                <button type="submit"
                                    class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                                    Save
                                </button>

                            </div>
                    </form>
                </div>

                <p class="mt-3 text-xs"></p>
            </div>
        </div>

    </div>
</main>