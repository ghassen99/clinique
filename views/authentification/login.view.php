<div class="page-title">
    <span style="text-align:center;"><h1>Authentification</h1></span><br>
</div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">

        <div class="x_content">

        <form  method="post" action="login.php?controllers=login&action=login" class="form-horizontal form-label-left" novalidate >
            
                <!-- Login -->
                <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                    Login <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="login" class="form-control col-md-7 col-xs-12" data-validate-length-range="30" name="login" placeholder="Login" required="required" type="text">
                    </div>
                </div>
            
                <!-- password -->
                <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                    password <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="pass" type="password" class="form-control" data-validate-length-range="30" name="pass" placeholder="password" required="required">
                    </div>
                </div>
            
                <div class="ln_solid"></div>
                <div class="form-group">
                <div style="text-align:right;" class="col-md-6 col-md-offset-3">
                    <button id="send" type="submit" class="btn btn-success">Submit</button>
                    <button type="reset" class="btn btn-primary">Cancel</button>
                </div>
                </div>
        </form>
        </div>
    </div>
    </div>
</div>
