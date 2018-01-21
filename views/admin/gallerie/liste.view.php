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
        

        <div id="slideshow" class="cycle-slideshow" 
        data-cycle-fx="fade" 
        data-cycle-manual-fx="scrollHorz" 
        data-cycle-pager-fx = "fade" 
        data-cycle-manual-speed="400"
        data-cycle-prev="#prev"  	
        data-cycle-next="#next"
        data-cycle-speed="600"  
        data-cycle-timeout="3000" 
        data-cycle-pager = "#pager" > 
            <?php
            foreach ($res as $obj) {
            ?>
                <img src="<?php echo "files/".$obj->lien ?>" id="intro_img" onclick="if(confirm('Etes vous sure de supprimer?')) return fn(<?php echo $obj->id ?>) ;else return false" />
            <?php
            }
            ?>

        </div>

                
                <div id="prev_c"><img id="prev" src="img/prev1.svg"/></div>
                <div id="next_c"><img id="next" src="img/next1.svg"/></div>
        </div>

        <div id="txtHintv"></div>
        <script type="text/javascript">
            function height() {
                var h = window.innerHeight;
                var a = document.getElementById('container');
                a.style.height = h+"px";
                }
                
            window.addEventListener('load',height);
            window.addEventListener('resize',height);
        </script>
    </div>
<div>

