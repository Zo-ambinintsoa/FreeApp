<?php

/**
 * CRUD Class for performing database operations (Create, Read, Update, Delete)
 */
class CrudClass
{
  private $pdo;
  private $query;
  private $params;
  private $operationType;
  private $hostName = 'localhost';
  private $dbName = 'lotoapp';
  private $userName = 'root';
  private $password = '';

  /**
   * Constructor to establish the database connection using PDO
   */
  public function __construct()
  {
      $this->pdo = $this->getConnection();
  }

  /**
   * Set a custom query for the operation
   *
   * @param string $query The custom query to be executed
   * @return $this
   */
  public function SetQuery($query)
  {
      $this->query = $query;
      return $this;
  }

  /**
   * Concatenate additional query string to the existing query
   *
   * @param string $query The query string to be appended
   * @return $this
   */
  public function ConcatToQuery($query)
  {
      $this->query .= $query;
      return $this;
  }

  /**
   * Set the operation type (insert, update, select, delete)
   *
   * @param string $operationType The operation type
   * @return $this
   */
  public function SetOperationType($operationType)
  {
      $this->operationType = $operationType;
      return $this;
  }

  /**
   * Get the database connection instance
   *
   * @return PDO The PDO database connection instance
   */
  public function GetConnection()
  {
      $connection = new PDO(
          'mysql:host=' . $this->hostName . ';dbname=' . $this->dbName,
          $this->userName,
          $this->password
      );
      $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $connection;
  }

    /**
     * Begin an insert operation on the specified table
     *
     * @param string $table The name of the table to insert into
     * @return $this
     */
    public function Insert($table)
    {
        $this->operationType = 'insert';
        $this->query = "INSERT INTO $table";
        return $this;
    }

    /**
     * Set the data to be inserted into the table
     *
     * @param array $data The data to be inserted (associative array: column => value)
     * @return $this
     */
    public function Data($data = [])
    {
        $columns = implode(',', array_keys($data));
        $placeholders = implode(',', array_fill(0, count($data), '?'));

        $this->query .= " ($columns) VALUES ($placeholders)";
        $this->params = array_values($data);

        return $this;
    }

    /**
     * Begin an update operation on the specified table
     *
     * @param string $table The name of the table to update
     * @return $this
     */
    public function Update($table)
    {
        $this->operationType = 'update';
        $this->query = "UPDATE $table";
        return $this;
    }

    /**
     * Set the columns and values to be updated
     *
     * @param array $data The data to be updated (associative array: column => value)
     * @return $this
     */
    public function Set($data = [])
    {
        $setValues = [];
        foreach ($data as $column => $value) {
            $setValues[] = "$column = ?";
            $this->params[] = $value;
        }

        $setClause = implode(', ', $setValues);
        $this->query .= " SET $setClause";
        return $this;
    }

    /**
     * Begin a select operation on the specified table
     *
     * @param string $table The name of the table to select from
     * @param array $columns The columns to select (default: all columns)
     * @return $this
     */
    public function Select($table, $columns = ['*'])
    {
        $columns = implode(',', $columns);
        $this->operationType = 'select';
        $this->query = "SELECT $columns FROM $table";
        return $this;
    }

    /**
     * Begin a delete operation on the specified table
     *
     * @param string $table The name of the table to delete from
     * @return $this
     */
    public function Delete($table)
    {
        $this->operationType = 'delete';
        $this->query = "DELETE FROM $table";
        return $this;
    }

    /**
     * Add conditions for the WHERE clause
     *
     * @param array $conditions The conditions for the WHERE clause (associative array: column => value)
     * @return $this
     */
    public function Where($conditions = [])
    {
        if (empty($conditions)) {
            return $this;
        }

        $whereConditions = [];
        foreach ($conditions as $column => $value) {
            $whereConditions[] = "$column = ?";
            $this->params[] = $value;
        }

        $whereClause = implode(' AND ', $whereConditions);
        $this->query .= " WHERE $whereClause";
        return $this;
    }

    /**
     * Execute the prepared statement and perform the database operation
     *
     * @return mixed The result of the operation (true, false, or query results)
     */
    public function Execute()
    {
        try {
            $stmt = $this->pdo->prepare($this->query);
            $stmt->execute($this->params);

            $this->query = null;
            $this->params = [];

            if ($this->operationType === 'select') {
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }

            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}
