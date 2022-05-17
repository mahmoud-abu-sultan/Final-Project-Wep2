<?php
require_once 'Auth.php';
$auth = (new Auth())->checkAuth();
abstract Class Controller
{


    abstract public function index();

    abstract public function show($id);

    abstract public function store();

    abstract public function update($id);

    abstract public function delete($id);
}