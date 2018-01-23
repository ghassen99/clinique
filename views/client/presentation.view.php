<section id="Presentation" class="home-section text-center">
        <div class="heading-about">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="wow bounceInDown" data-wow-delay="0.4s">
                            <div class="section-heading">
                                <h2>Présentation</h2>
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
            <div class="col-md-12">
                <h3><b><font color="#4068A4">
                    Notre équipe se compose de : 
                </font></b></h3>
            </div>
            <div class="col-md-4">
                <div class="wow fadeInLeft" data-wow-delay="0.2s">
                    <div class="service-box">
                        <div class="service-icon">
                            <img src="img/icons/service-icon-1.png" alt="" />
                        </div>
                        <div class="service-desc">
                            <h4><b><font color="#4068A4">
                                Employeurs 
                            </font></b></h4>
                            <p>
                                <?php 
                                    $i=0;
                                    foreach ($res_employeur as $obj){
                                        $i++;
                                    }
                                    echo $i." employeurs";
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="col-md-4">
                <div class="wow fadeInLeft" data-wow-delay="0.2s">
                    <div class="service-box">
                        <div class="service-icon">
                            <img src="img/icons/service-icon-1.png" alt="" />
                        </div>
                        <div class="service-desc">
                            <h4><b><font color="#4068A4">
                                Spécialités 
                            </font></b></h4>
                            <p>
                                <?php 
                                    $i=0;
                                    foreach ($res_specialite as $obj){
                                        $i++;
                                    }
                                    echo $i." spécialités";
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="col-md-4">
                <div class="wow fadeInLeft" data-wow-delay="0.2s">
                    <div class="service-box">
                        <div class="service-icon">
                            <img src="img/icons/service-icon-1.png" alt="" />
                        </div>
                        <div class="service-desc">
                            <h4><b><font color="#4068A4">
                                Départements 
                            </font></b></h4>

                            <p>
                                <?php 
                                    $i=0;
                                    foreach ($res_bloc as $obj){
                                        $i++;
                                    }
                                    echo $i." départements";
                                ?>
                            </p>

                        </div>
                    </div>
                </div>
            </div>
    
        </div>
        </div>
    </section>