<?php

	$totaladmin = getTotalAdmins();
	?>
	<div class="container">
    
    <hr>
    <div class="row">
        <div class="panel panel-success  filterable">
            <div class="panel-heading">
                <h2 class="panel-title">LandLease User Maintenance</h2>
                <div class="pull-right">
                    <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Filter</button>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr class="filters">
                        <th><input type="text" class="form-control" placeholder="User Id" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Username" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Email" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Edit" disabled></th>
                    </tr>
                </thead>
                <tbody>
             
<?php
	while($row = mysql_fetch_array($totaladmin)){
		$x = $row['user_id'];
		echo "<form method='POST' action='edit_user.php?id=$x'>";
		echo "<tr>
				<td>". $row['user_id'] ."</td>
				<td>". $row['username']."</td>
				<td>". $row['user_email'] ."</td>
				<td><button  class='btn btn-xs btn-primary' value='$x'>Edit</button></td>
			</tr> </form>";
	}
?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
    $('.filterable .btn-filter').click(function(){
        var $panel = $(this).parents('.filterable'),
        $filters = $panel.find('.filters input'),
        $tbody = $panel.find('.table tbody');
        if ($filters.prop('disabled') == true) {
            $filters.prop('disabled', false);
            $filters.first().focus();
        } else {
            $filters.val('').prop('disabled', true);
            $tbody.find('.no-result').remove();
            $tbody.find('tr').show();
        }
    });

    $('.filterable .filters input').keyup(function(e){
        /* Ignore tab key */
        var code = e.keyCode || e.which;
        if (code == '9') return;
        /* Useful DOM data and selectors */
        var $input = $(this),
        inputContent = $input.val().toLowerCase(),
        $panel = $input.parents('.filterable'),
        column = $panel.find('.filters th').index($input.parents('th')),
        $table = $panel.find('.table'),
        $rows = $table.find('tbody tr');
        /* Dirtiest filter function ever ;) */
        var $filteredRows = $rows.filter(function(){
            var value = $(this).find('td').eq(column).text().toLowerCase();
            return value.indexOf(inputContent) === -1;
        });
        /* Clean previous no-result if exist */
        $table.find('tbody .no-result').remove();
        /* Show all rows, hide filtered ones (never do that outside of a demo ! xD) */
        $rows.show();
        $filteredRows.hide();
        /* Prepend no-result row if all rows are filtered */
        if ($filteredRows.length === $rows.length) {
            $table.find('tbody').prepend($('<tr class="no-result text-center"><td colspan="'+ $table.find('.filters th').length +'">No result found</td></tr>'));
        }
    });
});
</script>