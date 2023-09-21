<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index', ['as' => 'home']);
$routes->get('/about-us', 'Home::aboutUs', ['as' => 'about']);
$routes->get('/contact', 'Home::contact', ['as' => 'contact']);

service('auth')->routes($routes);


//posts

$routes->group('posts', function($routes) {


    $routes->get('category/(:any)', 'Posts\PostsController::category/$1');
    $routes->get('single/(:num)', 'Posts\PostsController::singlePost/$1', ['as' => 'single.post']);
    
    
    $routes->post('store-comment/(:num)', 'Posts\PostsController::storeComment/$1');
    
    $routes->get('create-posts/', 'Posts\PostsController::createPost');
    $routes->post('store-posts/', 'Posts\PostsController::storePost', ['as' => 'store.post']);
    
    $routes->get('delete-posts/(:num)', 'Posts\PostsController::deletePost/$1', ['as' => 'delete.post']);
    
    
    $routes->get('edit-posts/(:num)', 'Posts\PostsController::editPost/$1', ['as' => 'edit.post']);
    
    $routes->post('update-posts/(:num)', 'Posts\PostsController::updatePost/$1', ['as' => 'update.post']);

    $routes->post('search', 'Posts\PostsController::searchPosts', ['as' => 'search.post']);


    

});


//users
$routes->get('/users/my-posts', 'Users\UsersController::myPosts', ['as' => 'my.posts']);




//admins
$routes->get('/admins/login', 'Admins\AdminsController::viewLogin', ['as' => 'view.login', 'filter' => 'loginfilter']);
$routes->post('/admins/check-login', 'Admins\AdminsController::checkLogin', ['as' => 'check.login']);


$routes->group('admins', ['filter' => 'authfilter'], function($routes) {

    $routes->get('index', 'Admins\AdminsController::index', ['as' => 'admins.index']);

    $routes->get('admin-logout', 'Admins\AdminsController::adminLogout');


    //admins
    $routes->get('all-admins', 'Admins\AdminsController::allAdmins', ['as' => 'admins.all.admins']);
    $routes->get('create-admins', 'Admins\AdminsController::createAdmins', ['as' => 'admins.create']);
    $routes->post('create-admins', 'Admins\AdminsController::storeAdmins', ['as' => 'admins.store']);


    //categories
    $routes->get('all-categories', 'Admins\AdminsController::allCategories', ['as' => 'categories.all']);
    $routes->get('create-categories', 'Admins\AdminsController::createCategories', ['as' => 'categories.create']);
    $routes->post('create-categories', 'Admins\AdminsController::storeCategories', ['as' => 'categories.store']);
    $routes->get('edit-categories/(:num)', 'Admins\AdminsController::editCategories/$1', ['as' => 'categories.edit']);
    $routes->post('edit-categories/(:num)', 'Admins\AdminsController::updateCategories/$1', ['as' => 'categories.update']);
    $routes->get('delete-categories/(:num)', 'Admins\AdminsController::deleteCategories/$1', ['as' => 'categories.delete']);




    //posts
    $routes->get('all-posts', 'Admins\AdminsController::allPosts', ['as' => 'posts.all']);
    $routes->get('delete-posts/(:num)', 'Admins\AdminsController::deletePosts/$1', ['as' => 'posts.delete']);










});



