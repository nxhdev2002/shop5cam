@include('admin.layouts.header')
@include('admin.layouts.sidebar')
<main class="p-4 sm:ml-64">
    <div class="mx-6">
        <table class="w-full whitespace-no-wrap">
            <div class="flex flex-row justify-between p-4">
                <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                    Admin Activities
                </h2>
                <thead>
                    <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">ID</th>
                        <th class="px-4 py-3">User</th>
                        <th class="px-4 py-3">Details</th>
                        <th class="px-4 py-3">Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($acts as $act)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$act->id}}
                        </th>
                        <td class="px-6 py-4">
                            {{$act->user->name}}
                        </td>
                        <td class="px-6 py-4">
                            {{$act->detail}}
                        </td>
                        <td class="px-6 py-4">
                            {{$act->created_at}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
        </table>
        <p class="mt-3 text-xs">{{ $acts->links()}}</p>
    </div>
</main>