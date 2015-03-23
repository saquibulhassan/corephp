<div class="row">
	<div class="col-sm-12">

		<div id="setFormMessage"></div>

		<form class="form-horizontal" action="<?php echo site_url('purchase/print') ?>" method="post" target="_blank">
			<input type='hidden' name='PurID' value='<?php echo $purchaseInfo->PurID ?>' />
			<div class="row">
				<div class="col-sm-7">
					<table class="table table-no-border">
						<tr>
							<td>Location</td>
							<td class="text-center">:</td>
							<td><?php echo $purchaseInfo->location->LocName ?></td>
							<td>Ref No</td>
							<td class="text-center">:</td>
							<td><?php echo $purchaseInfo->RefNo ?></td>
						</tr>
						<tr>
							<td>Purchase Date </td>
							<td class="text-center">:</td>
							<td><?php echo getDMY($purchaseInfo->PurDate); ?></td>
							<td>Ref Date</td>
							<td class="text-center">:</td>
							<td><?php echo getDMY($purchaseInfo->RefDate); ?></td>
						</tr>
						<tr>
							<td>Supplier Bill No </td>
							<td class="text-center">:</td>
							<td><?php echo $purchaseInfo->SupBillNo ?></td>
							<td rowspan="2">Remarks</td>
							<td class="text-center" rowspan="2">:</td>
							<td rowspan="2"><?php echo $purchaseInfo->Remarks ?></td>
						</tr>
						<tr>
							<td>Supplier Bill Date </td>
							<td class="text-center">:</td>
							<td><?php echo getDMY($purchaseInfo->SupBillDate); ?></td>							
						</tr>						
					</table>
				</div>
				<div class="col-sm-5">
					<table class="table table-no-border">
						<tr>
							<td class="text-right"><h3><?php echo $purchaseInfo->supplier->SupName ?></h3></td>
						</tr>
						<tr>
							<td class="text-right"><?php echo $purchaseInfo->supplier->Address ?></td>
						</tr>
						<tr>
							<td class="text-right">Tel: <?php echo $purchaseInfo->supplier->Tel ?>, Fax: <?php echo $purchaseInfo->supplier->Fax ?> <br /> Email: <?php echo $purchaseInfo->supplier->Email ?></td>
						</tr>						
					</table>
				</div>
			</div>		
		</form>
	</div>
</div>