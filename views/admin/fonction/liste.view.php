
        <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                        <form method="post" action="Nouvelle_fonction">
                            <h1>
                                <strong><font color="#4068A4">
                                    Liste des fonctions
                                </font></strong>
                                
                                <i style="font-size:24px;color:green" class="fa"><button class="btn btn-success" type="submit">&#xf067;</button></i>
                            </h1>
                        </form>
                    </p>
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Libellé</th>
                                    <th>Specialité</th>
                                    <th></th>
                                    <th></th>                            
                                </tr>
                        </thead>
                        
                        <tbody>
                            <?php
                            foreach ($res as $obj) {
                            ?>
                                <tr>
                                    <td><?php echo $obj->id_f ?></td>
                                    <td><?php echo $obj->lib_f ?></td>
                                    <td><?php echo $obj->lib_spec ?></td>
                                    <td style="width:10px;">
                                            <a class="btn btn-danger btn-xs" href="index.php?controller=fonction&action=delete&id_f=<?php echo $obj->id_f;?>"onclick="if(confirm('Etes vous sure de supprimer?')) return true ;else return false"><i class="fa fa-trash-o"></i> Delete </a>
                                    </td>                                    
                                    <td  style="width:10px;">
                                            <a class="btn btn-info btn-xs" href="Modifier-fonction-<?php echo $obj->id_f;?>"><i class="fa fa-pencil"></i> Edit </a>
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
        