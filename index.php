<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/includes/db.php');

require_once($_SERVER['DOCUMENT_ROOT'] . '/includes/template/header.php');
?>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
        <div class="container">
            <h1>Support.me</h1>
            <p>A super simple It support request app, for quickly connecting your support team with your users. Easy set-up and easy to use!</p>
        </div>
    </div>

    <div class="container">
        <!-- Example row of columns -->
        <div class="row">
            <div class="col-md-4">
                <h2>User Sign in</h2>
                <form action="signin/" method="post">
                    <div class="form-group">
                        <input type="text" placeholder="Email" name="useremail" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-success">Sign in</button>
                </form>
            </div>
            <div class="col-md-8">
                <h2>Company Sign in</h2>
                <form>
                    <div class="form-group">
                        <input type="text" placeholder="Email" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="password" placeholder="Password" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-success">Sign in</button>
                </form>
            </div>
        </div>

<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/includes/template/footer.php'); ?>