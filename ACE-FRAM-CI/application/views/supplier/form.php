<div class="row">
	<div class="col-sm-12">

		<div id="setFormMessage"></div>

		<form id="supplier-form" class="form-horizontal" action="<?php echo site_url('supplier/save') ?>" method="post">
			<input type='hidden' name='SupID' value='<?php echo $supplierInfo->SupID ?>' />

			<div class="col-sm-6">
				<div class="form-group">
					<label class="col-sm-4 control-label no-padding-right"> Supplier Type </label>
					<div class="radio col-sm-8">
						<label>
							<input type="radio" class="ace" name="SupType" value="L" <?php if($supplierInfo->SupType == 'L') echo 'checked="checked"'; ?>>
							<span class="lbl"> Local</span>
						</label>
						<label>
							<input type="radio" class="ace" name="SupType" value="F" <?php if($supplierInfo->SupType == 'F') echo 'checked="checked"'; ?>>
							<span class="lbl"> Foreign</span>
						</label>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label no-padding-right" for="LocID"> Location </label>
					<div class="col-sm-8">
						<select class="select2" style="width:100%" id="LocID" name="LocID">
							<?php foreach ($locationList as $k => $v): ?>
								<option value="<?php echo $v->LocID; ?>" <?php if($supplierInfo->LocID == $v->LocID ) echo 'selected="selected"'; ?>><?php echo $v->LocName; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label no-padding-right" for="SupName"> Name </label>
					<div class="col-sm-8">
						<input type="text" id="SupName" name="SupName" placeholder="Supplier Name" value='<?php echo $supplierInfo->SupName ?>' class="form-control" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label no-padding-right" for="Address"> Address </label>
					<div class="col-sm-8">
						<input type="text" id="Address" name="Address" placeholder="Address" value='<?php echo $supplierInfo->Address ?>' class="form-control" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label no-padding-right" for="Tel"> Telephone </label>
					<div class="col-sm-8">
						<input type="text" id="Tel" name="Tel" placeholder="Telephone" value='<?php echo $supplierInfo->Tel ?>' class="form-control" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label no-padding-right" for="Fax"> Fax </label>
					<div class="col-sm-8">
						<input type="text" id="Fax" name="Fax" placeholder="Fax" value='<?php echo $supplierInfo->Fax ?>' class="form-control" />
					</div>
				</div>				
			</div>
			<div class="col-sm-6">
				<div class="form-group">
					<label class="col-sm-4 control-label no-padding-right" for="Email"> Email </label>
					<div class="col-sm-8">
						<input type="text" id="Email" name="Email" placeholder="Email" value='<?php echo $supplierInfo->Email ?>' class="form-control" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label no-padding-right" for="Mobile"> Mobile </label>
					<div class="col-sm-8">
						<input type="text" id="Mobile" name="Mobile" placeholder="Mobile" value='<?php echo $supplierInfo->Mobile ?>' class="form-control" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label no-padding-right" for="ContPerson"> Contact Person </label>
					<div class="col-sm-8">
						<input type="text" id="ContPerson" name="ContPerson" placeholder="Contact Person" value='<?php echo $supplierInfo->ContPerson ?>' class="form-control" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label no-padding-right" for="Remarks"> Remarks </label>
					<div class="col-sm-8">
						<input type="text" id="Remarks" name="Remarks" placeholder="Remarks" value='<?php echo $supplierInfo->Remarks ?>' class="form-control" />
					</div>
				</div>				
				<div class="form-group">
					<label class="col-sm-4 control-label no-padding-right" for="OpenDate"> Opening Date </label>
					<div class="col-sm-8">
						<div class="input-group">
							<input type="text" data-date-format="dd/mm/yyyy" id="OpenDate" name="OpenDate" placeholder="DD/MM/YYYY" value='<?php echo getDMY($supplierInfo->OpenDate); ?>' class="form-control date-picker">
							<span class="input-group-addon">
								<i class="fa fa-calendar bigger-110"></i>
							</span>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label no-padding-right" for="OpenBal"> Opening Balance </label>
					<div class="col-sm-8">
						<input type="text" id="OpenBal" name="OpenBal" placeholder="Opening Balance" value='<?php echo $supplierInfo->OpenBal ?>' class="form-control" />
					</div>
				</div>
			</div>

			<div class="space-4"></div>
		</form>
	</div>
</div>

<script type="text/javascript">
	$('.date-picker').datepicker({
		autoclose: true,
		todayHighlight: true
	});

	$(document).ready(function(){
		$(".select2").css('width','100%').select2({allowClear:true})
		.on('change', function(){
			$(this).closest('form').validate().element($(this));
		});

		var validationRules = {
								SupType 	: { required: true },
								SupName 	: { required: true },
								LocID		: { required: true }
							};

		var validationMessage = {};

		<?php if(!empty($supplierInfo->SupID)) { ?>
			var formType 	= 'edit';
		<?php } else { ?>
			var formType 	= 'new';
		<?php } ?>

		loadFormValidation("#supplier-form", validationRules, validationMessage, formType, '', '', 1);
	});
</script>