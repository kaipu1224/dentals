<div class="row">
    <?php if(count($errors) > 0) { ?>
    <ul>
    <?php foreach($errors as $error){?>
        <li style="color:red;"><?=$error?></li>
    <?php } ?>
    </ul>
    <?php } ?>
</div>
<?php echo form_open('dental_list/action', array('class'=>'col s12')); ?>
<!-- search condition -->
<div class="row">
    <div class="input-field col s4">
      <input type="text" id="name" name="name" class="validate" value="<?=$this->input->post("name");?>" placeholder="検索したい歯科医院名">
      <label for="name">歯科医院名</label>
    </div>
    <div class="input-field col s4">
      <input type="text" id="address" name="address" class="validate" value="<?=$this->input->post("address");?>" placeholder="検索したい住所">
      <label for="address">住所</label>
    </div>
    <div class="input-field col s4">
        <button class="btn waves-effect waves-light" type="submit" name="search">検索</button>
        <button class="btn waves-effect waves-light" type="submit" name="clear">クリア</button>
    </div>
</div><!-- search condition -->
<!-- search results -->
<?php if(count($results) > 0) : ?>
<div class="row">
    <div class="input-field col s4">
        <button class="btn waves-effect waves-light" type="submit" name="prev">Prev</button>
    </div>
    <div class="input-field col s4">
        <?=$total?>件中の<?=$offset+1?>件目から<?=count($results)?>件目を表示しています。
    </div>
    <div class="input-field col s4" style="text-align:right;">
        <button class="btn waves-effect waves-light" type="submit" name="next">Next</button>
    </div>
</div>
<div class="row">
    <table class="striped">
        <thead>
            <tr>
                <th>#</th>
                <th>名称</th>
                <th>住所</th>
                <th>電話番号</th>
                <th>FAX番号</th>
                <th>HP</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $index = 1;
            foreach($results as $row) { 
            ?>
            <tr>
                <td class="numeric"><?=$offset+$index ?></td>
                <td><?=$row->name ?></td>
                <td><?=$row->address ?></td>
                <td><a href="tel:<?=$row->tel ?>"><?=$row->tel ?></a></td>
                <td><?=$row->fax ?></td>
                <td class="center">
                    <?php if($row->url) { ?>
                        <a href="<?=$row->url ?>" target="blank">HP</a>
                    <?php }else { ?>
                        -
                    <?php }?>
                </td>
            </tr>
            <?php
                $index++;
            }
            ?>
        </tbody>
    </table>
</div>
<?php endif; ?><!-- search results -->
<?php echo form_close();?>


<div id="map_canvas" style="width:500px; height:300px"></div>


<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAFapsnIP8qPaYY5JQz6W-hn858y5mvTG4&sensor=true"></script>
<script>
$(function(){
    $("#name").focus();
    
    /*
    var latlng = new google.maps.LatLng(35.709984,139.810703);
    var opts = {
      zoom: 15,
      center: latlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    var map = new google.maps.Map(document.getElementById("map_canvas"), opts);
    */
});
</script>

