<?php
namespace App\Services\Post;

use App\Model\Post;

class Service implements Contract {
  private $postModel;

  public function __construct()
  {
    $this->postModel = new Post();
  }

  public function create($payload)
  {
    try {
      $this->postModel->getConnection()->beginTransaction();

      $record = $this->postModel->fill($payload);
      $record->save();

      $this->postModel->getConnection()->commit();

      return $record;
    } catch (\Exception $e) {
      $this->postModel->getConnection()->rollBack();
      throw new \Exception($e);
    }
  }

  public function update($id, $payload)
  {
    try {
      $this->postModel->getConnection()->beginTransaction();

      $record = $this->postModel->newQuery()->find($id);
      $record->fill($payload);
      $record->save();

      $this->postModel->getConnection()->commit();

      return $record;
    } catch (\Exception $e) {
      $this->postModel->getConnection()->rollBack();
      throw new \Exception($e);
    }
  }

  public function delete($id)
  {
    // TODO: Implement delete() method.
  }

  public function findByTitle($title)
  {
    // TODO: Implement findByTitle() method.
  }
}