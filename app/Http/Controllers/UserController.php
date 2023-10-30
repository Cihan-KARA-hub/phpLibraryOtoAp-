<?php

namespace App\Http\Controllers;

use App\Filters\UserFilter;
use App\Http\Controllers\Controller;

use App\Http\Requests\StoreUsersRequest;
use App\Http\Requests\UpdateUsersRequest;
use App\Http\Resources\UsersCollection;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{  




   public function store(StoreUsersRequest $request)
    {
        return User::create($request->all());
    }
    public function show(User $user){
        return new UserResource($user);
    }
    public function update(UpdateUsersRequest $request, User $user)
    {
        return $user->update($request->all());
    }
    public function destroy(string $id)
    {
        return User::destroy($id);
    }
    public function search(string $searchKey){
        
        return new UsersCollection(User::where('name', 'like', "{$searchKey}")->orderBy('updated_at', 'desc')->paginate());
    }
    public function search1(string $searchKeyq){
    return new UsersCollection(User::where('email','like',"{$searchKeyq}")->orderBy('updated_at', 'desc')->paginate());
        
    }
    

   
    
    public function index(Request $request){
        $size=100; 
         if($request->filled('size')){
          $size=$request->size;
      }
         $filter=new UserFilter();
         $filterItems=$filter->transform($request);
         if (count($filterItems) == 0) {
          $notes = User::orderBy('updated_at', 'desc')->paginate($size);
          return new UsersCollection($notes->appends($request->query()));
      } else {
          $notes = User::where($filterItems)->orderBy('updated_at', 'desc')->paginate($size);
          return new UsersCollection($notes->appends($request->query()));
      }
  
     }
  
}
