<?php

/**
 * the user class
 */
class Objects
{
	protected $pdo;

	// construct $pdo
	function __construct($pdo)
	{
		$this->pdo = $pdo;
	}

	// prevent sql injection
	public function escape($var)
	{
		$var = trim($var);
		$var = htmlspecialchars($var);
		$var = stripcslashes($var);
		return $var;
	}

	public function update($table, $colum_name, $id, $fields = array())
	{
		$columns = '';

		$i = 1;
		foreach ($fields as $name => $value) {
			$columns .= "{$name} = :{$name}";
			if ($i < count($fields)) {
				$columns .= ', ';
			}
			$i++;
		}

		$sql = "UPDATE {$table} SET {$columns} WHERE {$colum_name} = {$id}";
		if ($stmt = $this->pdo->prepare($sql)) {
			foreach ($fields as $key => $value) {
				$stmt->bindValue(":" . $key, $value);
			}
			$stmt->execute();
			return $stmt->rowCount();
		}
	} // end of update

	// find the total from a specific column
	public function calculateTotal($table, $columnName)
	{
		$stmt = $this->pdo->prepare("SELECT SUM($columnName) as total FROM $table");
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
	}

	// find the total from a specific column based on add_date
	public function getTotalByDate($table, $totalColumn, $whereColumn, $date)
	{
		$stmt = $this->pdo->prepare("SELECT SUM($totalColumn) as total FROM $table WHERE $whereColumn LIKE CONCAT(:selected_date, '%')");
		$stmt->bindParam(':selected_date', $date);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
	}

	// find the total from a specific column based on add_date
	public function getTotalByMonth()
	{
		$stmt = $this->pdo->prepare("SELECT SUM(total) as total FROM bar_selldrinks WHERE add_date LIKE '2023-11%'");
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
	}




	// find all data from table
	public function all($table)
	{
		$stmt = $this->pdo->prepare("SELECT * FROM " . $table . " ");
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	// find a specific data
	public function find($table, $column, $value)
	{
		$stmt = $this->pdo->prepare("SELECT * FROM " . $table . " WHERE " . $column . " = :value LIMIT 1");
		$stmt->bindParam(":value", $value);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_OBJ);
	}

	// add data from table
	public function insertBrand($name, $date)
	{
		$stmt = $this->pdo->prepare("INSERT INTO `bar_brands` (`name`,`add_date`) VALUES (?,?)");
		$stmt->bindParam(1, $name, PDO::PARAM_STR);
		$stmt->bindParam(2, $date, PDO::PARAM_STR);
		$stmt->execute();
	}

	public function create($table, $fields = array())
	{
		$columns = implode(',', array_keys($fields));
		$values = ":" . implode(', :', array_keys($fields));
		$sql = "INSERT INTO {$table}({$columns}) VALUES($values)";

		if ($stmt = $this->pdo->prepare($sql)) {
			foreach ($fields as $key => $data) {
				$stmt->bindValue(":" . $key, $data);
			}

			$stmt->execute();
			return $this->pdo->lastInsertId();
		}
	}
} //end of class
