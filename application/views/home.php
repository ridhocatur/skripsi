<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php if ($this->session->flashdata('success')) : ?>
    <div class="alert alert-success" role="alert">
        <?= $this->session->flashdata('success'); ?>
    </div>
<?php elseif ($this->session->flashdata('danger')) : ?>
    <div class="alert alert-danger" role="alert">
        <?= $this->session->flashdata('danger'); ?>
    </div>
<?php endif; ?>

<div class="row">
<div class="col-xl-3 col-md-6 mb-4">
	<div class="card border-left-primary shadow h-100 py-2">
	<div class="card-body">
		<div class="row no-gutters align-items-center">
		<div class="col mr-2">
			<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pegawai (User)</div>
			<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $pegawai; ?> Orang</div>
		</div>
		<div class="col-auto">
			<i class="fas fa-group fa-2x text-gray-300"></i>
		</div>
		</div>
	</div>
	</div>
</div>

<div class="col-xl-3 col-md-6 mb-4">
	<div class="card border-left-warning shadow h-100 py-2">
	<div class="card-body">
		<div class="row no-gutters align-items-center">
		<div class="col mr-2">
			<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Jumlah Supplier</div>
			<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $supplier; ?> Supplier</div>
		</div>
		<div class="col-auto">
			<i class="fas fa-truck fa-2x text-gray-300"></i>
		</div>
		</div>
	</div>
	</div>
</div>

<div class="col-xl-3 col-md-6 mb-4">
	<div class="card border-left-info shadow h-100 py-2">
	<div class="card-body">
		<div class="row no-gutters align-items-center">
		<div class="col mr-2">
			<div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Ukuran</div>
			<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $ukuran; ?> Ukuran</div>
		</div>
		<div class="col-auto">
			<i class="fas fa-arrows-alt fa-2x text-gray-300"></i>
		</div>
		</div>
	</div>
	</div>
</div>

<div class="col-xl-3 col-md-6 mb-4">
	<div class="card border-left-secondary shadow h-100 py-2">
	<div class="card-body">
		<div class="row no-gutters align-items-center">
		<div class="col mr-2">
			<div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Jumlah Jenis Kayu</div>
			<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jeniskayu; ?> Macam</div>
		</div>
		<div class="col-auto">
			<i class="fas fa-gear fa-2x text-gray-300"></i>
		</div>
		</div>
	</div>
	</div>
</div>
</div>

<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Stok Bahan Bantu</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-area" id="chart-bahanbantu"></div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Stok Kayu Log</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-area" id="chart-kayulog"></div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Stok Vinir</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-area" id="chart-vinir"></div>
            </div>
        </div>
    </div>
</div>

<div style="text-align: center;">
    <!-- <img src="<?= base_url(); ?>assets\img\logotrp.JPG" alt="" align="center" style="width: 35%; height: 35%;"> -->
    <h2>PT. TANJUNG RAYA PLYWOOD</h2>
    <h4>Desa Tinggiran II Luar, Kec. Tamban, Kel. Barito Kuala, Banjarmasin</h4>
</div>

<script type="text/javascript"> //untuk menggabungkan JSON Array dengan $.concat
	;(function($) {
		if (!$.concat)
		$.extend({ concat: function() {
			return arguments.length ? Array.prototype.concat.apply([], arguments) : [];
			}
		});
	})(jQuery);
</script>

<script type="text/javascript">
    $(document).ready(function(){
		function visualize_barang(id,title, data){
	      Highcharts.chart(id, {
	        chart: {
	          type: 'column'
	        },
	        title: {
	          text: ''
	        },
	        xAxis: {
	          type: 'category'
	        },
	        yAxis: {
	          title: {
	            text: 'Stok (Kg)'
	          }
	        },
	        legend: {
	          enabled: false
	        },
	        plotOptions: {
	          series: {
	            borderWidth: 0,
	            dataLabels: {
	              enabled: true,
	              format: '{point.y}'
	            }
	          }
	        },

	        tooltip: {
	          headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
	          pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b><br/>'
	        },

	        "series": [
	          {
	            "name": title,
	            "colorByPoint": true,
	            "data": data
	          }
	        ]
	      });
	    }
	    $.ajax({
	    	url: "http://localhost/trpbahanbaku/welcome/grafikStokBahanBantu",
	    	dataType: "json",
	    	success: function(response){
                visualize_barang("chart-bahanbantu","Bahan Bantu",response);
	    	},
	    	errror: function(){
	    		alert('error');
	    	}
	    });
	});
</script>

<script type="text/javascript">
    $(document).ready(function(){
		function visualize_barang2(id,title, data){
	      Highcharts.chart(id, {
	        chart: {
	          type: 'column'
	        },
	        title: {
	          text: ''
	        },
	        xAxis: {
	          type: 'category'
	        },
	        yAxis: {
	          title: {
	            text: 'Stok (Kubik)'
	          }
	        },
	        legend: {
	          enabled: false
	        },
	        plotOptions: {
	          series: {
	            borderWidth: 0,
	            dataLabels: {
	              enabled: true,
	              format: '{point.y}'
	            }
	          }
	        },

	        tooltip: {
	          headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
	          pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b><br/>'
	        },

	        "series": [
	          {
	            "name": title,
	            "colorByPoint": true,
	            "data": data
	          }
	        ]
	      });
	    }
	    $.ajax({
	    	url: "http://localhost/trpbahanbaku/welcome/grafikStokKayulog",
	    	dataType: "json",
	    	success: function(response){
	    		visualize_barang2("chart-kayulog","Kayu Log",response);
	    	},
	    	errror: function(){
	    		alert('error');
	    	}
	    });
	});
</script>

<script type="text/javascript">
    $(document).ready(function(){
		function visualize_barang(id,title, data){
			var kat = data[0].categories;
			var pend = data[1];
			var panj = data[2];
			var fushion = $.concat(pend, panj);
			console.log(fushion);
			Highcharts.chart(id, {
	        chart: {
	          type: 'column'
	        },
	        title: {
	          text: ''
	        },
	        xAxis: {
				categories: kat
	        },
	        yAxis: {
	          title: {
	            text: 'Stok (Kubik)'
	          }
	        },
	        legend: {
	          enabled: true
	        },
	        plotOptions: {
	          series: {
	            borderWidth: 0,
	            dataLabels: {
	              enabled: true,
	              format: '{point.y}'
	            }
	          }
	        },
	        tooltip: {
	          headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
	          pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b><br/>'
	        },
	        series: fushion
		});
	    }
	    $.ajax({
	    	url: "http://localhost/trpbahanbaku/welcome/grafikStokVinir",
	    	dataType: "json",
	    	success: function(response){
				visualize_barang("chart-vinir","Vinir",response);
				console.log(response);
	    	},
	    	errror: function(){
	    		alert('error');
	    	}
		});
	});
</script>

<script>
	function unique(list) {
	    var result = [];
	    $.each(list, function(i, e) {
	        if ($.inArray(e, result) == -1) result.push(e);
	    });
	    return result;
	}
</script>