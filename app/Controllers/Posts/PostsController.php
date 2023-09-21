<?php

namespace App\Controllers\Posts;

use App\Controllers\BaseController;
use App\Models\Post\Post;
use App\Models\Comment\Comment;


class PostsController extends BaseController
{

    public function __construct() {

        $this->db = \Config\Database::connect();
    }


    public function category($name) {

        $posts = new Post();

        $postsCategory = $posts->select('*')->where('category', $name)
         ->orderBy('id', 'DESC')->get(10)->getResult();



        //cateogries 

        $categories = $this->db->query("SELECT COUNT(posts.category) AS count_posts, 
        categories.name AS name, categories.id AS id FROM posts INNER JOIN 
        categories ON posts.category = categories.name GROUP BY(posts.category)")->getResult();

        //pop posts
        $popPosts = $posts->select('*')->orderBy('title', 'DESC')->get(3)->getResult();

        

        return view('posts/category', compact('postsCategory', 'name', 'categories', 'popPosts')); 
        
    }


    public function singlePost($id) {

        $post = new Post();

        $commments = new Comment();

        //single post data
        $data = $post->find($id);

       
        //cateogries 

        $categories = $this->db->query("SELECT COUNT(posts.category) AS count_posts, 
         categories.name AS name, categories.id AS id FROM posts INNER JOIN 
         categories ON posts.category = categories.name GROUP BY(posts.category)")->getResult();
 
         //pop posts
        $popPosts = $post->select('*')->orderBy('title', 'DESC')->get(3)->getResult();
 
        //comments  

        $comments = $commments->select('*')->where('post_id', $id)
         ->orderBy('id', 'DESC')->get()->getResult();


        //num of comments

        $numComments = $this->db->table('comments')->where('post_id', $id)->countAllResults();



        //more blog posts

        $moreBlogPosts = $this->db->query("SELECT *  FROM posts  WHERE id != '$id'  ORDER BY id DESC LIMIT 4")->getResult();
 
        //var_dump($moreBlogPosts);
        
        return view('posts/single', compact('data', 'categories', 'popPosts', 'comments', 'numComments', 'moreBlogPosts'));
    }



    public function storeComment($id) {

        $commments = new Comment();

        $data = [
            "user_name" => auth()->user()->username, 
            "comment" => $this->request->getPost('comment'), 
            "post_id" => $id, 
        ];

        $commments->save($data);

       if($commments) {

            return redirect()->to(base_url('posts/single/'.$id.''))->with('create', 'Comment saved successfully');
       }
    }



    public function createPost() {

        if(!isset(auth()->user()->id)) {
            return redirect()->to(base_url());

        }

        
        $categories = $this->db->query("SELECT * FROM categories")->getResult();


        return view('posts/create-posts', compact('categories')); 
        
    }


    public function storePost() {

        $posts = new Post();

        $img = $this->request->getFile('image');
        $img->move('public/assets/' . 'images');

        $data = [
            "title" => $this->request->getPost('title'), 
            "image" => $img->getClientName(), 
            "body" => $this->request->getPost('body'), 
            "user_id" => auth()->user()->id, 
            "user_name" => auth()->user()->username, 
            "category" => $this->request->getPost('category'), 
        ];

        $posts->save($data);

       if($posts) {

            return redirect()->to(base_url('posts/create-posts'))->with('create', 'Post created successfully');
       }
    }


    public function deletePost($id) {

        
        $post = new Post();


        if(!isset(auth()->user()->id)) {
            return redirect()->to(base_url());

        }


        if(auth()->user()->id == $post->user_id) {

            $post->delete($id);

            if($post) {
                return redirect()->to(base_url())->with('delete', 'Post deleted successfully');
    
            }

        } else {
            return redirect()->to(base_url());
        }

       


        
    }


    public function editPost($id) {

        
        
        $post = new Post();

        $singlePost = $post->find($id);

        if(!isset(auth()->user()->id)) {
            return redirect()->to(base_url());

        }

        if(auth()->user()->id == $singlePost['user_id']) {

            $categories = $this->db->query("SELECT * FROM categories")->getResult();
            return view('posts/edit-post', compact('singlePost', 'categories'));

        } else {
            return redirect()->to(base_url());

        }

       


        
    }



    public function updatePost($id) {

        $posts = new Post();

       

        $data = [
            "title" => $this->request->getPost('title'), 
            "body" => $this->request->getPost('body'), 
            "category" => $this->request->getPost('category'), 
        ];

        $posts->update($id, $data);

       if($posts) {

            return redirect()->to(base_url('posts/single/'.$id.''))->with('update', 'Post updated successfully');
       }
    }


    public function searchPosts() {

        $posts = new Post();


        $keyword = $this->request->getPost('keyword');

        $searches = $posts->like('title', $keyword)->findAll();

       if($searches) {

            return view('posts/searches', compact('searches', 'keyword'));
       }
    }



    

    
    
    

    

    
    

    
}
