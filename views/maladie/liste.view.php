
        <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                        <form method="post" action="index.php?controller=maladie&action=ajout1">
                            <h1>
                                Liste des maladies 
                                <i style="font-size:24px;color:green" class="fa"><button type="submit">&#xf067;</button></i>
                            </h1>
                        </form>
                    </p>
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                                <tr>
                               <th>id_m</th>
                               <th>lib_m</th>
                               <th>bloc</th>
                               <th></th>                              
                                </tr>
                        </thead>
                        
                        <tbody>
                            <?php
                            foreach ($res as $obj) {
                            ?>
                                <tr>
                                 <td><?php echo $obj->id_m ?></td>
                                 <td><?php echo $obj->lib_m ?></td>
                                 <td><?php echo $obj->bloc ?></td>
                                 <td>
                                   <button type="button"> <a  href="index.php?controller=maladie&action=delete&id_m=<?php echo $obj->id_m;?>"onclick="if(confirm('Etes vous sure de supprimer?')) return true ;else return false"><i style="font-size:24px;color:red" class="fa">&#xf1f8;</i></a></button>
                                   <button type="button"> <a  href="index.php?controller=maladie&action=edit1&id_m=<?php echo $obj->id_m;?>"><i class="fa fa-pencil-square-o" style="font-size:24px;color:blue"></i></a></button></td>                              
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
        