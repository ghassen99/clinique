
        <div class="">
        <div class="page-title">
            <div class="title_left">
            <h3>Détails de la fonction</h3>
            </div>

            <div class="title_right">

            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">

                <div class="x_content">
                <form  method="post" action="index.php?controller=fonction&action=edit" class="form-horizontal form-label-left" novalidate >                

                    <!-- id_f -->
                    <div class="item form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input value="<?php echo $res_fonction->id_f; ?>" id="id_f" class="form-control col-md-7 col-xs-12" data-validate-length-range="30" name="id_f" placeholder="id_f" required="required" style="display:none" type="text">
                        </div>
                    </div>
                
                    <!-- lib_f -->
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                        Libellé <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input value="<?php echo $res_fonction->lib_f; ?>" id="lib_f" class="form-control col-md-7 col-xs-12" data-validate-length-range="30" name="lib_f" placeholder="Libellé" required="required" type="text">
                        </div>
                    </div>
                
                <!-- specialite -->
                <div class="item form-group">
                    <label class="control-label col-md-3" for="name">
                    Specialité <span class="required">*</span>
                    </label>
                    <span class="col-md-6">
                        <select class="form-control col-md-7 col-xs-12" name="specialite" id="specialite">
                        <?php
                        foreach($res_specialite as $obj){
                            if ($res_fonction->specialite == $obj->id_spec) // on va comparer id du table mere avec id de la table fille, et lorsqu'il sont identique on ajoute "selected" 
                                echo "<option value=".$obj->id_spec." selected>".$obj->lib_spec."</options>"; 
                            else
                                echo "<option value=".$obj->id_spec.">".$obj->lib_spec."</options>";  
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

        