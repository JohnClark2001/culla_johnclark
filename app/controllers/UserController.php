<?php
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
            $username = $this->io->post('username');
            $email = $this->io->post('email');

            $data = [
                'username' => $username,
                'email' => $email
            ];

            $this->UserModel->insert($data);
            redirect('/');
            
        }else {
            $this->call->view('user/create');
        }
    }
    public function update($id)
    {

    $data['user'] = $this->UserModel->find($id);

    if ($this->io->method() == 'post') {    
        $data = [
            'username' => $this->io->post('username'),
            'email'    => $this->io->post('email')
        ];

        $this->UserModel->update($id, $data);

        redirect('/');
    } else {
        $this->call->view('user/update', $data);
    }
    }
    public function delete($id)
    {
        $this->UserModel->delete($id);
        redirect('/');
    }


}