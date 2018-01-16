
        <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                        <form method="post" action="index.php?controller=bloc&action=ajout1">
                            <h1>
                                <strong><font color="#4068A4">
                                    Liste des Départements 
                                </font></strong>
                               
                                <i style="font-size:24px;color:green" class="fa"><button type="submit">&#xf067;</button></i>
                            </h1>
                        </form>
                    </p>
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                                <tr>
                                    <th>ID</th>
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
                                    <td><?php echo $obj->id_bloc ?></td>
                                    <td><?php echo $obj->lib_bloc ?></td>
                                    <td style="width:10px;">
                                            <a class="btn btn-info btn-xs" href="index.php?controller=bloc&action=delete&id_bloc=<?php echo $obj->id_bloc;?>"onclick="if(confirm('Etes vous sure de supprimer?')) return true ;else return false"><i class="fa fa-trash-o"></i> Delete </a>
                                    </td>                                    
                                    <td  style="width:10px;">
                                            <a class="btn btn-danger btn-xs" href="index.php?controller=bloc&action=edit1&id_bloc=<?php echo $obj->id_bloc;?>"><i class="fa fa-pencil"></i> Edit </a>
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
        