<?php
 include( "../fheader.php" );
	if((isset($_SESSION["isLogedIn"]) && $_SESSION["isLogedIn"]==false) || (isset($_SESSION["role"]) && $_SESSION["role"]!="0")){
	?>
<script>
	//alert("Please login first...");
	location.href="<?=$_SESSION["directory"]?>home.php";
</script>
	<?php
}
 if (session_status() == PHP_SESSION_NONE) {
    session_start();
	}
 ?>
 <!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Serre Connectée | Météo</title>
		<link rel="icon" type="image/png" href="/img/logo.png" />
		<script src="https://kit.fontawesome.com/6a4fe63112.js" crossorigin="anonymous"></script>
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;700&display=swap" rel="stylesheet">
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="css1/base.css">
		<link rel="stylesheet" href="css1/header.css">
        <link rel="stylesheet" href="css1/meteo.css">
		<link rel="stylesheet" href="css1/footer.css">
		<style>
   
      h5 {
        color: white; /* couleur du texte */
      }
    </style>
	</head>

	<body>
		
		<div class="article-total">
		
		<table>
		<tr>
		<td style="width: 10%;"></td>
		<td>
			<div class="article__view-container">
				
					<div class="premier">
					<div id="ww_c779b4e90de01" v='1.3' loc='id' a='{"t":"horizontal","lang":"fr","sl_lpl":1,"ids":["wl3361"],"font":"Arial","sl_ics":"one_a","sl_sot":"celsius","cl_bkg":"image","cl_font":"#FFFFFF","cl_cloud":"#FFFFFF","cl_persp":"#81D4FA","cl_sun":"#FFC107","cl_moon":"#FFC107","cl_thund":"#FF5722"}'>Weather Data Source: <a href="https://meteolongue.com/" id="ww_c779b4e90de01_u" target="_blank">Previsions meteo 25 jours</a></div><script async src="https://app1.weatherwidget.org/js/?id=ww_c779b4e90de01"></script><script async src="https://srv2.weatherwidget.org/js/?id=ww_c97a6df68705a"></script>
				</div>	
				<div id="ww_bbe5053f5a5ef" v='1.20' loc='id' a='{"t":"responsive","lang":"fr","ids":[],"cl_bkg":"image","cl_font":"#FFFFFF","cl_cloud":"#FFFFFF","cl_persp":"#81D4FA","cl_sun":"#FFC107","cl_moon":"#FFC107","cl_thund":"#FF5722","sl_tof":"7","sl_sot":"celsius","sl_ics":"one_a","font":"Arial","el_nme":3,"el_cwi":3,"el_ctm":3}'><a href="https://weatherwidget.org/fr/" id="ww_bbe5053f5a5ef_u" target="_blank">Widget Météo pour site Web</a> par Weatherwidget.org</div><script async src="https://srv2.weatherwidget.org/js/?id=ww_bbe5053f5a5ef"></script>
			</div></td>
			<td style="width: 10%;"></td>
			<td>
			<div class="article__view-container2">
				<iframe width="750" height="450" src="https://embed.windy.com/embed2.html?lat=34.253&lon=10.382&detailLat=34.253&detailLon=10.382&width=650&height=450&zoom=8&level=surface&overlay=wind&product=ecmwf&menu=&message=&marker=&calendar=now&pressure=&type=map&location=coordinates&detail=&metricWind=default&metricTemp=default&radarRange=-1" frameborder="0"></iframe>
			</div>
				</td>
				<td style="width: 10%;"></td>
				</tr>
				</table>
					
		</div>
		
		<script
  		src="https://code.jquery.com/jquery-3.3.1.min.js"
  		integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  		crossorigin="anonymous"></script>
		<script src="js1/app.js"></script>
		<?php
 include( "../footer.php" );
 ?>

	</body>
</html>