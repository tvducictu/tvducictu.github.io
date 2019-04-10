<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
</head>
<body class="container">
	<div class="row">
		<marquee style="font-size: 50px;color: royalblue;">Bảo mật 2 lớp - RSA</marquee>
	</div>


	<div class="row">
		<?php 
		$kq='';
		$kq1='';
		$kq2='';
		$kq3='';
		if (isset($_POST["btn_submi"])) {
			$xA = $_POST["xA1"];;
			$pA = $_POST["pA1"];
			$qA = $_POST["qA1"];
			$eA = $_POST["eA1"];
			$pB = $_POST["pB1"];
			$qB = $_POST["qB1"];
			$eB = $_POST["eB1"];
			$nA = $pA * $qA;
			$A = ($pA-1) * ($qA-1);
			$nB = $pB * $qB;
			$B = ($pB-1) * ($qB-1);
			$dA = '';
			$dB = '';
			if ($pA=="" || $qA=="" || $eA=="" || $pB=="" || $qB=="" || $eB=="") {
				echo '<script type="text/javascript">alert("Xin mời nhập đầy đủ dữ liệu");</script>';
			}
			else
			{
				
				for ($i=2 ; $i <floor($A/$eA) ; $i++) { 
					$x[1] = $A;
					$x[2] = $eA;
					$y[1] = floor($A/$eA);
					$b[0] = 0;
					$b[1] = 1;
					$x[$i+1] = $x[$i-1]%$x[$i];
					$y[$i] = floor($x[$i-1]/$x[$i]);
					$b[$i] = ($b[$i-2])-($b[$i-1] * $y[$i]);
					if($x[$i]==1)
					{
						if($b[$i-1] < 0)
						{
							$dA= $A+$b[$i-1];
							break;
						}
						else
						{
							$dA= $b[$i-1];
							break;
						}

					}
				}
				for ($i=2 ; $i <floor($B/$eB) ; $i++) { 
					$x[1] = $B;
					$x[2] = $eB;
					$y[1] = floor($B/$eB);
					$b[0] = 0;
					$b[1] = 1;
					$x[$i+1] = $x[$i-1]%$x[$i];
					$y[$i] = floor($x[$i-1]/$x[$i]);
					$b[$i] = ($b[$i-2])-($b[$i-1] * $y[$i]);
					if($x[$i]==1)
					{
						if($b[$i-1] < 0)
						{
							$dB= $B+$b[$i-1];
							break;

						}
						else
						{
							$dB= $b[$i-1];
							break;

						}

					}
				}
				echo "Khóa công khai: kUA = (eA, nA) = (".$eA ."," .$nA .")" ."</br>";
				echo "Khóa bí mật: kRA = (dA, nA) = (".$dA ."," .$nA .")" ."</br>";
				echo "Khóa công khai: kUB = (eB, nB) = (".$eB ."," .$nB .")" ."</br>";
				echo "Khóa bí mật: kRB = (dB, nB) = (".$dB ."," .$nB .")" ."</br>";
for ($i=1; $i < $xA ; $i++) { 
 	$x[0] = $dA;
 	$a[0] = $xA;

 	if($x[0]%2 == 0)
 	{
 		$d[0] = 1;
 	}
 	else
 	{
 		$d[0] = $xA;
 	}
 	$x[$i] = floor($x[$i-1]/2);
 	$a[$i] = ($a[$i-1] * $a[$i-1]) % $nA;
 	if ($x[$i]%2 == 0) {
 		$d[$i]=$d[$i-1];
 	}
 	else
 	{
 		$d[$i] = ($d[$i-1] * $a[$i]) % $nA;
 	}

 	if($x[$i]==1)
 	{
 		$kq=$d[$i];
 		break;
 	}
 }
echo "X = ".$xA ." => ";
echo "Y = ".$kq ." => ";

for ($i=1; $i < $kq ; $i++) { 
 	$x[0] = $eB;
 	$a[0] = $kq;

 	if($x[0]%2 == 0)
 	{
 		$d[0] = 1;
 	}
 	else
 	{
 		$d[0] = $kq;
 	}
 	$x[$i] = floor($x[$i-1]/2);
 	$a[$i] = ($a[$i-1] * $a[$i-1]) % $nB;
 	if ($x[$i]%2==0) {
 		$d[$i]=$d[$i-1];
 	}
 	else
 	{
 		$d[$i] = ($d[$i-1] * $a[$i]) % $nB;
 	}

 	if($x[$i]==1)
 	{
 		$kq1=$d[$i];
 		break;
 	}
 }
echo "Z = ".$kq1 ." => ";

for ($i=1; $i < $kq1 ; $i++) { 
 	$x[0] = $dB;
 	$a[0] = $kq1;

 	if($x[0]%2 == 0)
 	{
 		$d[0] = 1;
 	}
 	else
 	{
 		$d[0] = $kq1;
 	}
 	$x[$i] = floor($x[$i-1]/2);
 	$a[$i] = ($a[$i-1] * $a[$i-1]) % $nB;
 	if ($x[$i]%2 == 0) {
 		$d[$i]=$d[$i-1];
 	}
 	else
 	{
 		$d[$i] = ($d[$i-1] * $a[$i]) % $nB;
 	}

 	if($x[$i]==1)
 	{
 		$kq2=$d[$i];
 		break;
 	}
 }
echo "Y = ".$kq2 ." => ";


for ($i=1; $i < $kq2; $i++) { 
 	$x[0] = $eA;
 	$a[0] = $kq2;

 	if($x[0]%2 == 0)
 	{
 		$d[0] = 1;
 	}
 	else
 	{
 		$d[0] = $kq2;
 	}
 	$x[$i] = floor($x[$i-1]/2);
 	$a[$i] = ($a[$i-1] * $a[$i-1]) % $nA;
 	if ($x[$i]%2==0) {
 		$d[$i]=$d[$i-1];
 	}
 	else
 	{
 		$d[$i] = ($d[$i-1] * $a[$i]) % $nA;
 	}

 	if($x[$i]==1)
 	{
 		$kq3=$d[$i];
 		break;
 	}
 }
echo "X = ".$kq3;
			}
		}
		?>
	</div>
	<div class="row">
		<div  class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<form action="index.php" method="post" accept-charset="utf-8">
				<div class="form-group">
					<h1>Cho X => Y => Z => Y => X</h1>
					<div class="row" style="margin-bottom: 20px;">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<input type="number" class="form-control" name="xA1" placeholder="Văn bản số X">
						</div>
					</div>
					<div class="row" style="margin-bottom: 20px;">
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
							<input type="number" class="form-control" name="pA1" placeholder="Số nguyên tố(pA)">
						</div>
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
							<input type="number" class="form-control" name="qA1" placeholder="Số nguyên tố(qA)">
						</div>
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
							<input type="number" class="form-control" name="eA1" placeholder="Khóa công khai(eA)">
						</div>
					</div>
					<div class="row">
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
							<input type="number" class="form-control" name="pB1" placeholder="Số nguyên tố(pB)">
						</div>
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
							<input type="number" class="form-control" name="qB1" placeholder="Số nguyên tố(qB)">
						</div>
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
							<input type="number" class="form-control" name="eB1" placeholder="Khóa công khai(eB)">
						</div>
					</div>
				</div>
				<button type="submit" name="btn_submi" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>
	<div class="row">
		<hr with="100%" style="border-top: 5px solid gray;" />
	</div>



	<div class="row">
		<?php 
		$kq='';
		if (isset($_POST["btn_submit"])) {
			$pA = $_POST["pA"];
			$qA = $_POST["qA"];
			$eA = $_POST["eA"];
			$pB = $_POST["pB"];
			$qB = $_POST["qB"];
			$eB = $_POST["eB"];
			$nA = $pA * $qA;
			$A = ($pA-1) * ($qA-1);
			$nB = $pB * $qB;
			$B = ($pB-1) * ($qB-1);
			$dA = '';
			$dB = '';
			if ($pA=="" || $qA=="" || $eA=="" || $pB=="" || $qB=="" || $eB=="") {
				echo '<script type="text/javascript">alert("Xin mời nhập đầy đủ dữ liệu");</script>';
			}
			else
			{
				
				for ($i=2 ; $i <floor($A/$eA) ; $i++) { 
					$x[1] = $A;
					$x[2] = $eA;
					$y[1] = floor($A/$eA);
					$b[0] = 0;
					$b[1] = 1;
					$x[$i+1] = $x[$i-1]%$x[$i];
					$y[$i] = floor($x[$i-1]/$x[$i]);
					$b[$i] = ($b[$i-2])-($b[$i-1] * $y[$i]);
					if($x[$i]==1)
					{
						if($b[$i-1] < 0)
						{
							$dA= $A+$b[$i-1];
							break;
						}
						else
						{
							$dA= $b[$i-1];
							break;
						}

					}
				}
				for ($i=2 ; $i <floor($B/$eB) ; $i++) { 
					$x[1] = $B;
					$x[2] = $eB;
					$y[1] = floor($B/$eB);
					$b[0] = 0;
					$b[1] = 1;
					$x[$i+1] = $x[$i-1]%$x[$i];
					$y[$i] = floor($x[$i-1]/$x[$i]);
					$b[$i] = ($b[$i-2])-($b[$i-1] * $y[$i]);
					if($x[$i]==1)
					{
						if($b[$i-1] < 0)
						{
							$dB= $B+$b[$i-1];
							break;

						}
						else
						{
							$dB= $b[$i-1];
							break;

						}

					}
				}
				echo "Khóa công khai: kUA = (eA, nA) = (".$eA ."," .$nA .")" ."</br>";
				echo "Khóa bí mật: kRA = (dA, nA) = (".$dA ."," .$nA .")" ."</br>";
				echo "Khóa công khai: kUB = (eB, nB) = (".$eB ."," .$nB .")" ."</br>";
				echo "Khóa bí mật: kRB = (dB, nB) = (".$dB ."," .$nB .")" ."</br>";
			}
		}
		?>
	</div>
	<div class="row">
		<div  class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<form action="index.php" method="post" accept-charset="utf-8">
				<div class="form-group">
					<h1>Khóa công khai - Khóa bí mật</h1>
					<div class="row" style="margin-bottom: 20px;">
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
							<input type="number" class="form-control" name="pA" placeholder="Số nguyên tố(pA)">
						</div>
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
							<input type="number" class="form-control" name="qA" placeholder="Số nguyên tố(qA)">
						</div>
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
							<input type="number" class="form-control" name="eA" placeholder="Khóa công khai(eA)">
						</div>
					</div>
					<div class="row">
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
							<input type="number" class="form-control" name="pB" placeholder="Số nguyên tố(pB)">
						</div>
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
							<input type="number" class="form-control" name="qB" placeholder="Số nguyên tố(qB)">
						</div>
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
							<input type="number" class="form-control" name="eB" placeholder="Khóa công khai(eB)">
						</div>
					</div>
				</div>
				<button type="submit" name="btn_submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>
	<div class="row">
		<hr with="100%" style="border-top: 5px solid gray;" />
	</div>

	<div class="row">
		<?php 
		if (isset($_POST["btn_submit1"])) {
			$xA = $_POST["x1"];
			$pA = $_POST["p1"];
			$qA = $_POST["q1"];
			$dA = $_POST["d1"];
			if ($xA=="" || $pA=="" || $qA=="" || $dA=="") {
				echo '<script type="text/javascript">alert("Xin mời nhập đầy đủ dữ liệu");</script>';
			}
			else
			{
				
				$nA = $pA * $qA;
				$kq='';
				for ($i=1; $i < $xA ; $i++) { 
					$x[0] = $dA;
					$a[0] = $xA;

					if($x[0]%2 == 0)
					{
						$d[0] = 1;
					}
					else
					{
						$d[0] = $xA;
					}
					$x[$i] = floor($x[$i-1]/2);
					$a[$i] = ($a[$i-1] * $a[$i-1]) % $nA;
					if ($x[$i]%2 == 0) {
						$d[$i]=$d[$i-1];
					}
					else
					{
						$d[$i] = ($d[$i-1] * $a[$i]) % $nA;
					}

					if($x[$i]==1)
					{
						$kq=$d[$i];
						break;
					}
				}
				echo "Văn bản số: X = ".$xA ."</br>";
				echo "Văn bản số: Y = ".$kq;
			}
		}
		?>
	</div>

	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<form action="index.php" method="post" accept-charset="utf-8">
				<div class="form-group">
					<input type="number" class="form-control" name="x1" placeholder="Văn bản số">
				</div>
				<div class="form-group">
					<input type="number" class="form-control" name="d1" placeholder="Khóa bí mật của A">
				</div>
				<div class="form-group">
					<input type="number" class="form-control" name="p1" placeholder="Số nguyên tố (pA)">
				</div>
				<div class="form-group">
					<input type="number" class="form-control" name="q1" placeholder="Số nguyên tố (qA)">
				</div>
				<button type="submit" name="btn_submit1" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>
	<div class="row">
		<hr with="100%" style="border-top: 5px solid gray;" />
	</div>


	<div class="row">
		<?php 
		if (isset($_POST["btn_submit2"])) {
			$yB  = $_POST["y12"];
			$pB = $_POST["p12"];
			$qB = $_POST["q12"];
			$eB = $_POST["e12"];
			$nB = $pB * $qB;
			$B = ($pB-1) * ($qB-1);
			$kq='';
			if ($yB=="" || $pB=="" || $qB=="" || $eB=="") {
				echo '<script type="text/javascript">alert("Xin mời nhập đầy đủ dữ liệu");</script>';
			}
			else
			{
				
				
				for ($i=1; $i < $yB ; $i++) { 
					$x[0] = $eB;
					$a[0] = $yB;
					if($x[0]%2 == 0)
					{
						$d[0] = 1;
					}
					else
					{
						$d[0] = $yB;
					}
					$x[$i] = floor($x[$i-1]/2);
					$a[$i] = ($a[$i-1] * $a[$i-1]) % $nB;
					if ($x[$i]%2==0) {
						$d[$i]=$d[$i-1];
					}
					else
					{
						$d[$i] = ($d[$i-1] * $a[$i]) % $nB;
					}

					if($x[$i]==1)
					{
						$kq=$d[$i];
						break;
					}
				}
				echo "Văn bản số: Y = ".$yB ."</br>";
				echo "Văn bản số: Z = ".$kq;
			}
		}
		?>
	</div>

	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<form action="index.php" method="post" accept-charset="utf-8">
				<div class="form-group">
					<input type="number" class="form-control" name="y12" placeholder="Văn bản số">
				</div>
				<div class="form-group">
					<input type="number" class="form-control" name="e12" placeholder="Khóa công khai của B">
				</div>
				<div class="form-group">
					<input type="number" class="form-control" name="p12" placeholder="Số nguyên tố (pB)">
				</div>
				<div class="form-group">
					<input type="number" class="form-control" name="q12" placeholder="Số nguyên tố (qB)">
				</div>
				<button type="submit" name="btn_submit2" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>
	<div class="row">
		<hr with="100%" style="border-top: 5px solid gray;" />
	</div>


	<div class="row">
		<?php 
		if (isset($_POST["btn_submit3"])) {
			$zB = $_POST["z13"];
			$pB = $_POST["p13"];
			$qB = $_POST["q13"];
			$dB = $_POST["d13"];
			$nB = $pB * $qB;
			$B = ($pB-1) * ($qB-1);
			$kq='';
			if ($zB=="" || $pB=="" || $qB=="" || $dB=="") {
				echo '<script type="text/javascript">alert("Xin mời nhập đầy đủ dữ liệu");</script>';
			}
			else
			{
				for ($i=1; $i < $zB ; $i++) { 
					$x[0] = $dB;
					$a[0] = $zB;
					if($x[0]%2 == 0)
					{
						$d[0] = 1;
					}
					else
					{
						$d[0] = $zB;
					}
					$x[$i] = floor($x[$i-1]/2);
					$a[$i] = ($a[$i-1] * $a[$i-1]) % $nB;
					if ($x[$i]%2 == 0) {
						$d[$i]=$d[$i-1];
					}
					else
					{
						$d[$i] = ($d[$i-1] * $a[$i]) % $nB;
					}

					if($x[$i]==1)
					{
						$kq=$d[$i];
						break;
					}
				}
				echo "Văn bản số: Z = ".$zB ."</br>";
				echo "Văn bản số: Y = ".$kq;
			}
		}
		?>
	</div>

	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<form action="index.php" method="post" accept-charset="utf-8">
				<div class="form-group">
					<input type="number" class="form-control" name="z13" placeholder="Văn bản số">
				</div>
				<div class="form-group">
					<input type="number" class="form-control" name="d13" placeholder="Khóa bí mật của B">
				</div>
				<div class="form-group">
					<input type="number" class="form-control" name="p13" placeholder="Số nguyên tố (pB)">
				</div>
				<div class="form-group">
					<input type="number" class="form-control" name="q13" placeholder="Số nguyên tố (qB)">
				</div>
				<button type="submit" name="btn_submit3" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>
	<div class="row">
		<hr with="100%" style="border-top: 5px solid gray;" />
	</div>


	<div class="row">
		<?php 
		if (isset($_POST["btn_submit4"])) {
			$yB = $_POST["y14"];
			$eA = $_POST["e14"];
			$qA = $_POST["q14"];
			$pA = $_POST["p14"];
			$nA = $pA * $qA;
			$kq='';
			if ($yB=="" || $pA=="" || $qA=="" || $eA=="") {
				echo '<script type="text/javascript">alert("Xin mời nhập đầy đủ dữ liệu");</script>';
			}
			else
			{
				for ($i=1; $i < $yB; $i++) { 
					$x[0] = $eA;
					$a[0] = $yB;

					if($x[0]%2 == 0)
					{
						$d[0] = 1;
					}
					else
					{
						$d[0] = $yB;
					}
					$x[$i] = floor($x[$i-1]/2);
					$a[$i] = ($a[$i-1] * $a[$i-1]) % $nA;
					if ($x[$i]%2==0) {
						$d[$i]=$d[$i-1];
					}
					else
					{
						$d[$i] = ($d[$i-1] * $a[$i]) % $nA;
					}
					if($x[$i]==1)
					{
						$kq=$d[$i];
						break;
					}
				}
				echo "Văn bản số: Y = ".$yB ."</br>";
				echo "Văn bản số: X = ".$kq;
			}
		}
			?>
		</div>


		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<form action="index.php" method="post" accept-charset="utf-8">
					<div class="form-group">
						<input type="number" class="form-control" name="y14" placeholder="Văn bản số">
					</div>
					<div class="form-group">
						<input type="number" class="form-control" name="e14" placeholder="Khóa công khai của A">
					</div>
					<div class="form-group">
						<input type="number" class="form-control" name="p14" placeholder="Số nguyên tố (pA)">
					</div>
					<div class="form-group">
						<input type="number" class="form-control" name="q14" placeholder="Số nguyên tố (qA)">
					</div>
					<button type="submit" name="btn_submit4" class="btn btn-primary">Submit</button>
				</form>
			</div>
		</div>
		<div class="row">
			<hr with="100%" style="border-top: 5px solid gray;" />
		</div>
	</body>
	</html>