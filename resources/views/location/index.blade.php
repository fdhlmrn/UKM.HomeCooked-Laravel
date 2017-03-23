<!DOCTYPE html>
<html>
  <head>
    <title>Geolocation</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js" ></script>
    <script src="https://maps.googleapis.com/maps/api/js?key= AIzaSyDuYeuRRArPgWsCE_Zrmzd6WcrMI08dNEU&callback=initMap" type="text/javascript" ></script>

<div class="container">
  <div class="col-sm-4">
    <h1>Add Vendor, Location</h1>
    <form class="form-horizontal" action="{{ url('/map') }}">


        <div class="form-group">
          <label for="">Map</label>
          <input type="text" id="searchmap">
          <div id="map-canvas"></div>
        </div> 
        <div class="form-group">
          <label for="">Lat</label>
          <input type="text" class="form-control input-sm" name="lat" id="lat">
        </div>
        <div class="form-group">
          <label for="">Lng</label>
          <input type="text" class="form-control input-sm" name="lng" id="lng">
        </div> 

        <button class="btn btn-sm btn-danger"></button>
      </form>

  </div>  
</div>

<script>
  
      var map = new google.maps.Marker(document.getElementById('map-canvas'),{
          center:{
            lat: 27.72,
            lng: 85.36
          },
          zoom:15
      });

      var marker = new google.maps.Marker({
        position: {
          lat: 27.72,
          lng: 85.36
        },
        map: map
      });

</script>

</html>