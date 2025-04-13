<?php
require_once __DIR__ . "/../models/Users.php";

class Teacher extends User
{
    public function get_teachers_paginated($offset, $limit)
    {
        $sql = "SELECT * FROM users ORDER BY name LIMIT ?, ?";
        return $this->database->execute_query(query: $sql, params: [$offset, $limit])->fetch_all(MYSQLI_ASSOC);
    }

    public function count_teachers()
    {
        $sql = "SELECT COUNT(*) as total FROM users";
        return $this->database->execute_query(query: $sql)->fetch_assoc()['total'];
    }

}
