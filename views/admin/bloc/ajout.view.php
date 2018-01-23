
        <?php
        if (!isset($_SESSION))
            session_start();
        ?>

        <div class="">
        <div class="page-title">
            <div class="title_left">

            </div>

            <div class="title_right">

            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">

                <div class="x_content">

                <form  method="post" action="index.php?controller=bloc&action=ajout" class="form-horizontal form-label-left" novalidate enctype="multipart/form-data">
                    
                    <!-- lib_bloc -->
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                        Libellé <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="lib_bloc" onkeypress='return event.charCode >= 65 && event.charCode <= 90 || event.charCode >= 97 && event.charCode <= 122 || event.charCode == 32' class="form-control col-md-7 col-xs-12" data-validate-length-range="30" name="lib_bloc" placeholder="Libellé" required="required" type="text">
                        </div>
                    </div>

                                    
                    <!-- photo_emp -->
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                        Photo <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">

                        <div class="input-group input-file" name="photo">
                            <span class="input-group-btn">
                                <button class="btn btn-default btn-choose" name="photo" type="button">Choose</button>
                            </span>
                            <input type="text" name="photo" class="form-control" placeholder='Choose a file...' />
                            <span class="input-group-btn">
                                <button class="btn btn-warning btn-reset" type="button">Reset</button>
                            </span>
                        </div>

                        </div>
                    </div>  
                                
                    <div class="ln_solid"></div>
                    <div class="form-group">
                    <div class="col-md-6 col-md-offset-3">
                        <button id="send" type="submit" class="btn btn-success">Submit</button>
                        <button type="reset" class="btn btn-primary">Cancel</button>
                    </div>
                    </div>
                </form>
                </div>
            </div>
            </div>
        </div>
        </div>
      
        