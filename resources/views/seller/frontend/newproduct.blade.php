@include('layouts.header')
<div class="flex gap-8">
    @include('seller.frontend.sidebar')
    <main class="w-3/4 h-full overflow-y-auto">
        <div class="container px-6 mx-auto">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Thông tin sản phẩm mới
            </h2>
            <form action="{{route('seller.storeProduct')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Tên sản phẩm</span>
                        <input name="name"
                            class="block w-full mt-1 text-sm rounded-lg shadow-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            placeholder="Nhập tên sản phẩm" />
                    </label>

                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Chi tiết</span>
                        <textarea name="description"
                            class="block w-full mt-1 text-sm rounded-lg shadow-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                            rows="3" placeholder="Nhập chi tiết sản phẩm"></textarea>
                    </label>

                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Giá</span>
                        <input type="number" name="price"
                            class="block w-full mt-1 text-sm rounded-lg shadow-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            placeholder="Giá" />
                    </label>

                    <label class="block mt-4 text-sm rounded-lg shadow-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Danh mục
                        </span>
                        <select name="category_id"
                            class="block w-full mt-1 text-sm rounded-lg shadow-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-multiselect focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                            @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </label>

                    <form enctype="multipart/form-data">
                        <input id="upload" type="file">
                    </form>

                    <p class="hidden" id="totalData"></p>

                    <input type="hidden" name="detail" id="product_details">

                    <div class="justify-end mt-4 text-sm">
                        <div>
                            <span class="text-gray-700 dark:text-gray-400">
                                Ảnh sản phẩm
                            </span>
                        </div>
                        <div>
                            <input id="upload" type="file" accept="image/*" name="thumb"
                                class="w-1/4 mt-1 text-sm rounded-lg shadow-sm focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray" />
                        </div>
                    </div>
                    <div class="mt-4">
                        <div
                            class="w-full mb-4 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
                            <div class="flex items-center justify-between px-3 py-2 border-b dark:border-gray-600">
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
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
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
                                    required
                                    placeholder="Gateway content (talk about how to use this gateway.)"></textarea>
                            </div>
                        </div>

                    </div>

                    <div class="justify-center mt-4 ">
                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </main>
</div>
@push('scripts')
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
<script>
    var productDetail = []
    var ExcelToJSON = function () {

        this.parseExcel = function (file) {
            var reader = new FileReader();

            reader.onload = function (e) {
                var data = e.target.result;
                var workbook = XLSX.read(data, {
                    type: 'binary'
                });
                workbook.SheetNames.forEach(function (sheetName) {
                    // Here is your object
                    var XL_row_object = XLSX.utils.sheet_to_row_object_array(workbook.Sheets[sheetName]);
                    var json_object = JSON.stringify(XL_row_object);
                    process_data(JSON.parse(json_object))
                })
            };

            reader.onerror = function (ex) {
                console.log(ex);
            };

            reader.readAsBinaryString(file);
        };
    };

    function handleFileSelect(evt) {
        var files = evt.target.files; // FileList object
        var xl2json = new ExcelToJSON();
        xl2json.parseExcel(files[0]);
    }

    function process_data(data) {
        $('#totalData').removeClass('hidden')
        $('#totalData').text(`Đọc thành công ${data.length} sản phẩm`)
        data.forEach(element => {
            productDetail.push(Object.values(element).join('|'))
        })
        $('#product_details').val(btoa(JSON.stringify(productDetail)))
    }

    $(document).ready(function () {
        document.getElementById('upload').addEventListener('change', handleFileSelect, false);
    });
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.8.0/jszip.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.8.0/xlsx.js"></script>
@endpush

@include('layouts.footer')