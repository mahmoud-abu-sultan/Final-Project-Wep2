<?php

abstract Class Controller
{

    abstract public function chechRoute($m, $id = null);

    abstract public function index();

    abstract public function show($id);

    abstract public function store();

    abstract public function update($id);

    abstract public function delete($id);
}