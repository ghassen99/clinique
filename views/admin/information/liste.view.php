
        <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                        <form method="post" action="nouvelle_information">
                            <h1>
                                Liste des informations 
                                <i style="font-size:24px;color:green" class="fa"><button type="submit">&#xf067;</button></i>
                            </h1>
                        </form>
                    </p>
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Adresse</th>
                                    <th>e-mail</th>
                                    <th>Numéro de téléphone</th>
                                    <th>Fax</th>
                                    <th></th>
                                    <th></th>                              
                                </tr>
                        </thead>
                        
                        <tbody>

                                <tr>
                                    <td><?php echo $res[0]->id ?></td>
                                    <td><?php echo $res[0]->adresse ?></td>
                                    <td><?php echo $res[0]->mail ?></td>
                                    <td><?php echo $res[0]->tel ?></td>
                                    <td><?php echo $res[0]->fax ?></td>
                                    <td style="width:10px;">
                                            <a class="btn btn-danger btn-xs" href="index.php?controller=information&action=delete&id=<?php echo $res[0]->id;?>"onclick="if(confirm('Etes vous sure de supprimer?')) return true ;else return false"><i class="fa fa-trash-o"></i> Delete </a>
                                    </td>
                                    <td  style="width:10px;">
                                            <a class="btn btn-info btn-xs" href="Modifier-information-<?php echo $res[0]->id;?>"><i class="fa fa-pencil"></i> Edit </a>
                                    </td>                              
                                </tr>
                            
                        </tbody>
                        

                        
                    </table>
                </div>
            </div>
        </div>
        </div>
        