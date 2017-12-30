
        <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                        <form method="post" action="index.php?controller=employeur&action=ajout1">
                            <h1>
                                Liste des employeurs 
                                <i style="font-size:24px;color:green" class="fa"><button type="submit">&#xf067;</button></i>
                            </h1>
                        </form>
                    </p>
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                                <tr>
                               <th>id_emp</th>
                               <th>nom_emp</th>
                               <th>pren_emp</th>
                               <th>cin_emp</th>
                               <th>password</th>
                               <th>naiss_emp</th>
                               <th>fonction</th>
                               <th></th>                              
                                </tr>
                        </thead>
                        
                        <tbody>
                            <?php
                            foreach ($res as $obj) {
                            ?>
                                <tr>
                                 <td><?php echo $obj->id_emp ?></td>
                                 <td><?php echo $obj->nom_emp ?></td>
                                 <td><?php echo $obj->pren_emp ?></td>
                                 <td><?php echo $obj->cin_emp ?></td>
                                 <td><?php echo $obj->password ?></td>
                                 <td><?php echo $obj->naiss_emp ?></td>
                                 <td><?php echo $obj->fonction ?></td>
                                 <td>
                                   <button type="button"> <a  href="index.php?controller=employeur&action=delete&id_emp=<?php echo $obj->id_emp;?>"onclick="if(confirm('Etes vous sure de supprimer?')) return true ;else return false"><i style="font-size:24px;color:red" class="fa">&#xf1f8;</i></a></button>
                                   <button type="button"> <a  href="index.php?controller=employeur&action=edit1&id_emp=<?php echo $obj->id_emp;?>"><i class="fa fa-pencil-square-o" style="font-size:24px;color:blue"></i></a></button></td>                              
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
        