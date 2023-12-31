<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function getAuthUser($guard_name = 'admin') 
    {
        return Auth::guard($guard_name)->user();
    }

    public function checkRolePermission($permission, $guard_name = 'admin') {
        abort_if(!$this->getAuthUser($guard_name)->hasPermissionTo($permission), 403);
    }

    protected function modifyPrivacy($attributes = []) {
        if(! array_key_exists('privacy', $attributes)) {
            return 'private';
        } else {
            return 'public';
        }
    }

    protected function setFile($request, $key, $path)
    {
        if($request->hasFile($key) && $request->file($key)->isValid()) {
            $file_name = uploadImage($request->file($key), $path);
            return $file_name;
        }
    }
}
