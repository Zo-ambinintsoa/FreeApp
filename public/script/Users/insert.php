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
                'email' => trim($_POST['email']),
                'name' => trim($_POST['name']),
                'addedBy' => trim($_SESSION['userId']),
                // 'quota' => trim($_POST['quota']),
            ];
                $password = password_hash('password123' , PASSWORD_DEFAULT);
                $data['password'] = $password;            
                $result = $crud->Insert('users')->Data($data);
                if ($result->Execute()) {
                    echo('Utilisateur Creer');
                }
            break;
        case 'Edit':
          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
          $id = ['id' => trim($_POST['user_id'])] ;
            $data = [
                'email' => trim($_POST['email']),
                'name' => trim($_POST['name']),
            ];
            if (isset($_POST['quota'])) {
                $data['quota'] =  trim($_POST['quota']);
            }
                $result = $crud->Update('users')->Set($data)->Where($id);
                    if ($result->Execute()) {
                        echo('Utilisateur mis a jour');
                    }            
            break;        
        default:
            echo('Une erreur est survenue');
            break;
    }
        }