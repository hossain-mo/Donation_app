<?php
namespace App\Repositories;
interface RepoInterface
{
    public function all();
    public function show($id);
    public function delete($id);
    public function create(array $arr);
    public function update(array $arr,$id);
}
