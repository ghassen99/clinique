
        <div class="">
        <div class="page-title">
            <div class="title_left">
            <h3>Détails du fonction</h3>
            </div>

            <div class="title_right">

            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">

                <div class="x_content">

                <form  method="post" action="index.php?controller=fonction&action=edit" class="form-horizontal form-label-left" novalidate >

                    <input type="hidden" name="id_f" value="<?php echo $res->id_f; ?>"><br>
                    
                    <!-- id_f -->
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                        id_f <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input value="<?php echo $res_fonction->id_f; ?>" id="id_f" class="form-control col-md-7 col-xs-12" data-validate-length-range="30" name="id_f" placeholder="id_f" required type="text">
                        </div>
                    </div>
                    
                    <!-- lib_f -->
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                        lib_f <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input value="<?php echo $res_fonction->lib_f; ?>" id="lib_f" class="form-control col-md-7 col-xs-12" data-validate-length-range="30" name="lib_f" placeholder="lib_f" required type="text">
                        </div>
                    </div>
                    
                    <!-- specialite -->
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                        specialite <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input value="<?php echo $res_fonction->specialite; ?>" id="specialite" class="form-control col-md-7 col-xs-12" data-validate-length-range="30" name="specialite" placeholder="specialite" required type="text">
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

        