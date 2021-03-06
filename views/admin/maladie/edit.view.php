
        <div class="">
        <div class="page-title">
            <div class="title_left">
            <h1>
                <strong><font color="#4068A4">
                    Détails de la maladie
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
                <form  method="post" action="index.php?controller=maladie&action=edit" class="form-horizontal form-label-left" novalidate >                

                    <!-- id_m -->
                    <div class="item form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input onkeypress='return event.charCode >= 65 && event.charCode <= 90 || event.charCode >= 97 && event.charCode <= 122 || event.charCode == 32' value="<?php echo $res_maladie->id_m; ?>" id="id_m" class="form-control col-md-7 col-xs-12" data-validate-length-range="30" name="id_m" placeholder="id_m" required="required" style="display:none" type="text">
                        </div>
                    </div>
                
                    <!-- lib_m -->
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                        Libellé <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input value="<?php echo $res_maladie->lib_m; ?>" id="lib_m" class="form-control col-md-7 col-xs-12" data-validate-length-range="30" name="lib_m" placeholder="Libellé" required="required" type="text">
                        </div>
                    </div>
                
                <!-- bloc -->
                <div class="item form-group">
                    <label class="control-label col-md-3" for="name">
                    Département <span class="required">*</span>
                    </label>
                    <span class="col-md-6">
                        <select class="form-control col-md-7 col-xs-12" name="bloc" id="bloc">
                        <?php
                        foreach($res_bloc as $obj){
                            if ($res_maladie->bloc == $obj->id_bloc) // on va comparer id du table mere avec id de la table fille, et lorsqu'il sont identique on ajoute "selected" 
                                echo "<option value=".$obj->id_bloc." selected>".$obj->lib_bloc."</options>"; 
                            else
                                echo "<option value=".$obj->id_bloc.">".$obj->lib_bloc."</options>";  
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

        