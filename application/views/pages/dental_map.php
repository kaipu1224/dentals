<div class="row">
    <?php if(count($errors) > 0) { ?>
    <ul>
    <?php foreach($errors as $error){?>
        <li style="color:red;"><?=$error?></li>
    <?php } ?>
    </ul>
    <?php } ?>
</div>

<div id="map_canvas" style="width:100%; height:100%; position:absolute;left:0;"></div>

<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAFapsnIP8qPaYY5JQz6W-hn858y5mvTG4&sensor=false"></script>
<script>
$(function(){
    // 中心は水戸駅
    var latlng = new google.maps.LatLng(36.370848, 140.476927);
    var opts = {
      zoom: 13,
      center: latlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    var map = new google.maps.Map(document.getElementById("map_canvas"), opts);

    var detectBrowser = function() {
      var useragent = navigator.userAgent;
      var mapdiv = document.getElementById("map_canvas");
      mapdiv.style.height = ($(window).innerHeight() - 120) + "px";
    }
    
    var addMarkerInfo = function(marker, row){
        google.maps.event.addListener(marker, 'click', function(event){
            map.setZoom(20);
            map.setCenter(marker.getPosition());
            
            
            var info = "<span>" + row.name + "</span><br/>";
            info += "<span>住所:" + row.address + "</span><br/>";
            info += "<span>TEL:" + row.tel + "</span><br/>";
            if(row.url){
                info += "HP:<a href='" + row.url + "' target='blank'>" + row.url + "</a>";
            }
            new google.maps.InfoWindow({
                content: info
            }).open(marker.getMap(), marker);
        });
    }

    // 非同期でデータ取得
    $.ajax({
        url: 'dental_map/action',
        type: 'POST',
        dataType: 'json',
        data: {"search":"1"},
        success: function(result){
            var data = result.data;
            for(var key in data){
                var row = data[key];
                if(row.latitude && row.longitude){
                    var latlng = new google.maps.LatLng(row.latitude, row.longitude);
                    var marker = new google.maps.Marker({
                        position:latlng,
                        map:map
                    });
                    addMarkerInfo(marker, row);
                }
            }
        },
        error: function(result){
            console.log("error");
        }
    });
    
    // サイズ調整
    detectBrowser();
});
</script>

