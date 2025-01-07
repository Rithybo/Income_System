<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">


<div class="top-panel">
    <div class="btn-group pull-right">
        <button type="button" class="btn btn-primary btn-lg dropdown-toggle" data-toggle="dropdown">Export <span class="caret"></span></button>
        <ul class="dropdown-menu" role="menu">
            <li><a class="dataExport" data-type="csv">CSV</a></li>
            <li><a class="dataExport" data-type="excel">XLS</a></li>
            <li><a class="dataExport" data-type="txt">TXT</a></li>
        </ul>
    </div>
</div>
<table id="dataTable" class="table table-striped" style="width: 50%; margin: auto; margin-top: 20%; ">
    <thead>
        <tr>
            <th>Name</th>
            <th>Skill</th>
            <th>Age</th>
        </tr>
    </thead>
    <tbody>
    <tbody>
        <?php
        include_once("inc/deb_connect.php");
        $Query = "SELECT name,skills,age FROM exportuser";
        $result = mysqli_query($conn, $Query) or die("database error:" . mysqli_error($conn));
        while ($employee = mysqli_fetch_assoc($result)) {
        ?>
            <tr>
                <td><?php echo $employee['name']; ?></td>
                <td><?php echo $employee['age']; ?></td>
                <td><?php echo $employee['skills']; ?></td>

            </tr>
        <?php } ?>
    </tbody>

    </tbody>
</table>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="tableExport/tableExport.js"></script>
<script src="export.js"></script>
<script type="text/javascript" src="tableExport/jquery.base64.js"></script>
