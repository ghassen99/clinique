
        <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                        <form method="post" action="nouvel_employeur">
                        <h1>
                            <strong><font color="#4068A4">
                                Liste des employeurs 
                            </font></strong>                                
                            <i style="font-size:24px;color:green" class="fa"><button class="btn btn-success" type="submit">&#xf067;</button></i>
                            </h1>
                        </form>
                    </p>
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                                <tr>
                                    <th style="width:10%">Matricule</th>
                                    <th style="width:5%">Photo</th> 
                                    <th style="width:10%">Nom</th>
                                    <th style="width:10%">Prénom</th>
                                    <th style="width:10%">CIN</th>
                                    <th style="width:15%">Date de naissance</th>
                                    <th style="width:15%">Numéro de téléphone</th>
                                    <th style="width:10%">Fonction</th>
                                    <th style="width:10%">Spécialité</th>
                                    <th style="width:5%"></th>
                                    <th style="width:5%"></th>                             
                                </tr>
                        </thead>
                        
                        <tbody>
                            <?php
                            foreach ($res as $obj) {
                            ?>
                                <tr>
                                    <td><?php echo $obj->id_emp ?></td>
                                    <td>
                                        <div class="profile_pic">
                                            <img src="<?php echo "files/".$obj->photo ?>" width="100px" class="img-circle">
                                        </div>
                                        <br>
                                    </td>
                                    <td><?php echo $obj->nom_emp ?></td>
                                    <td><?php echo $obj->pren_emp ?></td>
                                    <td><?php echo $obj->cin_emp ?></td>
                                    <td><?php echo $obj->naiss_emp ?></td>
                                    <td><?php echo $obj->tel_emp ?></td>
                                    <td><?php echo $obj->lib_f ?></td> 
                                    <td><?php echo $obj->lib_spec ?></td>
                                    <td style="width:10px;">
                                        <?php 
                                            if ( $obj->id_emp == $_SESSION['id_emp']){
                                        ?>
                                            <span class="btn btn-danger btn-xs" disabled><i class="fa fa-trash-o"></i> Delete </span>
                                        <?php
                                            }else{
                                        ?>
                                            <a class="btn btn-danger btn-xs" href="index.php?controller=employeur&action=delete&id_emp=<?php echo $obj->id_emp;?>"onclick="if(confirm('Etes vous sure de supprimer?')) return true ;else return false"><i class="fa fa-trash-o"></i> Delete </a>
                                        <?php
                                            }
                                        ?>
                                    </td>                                    
                                    <td  style="width:10px;">
                                            <a class="btn btn-info btn-xs" href="Modifier-employeur-<?php echo $obj->id_emp;?>"><i class="fa fa-pencil"></i> Edit </a>
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
        