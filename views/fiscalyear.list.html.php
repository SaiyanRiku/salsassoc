<p align="right">
<?php printf(TS::FiscalYear_FiscalYearCount, count($listFiscalYear)); ?>
</p>

<table width="100%" class="list">
<thead>
<tr>
  <th><?php echo TS::FiscalYear_Label; ?></th>
  <th><?php echo TS::FiscalYear_StartDate; ?></th>
  <th><?php echo TS::FiscalYear_EndDate; ?></th>
  <th><?php echo TS::FiscalYear_Members; ?></th>
  <th><?php echo TS::FiscalYear_MembershipAmount; ?></th>
  <th><?php echo TS::AccountingAccount_Operations; ?></th>
  <th><?php echo TS::AccountingAccount_AmountIncomings; ?></th>
  <th><?php echo TS::AccountingAccount_AmountOutcomings; ?></th>
  <th><?php echo TS::AccountingAccount_AmountBalance; ?></th>
  <th><?php echo TS::FiscalYear_View; ?></th>
</tr>
</thead>
<tbody>
<?php
	// Compute associative array for fiscal year person count
	$tabFiscalYearsMembersCount = array();
    foreach  ($listMembershipCountPerFiscalYear as $fiscalyearmemberscount)
    {
		$tabFiscalYearsMembersCount[$fiscalyearmemberscount['fiscal_year_id']] = $fiscalyearmemberscount['membership_count'];
	}

	// Compute associative array for fiscal year oepration count
	$tabFiscalYearsOperationCount = array();
    foreach  ($listOperationCountPerFiscalYear as $fiscalyearoperationcount)
    {
		$tabFiscalYearsOperationCount[$fiscalyearoperationcount['fiscalyear_id']] = $fiscalyearoperationcount['operation_count'];
	}

	// Compute associative array for fiscal year amount
	$tabFiscalYearsAmount = array();
    foreach  ($listAmountPerFiscalYear as $fiscalyearamount)
    {
		$tabFiscalYearsAmount[$fiscalyearamount['fiscal_year_id']] = $fiscalyearamount['total_amount'];
	}

	// Compute associative array for fiscal year amount
	$tabAccountingOperationResumeIncomings = array();
	$tabAccountingOperationResumeOutcomings = array();
    foreach  ($listAccountingOperationResume as $resume)
    {
		$tabAccountingOperationResumeIncomings[$resume['fiscalyear_id']] = $resume['incomings'];
		$tabAccountingOperationResumeOutcomings[$resume['fiscalyear_id']] = $resume['outcomings'];
	}

    foreach  ($listFiscalYear as $fiscalyear)
    {
		$fiscalyear_id = $fiscalyear['id'];
?> 
<tr>
  <td align="left">
    <?php
	  $title = $fiscalyear['title'];
      if($title == ""){
		$title = sprintf(TS::FiscalYear_YearTitle, $fiscalyear_id);
	  }
      echo $title;
	?>
  </td>
  <td align="center"><?php echo TSHelper::getShortDateTextFromDBDate($fiscalyear['start_date']) ?></td>
  <td align="center"><?php echo TSHelper::getShortDateTextFromDBDate($fiscalyear['end_date']) ?></td>
  <td align="center">
    <a href="<?php echo url_for('/fiscalyears', $fiscalyear['id'], 'memberships')?>">
		<?php
			$memberscount=0;
			if(isset($tabFiscalYearsMembersCount[$fiscalyear_id])){
				$memberscount=$tabFiscalYearsMembersCount[$fiscalyear_id];
			}
			printf(TS::Cotisation_MembersCount, $memberscount);
		?>
	</a>
  </td>
  <td align="center">
	<?php
		$totalamount=0.0;
		if(isset($tabFiscalYearsAmount[$fiscalyear_id])){
			$totalamount=$tabFiscalYearsAmount[$fiscalyear_id];
		}
		echo TSHelper::getCurrencyText($totalamount);
	?>
  </td>
  <td align="center">
    <a href="<?php echo url_for('/fiscalyears', $fiscalyear['id'], 'operations')?>">
		<?php
			$operationcount=0;
			if(isset($tabFiscalYearsOperationCount[$fiscalyear_id])){
				$operationcount=$tabFiscalYearsOperationCount[$fiscalyear_id];
			}
			printf(TS::FiscalYear_OperationsCount, $operationcount);
		?>
	</a>
  </td>
  <td align="center">
	<?php
        $amount_debit = 0;
        if(array_key_exists($fiscalyear_id, $tabAccountingOperationResumeIncomings)){
		  $amount_debit = $tabAccountingOperationResumeIncomings[$fiscalyear_id];
		  echo TSHelper::getCurrencyText($amount_debit);
        }
	?>
  </td>
  <td align="center">
	<?php
        $amount_credit = 0;
        if(array_key_exists($fiscalyear_id, $tabAccountingOperationResumeOutcomings)){
		  $amount_credit = $tabAccountingOperationResumeOutcomings[$fiscalyear_id];
		  echo TSHelper::getCurrencyText($amount_credit);
        }
	?>
  </td>
  <td align="center">
	<?php
        $amount = $amount_credit + $amount_debit;
        if($amount < 0){
            $color = "red";
        }else if($amount > 0){
            $color = "green";
        }else{
            $color = "black";
        }
    ?>
    <span style="color:<?php echo $color; ?>">
	<?php
		echo TSHelper::getCurrencyText($amount);
	?>
    </span>
  </td>
  <td align="center">
    <a href="<?php echo url_for('/fiscalyears', $fiscalyear['id'])?>"><?php echo TS::Cotisation_View; ?></a>
  </td>
</tr>
<?php
    }
?> 
</tr>
</tbody>
</table>
