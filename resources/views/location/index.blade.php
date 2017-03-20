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
  </head>
  <body>
    <div id="map"></div>
    <div class="container">
      <div class="col-sm-4">
        <h1>Add Vendor, Location</h1>
        <form action="url (/vendor/add)">
          <div class="form-group">
            <label for=""></label>
            <label type="text" class="form-control input-sm" name=""></label>
            
          </div>
          
        </form>
        
        
      </div>
      
    </div>


    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key= AIzaSyDuYeuRRArPgWsCE_Zrmzd6WcrMI08dNEU&callback=initMap" type="text/javascript">
    </script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js">
    </script>
  </body>
</html>