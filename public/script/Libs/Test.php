<?php 
include('CrudClass.php');


$connection = new CrudClass();

// ============================= ********  Fake DATA ******** ============================= //

$table = "users";
$column = ['id' , 'name' , 'email'];
$data = ["name" => "ambininabe52" , "email" => "test@Test6" ,
        "isAdmin" => 0 , 'addedBy' => 3 ];

    $password = password_hash('password123' , PASSWORD_DEFAULT);
    $data['password'] = $password;

    $id = ['tombola.id' => 1];
    $finalQuery;
    $emptyArray = [];

// ============================= ******** Testing Query ******** ============================= //


print( "\n============== Initialising Test =========== \n\n");

    $result = $connection->Insert($table)->Data($data);
    print( "Query =  ");
    print( "\n");
    var_dump($result->Execute());
print( "        ========================= \n\n");


// $result = $connection->Select($table, $emptyArray )->Where($emptyArray);
//     $sql = 'SELECT users.name , tombola.*  FROM users INNER JOIN tombola ON users.id = tombola.IdUser';
//     $result = $connection->SetQuery($sql)->Where($id)->SetOperationType('select');
//         print( "Query =  ");
//         print( "\n");
//         $row = $result->Execute();
//         var_dump($row);

// print( "         ========================= \n\n");

// $result  = $connection->Delete($table) ->Where($id);
// $finalQuery = $connection->getQuery();
// print( "Query =  ");
// var_dump($finalQuery);

// var_dump($result->Execute());

// print( "        ========================= \n\n");
// $connection->Update($table)->Set($data)->Where($id);
// // $finalQuery = $connection->getQuery();
// print( "Query =  ");
// // var_dump($finalQuery);

// print( "        ========================= \n\n");




