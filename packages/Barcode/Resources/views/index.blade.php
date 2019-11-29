<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>
<body>
<!-- Theo ký hiệu EAN-13 như hình vẽ phía trên, có thể phân chia như sau:
	* 893 -                 Mã quốc gia Việt Nam -->

	<!-- https://github.com/milon/barcode -->
	<div class="row">
		<div class="col-md-3">
			<p>Barcode 1D - PHARMA2T</p>
			{!!DNS1D::getBarcodeSVG("4445645656", "PHARMA2T",3,33,"green", true)!!}
		</div>
		<div class="col-md-3">
			<p>Barcode 1D - EAN13</p>
			{!!DNS1D::getBarcodeHTML("4445645656", "EAN13",3,33,"black", true)!!}
		</div>
		<div class="col-md-3">
			<p>Barcode 1D - C39+ - images</p>
			@php
			echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG("4", "C39+",3,33,array(1,1,1), true) . '" alt="barcode"   />'.'<br>';

			@endphp
		</div>
		<div class="col-md-3">
			<p>Barcode 2D - QR</p>
			{!!DNS2D::getBarcodeHTML("https://tuoitresoft.com", "QRCODE")!!}
		</div>
	</div>
</body>
</html>








