<?php include("partials/_header.php") ?>
    <div class="container">
        <h1 class="lead">Inscription</h1>
        <?php include('partials/_errors.php'); ?>
       
        <form data-parsley-validate method="post" class="well col-md-6 " autocomplete="off">
                <!--Name field-->
                <div class="form-group">
                    <label class="control-label" for="name">Nom complet :</label>
                    <input class="form-control" type="text" name="name" id="name" required="required"  value="<?= get_input('name');?>"
                           data-parsley-minlength="3" data-parsley-trigger="keypress"/>
                </div>

                <!--Pseudo field-->
                <div class="form-group">
                    <label class="control-label" for="pseudo">Pseudo :</label>
                    <input class="form-control" type="text" name="pseudo" id="pseudo" required="required" value="<?= get_input('pseudo');?>"
                           data-parsley-minlength="3" data-parsley-trigger="keypress"/>
                </div>

                <!--Email field-->
                <div class="form-group">
                    <label class="control-label" for="email">Adresse Email :</label>
                    <input class="form-control" type="email" name="email" id="email" required="required" value="<?= get_input('email');?>" data-parsley-trigger="keypress"/>
                </div>

                <!--Password field-->
                <div class="form-group">
                    <label class="control-label" for="password">Mot de passe :</label>
                    <input class="form-control" type="password" name="password" id="password" required="required"
                           data-parsley-minlength="6" data-parsley-trigger="keypress"/>
                </div>

                <!--Password Confirmation field-->
                <div class="form-group">
                    <label class="control-label" for="password_confirm">Confirmer votre mot de passe :</label>
                    <input class="form-control" type="password" name="password_confirm" id="password_confirm" required="required"
                           data-parsley-equalto = "#password" data-parsley-minlength="6" data-parsley-trigger="keypress"/>
                </div>

                <input type="submit" class="btn btn-primary" name="register" value="Inscription" />
            </form>
 
    </div><!-- /.container -->
<?php include("partials/_footer.php") ?>