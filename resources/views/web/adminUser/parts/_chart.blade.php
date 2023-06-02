<div class="page-content">
    <div class="row row-cols-1 row-cols-lg-2">
        <div class="col d-flex">
            <div class="card radius-10 w-100">
                <div class="card-body">
                    <p class="font-weight-bold mb-1 text-secondary">Ventas del mes - Pesos</p>
                    <div class="d-flex align-items-center mb-4">
                        <div>
                            <h4 class="mb-0">${{ $salesSum }}</h4>
                        </div>
                    </div>
                    <div class="chart-container-0">
                        <canvas id="chart3"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col d-flex">
            <div class="card radius-10 w-100">
                <div class="card-body">
                    <p class="font-weight-bold mb-1 text-secondary">Ventas del mes - Productos</p>
                    <div class="d-flex align-items-center mb-4">
                        <div>
                            <h4 class="mb-0">{{ $chartsalesProducCount }}</h4>
                        </div>
                    </div>
                    <div class="chart-container-1">
                        <canvas id="chart4"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('js')

<script>
$(function () {
	"use strict";

	// chart 3
	var ctx = document.getElementById("chart3").getContext('2d');
	var myChart = new Chart(ctx, {
		type: 'bar',
		data: {
			labels: [
                @foreach ($chartSales as $sale)
                        '{{ \Carbon\Carbon::parse($sale->created_at)->format('d-m') }}',
                    @endforeach
            ],
			datasets: [{
				label: 'Venta en $',
				data: [
                    @foreach ($chartSales as $sale)
                        {{ $sale->sellPrice }},
                    @endforeach
                ],
				barPercentage: .5,
				backgroundColor: "#0d6efd"
			}]
		},
		options: {
			maintainAspectRatio: false,
			legend: {
				display: true,
				labels: {
					fontColor: '#585757',
					boxWidth: 40
				}
			},
			tooltips: {
				enabled: true
			},
			scales: {
				xAxes: [{
					ticks: {
						beginAtZero: true,
						fontColor: '#585757'
					},
					gridLines: {
						display: true,
						color: "rgba(0, 0, 0, 0.07)"
					},
				}],
				yAxes: [{
					ticks: {
						beginAtZero: true,
						fontColor: '#585757'
					},
					gridLines: {
						display: true,
						color: "rgba(0, 0, 0, 0.07)"
					},
				}]
			}
		}
	});

    // chart 4
	var ctx = document.getElementById("chart4").getContext('2d');
	var myChart = new Chart(ctx, {
		type: 'bar',
		data: {
			labels: [
                @foreach ($chartSales as $sale)
                        '{{ \Carbon\Carbon::parse($sale->created_at)->format('d-m') }}',
                    @endforeach
            ],
			datasets: [{
				label: 'Cantidad Productos',
				data: [
                    @foreach ($chartSales as $sale)
                        {{ $sale->quantity }},
                    @endforeach
                ],
				barPercentage: .5,
				backgroundColor: "#eb1363"
			}]
		},
		options: {
			maintainAspectRatio: false,
			legend: {
				display: true,
				labels: {
					fontColor: '#585757',
					boxWidth: 40
				}
			},
			tooltips: {
				enabled: true
			},
			scales: {
				xAxes: [{
					ticks: {
						beginAtZero: true,
						fontColor: '#585757'
					},
					gridLines: {
						display: true,
						color: "rgba(0, 0, 0, 0.07)"
					},
				}],
				yAxes: [{
					ticks: {
						beginAtZero: true,
						fontColor: '#585757'
					},
					gridLines: {
						display: true,
						color: "rgba(0, 0, 0, 0.07)"
					},
				}]
			}
		}
	});

    // chart 8
	var options = {
		series:[
			@foreach ($topBestClient as $top)
				{{ $top->sellPrice }},
			@endforeach
		],
		chart: {
			foreColor: '#9ba7b2',
			height: 330,
			type: 'pie',
		},
		colors: ["#0d6efd", "#6c757d", "#7973A0", "#B390F4", "#FFA269","#0d6e0d", "#6c007d", "#10a00e", "#f40027", "#ffc007"],
		labels: [
			@foreach ($topBestClient as $top)
				'{{ $top->client->name }}',
			@endforeach
		],
		responsive: [{
			breakpoint: 480,
			options: {
				chart: {
					height: 360
				},
				legend: {
					position: 'bottom'
				}
			}
		}]
	};
	var chart = new ApexCharts(document.querySelector("#chart8"), options);
	chart.render();
});
</script>

<script src="{{ asset('assets/admin/plugins/apexcharts-bundle/js/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/chartjs/js/Chart.min.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/chartjs/js/Chart.extension.js') }}"></script>
@endsection