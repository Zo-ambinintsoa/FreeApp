   
<?php
  // Include db config
  require_once '../libs/CrudClass.php';
  require_once '../libs/affiliate.php';

    if(isset($_POST["id"])) {
        
        $id = $_POST['id'];
        $aff = new affiliate();
        $crud = new CrudClass();
        // $id = 1;
        $output = array();
        $result = $crud->Select('users', ['id' , 'email' , 'name' , 'billetLafo'])
            ->Where(['id' => $id])
            ->Execute();        
        $Uaff = $aff->Getaff50($id)->Getaff20();
        $for50 = $Uaff->getFor50();
        $for20 = $Uaff->getFor20();
        $UserList = $Uaff->GetUserdetailsfor20();
        $output['count'] = ['for20' => $for20 , 'for50' => $for50];
        $output['userdetails'] = $result[0];
        $output['userlist'] = $UserList;
    header('Content-type: application/json');
    echo json_encode($output);
}
?>