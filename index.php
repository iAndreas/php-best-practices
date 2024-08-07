<?php require_once __DIR__ . '/header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bug Report</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="Resources/css/styles.css">
</head>
<body>
<div class="container">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-6">
                    <h2>Manage <b>Bug Reports</b></h2>
                </div>
                <div class="col-sm-6">
                    <a href="#addBugReportModal" class="btn btn-outline-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add Report</span></a>
                </div>
            </div>
        </div>
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th style="width: 120px;">Report Type</th>
                <th>Email</th>
                <th style="width: 420px;">Message</th>
                <th>Link</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php if(isset($bugReports)): ?>
            <?php /** @var \App\Entity\BugReport $report */ ?>
                <?php foreach($bugReports as $report): ?>
                    <tr>
                        <td><?php echo $report->getReportType(); ?></td>
                        <td><?php echo $report->getEmail(); ?></td>
                        <td><?php echo $report->getMessage(); ?></td>
                        <td><?php echo $report->getLink(); ?></td>
                        <td>
                            <a href="#updateReport-<?php echo $report->getId(); ?>" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                            <a href="#deleteReport-<?php echo $report->getId(); ?>" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>

                            <!-- Edit Modal HTML -->
                            <div id="updateReport-<?php echo $report->getId(); ?>" class="modal fade">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form method="post">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Edit Report</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Report Type</label>
                                                    <select name="reportType" class="form-control" required>
                                                        <option value="<?php echo $report->getReportType(); ?>"><?php echo $report->getReportType(); ?></option>
                                                        <option value="video player">video player</option>
                                                        <option value="audio">Audio</option>
                                                        <option value="others">others</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="email" name="email" class="form-control" value="<?php echo $report->getEmail(); ?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Message</label>
                                                    <textarea class="form-control" name="message" required><?php echo $report->getMessage(); ?></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>Link</label>
                                                    <input type="url" class="form-control" name="link" value="<?php echo $report->getLink(); ?>" required>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="hidden" name="reportId" value="<?php echo $report->getId(); ?>">
                                                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                                <input type="submit" class="btn btn-info" name="update" value="Update">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Delete Modal HTML -->
                            <div id="deleteReport-<?php echo $report->getId(); ?>" class="modal fade">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form method="post">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Delete Report</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure you want to delete these Records?</p>
                                                <p class="text-warning"><small>This action cannot be undone.</small></p>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="hidden" name="reportId" value="<?php echo $report->getId(); ?>">
                                                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                                <input type="submit" class="btn btn-danger" name="delete" value="Delete">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>

            </tbody>
        </table>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="Resources/js/scripts.js"></script>
<?php include_once "addModal.php" ?>
</body>
</html>