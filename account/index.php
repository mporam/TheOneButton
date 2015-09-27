<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/includes/db.php');

require_once($_SERVER['DOCUMENT_ROOT'] . '/includes/template/header.php');

session_start();

$sql = "SELECT * FROM requests WHERE user = " . $_SESSION['id'] . " ORDER BY datetime DESC LIMIT 6;";
$query = $db->prepare($sql);
$query->execute();
$requests = $query->fetchAll(PDO::FETCH_ASSOC);
?>

    <div class="container">
        <!-- Example row of columns -->
        <div class="row">
            <div class="col-md-12">
                <h1>Account</h1>
                <p>Welcome to your account page. To request support from your support team please click below:</p>

                <?php if (!empty($_GET['request']) && $_GET['request'] === 'success') { ?>
                    <div class="alert alert-success" role="alert">Your request was sent successfully!</div>
                <?php } ?>

                <?php if (!empty($_GET['request']) && $_GET['request'] === 'error') { ?>
                    <div class="alert alert-danger" role="alert"><strong>Oops!</strong> Something went wrong with your request, please try again.</div>
                <?php } ?>
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


        <?php if (!empty($requests)) { ?>
        <div class="row">
            <h2>Recent Requests</h2>
            <?php foreach($requests as $request) { ?>
                <div class="col-md-4">
                    <h3><?php echo $request['datetime']; ?></h3>
                    <p><?php echo $request['details']; ?></p>
                </div>
            <?php } ?>
        </div>

    <?php } ?>

<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/includes/template/footer.php'); ?>