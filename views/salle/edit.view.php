
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

                    <!-- id_salle -->
                    <div class="item form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input value="<?php echo $res_salle->id_salle; ?>" id="id_salle" class="form-control col-md-7 col-xs-12" data-validate-length-range="30" name="id_salle" placeholder="id_salle" required="required" style="display:none" type="text">
                        </div>
                    </div>
                
                    <!-- nb_lit -->
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                        Nombre des lits <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input value="<?php echo $res_salle->nb_lit; ?>" id="nb_lit" class="form-control col-md-7 col-xs-12" data-validate-length-range="30" name="nb_lit" placeholder="Nombre des lits" required="required" type="text">
                        </div>
                    </div>
                
                    <!-- etage -->
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                        Etage <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input value="<?php echo $res_salle->etage; ?>" id="etage" class="form-control col-md-7 col-xs-12" data-validate-length-range="30" name="etage" placeholder="Etage" required="required" type="text">
                        </div>
                    </div>
                
                <!-- id_bloc -->
                <div class="item form-group">
                    <label class="control-label col-md-3" for="name">
                    Bloc <span class="required">*</span>
                    </label>
                    <span class="col-md-6">
                        <select class="form-control col-md-7 col-xs-12" name="id_bloc" id="id_bloc">
                        <?php
                        foreach($res_bloc as $obj){
                            if ($res_salle->id_bloc == $obj->id_bloc) // on va comparer id du table mere avec id de la table fille, et lorsqu'il sont identique on ajoute "selected" 
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

        