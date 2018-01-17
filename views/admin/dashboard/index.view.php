<div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                        <form method="post" action="index.php?controller=rdv&action=ajout1">
                            <h1>
                                <strong><font color="#4068A4">
                                    Liste des rendez-vous pour aujourd'hui
                                </font></strong>
                            </h1>                        
                            <h1>
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
                                </tr>
                        </thead>
                        
                        <tbody>
                            <?php
                            foreach ($res as $obj) {
                                if ($obj->date_rdv == date("Y-m-d")){
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
                                </tr>
                            <?php
                                }
                            }
                            ?>
                        </tbody>
                        

                        
                    </table>
                </div>
            </div>
        </div>
        </div>
        