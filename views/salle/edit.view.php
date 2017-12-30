
        <div class="">
        <div class="page-title">
            <div class="title_left">
            <h3>Détails du salle</h3>
            </div>

            <div class="title_right">

            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">

                <div class="x_content">

                <form  method="post" action="index.php?controller=salle&action=edit" class="form-horizontal form-label-left" novalidate >

                    <input type="hidden" name="id_salle" value="<?php echo $res->id_salle; ?>"><br>
                    
                    <!-- id_salle -->
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                        id_salle <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input value="<?php echo $res_salle->id_salle; ?>" id="id_salle" class="form-control col-md-7 col-xs-12" data-validate-length-range="30" name="id_salle" placeholder="id_salle" required type="text">
                        </div>
                    </div>
                    
                    <!-- nb_lit -->
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                        nb_lit <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input value="<?php echo $res_salle->nb_lit; ?>" id="nb_lit" class="form-control col-md-7 col-xs-12" data-validate-length-range="30" name="nb_lit" placeholder="nb_lit" required type="text">
                        </div>
                    </div>
                    
                    <!-- etage -->
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                        etage <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input value="<?php echo $res_salle->etage; ?>" id="etage" class="form-control col-md-7 col-xs-12" data-validate-length-range="30" name="etage" placeholder="etage" required type="text">
                        </div>
                    </div>
                    
                    <!-- id_bloc -->
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                        id_bloc <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input value="<?php echo $res_salle->id_bloc; ?>" id="id_bloc" class="form-control col-md-7 col-xs-12" data-validate-length-range="30" name="id_bloc" placeholder="id_bloc" required type="text">
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

        