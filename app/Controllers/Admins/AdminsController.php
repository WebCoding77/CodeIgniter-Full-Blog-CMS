<?php

namespace App\Controllers\Admins;

use App\Controllers\BaseController;
use App\Models\Admin\Admin;
use App\Models\Category\Category;
use App\Models\Post\Post;


class AdminsController extends BaseController
{

    public function __construct() {

        $this->db = \Config\Database::connect();
    }

    public function viewLogin()
    {
        

        return view('admins/login');
    }



    public function checkLogin()
    {
        

        $session = session();
        $adminModel = new Admin();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        
        $data = $adminModel->where('email', $email)->first();
        
        if($data){
            $pass = $data['password'];
            $authenticatePassword = password_verify($password, $pass);
            if($authenticatePassword){
                $ses_data = [
                    'id' => $data['id'],
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'isLoggedIn' => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to(base_url('admins/index'));
            
            }else{
                $session->setFlashdata('msg', 'Password is incorrect.');
                return redirect()->to(base_url('admins/login'));
            }
        }else{
            $session->setFlashdata('msg', 'Email does not exist.');
            return redirect()->to(base_url('admins/login'));
	    }


    }

    public function adminLogout()
    {
        
        $session = session();

        $ses_data = [
            'id' => "",
            'name' => "",
            'email' => "",
            'isLoggedIn' => FALSE
        ];

        $session->set($ses_data);

        return redirect()->to(base_url('admins/login'));
    }


    public function index()
    {
        
        $session = session();

        $numPosts = $this->db->table('posts')->countAllResults();
        $numCategories = $this->db->table('categories')->countAllResults();
        $numAdmins = $this->db->table('admins')->countAllResults();

        return view('admins/index', compact('session', 'numPosts', 'numCategories', 'numAdmins'));
    }

    public function allAdmins() {

        $session = session();

        
        $admins = new Admin();

        $allAdmins = $admins->select('*')->orderBy('id', 'DESC')
         ->get()
         ->getResult();


        return view('admins/all-admins', compact('session', 'allAdmins'));
    }


    public function createAdmins() {

        $session = session();

    

        return view('admins/create-admins', compact('session'));
    }



    public function storeAdmins() {

        $admins = new Admin();

        $data = [
            "email" => $this->request->getPost('email'), 
            "name" => $this->request->getPost('name'), 
            "password" => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT), 
        ];
    
        $admins->save($data);
    
       if($admins) {
    
            return redirect()->to(base_url('admins/all-admins'))->with('create', 'Admin saved successfully');
       }
    
    }



    
    public function allCategories() {

        $session = session();

        
        $categories = new Category();

        $allCategories = $categories->select('*')->orderBy('id', 'DESC')
         ->get()
         ->getResult();


        return view('admins/all-categories', compact('session', 'allCategories'));
    }


    public function createCategories() {

        $session = session();

    

        return view('admins/create-categories', compact('session'));
    }

    

    public function storeCategories() {

        $categories = new Category();

        $data = [
             
            "name" => $this->request->getPost('name'), 
            
        ];
    
        $categories->save($data);
    
       if($categories) {
    
            return redirect()->to(base_url('admins/all-categories'))->with('create', 'Category saved successfully');
       }
    
    }



    public function editCategories($id) {

        $session = session();

        
        $categories = new Category();

        $category = $categories->find($id);


        return view('admins/edit-categories', compact('session', 'category'));
    }




    public function updateCategories($id) {

        $session = session();

        
        $categories = new Category();

        $data = [
            "name" => $this->request->getPost('name'), 
            
        ];

        $categories->update($id, $data);

       if($categories) {

            return redirect()->to(base_url('admins/all-categories'))->with('update', 'Category updated successfully');
       }
    }



    public function deleteCategories($id) {

        //$session = session();

        
        $categories = new Category();

        $categories->delete($id);

        if($categories) {
            return redirect()->to(base_url('admins/all-categories'))->with('delete', 'Category deleted successfully');

        }

    }



    public function allPosts() {

        $session = session();

        
        $posts = new Post();

        $allPosts = $posts->select('*')->orderBy('id', 'DESC')
         ->get()
         ->getResult();


        return view('admins/all-posts', compact('session', 'allPosts'));
    }
    
    
    public function deletePosts($id) {

        //$session = session();

        
        $posts = new Post();

        $post = $posts->find($id);
        unlink('public/assets/images/'.$post['image'].'');

       

        $posts->delete($id);

        if($posts) {
            return redirect()->to(base_url('admins/all-posts'))->with('delete', 'Post deleted successfully');

        }

    }
    
    


   
    

    
    


    
    


    
}
