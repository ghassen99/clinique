<section id="specialite" class="home-section text-center bg-gray">

<div class="heading-about">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <div class="wow bounceInDown" data-wow-delay="0.4s">
                    <div class="section-heading">
                        <h2>Nos spécialités</h2>
                        <i class="fa fa-2x fa-angle-down"></i>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-2 col-lg-offset-5">
            <hr class="marginbot-50">
        </div>
    </div>
    <div class="row">

    <?php
    foreach ($res_specialite as $obj) {
    ?>
        <div class="col-md-4" >
            <div class="wow fadeInLeft" data-wow-delay="0.2s">
                <div class="service-box">
                    <div class="service-desc">
                        <h5><b><font color="#4068A4">
                            <?php echo $obj->lib_spec ?> 
                        </font></b></h5>

                        <hr>
                    </div>
                </div>
            </div>
        </div>
    <?php
        }
    ?>

</div>
</section>