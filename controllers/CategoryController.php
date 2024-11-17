<?php
require_once 'models/Category.php';

class CategoryController
{
    private $categoryModel;

    public function __construct()
    {
        $this->categoryModel = new Category();
    }

    public function index()
    {
        $categories = $this->categoryModel->getAll();
        require 'views/category/category-list.php';
    }


    public function show($id)
    {
        $Category = $this->categoryModel->getById($id);
        require 'views/category/show.php';
    }

    public function create()
    {
        require 'views/category/create.php';
    }

    public function store($name)
    {
        $this->categoryModel->create($name);
        header('Location: /php-mvc/routes.php/Category');
    }

    public function edit($id)
    {
        $category = $this->categoryModel->getById($id);
        require 'views/category/edit.php';
    }

    public function update($id, $name)
    {
        $this->categoryModel->update($id, $name);
        header('Location: /php-mvc/routes.php/Category');
    }

    public function delete($id)
    {
        $this->categoryModel->delete($id);
        header('Location: /php-mvc/routes.php/Category');
    }
}
