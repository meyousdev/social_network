
    <?php include("partials/_header.php") ?>
    <div class="container">
        <h1 class="lead">Connexion</h1>
        <?php include('partials/_errors.php'); ?>
        <form data-parsley-validate method="post" class="well col-md-6 " autocomplete="off">
                <!--Identifiant field-->
                <div class="form-group">
                    <label class="control-label" for="identifiant">Pseudo ou Adresse électronique :</label>
                    <input class="form-control" type="text" name="identifiant" id="identifiant" required="required" value="<?= get_input('identifiant');?>"
                           data-parsley-minlength="3" data-parsley-trigger="keypress" >
                </div>

                <!--Password field-->
                <div class="form-group">
                    <label class="control-label" for="password">Mot de passe :</label>
                    <input class="form-control" type="password" name="password" id="password" required="required"
                           data-parsley-minlength="6" data-parsley-trigger="keypress"/>
                </div>
                
                <!-- Remember me field -->
                <div class="form-group">
                    <label class="control-label" for="remember_me">
                        <input type="checkbox" name="remember_me" id="remember_me" />
                        Garder ma session active
                    </label>
                    
                </div>


                <input type="submit" class="btn btn-primary" name="login" value="Connexion" />
            </form>
            
    </div><!-- /.container -->
    <?php include("partials/_footer.php") ?>
