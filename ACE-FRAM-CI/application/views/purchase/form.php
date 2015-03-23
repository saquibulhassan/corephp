<div class="row">
	<div class="col-sm-12">

		<div id="setFormMessage"></div>

		<form id="purchase-form" class="form-horizontal" action="<?php echo site_url('purchase/save') ?>" method="post">
			<input type='hidden' name='PurID' value='<?php echo $purchaseInfo->PurID ?>' />
			<div class="row">
				<div class="col-sm-4">					
					<div class="form-group">
						<label class="col-sm-4 control-label no-padding-right" for="LocID"> Location </label>
						<div class="col-sm-8">
							<select class="select2" style="width:100%" id="LocID" name="LocID">
								<?php foreach ($locationList as $k => $v): ?>
									<option value="<?php echo $v->LocID; ?>" <?php if($purchaseInfo->LocID == $v->LocID ) echo 'selected="selected"'; ?>><?php echo $v->LocName; ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label no-padding-right" for="PurDate"> Purchase Date </label>
						<div class="col-sm-8">
							<div class="input-group">
								<input type="text" data-date-format="dd/mm/yyyy" id="PurDate" name="PurDate" placeholder="DD/MM/YYYY" value='<?php echo getDMY($purchaseInfo->PurDate); ?>' class="form-control date-picker">
								<span class="input-group-addon">
									<i class="fa fa-calendar bigger-110"></i>
								</span>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label no-padding-right" for="SupID"> Supplier </label>
						<div class="col-sm-8">
							<select class="select2" style="width:100%" id="SupID" name="SupID">
								<option value="">Select Supplier</option>
								<?php foreach ($supplierList as $k => $v): ?>
									<option value="<?php echo $v->SupID; ?>" <?php if($purchaseInfo->SupID == $v->SupID ) echo 'selected="selected"'; ?>><?php echo $v->SupName; ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					
						<label class="col-sm-4 col-sm-offset-4 control-label no-padding-right"> &nbsp; <span id="CurrentBalance"></span> </label>
						<div class="col-sm-4">
							<input type="hidden" name="PrevBal" id="PrevBal" value="0" />
						</div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="form-group">
						<label class="col-sm-4 control-label no-padding-right" for="SupBillNo"> Supplier Bill No </label>
						<div class="col-sm-8">
							<input type="text" id="SupBillNo" name="SupBillNo" placeholder="Supplier Bill No" value='<?php echo $purchaseInfo->SupBillNo ?>' class="form-control" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label no-padding-right" for="SupBillDate"> Supplier Bill Date </label>
						<div class="col-sm-8">
							<div class="input-group">
								<input type="text" data-date-format="dd/mm/yyyy" id="SupBillDate" name="SupBillDate" placeholder="DD/MM/YYYY" value='<?php echo getDMY($purchaseInfo->SupBillDate); ?>' class="form-control date-picker">
								<span class="input-group-addon">
									<i class="fa fa-calendar bigger-110"></i>
								</span>
							</div>
						</div>
					</div>								
					<div class="form-group">
						<label class="col-sm-4 control-label no-padding-right" for="RefNo"> Ref No </label>
						<div class="col-sm-8">
							<input type="text" id="RefNo" name="RefNo" placeholder="Ref No " value='<?php echo $purchaseInfo->RefNo ?>' class="form-control" />
						</div>
					</div>
				</div>
				<div class="col-sm-4">					
					<div class="form-group">
						<label class="col-sm-4 control-label no-padding-right" for="RefDate"> Ref Date </label>
						<div class="col-sm-8">
							<div class="input-group">
								<input type="text" data-date-format="dd/mm/yyyy" id="RefDate" name="RefDate" placeholder="DD/MM/YYYY" value='<?php echo getDMY($purchaseInfo->RefDate); ?>' class="form-control date-picker">
								<span class="input-group-addon">
									<i class="fa fa-calendar bigger-110"></i>
								</span>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label no-padding-right" for="Remarks"> Remarks </label>
						<div class="col-sm-8">						
							<textarea id="Remarks" name="Remarks" placeholder="Remarks" class="form-control"><?php echo $purchaseInfo->Remarks; ?></textarea>
						</div>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-sm-12 center">
					<div class="form-group">						
						<button type="submit" class="btn btn-info btn-sm">Save</button>
						<button type="button" class="btn btn-danger btn-sm reload-form">Reset</button>
					</div>
				</div>
			</div>

		</form>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$(".select2").css('width','100%').select2({allowClear:true})
		.on('change', function(){
			$(this).closest('form').validate().element($(this));
			$("#UPrice").val($('option:selected',this).attr("data-trade-price"));
		});

		var validationRules = {
			LocID 	: { required: true },
			PurDate : { required: true },
			SupID	: { required: true }
		};

		var validationMessage = {
			SupID	: "* required"

		};

		<?php if(!empty($purchaseInfo->PurID)) { ?>
			var formType 	= 'edit';
			var gotoUrl		= 'purchase';
		<?php } else { ?>
			var formType 	= 'new';
			var gotoUrl		= '';
		<?php } ?>
		
		loadFormValidation("#purchase-form", validationRules, validationMessage, formType, gotoUrl);
	});
	

	$('.date-picker').datepicker({
		autoclose: true,
		todayHighlight: true
	});
</script>