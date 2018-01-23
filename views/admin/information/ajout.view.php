
        <?php
        if (!isset($_SESSION))
            session_start();
        ?>

        <div class="">
        <div class="page-title">
            <div class="title_left">
            <h3>Nouveaux informations</h3>
            </div>

            <div class="title_right">

            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">

                <div class="x_content">

                <form  method="post" action="index.php?controller=information&action=ajout" class="form-horizontal form-label-left" novalidate >
                    
                                    <!-- adresse -->
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                                        Adresse <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="adresse" class="form-control col-md-7 col-xs-12" data-validate-length-range="30" name="adresse" placeholder="adresse" required="required" type="text">
                                        </div>
                                    </div>
                                
                                    <!-- mail -->
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                                        e-mail <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="mail" class="form-control col-md-7 col-xs-12" data-validate-length-range="30" name="mail" placeholder="mail" required="required" type="text">
                                        </div>
                                    </div>
                                
                                    <!-- tel -->
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                                        Numéro de téléphone <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="tel" class="form-control col-md-7 col-xs-12" data-validate-length-range="30" name="tel" placeholder="tel" required="required" type="text">
                                        </div>
                                    </div>
                                
                                    <!-- fax -->
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                                        Fax <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="fax" class="form-control col-md-7 col-xs-12" data-validate-length-range="30" name="fax" placeholder="fax" required="required" type="text">
                                        </div>
                                    </div>

                                
                    <div class="ln_solid"></div>
                    <div class="form-group">
                    <div class="col-md-6 col-md-offset-3">
                        <button id="send" type="submit" class="btn btn-success">Submit</button>
                        <button type="reset" class="btn btn-primary">Cancel</button>
                    </div>
                    </div>
                </form>
                </div>
            </div>
            </div>
        </div>
        </div>
      
        