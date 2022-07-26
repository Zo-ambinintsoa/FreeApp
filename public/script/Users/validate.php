<?php
   require_once '../libs/CrudClass.php';
    $crud = new CrudClass();
            if (isset($_POST['id']) && isset($_POST['operation'])) {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $id = ['id' => trim($_POST['id'])] ;
                if ($_POST['operation'] == 'unconfirm') {
                    $data = [
                        'isConfirmed' => 0,
                    ];
                } else { 
                    $data = [
                        'isConfirmed' => 1,
                    ];
                }

                $result = $crud->Update('users')->Set($data)->Where($id);
                    if ($result->Execute()) {
                        echo('Utilisateur Valider');
                    }
                    else echo('Une erreur est survenue');  
            }
          

        