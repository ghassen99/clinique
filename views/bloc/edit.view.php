
        <div class="">
        <div class="page-title">
            <div class="title_left">
            <h3>Détails du bloc</h3>
            </div>

            <div class="title_right">

            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">

                <div class="x_content">

                <form  method="post" action="index.php?controller=bloc&action=edit" class="form-horizontal form-label-left" novalidate >

                    <input type="hidden" name="id_bloc" value="<?php echo $res->id_bloc; ?>"><br>
                    
                    <!-- id_bloc -->
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                        id_bloc <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input value="<?php echo $res_bloc->id_bloc; ?>" id="id_bloc" class="form-control col-md-7 col-xs-12" data-validate-length-range="30" name="id_bloc" placeholder="id_bloc" required type="text">
                        </div>
                    </div>
                    
                    <!-- lib_bloc -->
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                        lib_bloc <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input value="<?php echo $res_bloc->lib_bloc; ?>" id="lib_bloc" class="form-control col-md-7 col-xs-12" data-validate-length-range="30" name="lib_bloc" placeholder="lib_bloc" required type="text">
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

        