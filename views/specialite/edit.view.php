
        <div class="">
        <div class="page-title">
            <div class="title_left">
            <h1>
                <strong><font color="#4068A4">
                    Détails de la specialite
                </font></strong>
            </h1> 
            </div>

            <div class="title_right">

            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">

                <div class="x_content">
                <form  method="post" action="index.php?controller=specialite&action=edit" class="form-horizontal form-label-left" novalidate >                

                    <!-- id_spec -->
                    <div class="item form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input value="<?php echo $res_specialite->id_spec; ?>" id="id_spec" class="form-control col-md-7 col-xs-12" data-validate-length-range="30" name="id_spec" placeholder="id_spec" required="required" style="display:none" type="text">
                        </div>
                    </div>
                
                    <!-- lib_spec -->
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                        Libellé <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input value="<?php echo $res_specialite->lib_spec; ?>" id="lib_spec" class="form-control col-md-7 col-xs-12" data-validate-length-range="30" name="lib_spec" placeholder="Libellé" required="required" type="text">
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

        