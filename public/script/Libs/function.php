<?php
  // Include db config
  require_once '../libs/CrudClass.php';
    $crud = new CrudClass();
function GetNumeroList( $table , $Id ) {
    $row = $crud->Select($table)->Where(['id' => $Id])
    ->Execute();
    return $row;
}
function GetNumeroCount( $table , $Id) {
    $row = $crud->Select($table)->Where(['id' => $Id])
    ->Execute();
    return count($row);
}

