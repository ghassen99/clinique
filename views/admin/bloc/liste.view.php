
        <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                            <h1>
                                <strong><font color="#4068A4">
                                    Liste des Départements 
                                </font></strong>
                               
                                <i style="font-size:24px;color:green" data-toggle="modal" data-target=".bs-example-modal-lg" class="fa"><button class="btn btn-success" type="submit">&#xf067;</button></i>                              

                            </h1>
                            
                            <div class="x_content">

                                <!-- modal -->
                                <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">

                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                        </button>
                                        <h1 class="modal-title" id="myModalLabel">
                                            <strong><font color="#4068A4">
                                                Nouveau Département
                                            </font></strong>
                                        </h1>
                                    </div>
                                    <form  method="post" action="index.php?controller=bloc&action=ajout" class="form-horizontal form-label-left" novalidate enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <p>                    
                                                <!-- lib_bloc -->
                                                <div class="item form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                                                    Libellé <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input onkeypress='return event.charCode >= 65 && event.charCode <= 90 || event.charCode >= 97 && event.charCode <= 122 || event.charCode == 32' id="lib_bloc" class="form-control col-md-7 col-xs-12" data-validate-length-range="30" name="lib_bloc" placeholder="Libellé" required="required" type="text">
                                                    </div>
                                                </div>

                                                                                    
                                                <!-- photo_emp -->
                                                <div class="item form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                                                    Photo <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">

                                                    <div class="input-group input-file" name="photo">
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-default btn-choose" name="photo" type="button">Choose</button>
                                                        </span>
                                                        <input type="text" name="photo" class="form-control" placeholder='Choose a file...' />
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-warning btn-reset" type="button">Reset</button>
                                                        </span>
                                                    </div>

                                                    </div>
                                                </div>  
                                                                                    
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form> 
                                    </div>
                                </div>
                                </div>
                            </div>
                    </p>
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                                <tr>
                                    <th>Photo</th>
                                    <th>Libéllé</th>
                                    <th></th>
                                    <th></th>                             
                                </tr>
                        </thead>
                        
                        <tbody>
                            <?php
                            foreach ($res as $obj) {
                            ?>
                                <tr>
                                    <td>
                                        <div class="profile_pic">
                                            <img src="<?php echo "files/".$obj->photo ?>" width="100px" class="img-circle">
                                        </div>
                                        <br>
                                    </td>
                                    <td><?php echo $obj->lib_bloc ?></td>
                                    <td style="width:10px;">
                                            <a class="btn btn-danger btn-xs" href="index.php?controller=bloc&action=delete&id_bloc=<?php echo $obj->id_bloc;?>"onclick="if(confirm('Etes vous sure de supprimer?')) return true ;else return false"><i class="fa fa-trash-o"></i> Delete </a>
                                    </td>                                    
                                    <td  style="width:10px;">
                                            <a class="btn btn-info btn-xs" href="Modifier-departement-<?php echo $obj->id_bloc;?>"><i class="fa fa-pencil"></i> Edit </a>
                                    </td>

                                </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        </div>
        