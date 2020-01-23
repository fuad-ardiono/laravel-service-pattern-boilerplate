<?php
namespace App\Services\Post;

interface Contract {
  public function create($payload);
  public function update($id, $payload);
  public function delete($id);
  public function findByTitle($title);
}