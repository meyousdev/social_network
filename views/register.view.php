<?php include("partials/_header.php") ?>
    <div class="container">
        <h1 class="lead">Inscription</h1>

        <form action="" method="post" autocomplete="off" class="col-md-6 well">
            
            <div class="form-group">
                <label for="name" class="control-label">Nom complet</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>

            <div class="form-group">
                <label for="pseudo" class="control-label">Pseudo</label>
                <input type="text" name="pseudo" id="pseudo" class="form-control">
            </div>

            <div class="form-group">
                <label for="email" class="control-label">Email</label>
                <input type="text" name="email" id="email" class="form-control">
            </div>

            <div class="form-group">
                <label for="password" id="password" class="control-label">Mot de passe</label>
                <input type="password" name="password" class="form-control">
            </div>

            <div class="form-group">
                <label for="password_confirm" class="control-label">Confirmer votre mot de passe</label>
                <input type="password" name="password_confirm" id="password_confirm" class="form-control">
            </div>

            <input type="submit" name="register" value="Inscription" class="btn btn-primary">

        </form>
 
    </div><!-- /.container -->
<?php include("partials/_footer.php") ?>