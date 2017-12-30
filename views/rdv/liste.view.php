
        <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                        <form method="post" action="index.php?controller=rdv&action=ajout1">
                            <h1>
                                Liste des rdvs 
                                <i style="font-size:24px;color:green" class="fa"><button type="submit">&#xf067;</button></i>
                            </h1>
                        </form>
                    </p>
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                                <tr>
                               <th>id_rdv</th>
                               <th>date_rdv</th>
                               <th>patient</th>
                               <th>maladie</th>
                               <th>employeur</th>
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
                                 <td><?php echo $obj->patient ?></td>
                                 <td><?php echo $obj->maladie ?></td>
                                 <td><?php echo $obj->employeur ?></td>
                                 <td>
                                   <button type="button"> <a  href="index.php?controller=rdv&action=delete&id_rdv=<?php echo $obj->id_rdv;?>"onclick="if(confirm('Etes vous sure de supprimer?')) return true ;else return false"><i style="font-size:24px;color:red" class="fa">&#xf1f8;</i></a></button>
                                   <button type="button"> <a  href="index.php?controller=rdv&action=edit1&id_rdv=<?php echo $obj->id_rdv;?>"><i class="fa fa-pencil-square-o" style="font-size:24px;color:blue"></i></a></button></td>                              
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
        