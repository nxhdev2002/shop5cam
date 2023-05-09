<body class="antialiased text-gray-900 bg-blue-600">
    <div class="card bg-white max-w-md p-10 md:rounded-lg my-8 mx-auto">
        <div class="title">
            <h1 class="font-bold text-center">REPORT</h1>
        </div>

        <div class="form mt-4">
            <div class="flex flex-col text-sm">
                <label for="title" class="font-bold mb-2">Tiêu đề</label>
                <input class=" appearance-none border border-gray-200 p-2 focus:outline-none focus:border-gray-500"
                    type="text" placeholder="Tiêu đề">
            </div>

            <div class="text-sm flex flex-col">
                <label for="description" class="font-bold mt-4 mb-2">Chi tiết</label>
                <textarea
                    class=" appearance-none w-full border border-gray-200 p-2 h-40 focus:outline-none focus:border-gray-500"
                    placeholder="Chi tiết tố cáo"></textarea>
            </div>
        </div>

            <button type="submit"
                class=" w-full bg-orange-600 shadow-lg text-white px-4 py-2 hover:bg-orange-700 mt-8 text-center font-semibold focus:outline-none ">Submit</button>
        </div>
    </div>
</body>