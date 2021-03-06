<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<h1 class="h2">Dashboard</h1>
	</div>
	<div class="alert alert-success">
		Selamat datang di halaman administrator <strong><?= $email ?></strong>
	</div>

	<div class="card text-white bg-success mb-3" style="max-width: 18rem;">
		<h5 class="card-header">Data Kendaraan</h5>
		<div class="card-body">
			<img src="/assets/images/bell.svg">
			<?php
			$kendaraan = $koneksi->query("SELECT * FROM kendaraan")->num_rows;
			echo "<b>$kendaraan</b>";
			?>
		</div>
	</div>

	<div class="row mt-3">
		<div class="col-lg mb-2">
			<h4 class="text-center">Data Kendaraan</h4>
			<canvas class="my-4 w-100" id="chartHari" width="900" height="380"></canvas>
		</div>
	</div>
</main>

<script>
	function number_format(number, decimals, dec_point, thousands_sep) {
		number = (number + '').replace(',', '').replace(' ', '');
		var n = !isFinite(+number) ? 0 : +number,
		prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
		sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
		dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
		s = '',
		toFixedFix = function(n, prec) {
			var k = Math.pow(10, prec);
			return '' + Math.round(n * k) / k;
		};
		s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
		if (s[0].length > 3) {
			s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
		}
		if ((s[1] || '').length < prec) {
			s[1] = s[1] || '';
			s[1] += new Array(prec - s[1].length + 1).join('0');
		}
		return s.join(dec);
	}

	var cth = document.getElementById('chartHari').getContext('2d');

	var chartHari = new Chart(cth, {
		type: 'line',
		data: {
			labels: [
			'Januari', 'Februari', 'Maret', 'April', "Mei", 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
			],
			datasets: [{
				data: [
				<?php 
				$tahun = date('Y');
				for ($no = 1; $no <= 12; $no++) {
					$tgl = $koneksi->query("SELECT * FROM kendaraan WHERE month(waktu) = '$no' AND year(waktu) = '$tahun'")->num_rows;
					echo $tgl; 
					echo ",";
				}
				?>
				],
				label: "Jumlah",
				lineTension: 0.3,
				backgroundColor: "rgba(78, 115, 223, 0.05)",
				borderColor: "rgba(78, 115, 223, 1)",
				pointRadius: 3,
				pointBackgroundColor: "rgba(78, 115, 223, 1)",
				pointBorderColor: "rgba(78, 115, 223, 1)",
				pointHoverRadius: 3,
				pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
				pointHoverBorderColor: "rgba(78, 115, 223, 1)",
				pointHitRadius: 10,
				pointBorderWidth: 2,
			}]
		},
		options: {
			scales: {
				xAxes: [{
					ticks: {
						beginAtZero: 'date'
					},
				}]
			},
			tooltips: {
				backgroundColor: "rgb(255,255,255)",
				bodyFontColor: "#858796",
				titleMarginBottom: 10,
				titleFontColor: '#6e707e',
				titleFontSize: 14,
				borderColor: '#dddfeb',
				borderWidth: 1,
				xPadding: 15,
				yPadding: 15,
				displayColors: false,
				intersect: false,
				mode: 'index',
				caretPadding: 10,
				callbacks: {
					label: function(tooltipItem, chart) {
						var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
						return datasetLabel + ': ' + number_format(tooltipItem.yLabel);
					}
				}
			}
		}
	})
</script>