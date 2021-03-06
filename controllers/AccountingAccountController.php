<?php

  function account_create()
  {
    $model = array(
        'label' => '',
        'type' => ''
    );
    return $model;
  }

  function account_load()
  {
    $title = ($_POST['Title'] != "" ? $_POST['Title'] : null);
    $model = array(
        'id' => $_POST['AccountId'],
        'label' => $_POST['Label'],
        'type' => $_POST['Type'],
    );

    return $model;
  }

 function account_save($conn, $id, &$model, &$errors)
  {
    $res = true;

    // Check data
    if($model['label'] == ""){
        $errors[] = "Label cannot be empty";
        $res = false;
    }
    if($model['type'] == ""){
        $errors[] = "Type cannot be empty";
        $res = false;
    }

	// Prepare the query
	$stmt = null;
    if($res){
        if($id==0){
        	$sql =  'INSERT INTO accounting_account (label, type) VALUES (:label, :type)';
	    }else{
        	$sql =  'UPDATE accounting_account SET label=:label, type=:type WHERE id=:id';
	    }

	    $stmt = $conn->prepare($sql);
	    if(!$stmt){
			$res = false;
		    $errors[] = TSHelper::pdoErrorText($conn->errorInfo());
	    }

	}

	// Execute the query
	if($res){
	    if($id!=0){
		    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
	    }else{
		    //$stmt->bindParam(':creation_date', $id, PDO::PARAM_INT);
	    }
	    $stmt->bindParam(':label', $model['label'], PDO::PARAM_STR, 50);
	    $stmt->bindParam(':type', $model['type'], PDO::PARAM_INT);
	    $res = $stmt->execute();
        if($res){
            if($id==0){
		        $model["id"] = $conn->lastInsertId();
            }
        }else{
	        $errors[] = TSHelper::pdoErrorText($stmt->errorInfo());
        }
    }

    return $res;
  }

dispatch('/accounting/accounts', 'accounting_account_list');
  function accounting_account_list()
  {
	$webuser = loadWebUser();
	if($webuser->is_anonymous){
		redirect_to('/login'); return;
	}

    $res = true;

    $conn = $GLOBALS['db_connexion'];
    $errors = array();
    $dbController = new DatabaseController($conn, $errors);

    // Load account list
    $listAccountingAccount = null;
    if($res){
	$res = $dbController->getAccountingAccountList($listAccountingAccount);
    }

    // Load account list
    $listAccountingAccountResume = null;
    if($res){
	$res = $dbController->getAccountingAccountResumeList($listAccountingAccountResume);
    }

	// Get operation for each years
    $listOperationCountPerAccount = null;
    if($res){
	$res = $dbController->getAccountingOperationCountPerAccount($listOperationCountPerAccount);
    }

	// Render data
	if($res){
        // Pass data
        set('listAccountingAccountResume', $listAccountingAccountResume);
        set('listAccountingAccount', $listAccountingAccount);
        set('listOperationCountPerAccount', $listOperationCountPerAccount);

        set('page_title', TS::AccountingAccount_List);
        set('page_submenus', getSubMenus("accounting"));
        return html('accounting.account.list.html.php');
    }

    set('page_title', "Bad request");
    return html('error.html.php');
  }

dispatch('/accounting/accounts/add', 'account_add');
  function account_add()
  {
	$webuser = loadWebUser();
	if($webuser->is_anonymous){
		redirect_to('/login'); return;
	}

	$account = account_create();
	set('account', $account);

    set('page_title', TS::Accounting_AccountAdd);
    set('page_submenus', getSubMenus("accounting"));
    return html('accounting.account.html.php');
  }

dispatch('/accounting/accounts/:id', 'account_view');
  function account_view()
  {
	$webuser = loadWebUser();
	if($webuser->is_anonymous){
		redirect_to('/login'); return;
	}

    $id = params('id');
    $conn = $GLOBALS['db_connexion'];
    $sql = 'SELECT id, label, type FROM accounting_account WHERE id='.$id;
    $results = $conn->query($sql);

    if(count($results) == 1){
        set('account', $results->fetch());

        set('page_title', sprintf(TS::AccountingAccount_View, $id));
        set('page_submenus', getSubMenus("accounting"));
        return html('accounting.account.html.php');
    }else{
        set('page_title', "Bad request");
        return html('error.html.php');
    }
  }

dispatch_post('/accounting/accounts/:id/edit', 'account_edit');
  function account_edit()
  {
	$webuser = loadWebUser();
	if($webuser->is_anonymous){
		redirect_to('/login'); return;
	}

	$res = false;

    $id = params('id');
    $conn = $GLOBALS['db_connexion'];

    $account = account_load();
    $errors = array();

    $res = account_save($conn, $id, $account, $errors);

	if($res){
		if($id == 0){
			$id = $conn->lastInsertId();
		}
		redirect_to('/accounting/accounts/'.$id);
		return;
	}else{
        set('account', $account);
        set('errors', $errors);

        set('page_title', TS::AccountingAccount_Add);
        set('page_submenus', getSubMenus("accounting"));
        return html('accounting.account.html.php');
	}
  }


dispatch('/accounting/accounts/:id/operations', 'accounting_account_operation_list');
  function accounting_account_operation_list()
  {
    $webuser = loadWebUser();
	if($webuser->is_anonymous){
		redirect_to('/login'); return;
	}

    $res = true;

    $conn = $GLOBALS['db_connexion'];
    $errors = array();
    $dbController = new DatabaseController($conn, $errors);
    
    // Load URL params
    $account_id = params('id');

    // Load fiscal year list
    $listFiscalYear = null;
    if($res){
        $res = $dbController->getFiscalYearList($listFiscalYear);
    }

    // Load account list
    $listAccountingAccount = null;
    if($res){
        $filters = array("id" => $account_id);
        $res = $dbController->getAccountingAccountList($listAccountingAccount, $filters);
    }

    // Load category list
    $listAccountingOperationCategory = null;
    if($res){
        $res = $dbController->getAccountingOperationCategoryList($listAccountingOperationCategory);
    }

    // Load operation list
    $listAccountingOperation = null;
    if($res){
        $filters = array("account_id" => $account_id);
        $res = $dbController->getAccountingOperationList($listAccountingOperation, $filters, "sort_by_account_date");
    }

	// Render data
	if($res){
        // Pass data
        set('listFiscalYear', $listFiscalYear);
        set('listAccountingAccount', $listAccountingAccount);
        set('listAccountingOperationCategory', $listAccountingOperationCategory);
        set('listAccountingOperation', $listAccountingOperation);

        set('page_title', "Accounting");
        set('page_submenus', getSubMenus("accounting"));
        return html('accounting.operation.list.html.php');
    }

    set('page_title', "Bad request");
    return html('error.html.php');
}

?>
