<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Model: UserModel
 * 
 * Automatically generated via CLI.
 */
class UserModel extends Model {
    protected $table = 'users';
    protected $primary_key = 'id';

    public function __construct()
    {
        parent::__construct();
    }

    public function getUsers($limit, $offset)
    {
        return $this->db->table($this->table)
            ->select('id, employee_id, first_name, last_name, username, email, role, created_at')
            ->limit($limit)
            ->offset($offset)
            ->get_all();
    }

    public function getLatestEmployeeId()
    {
        // Using raw SQL for clarity
        $sql = "SELECT employee_id 
                FROM {$this->table} 
                WHERE employee_id LIKE 'EMP%' 
                ORDER BY id DESC 
                LIMIT 1";
        $stmt = $this->db->raw($sql);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    public function countAll()
    {
        return $this->db->table($this->table)->count();
    }

    public function searchUsers($q, $limit, $offset)
    {
        $search = "%$q%";
        $sql = "SELECT * FROM {$this->table} WHERE username LIKE ? OR email LIKE ? LIMIT ? OFFSET ?";
        $stmt = $this->db->raw($sql, [$search, $search, $limit, $offset]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function countSearchUsers($q)
    {
        $search = "%$q%";
        $sql = "SELECT COUNT(*) as total FROM {$this->table} WHERE username LIKE ? OR email LIKE ?";
        $stmt = $this->db->raw($sql, [$search, $search]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    }

    public function getByUsername($username)
    {
        $sql = "SELECT * FROM {$this->table} WHERE username = ? LIMIT 1";
        $stmt = $this->db->raw($sql, [$username]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}