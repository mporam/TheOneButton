<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/includes/db.php');

require_once($_SERVER['DOCUMENT_ROOT'] . '/includes/template/header.php');
?>

    <div class="container">
        <!-- Example row of columns -->
        <div class="row">
            <div class="col-md-12">
                <p>Welcome to your account page. To request support from your support team please click below:</p>
                <p>
                <button type="button" class="btn btn-primary btn-lg" data-toggle="collapse"
                        data-target="#requestDetails" aria-expanded="false">
                    Request Support
                </button>
                </p>

                <div class="collapse" id="requestDetails">
                    <div class="well">
                        <form action="supportRequest.php" method="post">
                            <div class="form-group">
                                <label>Request details*:</label>
                                <textarea required class="form-control" name="requestDetails" placeholder="Please provide as much information as possible about your problem."></textarea>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Send Request</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/includes/template/footer.php'); ?>