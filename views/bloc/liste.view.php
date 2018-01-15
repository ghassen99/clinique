
        <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                        <form method="post" action="index.php?controller=bloc&action=ajout1">
                            <h1>
                                Liste des Départements 
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
                                        <button type="button"> 
                                            <a  href="index.php?controller=bloc&action=delete&id_bloc=<?php echo $obj->id_bloc;?>"onclick="if(confirm('Etes vous sure de supprimer?')) return true ;else return false"><i style="font-size:24px;color:red" class="fa">&#xf1f8;</i></a>
                                        </button>
                                    </td>
                                    <td  style="width:10px;">
                                        <button type="button"> 
                                            <a  href="index.php?controller=bloc&action=edit1&id_bloc=<?php echo $obj->id_bloc;?>"><i class="fa fa-pencil-square-o" style="font-size:24px;color:blue"></i></a>
                                        </button> 
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
        