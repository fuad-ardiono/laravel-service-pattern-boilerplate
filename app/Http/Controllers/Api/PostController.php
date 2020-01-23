<?php

namespace App\Http\Controllers\Api;

use App\Services\Post\Contract as PostContract;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
  public function index()
  {
    echo "Hello post controller";
  }

  public function store(Request $request, PostContract $postService)
  {
    try {
      $input = $request->only(['title', 'body', 'primary_image', 'secondary_image']);
      $post = $postService->create($input);

      return $this->responseCreated($post);
    } catch (\Exception $error) {
      return $this->responseException($error);
    }
  }

  public function update($id, Request $request, PostContract $postService)
  {
    try {
      $input = $request->only(['body', 'primary_image', 'secondary_image']);
      $post = $postService->update($id, $input);

      return $this->responseOk($post);
    } catch (\Exception $error) {
      return $this->responseException($error);
    }
  }
}
