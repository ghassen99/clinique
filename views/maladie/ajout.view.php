
        <?php
        if (!isset($_SESSION))
            session_start();
        ?>

        <div class="">
        <div class="page-title">
            <div class="title_left">
            <h3>Nouveau maladie</h3>
            </div>

            <div class="title_right">

            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">

                <div class="x_content">

                <form  method="post" action="index.php?controller=maladie&action=ajout" class="form-horizontal form-label-left" novalidate >
                    
                                    <!-- lib_m -->
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                                        lib_m <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="lib_m" class="form-control col-md-7 col-xs-12" data-validate-length-range="30" name="lib_m" placeholder="lib_m" required="required" type="text">
                                        </div>
                                    </div>
                                
                                <!-- bloc -->
                                <div class="item form-group">
                                    <label class="control-label col-md-3" for="name">
                                    bloc <span class="required">*</span>
                                    </label>
                                    <span class="col-md-6">
                                        <select class="form-control col-md-7 col-xs-12" name="bloc" id="bloc">
                                        <?php
                                        foreach($res_bloc as $obj){
                                            echo "<option value=".$obj->id_bloc.">".$obj->id_bloc."</options>";   
                                        }
                                        ?>
                                        </select>   
                                    </span>

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
      
        