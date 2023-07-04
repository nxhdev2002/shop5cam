@include('layouts.header')
<div class="flex gap-8">
  @include('seller.frontend.sidebar')
  <main class="w-3/4 h-full pb-16 overflow-y-auto">
    <div class="container px-6 mx-auto grid">
      <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Thống kê
      </h2>
      <div class="grid gap-6 mb-4 md:grid-cols-2 ">
        <!-- <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
          <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
            Thông kê sản phẩm theo danh mục
          </h4>
          <div class="chart-container">
            <canvas id="pie"></canvas>
          </div>
        </div>
        <script>
          var categoryColors = {
            "1": "#FF6384",
            "2": "#36A2EB",
            "3": "#FFCE56",
            "4": "#4BC0C0",
            "5": "#9966FF"
          };

          const pieConfig = {
            type: 'doughnut',
            data: {
              datasets: [
                {
                  data: [20, 20, 20, 10, 30],
                  backgroundColor: [categoryColors['1'], categoryColors['2'], categoryColors['3'], categoryColors['4'], categoryColors['5']],
                  label: 'Sản phẩm',
                },
              ],
              labels: ['1', '2', '3', '4', '5'],
            },
            options: {
              responsive: true,
              cutoutPercentage: 80,
              legend: {
                display: false,
              },
            },
          }
          const pieCtx = document.getElementById('pie')
          window.myPie = new Chart(pieCtx, pieConfig)
        </script> -->

        <div class="chart-container">
          <canvas id="revenueChart"></canvas>
          <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300 text-center">
            Thông kê sản phẩm theo danh mục
          </h4>
        </div>
        <!-- <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
            Thông kê sản phẩm theo danh mục
          </h4> -->
        <script>
          var data = {
            labels: ["1-3", "4-6", "7-9", "10-12"],
            datasets: [{
              label: "Doanh thu",
              backgroundColor: "rgba(255,99,132,0.2)",
              borderColor: "rgba(255,99,132,1)",
              borderWidth: 2,
              hoverBackgroundColor: "rgba(255,99,132,0.4)",
              hoverBorderColor: "rgba(255,99,132,1)",
              data: [
                ("{{$revenueRegisteredByMonth[0]->revenue_seller}}"),
                ("{{$revenueRegisteredByMonth[1]->revenue_seller}}"),
                ("{{$revenueRegisteredByMonth[2]->revenue_seller}}"),
                ("{{$revenueRegisteredByMonth[3]->revenue_seller}}")],
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

          new Chart('revenueChart', {
            type: 'bar',
            options: options,
            data: data
          });
        </script>
      </div>
  </main>
</div>
<style>
  .chart-container {
    height: 350px
  }
</style>
@include('layouts.footer')