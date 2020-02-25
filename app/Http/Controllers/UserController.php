<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __invoke(Request $request)
    {
        $users = User::query()
            ->when($request->has('search'), function (Builder $query) use ($request) {
                $param = '%' . $request->get('search') . '%';
                $query
                    ->where('name', 'like', $param)
                    ->orWhere('email', 'like', $param);
            })->when($request->has('sortBy'), function (Builder $query) use ($request) {
                $query->orderBy($request->get('sortBy'), $request->get('direction'));
            })
            ->paginate(10)
            ->appends($request->only(['search', 'sortBy', 'direction']));

        if ($request->ajax()) {
            return $this->noCacheView('users.partial', compact('users'));
        }

        return view('users.index', compact('users'));
    }
}
