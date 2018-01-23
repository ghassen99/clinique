<section id="intro">

<div>


<div id="carousel-b" class="carousel slide carousel-sync" data-ride="carousel1" data-pause="false">
  <div class="carousel-inner">
    <?php 
      $ind = 0;
    
    
    foreach ($res as $obj)  {

        
          if ($ind == 0){
            echo  '<div class="item active">' ;
          }
          else{
            echo  '<div class="item">' ;
          }
          $ind = $ind + 1;
        ?>      
          <img src="<?php echo "files/".$obj->lien ?>"  style="width:100%; height:770px;">
        </div>

        <?php
            }
        ?>     

  </div>

  <a class="left carousel-control" href="https://www.bootply.com/run?ext=1#carousel-b" data-slide="prev">
  </a>
  <a class="right carousel-control" href="https://www.bootply.com/run?ext=1#carousel-b" data-slide="next">
  </a>
</div>


<div>

</section>