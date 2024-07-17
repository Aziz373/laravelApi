<?php

namespace App\Interface;

interface UserInterface{
    public function index();
    public function store(array $data);
    public function update(array $data);

    public function destroy($id);
}
