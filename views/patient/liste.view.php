
        <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                        <form method="post" action="index.php?controller=patient&action=ajout1">
                            <h1>
                                Liste des patients 
                                <i style="font-size:24px;color:green" class="fa"><button type="submit">&#xf067;</button></i>
                            </h1>
                        </form>
                    </p>
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                                <tr>
                               <th>id_p</th>
                               <th>nom_p</th>
                               <th>prenom_p</th>
                               <th>cin_p</th>
                               <th>naissance_p</th>
                               <th>adresse</th>
                               <th>tel_p</th>
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
                                 <td>
                                   <button type="button"> <a  href="index.php?controller=patient&action=delete&id_p=<?php echo $obj->id_p;?>"onclick="if(confirm('Etes vous sure de supprimer?')) return true ;else return false"><i style="font-size:24px;color:red" class="fa">&#xf1f8;</i></a></button>
                                   <button type="button"> <a  href="index.php?controller=patient&action=edit1&id_p=<?php echo $obj->id_p;?>"><i class="fa fa-pencil-square-o" style="font-size:24px;color:blue"></i></a></button></td>                              
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
        