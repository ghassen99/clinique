

<div class="col-md-12 col-sm-6 col-xs-12">
    <div class="x_panel">

        <div class="x_content">
        <h1>
                <strong><font color="#4068A4">
                    Détails du patient
                </font></strong>
        </h1> 
        <br>

        <div  class="" role="tabpanel" data-example-id="togglable-tabs">
            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
            <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true"><strong>Cordonnées</strong></a>
            </li>
            <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false"><strong>Liste des randez-vous</strong></a>
            </li>
            </ul>
            <div id="myTabContent" class="tab-content">
            <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                <p>
                    <?php
                        foreach ($res_patient as $obj) {
                    ?>
                    <br>
                    <div class="row">
                        <div class="col-sm-3"><strong><font color="blue">Matricule</font></strong></div>
                        <div class="col-sm-6"><?php echo $obj->id_p ?></div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-3"><strong><font color="blue">Nom</font></strong></div>
                        <div class="col-sm-6"><?php echo $obj->nom_p ?></div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-3"><strong><font color="blue">Prénom</font></strong></div>
                        <div class="col-sm-6"><?php echo $obj->prenom_p ?></div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-3"><strong><font color="blue">CIN</font></strong></div>
                        <div class="col-sm-6"><?php echo $obj->cin_p ?></div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-3"><strong><font color="blue">Date de naissance</font></strong></div>
                        <div class="col-sm-6"><?php echo $obj->naissance_p ?></div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-3"><strong><font color="blue">Adresse</font></strong></div>
                        <div class="col-sm-6"><?php echo $obj->adresse ?></div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-3"><strong><font color="blue">Numéro de téléphone</font></strong></div>
                        <div class="col-sm-6"><?php echo $obj->tel_p ?></div>
                    </div>
                    <?php
                        }
                    ?>                    
                </p>
            </div>

            <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                <p>
                    <br>
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                                <tr>
                                    <th><strong>Date</strong></th>
                                    <th><strong>Maladie</strong></th>                     
                                </tr>
                        </thead>
                        
                        <tbody>
                            <?php
                            foreach ($res as $obj) {
                            ?>
                                <tr>
                                    <td><?php echo $obj->date_rdv ?></td>
                                    <td><?php echo $obj->lib_m ?></td>                            
                                </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                    </table>  
                </p>
            </div>
            </div>
        </div>

        </div>
    </div>
</div>
