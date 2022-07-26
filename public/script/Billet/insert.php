<?php
   require_once '../libs/CrudClass.php';
    $crud = new CrudClass();
    if(isset($_POST["operation"]) 
    // && isset($_SESSION['userId'])
    )  {

    switch ($_POST["operation"]) {
        case 'Add':
          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                    trim($_POST['nom']),
                    trim($_POST['address']),
                    trim($_POST['telephone']),
                    trim($_POST['idTombola']),
                    intval($_POST['userId']),
            ];

            $con = $crud->GetConnection();
               $stmt =  $con->prepare("INSERT INTO billet (nom , address , telephone , idTombola , AddedBy) VALUES (?,?,?,?,?)") ;
                if ($stmt->execute($data)) {
                $idbill = $con->lastInsertId();

                $data = [
                'No1' => trim($_POST['No1']),
                'No2' => trim($_POST['No2']),
                'No3' => trim($_POST['No3']),
                'No4' => trim($_POST['No4']),
                'No5' => trim($_POST['No5']),
                'No6' => trim($_POST['No6']),
                'No7' => trim($_POST['No7']),
                'idTombola' => trim($_POST['idTombola']),
                ];

                $data['checking'] = implode(' ' , $data);
                $data['idBillet'] = $idbill;
                $data['addedBy'] = $_POST['userId'];
                $result = $crud->Insert('billetnum')->Data($data);
                if ($result->Execute()) {
                    echo('Billet Creer');
                    }   
                }
            break;
        case 'Edit':
          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
          $id = ['id' => trim($_POST['billetId'])] ;
            $data = [
                'nom' => trim($_POST['nom']),
                'address' => trim($_POST['address']),
                'idTombola' => trim($_POST['idTombola']),
                'telephone' => trim($_POST['telephone']),
            ];
                $result = $crud->Update('billet')->Set($data)->Where($id);
                    if ($result->Execute()) {
                        echo('Billet mis a jour');
                    }            
            break;        
        default:
            echo('Une erreur est survenue');
            break;
    }
        }