<?php
include_once 'config/Database.php';
include_once 'class/User.php';
include_once 'class/Expense.php';

$database = new Database();
$db = $database->getConnection();
$user = new User($db);
$expense = new Expense($db);

if (!$user->loggedIn()) {
	header("Location: index.php");
}
include('inc/header.php');
?>
<title>Expense Management System</title>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>
<link rel="stylesheet" href="css/dataTables.bootstrap.min.css" />
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="js/general.js"></script>
<script src="js/report.js"></script>
<?php include('inc/container.php'); ?>
<div class="container">
	<h2>Expense Management System</h2>
	<br>
	<?php include('top_menus.php'); ?>
	<div>
		<div class="panel-heading">
			<div class="row">
				<div class="col-md-8">
					<div>
						<h4>View Income and Expense Reports</h4>
					</div>
					<div class="col-md-2" style="padding-left:0px;">
						<input type="date" class="form-control" id="from_date" name="from_date" placeholder="From date">
					</div>
					<div class="col-md-2" style="padding-left:0px;">
						<input type="date" class="form-control" id="to_date" name="to_date" placeholder="To date">
					</div>
					<div class="col-md-2" style="padding-left:0px;">
						<button type="submit" id="viewReport" class="btn btn-info" title="View Report"><span class="glyphicon glyphicon-search"></span></button>
					</div>
					
					<button id="printTable" class="btn btn-outline-secondary" style="margin-bottom: 10px;">Print</button>
				</div>
				
			</div>
		</div>
		<table class="table table-bordered table-striped" id="reportTable" style="display:none;">
			<thead>
				<tr>
					<th>Expense</th>
					<th>Date</th>
					<th>Category</th>
				</tr>
			</thead>
			<tbody id="listReports">

			</tbody>
		</table>
		<div class="panel-heading" id="detailSection" style="display:none;">
			<div class="row">
				<div style="padding-bottom:5px;color:green"><strong>Total Income : </strong><span id="totalIncome"></span></div>
				<div style="padding-bottom:5px;color:red"><strong>Total Expense : </strong><span id="totalExpense"></span></div>
				<div style="padding-bottom:5px;color:blue"><strong>Total Saving : </strong><span id="totalSaving"></span></div>
			</div>
		</div>
		<div class="panel-heading" id="noRecords" style="display:none;">
		</div>
	</div>

</div>
<script>
    $(document).ready(function () {
        // Show the table initially if needed
        // $('#reportTable').show();

        // Print the table when the button is clicked
        $('#printTable').click(function () {
            window.print();
        });
    });
</script>
<style>
        /* Hide everything except the table during printing */
        @media print {
            body * {
                visibility: hidden; /* Hide everything */
            }
            #reportTable, #reportTable * {
                visibility: visible; /* Make the table visible */
            }
            #detailSection, #detailSection * {
                visibility: visible; /* Make the table visible */
            }
            #reportTable {
                position: absolute;
                top: 0;
                left: 0;
            }
        }
    </style>
<?php include('inc/footer.php'); ?>
