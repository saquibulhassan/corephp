<div class="dataTables_wrapper form-inline no-footer">
	<div class="row">
		<div class="col-xs-3">
			<div class="dataTables_length">
				<label>Display
					<select class="form-control input-sm display-per-page">
						<option value="10" <?php if($perPage == 10) echo 'selected="selected"'; ?>>10</option>
						<option value="25" <?php if($perPage == 25) echo 'selected="selected"'; ?>>25</option>
						<option value="50" <?php if($perPage == 50) echo 'selected="selected"'; ?>>50</option>
						<option value="100" <?php if($perPage == 100) echo 'selected="selected"'; ?>>100</option>
					</select>
					records
				</label>
			</div>
		</div>
		<div class="col-xs-9">
			<div class="dataTables_filter">
				Search:
					<select class="form-control input-sm filter-key">
						<option value="s" <?php if($filter == 's') echo 'selected="selected"'; ?>>Supplier Name</option>
						<option value="e" <?php if($filter == 'e') echo 'selected="selected"'; ?>>Email</option>
						<option value="m" <?php if($filter == 'm') echo 'selected="selected"'; ?>>Mobile</option>
						<option value="c" <?php if($filter == 'c') echo 'selected="selected"'; ?>>Contact Person</option>
					</select>
					<input class="form-control input-sm filter-value" type="search" placeholder="" value="<?php echo $filterValue ?>">
					<button class="btn btn-xs btn-purple filter">
						<i class="ace-icon glyphicon glyphicon-search"></i>
					</button>
					&nbsp;&nbsp;
					<div class="btn-group">
						<a class="btn btn-sm btn-danger ajax-popup-load" data-href="<?php echo site_url('supplier/new_'); ?>" data-title="Supplier Information" data-html="form" data-class="modal-diaglog-800" data-selector="supplier">
							<i class="ace-icon glyphicon glyphicon-plus bigger-110"></i> New Supplier
						</a>
					</div>
			</div>
		</div>
	</div>
	<table id="simple-table" class="table table-striped table-bordered table-hover dataTable">
		<thead>
			<tr>
				<th class="center">
					<label class="pos-rel">
						<input type="checkbox" class="ace" />
						<span class="lbl"></span>
					</label>
				</th>
				<th data-sorting="s" class="sorting <?php if($sorting == 's')  echo $sortingClass;  ?>">Supplier Name</th>
				<th data-sorting="e" class="sorting <?php if($sorting == 'e')  echo $sortingClass;  ?>">Email</th>
				<th>Mobile</th>
				<th data-sorting="c" class="sorting <?php if($sorting == 'c')  echo $sortingClass;  ?>">Contact Person</th>
				<th>Supplier Type</th>
				<th data-sorting="b" class="sorting <?php if($sorting == 'b')  echo $sortingClass;  ?>">Current Balance</th>
				<th style="width:100px"></th>
			</tr>
		</thead>

		<tbody>
			<?php foreach ($supplierList as $key => $v): ?>				
			<tr>
				<td class="center">
					<label class="pos-rel">
						<input type="checkbox" class="ace" />
						<span class="lbl"></span>
					</label>
				</td>

				<td><?php echo $v->SupName ?></td>
				<td><?php echo $v->Email ?></td>
				<td><?php echo $v->Mobile ?></td>
				<td><?php echo $v->ContPerson ?></td>
				<td><?php echo ($v->SupType == 'L') ? 'Local' : 'Foreign' ?></td>
				<td><?php echo $v->CurBalance ?></td>
				<td class="text-center">					
					<a class="btn btn-xs btn-info ajax-popup-load" data-href="<?php echo site_url('supplier/edit/'.$v->SupID); ?>" data-title="Edit supplier Information" data-html="form" data-class="modal-diaglog-800" data-selector="supplierEdit">
						<i class="ace-icon fa fa-pencil bigger-120"></i>
					</a>
					&nbsp;
					<a class="btn btn-xs btn-danger bootbox-confirm" data-href="<?php echo site_url('supplier/delete') ?>" data-id="<?php echo $v->SupID ?>">
						<i class="ace-icon fa fa-trash-o bigger-120"></i>
					</a>
				</td>
			</tr>
			<?php endforeach; ?>			
		</tbody>
	</table>

	<div class="row">
		<div class="col-xs-6">
			<div id="dynamic-table_info" class="dataTables_info" role="status" aria-live="polite"><?php echo $this->pagination->create_info(); ?></div>
		</div>
		<div class="col-xs-6">
			<div class="dataTables_paginate">
				<?php echo $this->pagination->create_links(); ?>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	var $table = $('#simple-table');
	$table.floatThead({
	    scrollContainer: function($table){
	        return $table.closest('.row');
	    },
	    scrollingTop: 85
	});
</script>