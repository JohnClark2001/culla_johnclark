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

    public function searchUsers($q)
    {
        return $this->db->table($this->table)
            ->like('username', $q)
            ->or_like('email', $q)
            ->get_all();
    }



}