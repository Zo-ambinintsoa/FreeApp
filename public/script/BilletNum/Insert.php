<?php
   require_once '../libs/CrudClass.php';
    $crud = new CrudClass();
    if(isset($_POST["operation"]) 
    // && $_SESSION['userId']
    )  {

    switch ($_POST["operation"]) {
        case 'Add':
          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'No1' => trim($_POST['No1']),
                'No2' => trim($_POST['No2']),
                'No3' => trim($_POST['No3']),
                'No4' => trim($_POST['No4']),
                'No5' => trim($_POST['No5']),
                'No6' => trim($_POST['No6']),
                'No7' => trim($_POST['No7']),
                'No8' => trim($_POST['No8']),
                'No9' => trim($_POST['No9']),
                'No10' => trim($_POST['No10']),
                'idTombola' => trim($_POST['idTombola']),
            ];
                $data['checking'] = implode(' ' , $data);
                $data['idBillet'] = trim($_POST['idBillet']);
                $data['prix'] = trim($_POST['prix']);
                $result = $crud->Insert('billet')->Data($data);
                if ($result->Execute()) {
                    echo('Billet Creer');
                }
            break;
        case 'Edit':
          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
          $id = ['id' => trim($_POST['numId'])] ;
            $data = [
                'No1' => trim($_POST['No1']),
                'No2' => trim($_POST['No2']),
                'No3' => trim($_POST['No3']),
                'No4' => trim($_POST['No4']),
                'No5' => trim($_POST['No5']),
                'No6' => trim($_POST['No6']),
                'No7' => trim($_POST['No7']),
                'No8' => trim($_POST['No8']),
                'No9' => trim($_POST['No9']),
                'No10' => trim($_POST['No10']),
                'idTombola' => intval($_POST['idTombola']),
                
            ];  
                $data['checking'] = implode(' ' , $data);
                // $data['idBillet'] = trim($_POST['idBillet']);
                $data['prix'] = trim($_POST['prix']);
                $result = $crud->Update('billetnum')->Set($data)->Where($id);
                    if ($result->Execute()) {
                        echo('Billet mis a jour');
                    }            
            break;        
        default:
            echo('Une erreur est survenue');
            break;
    }
        }