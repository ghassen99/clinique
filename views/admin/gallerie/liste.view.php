<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="container">
            <div class="row">
                <h1>    
                    <div class="col-sm-5">
                        <strong><font color="#4068A4">
                            Gallerie d'images
                        </font></strong>
                    </div>
                </h1>
                <div class="col-sm-5">
                    <!-- photo -->
                    <form  method="post" action="index.php?controller=gallerie&action=ajout" class="form-horizontal form-label-left" novalidate  enctype="multipart/form-data">
                        <div class="item form-group">
                            <div class="input-group input-file" name="lien">
                                <span class="input-group-btn">
                                    <button class="btn btn-default btn-choose" name="lien" type="button">Choose</button>
                                </span>
                                <input type="text" name="lien" class="form-control" placeholder='Ajouter une nouvelle photo' />
                                <span class="input-group-btn">
                                    <button class="btn btn-warning" type="submit">Ajouter</button>
                                </span>
                            </div>
                        </div>
                    <form>  
                    <!-- photo -->                
                </div>
            </div>
        </div>


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
                    <img src="<?php echo "files/".$obj->lien ?>" onclick="if(confirm('Etes vous sure de supprimer?')) return fn(<?php echo $obj->id ?>) ;else return false" style="width:100%; height:500px;">
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
        
        </div>
        <div id="txtHintv"></div>
    </div>
<div>

