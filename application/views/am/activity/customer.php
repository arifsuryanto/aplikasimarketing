
<br><br><br>
<!-- Bar Chart -->
<div class="container">
<div class="card shadow mb-4 marginChart ratios ">
      <div class="card-header py-3 bg-gradient-primary">
        <h6 class="m-0 font-weight-bold text-white ">
          Chart Customer
         </h6>
      </div>
      <div class="card-body ">
        <div class="row">
          <div class="col-xs-12">
              <canvas id="myBarChart" ></canvas>
          </div> 
          </div>
        </div>
      </div>
      </div>

  <!-- Page level plugins -->
  <script src="<?= base_url ('assets')?>/js/core/jquery.3.2.1.min.js"></script>
  <script src="<?= base_url ('assets')?>/js/plugin/chart.js/chart.min.js"></script>
  <!-- Page level custom scripts -->
  <script>

  var myBarChart = document.getElementById('myBarChart').getContext('2d');
  var dataNama =[];
  var dataJumlah = [];
  var myBarChart = new Chart(myBarChart, {
	type: 'horizontalBar',
	data: {
		labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
		datasets : [{
			label: "Sales",
			backgroundColor: 'rgb(23, 125, 255)',
			borderColor: 'rgb(23, 125, 255)',
			data: [3, 2, 9, 5, 4, 6, 4, 6, 7, 8, 7, 4],
		}],
	},
	options: {
		responsive: true, 
		maintainAspectRatio: false,
		scales: {
			yAxes: [{
				ticks: {
					beginAtZero:true
				}
			}]
		},
	}
});

  </script>

