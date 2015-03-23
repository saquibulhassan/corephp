<div class="dataTables_wrapper form-inline no-footer">
	<div class="row">
		<div class="col-xs-3">
			<div class="dataTables_length">
				<label>Display
					<select class="form-control input-sm display-per-page">
						<option value="1" <?php if($perPage == 1) echo 'selected="selected"'; ?>>10</option>
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
						<option value="pn" <?php if($filter == 'pn') echo 'selected="selected"'; ?>>Purchase No</option>
						<option value="pd" <?php if($filter == 'pd') echo 'selected="selected"'; ?>>Purchase Date</option>
						<option value="sbn" <?php if($filter == 'sbn') echo 'selected="selected"'; ?>>Supplier Bill No</option>						
					</select>
					<input class="form-control input-sm filter-value" type="search" placeholder="" value="<?php echo ($filter == 'pd') ? getDMY($filterValue) : $filterValue ?>">
					<button class="btn btn-xs btn-purple filter">
						<i class="ace-icon glyphicon glyphicon-search"></i>
					</button>
					&nbsp;&nbsp;
					<div class="btn-group">
						<a class="btn btn-sm btn-danger ajax-load" href="<?php echo site_url('app#purchase/new_'); ?>">
							<i class="ace-icon glyphicon glyphicon-plus bigger-110"></i> New Purchase
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
				<th data-sorting="pd" class="sorting <?php if($sorting == 'pd')  echo $sortingClass;  ?>">Purchase Date</th>
				<th data-sorting="pn" class="sorting <?php if($sorting == 'pn')  echo $sortingClass;  ?>">Purchase No</th>				
				<th data-sorting="s" class="sorting <?php if($sorting == 's')  echo $sortingClass;  ?>">Supplier Name</th>
				<th data-sorting="sbn" class="sorting <?php if($sorting == 'sbn')  echo $sortingClass;  ?>">Supplier Bill No</th>
				<th data-sorting="pa" class="sorting <?php if($sorting == 'pa')  echo $sortingClass;  ?>">Purchase Amount</th>
				<th style="width:100px"></th>
			</tr>
		</thead>

		<tbody>
			<?php foreach ($purchaseList as $key => $v): ?>				
			<tr>
				<td class="center">
					<label class="pos-rel">
						<input type="checkbox" class="ace" />
						<span class="lbl"></span>
					</label>
				</td>

				<td><?php echo getDMY($v->PurDate) ?></td>
				<td><a class="ajax-popup-load hand" data-href="<?php echo site_url('purchase/details/'.$v->PurID); ?>" data-title="Purchase Information <?php echo $v->PurNo ?>" data-html="content" data-selector="purchaseInfo" data-class="modal-diaglog-800"><?php echo $v->PurNo ?></td>				
				<td><?php echo $v->SupName ?></td>
				<td><?php echo $v->SupBillNo ?></td>
				<td class="text-right"><?php echo getNumber($v->TotPurAmt) ?></td>
				<td class="text-center">					
					<a class="btn btn-xs btn-info ajax-load" href="<?php echo site_url('app#purchase/edit/'.$v->PurID); ?>">
						<i class="ace-icon fa fa-pencil bigger-120"></i>
					</a>
					&nbsp;
					<a class="btn btn-xs btn-danger bootbox-confirm" data-href="<?php echo site_url('purchase/delete') ?>" data-id="<?php echo $v->PurID ?>">
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