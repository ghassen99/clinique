
        <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                        <form method="post" action="Nouveau_rendez-vous">
                        <h1>
                            <strong><font color="#4068A4">
                                Liste des rendez-vous 
                                <i style="font-size:24px;color:green" class="fa"><button type="submit">&#xf067;</button></i>
                            </font></strong>
                        </h1> 
                        </form>
                    </p>
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Date</th>
                                    <th>Patient</th>
                                    <th>Maladie</th>
                                    <th>Employeur</th>
                                    <th></th>
                                    <th></th>                             
                                </tr>
                        </thead>
                        
                        <tbody>
                            <?php
                            foreach ($res as $obj) {
                            ?>
                                <tr>
                                    <td><?php echo $obj->id_rdv ?></td>
                                    <td><?php echo $obj->date_rdv ?></td>
                                    <td>
                                        <!-- Trigger the modal with a button -->
                                        <a href="#" data-toggle="modal" data-target="#myModal"><?php echo $obj->nom_p.' '.$obj->prenom_p ?></a>

                                        <!-- Modal -->
                                        <div class="modal fade" id="myModal" role="dialog">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title"><b>Détail du patient</b></h4>
                                            </div>
                                            <div class="modal-body">
                                                <p>
                                                    <?php echo '<b>Nom : </b>'.$obj->nom_p.'<br>'.'<b>Prenom : </b>'.$obj->prenom_p.'<br>'.'<b>CIN : </b>'.$obj->cin_p.'<br>'.'<b>Date de naissance : </b>'.$obj->naissance_p.'<br>'.'<b>Adresse : </b>'.$obj->adresse.'<br>'.'<b>Numéro de téléphone : </b>'.$obj->tel_p ;?>
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                    </td>
                                    <td><?php echo $obj->lib_m ?></td>
                                    <td>
                                        <!-- Trigger the modal with a button -->
                                        <a href="#" data-toggle="modal" data-target="#myModal1"><?php echo $obj->nom_emp.' '.$obj->pren_emp ?></a>

                                        <!-- Modal -->
                                        <div class="modal fade" id="myModal1" role="dialog">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title"><b>Détail de lemployeur</b></h4>
                                            </div>
                                            <div class="modal-body">
                                                <p>
                                                    <?php echo '<b>Nom : </b>'.$obj->nom_emp.'<br>'.'<b>Prenom : </b>'.$obj->pren_emp.'<br>'.'<b>CIN : </b>'.$obj->cin_emp.'<br>'.'<b>Date de naissance : </b>'.$obj->naiss_emp.'<br>'.'<b>Fonction : </b>'.$obj->lib_f ;?>
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                    </td>
                                    <td style="width:10px;">
                                            <a class="btn btn-danger btn-xs" href="index.php?controller=rdv&action=delete&id_rdv=<?php echo $obj->id_rdv;?>"onclick="if(confirm('Etes vous sure de supprimer?')) return true ;else return false"><i class="fa fa-trash-o"></i> Delete </a>
                                    </td>                                    
                                    <td  style="width:10px;">
                                            <a class="btn btn-info btn-xs" href="Modifier-rdv-<?php echo $obj->id_rdv;?>"><i class="fa fa-pencil"></i> Edit </a>
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
        