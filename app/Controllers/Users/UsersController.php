<?php

namespace App\Controllers\Users;

use App\Controllers\BaseController;
use App\Models\Post\Post;


class UsersController extends BaseController
{

    public function __construct() {

        $this->db = \Config\Database::connect();
    }


    public function myPosts()
    {

        if(!isset(auth()->user()->id)) {
            return redirect()->to(base_url());

        }
        
        $id = auth()->user()->id;

        $myPosts = $this->db->query("SELECT *  FROM posts  WHERE user_id = '$id'  ORDER BY id DESC")
         ->getResult();

        return view('users/my-posts', compact('myPosts')); 

    }
}
