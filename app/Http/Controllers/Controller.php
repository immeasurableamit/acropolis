<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;


define('PROFILE_PICTURE_IMAGE_PATH', public_path().DIRECTORY_SEPARATOR.'files'.DIRECTORY_SEPARATOR.'users');
define('PROFILE_PICTURE_IMAGE_URL', url('/files/users'));

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
