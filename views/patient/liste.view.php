
        <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                        <form method="post" action="Nouveau_patient">
                            <h1>
                                <strong><font color="#4068A4">
                                    Liste des patients
                                </font></strong>
                                <i style="font-size:24px;color:green" class="fa"><button type="submit">&#xf067;</button></i>
                            </h1> 
                        </form>
                    </p>
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                                <tr>
                                    <th><strong>Matricule</strong></th>
                                    <th><strong>Nom</strong></th>
                                    <th><strong>Prénom</strong></th>
                                    <th><strong>CIN</strong></th>
                                    <th><strong>Date de naissance</strong></th>
                                    <th><strong>Adresse</strong></th>
                                    <th><strong>Numéro de téléphone</strong></th>
                                    <th></th>
                                    <th></th>     
                                    <th></th>                      
                                </tr>
                        </thead>
                        
                        <tbody>
                            <?php
                            foreach ($res as $obj) {
                            ?>
                                <tr>
                                    <td><?php echo $obj->id_p ?></td>
                                    <td><?php echo $obj->nom_p ?></td>
                                    <td><?php echo $obj->prenom_p ?></td>
                                    <td><?php echo $obj->cin_p ?></td>
                                    <td><?php echo $obj->naissance_p ?></td>
                                    <td><?php echo $obj->adresse ?></td>
                                    <td><?php echo $obj->tel_p ?></td>
                                   
                                    <td style="width:10px;">
                                            <a class="btn btn-primary btn-xs"  href="view-patient-<?php echo $obj->id_p;?>"><i class="fa fa-folder"></i>Détails</a>
                                    </td>
                                    <td style="width:10px;">
                                            <a class="btn btn-danger btn-xs" href="index.php?controller=patient&action=delete&id_p=<?php echo $obj->id_p;?>"onclick="if(confirm('Etes vous sure de supprimer?')) return true ;else return false"><i class="fa fa-trash-o"></i> Delete </a>
                                    </td>                                    
                                    <td  style="width:10px;">
                                            <a class="btn btn-info btn-xs" href="Modifier-patient-<?php echo $obj->id_p;?>"><i class="fa fa-pencil"></i> Edit </a>
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
        