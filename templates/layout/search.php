 <style type="text/css">
		#laytoadotumap{
	   position:fixed;
	   left: -1000%;
	   top: 15px;
	   z-index: 99;
	   bottom: 15px;
   }
	 #mapSearch{ width:100%; height: 100%; }
    
      #description {
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
      }

      #infowindow-content .title {
        font-weight: bold;
      }

      #infowindow-content {
        display: none;
      }

      #mapSearch #infowindow-content {
        display: inline;
      }

      .pac-card {
        margin: 10px 10px 0 0;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        background-color: #fff;
        font-family: Roboto;
      }

      #pac-container {
        padding-bottom: 12px;
        margin-right: 12px;
      }

      .pac-controls {
        display: inline-block;
        padding: 5px 11px;
      }

      .pac-controls label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
      }

      #pac-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: bold;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 400px;
		margin-top: 10px;
		height: 30px;
      }

      #pac-input:focus {
        border-color: #4d90fe;
      }

      #title {
        color: #fff;
        background-color: #4d90fe;
        font-size: 25px;
        font-weight: 500;
        padding: 6px 12px;
      }
      #target {
        width: 345px;
      }
	  #aautocom *{
		  pointer-events: none;
	  }
	 
    </style>
	
<script>
if ( $.browser.webkit ) {
    $(".my-group-button").css("height","+=1px");
}
</script>


<script type="text/javascript">

function laydiadiem(str){

	$('#divform').prepend('<input type="hidden" name="'+$(str).parent().attr('cate')+'" value="'+$(str).attr('value')+'" id="catehide" /><input  type="text" class="form-control w15 catesearch search-left" id="'+$(str).parent().attr('cate')+'" value="'+$(str).attr('alt')+'"  readonly /><span id="closecate" ></span>');
	$("#textgoiy").hide();
	$('#find').removeClass('w50');
	$('#find').removeClass('search-left');
	$('#find').addClass('w35');
	$('#find').val('');
	$("#find").attr('result','p');
	
	if( $(str).parent().attr('cate')=='cate' ){
			$("#textgoiy").show();
				$.ajax({
							type:"get",
							url:"ajax/hienthidanhmuc.php",
							data:"iddanhmuc="+$(str).attr('value'),
							async:false,
							success:function(kq){
								
								$('#textgoiy').html(kq);
							}
						})
		
	}
}



function laydiadiem3(str){
	$('#closecate').after('<input type="hidden" name="'+$(str).parent().attr('cate')+'" value="'+$(str).attr('value')+'" id="catehide2" /><input  type="text" class="form-control w15 catesearch search-left" id="'+$(str).parent().attr('cate')+'" value="'+$(str).attr('alt')+'"  readonly /><span id="closecate2" ></span>');
	$("#textgoiy").hide();
	$('#find').removeClass('w35');
	$('#find').removeClass('search-left');
	$('#find').addClass('w20');
	$('#find').val('');
	$("#find").attr('result','onlyp');

}



$(document).ready(function(){
	var evt;
document.onmousemove = function (e) {
    e = e || window.event;
    evt = e;
}

$("#find").focusout(function(e){
	  if(!$(evt.target).is('#aautocom')) {
    $("#textgoiy").hide();
	
		}else{
			
		}
})
$("#near").focusout(function(e){
	
	  if(!$(evt.target).is('#aautocom')) {
		$("#textgoiy2").hide();
		}else{
			
		}
})
$("body").on('click',"#closecate",function(){
$("#textgoiy").hide();
	$("#cate").remove();
	$("#pcate").remove();
	$("#closecate").remove();
	$("#closecate2").remove();
	$("#catehide").remove();
	$("#catehide2").remove();
	$('#find').removeClass('w20');
	$('#find').removeClass('w35');
	$('#find').addClass('w50');
	$('#find').addClass('search-left');
	$("#find").attr('result','c-p');
})
$("body").on('click',"#closecate2",function(){

	$("#pcate").remove();
	$("#closecate2").remove();
	$("#catehide2").remove();
	$('#find').removeClass('w20');
	$('#find').addClass('w35');
	$('#find').addClass('search-left');
	$("#find").attr('result','p');
})
	
})

function hienthidiadiem(str){
	
	var xhttp;
	$("#textgoiy").show();
	/*if (str.length == 0) { 
    	document.getElementById("textgoiy").innerHTML = "";
		return;
	}*/
	xhttp = new XMLHttpRequest();
	
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("textgoiy").innerHTML = this.responseText;
		}
	};
	if(  $("#catehide2").length == 0){
	result='&result='+$("#find").attr('result')+'&cate='+$("#catehide").attr('name')+'&cate_id='+$("#catehide").attr('value');
	}else{
	result='&result='+$("#find").attr('result')+'&cate='+$("#catehide2").attr('name')+'&cate_id='+$("#catehide2").attr('value');
	}
	
	xhttp.open("GET", "ajax/search.php?diadiem="+str+result, true);
	xhttp.send(); 

}
</script>

<script type="text/javascript">

function laydiadiem2(str){
	name=$(str).attr('class');
	$('#divform').prepend('<input type="hidden" name="'+name+'" value="'+$(str).attr('value')+'" id="nearhide" />');
	$("#textgoiy2").hide();
	$('#near').val($(str).text());
	
	

}
$(document).ready(function(){


$('#near').on('change', function(){
   $("#nearhide").remove();
});

$('#near').on('click', function(){
  hienthidiadiem2("");
});
$('#find').on('click', function(){
  hienthidiadiem('');
});



	
})

function closemap(){

   $("#laytoadotumap").hide();
};
function chontoado(){

   $("#laytoadotumap").show();
  // $("#laytoadotumap").css('position','relative');
   $("#laytoadotumap").css('left','10px');
   $("#laytoadotumap").css('right','10px');
   
   $("#textgoiy2").hide();
};
function hienthidiadiem2(str){
	
	var xhttp;
	$("#textgoiy2").show();
	/*if (str.length == 0) { 
    	document.getElementById("textgoiy2").innerHTML = "";
		return;
	}*/
	xhttp = new XMLHttpRequest();
	
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("textgoiy2").innerHTML = this.responseText;
		}
	};
	result='&result='+$("#near").attr('result');
	
	xhttp.open("GET", "ajax/search.php?diadiem="+str+result, true);
	xhttp.send(); 

}
</script>



<script>
	var x = document.getElementById("demo");

	function getLocation() {
	if (navigator.geolocation) {
	navigator.geolocation.getCurrentPosition(showPosition, showError);
	} else {
	x.innerHTML = "Geolocation không được hỗ trợ bởi trình duyệt này.";
	}
	}

	function showPosition(position) {
	var latlon = position.coords.latitude + "," + position.coords.longitude;

	$("#near").val(latlon);
	 $("#textgoiy2").hide();
	}
	function showError(error) {
	switch(error.code) {
	case error.PERMISSION_DENIED:
	x.innerHTML = "Người sử dụng từ chối cho xác định vị trí."
	break;
	case error.POSITION_UNAVAILABLE:
	x.innerHTML = "Thông tin vị trí không có sẵn."
	break;
	case error.TIMEOUT:
	x.innerHTML = "Yêu cầu vị trí người dùng vượt quá thời gian quy định."
	break;
	case error.UNKNOWN_ERROR:
	x.innerHTML = "Một lỗi xảy ra không rõ nguyên nhân."
	break;
	}
	}
</script> 	          
            <form action="search.html" method="GET" class="" name="search-form" id="search-form"  accept-charset="utf-8">
    			
					<div class="input-group my-group" id='divform' style='width: 100%;'> 
						
						<input type="text" class="form-control w50 search-left" id="find" name="find" result="c-p" onkeyup="hienthidiadiem(this.value)" placeholder="Tìm kiếm: thiết kế nội thất, nội thất cổ điển…" autocomplete="off"/>
						
						
						<input type="text" class="form-control w30 search-right" id='near' name='toado'  result="t-d" onkeyup="hienthidiadiem2(this.value)" placeholder="Vị trí: Quận 1 , Hồ Chí Minh" autocomplete="off"/>
					   
						<span class="input-group-btn w20">
							<button class="btn btn-default my-group-button" id='btn-submit' type="submit">Tìm kiếm</button>
						</span>
					</div>
					
					<!--aaaaaaaaaaaaaaaaaaaaaaaaaa-->
					<div id='khunggoiy'>
						
						<div style="clear: both;"></div>
						<div style="width: 46%; float:left;min-height: 10px;">
							<ul id='textgoiy' class="goiy">
							</ul>
						</div>
						<div style="width: 44%; float:left;">
							<ul id='textgoiy2' class="goiy">
								
							</ul>
						</div>
						<div style="clear: both;"></div>
					</div>
					
					
					<!--Lấy tọa độ từ map-->
				<div id='laytoadotumap' class='' >  
				<a onclick="closemap()" id='closemap' >Ok</a>
								<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD08Z_FJeaSiU1dOf_12nFo5rQqLRUgP-w&libraries=places&callback=initAutocomplete"
						 async defer></script>
						<input id="pac-input" class="controls" type="text" placeholder="Search Box">
							
							<div id="mapSearch"></div>
						
				   
						
						<script type="text/javascript" >
						var map; //Will contain map object.
				var markerSearch = false; ////Has the user plotted their location marker? 
						
				//Function called to initialize / create the map.
				//This is called when the page has loaded.
				   
				//This function will get the marker's current location and then add the lat/long
				//values to our textfields so that we can save the location.
				function markerLocation(){
					//Get location.
					var currentLocation = markerSearch.getPosition();
					//Add lat and lng values to a field that we can save.
					latlon=currentLocation.lat()+','+currentLocation.lng(); 
					$("#near").val(latlon);
					
				}


					  function initAutocomplete() {
						var map = new google.maps.Map(document.getElementById('mapSearch'), {
						  center: {lat: 21.032436112373468, lng: 105.82443237304688},
						  zoom: 13,
						  mapTypeId: 'roadmap'
						});

						// Create the search box and link it to the UI element.
						var input = document.getElementById('pac-input');
						var searchBox = new google.maps.places.SearchBox(input);
						map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

						// Bias the SearchBox results towards current map's viewport.
						map.addListener('bounds_changed', function() {
						  searchBox.setBounds(map.getBounds());
						});

						var markers = [];
						// Listen for the event fired when the user selects a prediction and retrieve
						// more details for that place.
						searchBox.addListener('places_changed', function() {
						  var places = searchBox.getPlaces();

						  if (places.length == 0) {
							return;
						  }

						  // Clear out the old markers.
						  markers.forEach(function(markerSearch) {
							markerSearch.setMap(null);
						  });
						  markers = [];

						  // For each place, get the icon, name and location.
						  var bounds = new google.maps.LatLngBounds();
						  places.forEach(function(place) {
							if (!place.geometry) {
							  console.log("Returned place contains no geometry");
							  return;
							}
							var icon = {
							  url: place.icon,
							  size: new google.maps.Size(71, 71),
							  origin: new google.maps.Point(0, 0),
							  anchor: new google.maps.Point(17, 34),
							  scaledSize: new google.maps.Size(25, 25)
							};

							// Create a marker for each place.
							markers.push(new google.maps.Marker({
							  map: map,
							  icon: icon,
							  title: place.name,
							  position: place.geometry.location
							}));

							if (place.geometry.viewport) {
							  // Only geocodes have viewport.
							  bounds.union(place.geometry.viewport);
							} else {
							  bounds.extend(place.geometry.location);
							}
						  });
						  map.fitBounds(bounds);
						});
						
						
					//Listen for any clicks on the map.
					google.maps.event.addListener(map, 'click', function(event) {                
						//Get the location that the user clicked.
						var clickedLocation = event.latLng;
						//If the marker hasn't been added.
						if(markerSearch === false){
							//Create the marker.
							markerSearch = new google.maps.Marker({
								position: clickedLocation,
								map: map,
								draggable: true //make it draggable
							});
							//Listen for drag events!
							google.maps.event.addListener(markerSearch, 'dragend', function(event){
								markerLocation();
							});
						} else{
							//Marker has already been added, so just change its location.
							markerSearch.setPosition(clickedLocation);
						}
						//Get the marker's location.
						markerLocation();
					});
					  }

					</script>
				
				</div>
		
			</form>
            


