<?php

namespace App\Controllers;
use App\Models\Post\Post;

class Home extends BaseController
{
    public function index(): string
    {

        $posts = new Post();

       // $data['posts'] = $posts->findAll();
        
        $data = $posts->select('*')->get(2)->getResult();

        $data1 = $posts->select('*')->get(1)->getResult();

        $dataTwoPosts = $posts->select('*')->orderBy('id', 'DESC')->get(2)->getResult();


        //BUSINESS section

        $businessTwoPosts = $posts->select('*')->where('category', 'business')
         ->orderBy('id', 'DESC')->get(2)->getResult();

        $businessThreePosts = $posts->select('*')->where('category', 'business')
         ->orderBy('title', 'DESC')->get(3)->getResult();

        $dataFourPosts = $posts->select('*')->orderBy('id', 'DESC')->get(3)->getResult();


        //culture section

        $cultureTwoPosts = $posts->select('*')->where('category', 'culture')
         ->orderBy('id', 'DESC')->get(2)->getResult();


        $cultureThreePosts = $posts->select('*')->where('category', 'culture')
         ->orderBy('id', 'DESC')->get(3)->getResult(); 


        $politicsNinePosts = $posts->select('*')->where('category', 'politics')
         ->orderBy('id', 'DESC')->get(9)->getResult();    



        $travelOnePosts = $posts->select('*')->where('category', 'travel')
         ->orderBy('id', 'DESC')->get(1)->getResult();
         
         

        $travelTwoPosts = $posts->select('*')->where('category', 'travel')
         ->orderBy('id', 'DESC')->get(2)->getResult();   
         
         
        return view('home', compact('data', 'data1', 'dataTwoPosts', 'businessTwoPosts', 'businessThreePosts', 'dataFourPosts', 'cultureTwoPosts', 'cultureThreePosts', 'politicsNinePosts', 'travelOnePosts', 'travelTwoPosts'));
    }



    public function aboutUs()
    {

        
        return view('pages/about-us');
    }


    public function contact()
    {

        
        return view('pages/contact');
    }



    
}
