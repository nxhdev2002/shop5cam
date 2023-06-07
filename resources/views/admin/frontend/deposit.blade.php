@push('script')
<script>
  function acceptDeposit() {
    let id = $('#deposit_id').val()
    let name = $('#name').val();
    let request = $('#request').val();
    let amount = $('#amount').val();

    $.ajax({
      url: "/admin/deposit/" + id + "/accept",
      type: "PUT",
      data: {
        name: name,
        request: request,
        amount: amount,
        _token: '{{csrf_token()}}'
      },
      success: function (data) {
        console.log(data);
        // Thực hiện các tác vụ khác sau khi chấp nhận tiền gửi thành công
      },
      error: function (error) {
        console.log(error);
        // Xử lý lỗi nếu yêu cầu chấp nhận tiền gửi gặp sự cố
      }
    });
    window.location.reload();
  }

  function denyDeposit() {
    let id = $('#deposit_id').val()
    let name = $('#name').val();
    let request = $('#request').val();
    let amount = $('#amount').val();

    $.ajax({
      url: "/admin/deposit/" + id + "/deny",
      type: "PUT",
      data: {
        name: name,
        request: request,
        amount: amount,
        _token: '{{csrf_token()}}'
      },
      success: function (data) {
        console.log(data);
        // Thực hiện các tác vụ khác sau khi chấp nhận tiền gửi thành công
      },
      error: function (error) {
        console.log(error);
        // Xử lý lỗi nếu yêu cầu chấp nhận tiền gửi gặp sự cố
      }
    });
    window.location.reload();
  }

</script>
@endpush
@include('admin.layouts.header')
@include('admin.layouts.sidebar')
<main class="p-4 sm:ml-64">
  <div class="container grid px-6 mx-auto">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
      Deposit Request
    </h2>
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
      <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
          <thead>
            <tr
              class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
              <th class="px-4 py-3">ID</th>
              <th class="px-4 py-3">Name</th>
              <th class="px-4 py-3">Request</th>
              <th class="px-4 py-3">Amount</th>
              <th class="px-4 py-3">Gateway</th>
              <th class="px-4 py-3">Date</th>
              <th class="px-4 py-3">Actions</th>
            </tr>
          </thead>
          @foreach($deposit as $Deposit)
          <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
            <tr class="text-gray-700 dark:text-gray-400">
              <td class="px-4 py-3">
                {{$Deposit->id}}
              </td>
              <td class="px-4 py-3 text-sm">
                {{$Deposit->user->name}}
              </td>
              <td class="px-4 py-3 text-sm">
                Nạp tiền
              </td>
              <td class="px-4 py-3 text-sm">
                {{number_format($Deposit->amount)}} VNĐ
              </td>
              <td class="px-4 py-3 text-sm">
                {{$Deposit->gateway->name}}
              </td>
              <td class="px-4 py-3 text-sm">
                {{$Deposit->created_at}}
              </td>
              <td class="px-4 py-3">
                <div class="flex items-center space-x-4 text-sm">
                  <input type="hidden" id="deposit_id" value="{{$Deposit->id}}">
                  <div class="flex justify-center m-5">
                    <button onclick="acceptDeposit()"
                      class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-green-600 rounded-lg dark:text-red-400 focus:outline-none focus:shadow-outline-gray"
                      type="button">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                      </svg>
                    </button>
                  </div>

                  <div class="flex justify-center m-5">
                    <button onclick="denyDeposit()"
                      class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-red-600 rounded-lg dark:text-red-400 focus:outline-none focus:shadow-outline-gray"
                      type="button">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                      </svg>
                    </button>
                  </div>
                </div>
      </div>
    </div>
    </td>
    </tr>
    </tbody>
    @endforeach
    </table>
    <p class="mt-3 text-xs">{{ $deposit->links()}}</p>
  </div>
  </div>

  </div>
</main>