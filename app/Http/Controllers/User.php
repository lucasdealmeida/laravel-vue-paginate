<?php

namespace App\Http\Controllers;

use App\User as UserModel;
use Illuminate\Http\Request;

class User extends Controller
{
    public function __invoke(Request $request)
    {
        $users = UserModel::when($request->has('search'), function($query) use ($request){
            $param = '%' . $request->get('search') . '%';
            $query
                ->where('name', 'like', $param)
                ->orWhere('email', 'like', $param);
        })->when($request->has('sortBy'), function($query) use ($request){
            $query->orderBy($request->get('sortBy'), $request->get('direction'));
        })
            ->paginate(10)
            ->appends($request->only(['search', 'sortBy', 'direction']));

        if ($request->ajax()){
            return view('partial', compact('users'));
        }

        return view('users', compact('users'));
    }
}
