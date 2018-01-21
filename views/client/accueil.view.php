<section id="intro">

<div>
    <div class="x_panel">
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

</section>