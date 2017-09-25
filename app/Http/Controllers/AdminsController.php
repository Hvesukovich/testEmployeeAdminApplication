<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AdminsController extends Controller
{
    //getAllAdmins
    function getAllAdmins() {
        $Admins = new User();
        $admins = $Admins->getAdmins();

        return view('admins', ['admins'=>$admins]);
    }

    function editAdmin($id = 0) {
        if ($id != 0) {
            $Admins = new User();
            $admin = $Admins->find($id);
            return view('adminEdit', ['admin'=>$admin]);
        } else {
            return view('adminEdit');
        }
    }

    function adminEditSave() {
        $input = \Request::all();
//        dd($input);
//        dd($_FILES);
        if ((isset($input['firstName']) && $input['firstName'] != '') &&
            (isset($input['lastName']) && $input['lastName'] != '') &&
            (isset($input['dateOfBirth']) && $input['dateOfBirth'] != '') &&
            (isset($input['email']) && $input['email'] != '') &&
            (isset($input['password']) && $input['password'] != '') &&
            (isset($input['adress']) && $input['adress'] != ''))
        {
            $src_photo = 'images/';
            if ((isset($_FILES["upload"]) && ($_FILES["upload"]['tmp_name']) != '')) {
                $info_file = pathinfo($_FILES["upload"]["name"]);
                $rand = md5(microtime());
                $name = "$rand." . $info_file['extension'];
                $src_photo .= $name;
                move_uploaded_file($_FILES["upload"]["tmp_name"], $src_photo);
                $src_photo = "../../". $src_photo;
            } else {
                $src_photo = '../../images/holder.jpg';
            }

            $Admins = new User();
            if (isset($input['id']) && $input['id'] != '') {
                $Admins->find($input['id'])->update([
                    'firstName' => $input['firstName'],
                    'lastName' => $input['lastName'],
                    'DateOfBirth' => $input['dateOfBirth'],
                    'email' => $input['email'],
                    'password' => $input['password'],
                    'adress' => $input['adress'],
                    'img' => $src_photo
                ]);
            } else {
                $Admins->create([
                    'firstName' => $input['firstName'],
                    'lastName' => $input['lastName'],
                    'DateOfBirth' => '2017-05-14',
                    'email' => $input['email'],
                    'password' => $input['password'],
                    'adress' => $input['adress'],
                    'img' => $src_photo
                ]);
            }
            return \Redirect::action('AdminsController@getAllAdmins');
        }

    }

    function delAdmin($id) {
        if ($id) {
            $Admins = new User();
            $Admins->find($id)->delete();

            return \Redirect::action('AdminsController@getAllAdmins');
        }
    }

    function adminDetails($id) {
        if ($id) {
            $Admins = new User();
            $admin = $Admins->find($id);
            return view('admin-details', ['admin'=>$admin]);
        }
    }
}
