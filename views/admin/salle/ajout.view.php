
        <?php
        if (!isset($_SESSION))
            session_start();
        ?>

        <div class="">
        <div class="page-title">
            <div class="title_left">
            <h1>
                <strong><font color="#4068A4">
                    Nouvelle salle
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

                <form  method="post" action="index.php?controller=salle&action=ajout" class="form-horizontal form-label-left" novalidate >
                    
                                    <!-- nb_lit -->
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                                            Nombre des lits <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input minlength="2" maxlength="2" onkeypress='return event.charCode >= 48 && event.charCode <= 57' id="nb_lit" class="form-control col-md-7 col-xs-12" data-validate-length-range="30" name="nb_lit" placeholder="Nombre des lits" required="required" type="text">
                                        </div>
                                    </div>
                                
                                    <!-- etage -->
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                                        Etage <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input minlength="2" maxlength="2" onkeypress='return event.charCode >= 48 && event.charCode <= 57' id="etage" class="form-control col-md-7 col-xs-12" data-validate-length-range="30" name="etage" placeholder="Etage" required="required" type="text">
                                        </div>
                                    </div>
                                
                                <!-- id_bloc -->
                                <div class="item form-group">
                                    <label class="control-label col-md-3" for="name">
                                    Département <span class="required">*</span>
                                    </label>
                                    <span class="col-md-6">
                                        <select class="form-control col-md-7 col-xs-12" name="id_bloc" id="id_bloc" >
                                        <?php
                                        foreach($res_bloc as $obj){
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
      
        