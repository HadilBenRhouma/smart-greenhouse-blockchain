 <!--<meta http-equiv="Refresh" content="10"> -->
<?php include("../header.php");
 		if((isset($_SESSION["isLogedIn"]) && $_SESSION["isLogedIn"]==false) || (isset($_SESSION["role"]) && $_SESSION["role"]!="1")){
	?>
<script>
	//alert("Please login first...");
	location.href="<?=$_SESSION["directory"]?>index.php";
</script>
	<?php
}

?>



<div class="container-fluid container">
  <h1 style="text-align-last: center;">Dashboard</h1>
  
  <div class="row">
    <div class="col-sm-3 " style="background-color:lavender;">
    	<?php
		$sql5="SELECT COUNT(ID) as num FROM `user` WHERE admin=0";
		$result=$con->query($sql5);
				if($result->num_rows>0){
					foreach($result as $row){
					 $totaluser=$row["num"];

					}
				}
		$sql5="SELECT COUNT(ID) as num FROM `user` WHERE admin=0 AND active=0";
		$result=$con->query($sql5);
				if($result->num_rows>0){
					foreach($result as $row){
					 $active_user=$row["num"];

					}
				}
		$deactive_user=$totaluser-$active_user;
		?>
   <h2><label>Total Users</label></h2>
   <h1 style="display: block;position: absolute;float: left; margin: inherit;"><?=$totaluser;?></h1>
   <h4 style="float: right; margin: 0px;"><label>Active </label> <?=$active_user;?></h4><br/>
   <h4 style="float: right;margin-top: 0px; display: inherit;margin-left: 87px;"><label>Deactive </label> 
   <?=$deactive_user;?></h4>
    </div>

	<div class="col-sm-3 " style="background-color:red;">
    	<?php
		$sql5="SELECT COUNT(ID) as num FROM `farmer` WHERE admin=0";
		$result=$con->query($sql5);
				if($result->num_rows>0){
					foreach($result as $row){
					 $totaluser=$row["num"];

					}
				}
		$sql5="SELECT COUNT(ID) as num FROM `farmer` WHERE admin=0 AND active=0";
		$result=$con->query($sql5);
				if($result->num_rows>0){
					foreach($result as $row){
					 $active_user=$row["num"];

					}
				}
		$deactive_user=$totaluser-$active_user;
		?>
   <h2><label>Total Farmers</label></h2>
   <h1 style="display: block;position: absolute;float: left; margin: inherit;"><?=$totaluser;?></h1>
   <h4 style="float: right; margin: 0px;"><label>Active </label> <?=$active_user;?></h4><br/>
   <h4 style="float: right;margin-top: 0px; display: inherit;margin-left: 87px;"><label>Deactive </label> 
   <?=$deactive_user;?></h4>
    </div>


    <div class="col-sm-3 " style="background-color:orange;">
    	<?php
		$sql5="SELECT COUNT(ID) as num FROM `vehicle`";
		$result=$con->query($sql5);
				if($result->num_rows>0){
					foreach($result as $row){
					 $totaluser=$row["num"];

					}
				}
		$sql5="SELECT COUNT(ID) as num FROM `vehicle` WHERE status=1";
		$result=$con->query($sql5);
				if($result->num_rows>0){
					foreach($result as $row){
					 $active_user=$row["num"];

					}
				}
		$deactive_user=$totaluser-$active_user;
		?>
   <h2><label>Total Crops</label></h2>
   <h1 style="display: block;position: absolute;float: left; margin: inherit;"><?=$totaluser;?></h1>
   <h4 style="float: right; margin: 0px;"><label>Active </label> <?=$active_user;?></h4><br/>
   <h4 style="float: right;margin-top: 0px; display: inherit;margin-left: 87px;"><label>Deactive </label> 
   <?=$deactive_user;?></h4>
    </div>
    <div class="col-sm-3 " style="background-color:lavender;">
    	<?php
		$sql5="SELECT COUNT(ID) as num FROM `confirmbid`";
		$result=$con->query($sql5);
				if($result->num_rows>0){
					foreach($result as $row){
					 $totaluser=$row["num"];

					}
				}
		$sql5="SELECT COUNT(ID) as num FROM `confirmbid` WHERE role=1";
		$result=$con->query($sql5);
				if($result->num_rows>0){
					foreach($result as $row){
					 $active_user=$row["num"];

					}
				}
		$deactive_user=$totaluser-$active_user;
		?>
   <h2><label>Deliverable</label></h2>
   <h1 style="display: block;position: absolute;float: left; margin: inherit;"><?=$totaluser;?></h1>
   <h4 style="float: right; margin: 0px;"><label>Delivered </label> <?=$active_user;?></h4><br/>
   <h4 style="float: right;margin-top: 0px; display: inherit;margin-left: 87px;"><label>Undelivered </label> 
   <?=$deactive_user;?></h4>
    </div>
    
  </div>
</div>

 <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

	
 
<!-- vehicle bidding count -->
<!DOCTYPE HTML>
<html>
<head>  
<script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "Crop Bidding Count"
	},
	axisY: {
		title: "Bidding"
	},
	data: [{
		type: "pie",
		yValueFormatString: "#,##0.##",
		dataPoints: <?php echo json_encode($Product, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
</head>
<body>
<div class="container">



	
	

<!-- Check Bidding price of the vehicle -->

<div class="container" id="chart2" style="height: 370px; width: 100%; margin-bottom: 10%;"></div>
<div id="chartContainer" style="height: 370px; width: 100%; margin-top: 10%; margin-bottom: 10%;"></div>
<div id="revenueChart" style="height: 370px; width: 100%; margin-top: 10%; margin-bottom: 10%;"></div>
	 

</div>

<script>

function createChart(){
	var checkdate=$("#checkbid").val();
	$("#check").val(checkdate);
	$("#formpost").submit();
	
}
var chart = new CanvasJS.Chart("chart2", {
animationEnabled: true,
theme: "light2",
title:{
	text: "Top bidding price of crop <?php if(!isset($_POST["hidName"])){ echo("(Last 7 days )");} ?> " 
},
axisY: {
	title: "Price (INR)"
},
data: [{
	type: "column",
	yValueFormatString: "#,##0.##",
	dataPoints: <?php echo json_encode($Product2, JSON_NUMERIC_CHECK); ?>
}]
});
chart.render();

		   
		   
//revenue
var chart2 = new CanvasJS.Chart("revenueChart", {
animationEnabled: true,
title:{
	text: "Revenue Chart of Crop Auction"
},
axisY: {
	title: "Revenue (in INR)",
		
	suffix:  "INR"
},
data: [{
	type: "column",
	yValueFormatString: "#,##0 INR",
	indexLabel: "{y}",
	indexLabelPlacement: "inside",
	indexLabelFontWeight: "bolder",
	indexLabelFontColor: "white",
	dataPoints: <?php echo json_encode($Product3, JSON_NUMERIC_CHECK); ?>
}]
});
 
chart2.render();
</script>  

<?php
$sqlR="SELECT Region FROM vehicledetails";
	
$resultR=$con->query($sqlR);
$resultF = array();
while ($row = $resultR->fetch_array()) {
	//$resultF[] = $row[0];
	array_push($resultF,$row[0]);
}
//print_r($resultF);
?>

<!--Map-->
  <h1 style="text-align-last: center;">Crop Location</h1>

<script src="https://apis.mapmyindia.com/advancedmaps/v1/zmu2tzu3bz6ltcjewcfdd5xaagcw8agj/map_load?v=1.3"></script>

<script type="text/javascript" src="../js/jquery.min_map_admin.js"></script>

<style type="text/css"> html, body, #map {margin: 0;padding: 0;width: 100%;height: 100%;}             
	#result {
		position: absolute;left: 2px; top: 46px;width: 306px;bottom: 2px; border: 1px solid #cccccc;background-color: #FAFAFA; overflow: auto;
	}

	.event-header{
		padding:14px 12px 6px 38px;color: #666;
	}
	#event-log{
		padding:6px 12px 6px 38px;color: #777; font-size: 12px; line-height: 22px;
	}
	.map_marker{
		position:relative;width:34px;height:48px
	}
	/*marker text span css*/
	.my-div-span{
		position: absolute;left:1.5em;right: 1em;top:1.4em;bottom:2.5em;font-size:9px;font-weight:bold;width:1px;color:black;
	}
	
</style>

<div id="map"></div>;
<div class="event-header">Event Logs</div>
<div id="event-log"></div>
			
<script type="text/javascript">
var lng = 77.229455;
var lat = 28.612960;
var url_result;
var all_result = [];
var markerGroup = new Array();
var markers = new Array();
var map;
var fieldList = ["eLoc", "geocodeLevel", "houseNumber", "houseName", "poi", "street", "subSubLocality", "subLocality", "locality", "subDistrict",
	"district", "city", "state", "pincode", "formattedAddress"];
var labelList = ["eLoc", "Geocode Level", "House Number", "House Name", "POI", "Street", "Sub Sub Locality", "Sub Locality", "Locality", "Sub District",
	"District", "City", "State", "Pincode", "Address"];

window.onload = function () {
	var centre = new L.LatLng(lat, lng);
	map = new MapmyIndia.Map('map', {center: centre, zoomControl: true, hybrid: true});
	get_geocode_result();
};

/*function to get geocode result from the url*/
function get_geocode_result() {
		
		var address_array =<?php echo json_encode($resultF)?>;

		for (i = 0; i < address_array.length; i++) {
			address= address_array[i];
			//console.log('address: ',address);

			//document.cookie="address_=address";

		

		getUrlResult(address, itemCount=1); /*get JSON resp*/
	}
}
	

/*function to get Json response from the url*/
function getUrlResult(address, itemCount, vehicle_details) {
	$.ajax({
		type: "GET",
		dataType: 'text',
		url: "getResponseGeocode.php",
		async: false,
		data: {
			address: address,
			itemCount: itemCount
		},
		success: function (result) {
			if (result !== undefined) {
				var resdata = JSON.parse(result);
				var copResults;
				if (resdata.status === 'success') {
					var jsondata = JSON.parse(resdata.data);
					copResults = jsondata.copResults;
					if (!Array.isArray(copResults)) {
						copResults = Array.from(Object.keys(jsondata), k => jsondata[k])
					}
					if (copResults.length > 0) {
						display_geocode_result(copResults); /*display results on success*/
					}
				} else {
					hideLoader();
					var error_response = "No result."
					}
			} else {
				/*handle the error codes and put the responses in divs more error codes can be seen in the documentation*/
				var error_response = "No result."
				}
		}
	});
}
/*function to display geocode result*/
function display_geocode_result(data) {

	details = [];
	var num = 1;
	var item = data[0];
	var otheritem = data;
	/*show the best item data*/
	if (item !== '' && item !== null && item !== "undefined") {
		var lng = item.longitude;
		var lat = item.latitude;
		var address = item.formattedAddress;
		var pos = new L.LatLng(lat, lng); /***position of marker*****/
		show_markers(num, pos, address); /**display markers***/

		details.push(createPopupContent(item));
		
		markers[num].bindPopup('');
		var popup = markers[num].getPopup();
		popup.setContent('<table style="line-height:14px" cellspacing="5">' + details[0] + '</table>').update();
		
		//result_string += '<li onclick="show_geocode_details(' + (num++) + ',' + lng + ',' + lat + ')">' + address + '</li>';
	} 

	mapmyindia_fit_markers_into_bound(); /***fit map in marker area***/
}

function createPopupContent(item) {
	var content = new Array();
	for (var i = 0; i < fieldList.length; i++) {
		if (item[fieldList[i]] !== "") {
			content.push("<tr><th style='white-space:nowrap;vertical-align: top;text-align: left;'>");
			content.push(labelList[i]);
			content.push("</th><th style='width:5px;vertical-align: top;text-align: left;'>:</th><td>");
			content.push(item[fieldList[i]].trim().split(";")[0]);
			content.push("</td></tr>");
		}
	}
	//console.log('content: ',content.join(""));
	return content.join("");
}

function show_markers(num, pos) {
	var icon_marker = L.divIcon({
		className: 'my-div-icon',
		html: "<img style='position:relative;' \n\
										src=" + "'https://maps.mapmyindia.com/images/2.png'>" + '<span style="position: absolute;left:1.6em;right:\n\
										1em;top:1.4em;bottom:3.5em; font-size:9px;font-weight:bold;width: 1px; color:black;" class="my-div-span">' + num + '</span>',
		iconSize: [10, 10],
		popupAnchor: [12, -10]
	}); /*creating a div icon*/

	markers[num] = L.marker(pos, {icon: icon_marker}).addTo(map);
	map.setView(pos, 12);
	markerGroup.push(markers[num]);
}

/*function to remove  marker from the map*/
function remove_markers() {
	for (k = 0; k < markerGroup.length; k++) {
		map.removeLayer(markerGroup[k]); /*Remove markers from map*/
	}
}

/*function to fit the maps in the bounds of the marker*/
function mapmyindia_fit_markers_into_bound() {
	var group = new L.featureGroup(markerGroup);
	map.fitBounds(group.getBounds());
}

function hideLoader() {
	$("#loader").hide();
}

function showLoader() {
	$("#loader").show();
}


</script>
</body>

<!-- Footer Section -->
<?php

include("../footer.php");
?>

<script type="text/javascript" src="../js/jquery.min_map_admin.js"></script>

</html>       