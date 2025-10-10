<?php
session_start();
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Controller: UserController
 * 
 * Automatically generated via CLI.
 */
class UserController extends Controller {
    public function __construct()
    {
        parent::__construct();
        $this->call->helper('common_helper');

    }

    public function index()
    {
        $q = isset($_GET['q']) ? $_GET['q'] : '';
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perPage = 5;
        $offset = ($page - 1) * $perPage;

        if (!empty($q)) {
            $data['users'] = $this->UserModel->searchUsers($q, $perPage, $offset);
            $total = $this->UserModel->countSearchUsers($q);
        } else {
            $data['users'] = $this->UserModel->getUsers($perPage, $offset);
            $total = $this->UserModel->countAll();
        }

        $data['query'] = $q;
        $data['pagination'] = [
            'total' => $total,
            'perPage' => $perPage,
            'currentPage' => $page,
            'totalPages' => ceil($total / $perPage)
        ];

        $this->call->view('user/view', $data);    
    }

  public function create()
    {
        if($this->io->method() == 'post') {
            $first_name = $this->io->post('first_name');
            $last_name  = $this->io->post('last_name');
            $username   = $this->io->post('username');
            $email      = $this->io->post('email');
            $password   = $this->io->post('password');

            $latest = $this->UserModel->getLatestEmployeeId(); 
            if ($latest) {
                $num = (int) substr($latest['employee_id'], 3) + 1;
                $employee_id = 'EMP' . str_pad($num, 3, '0', STR_PAD_LEFT);
            } else {
                $employee_id = 'EMP001';
            }

            $data = [
                'employee_id' => $employee_id,
                'first_name'  => $first_name,
                'last_name'   => $last_name,
                'username'    => $username,
                'email'       => $email,
                'password'    => password_hash($password, PASSWORD_DEFAULT),
                'role'        => 'employee',
                'created_at'  => date('Y-m-d H:i:s')
            ];

            $this->UserModel->insert($data);
            redirect('/'); // redirect to employee list or dashboard
        } else {
            $this->call->view('user/create');
        }
    }

    public function update($id)
    {
        $user = $this->UserModel->find($id);

        if ($this->io->method() == 'post') {    
            $data = [
                'first_name' => $this->io->post('first_name'),
                'last_name'  => $this->io->post('last_name'),
                'username'   => $this->io->post('username'),
                'email'      => $this->io->post('email')
            ];

            // Only update password if provided
            $password = $this->io->post('password');
            if (!empty($password)) {
                $data['password'] = password_hash($password, PASSWORD_DEFAULT);
            }

            $this->UserModel->update($id, $data);

            redirect('/'); // redirect to employee list or dashboard
        } else {
            $this->call->view('user/update', ['user' => $user]);
        }
    }

    public function delete($id)
    {
        $this->UserModel->delete($id);
        redirect('/');
    }

    public function profile()
    {
        if (!isset($_SESSION['user_id']) || strtolower($_SESSION['role']) !== 'employee') {
            redirect(site_url('login')); // Use site_url() to respect base_url
        }

        $userId = $_SESSION['user_id'];
        $user = $this->UserModel->find($userId);

        $this->call->view('user/profile', ['user' => $user]);
    }

    public function login()
    {
        if ($this->io->method() === 'post') {
            $username = $this->io->post('username');
            $password = $this->io->post('password');

            $user = $this->UserModel->getByUsername($username);

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['role'] = $user['role'];

                if ($user['role'] === 'admin') {
                    redirect(site_url('get-all'));       // ✔ Correct
                } else {
                    redirect(site_url('user/profile'));  // ✔ Correct
                }
            } else {
                $this->call->view('user/login', ['error' => 'Invalid username or password']);
            }
        } else {
            $this->call->view('user/login', ['error' => '']);
        }
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        redirect(site_url('/login'));
    }

}