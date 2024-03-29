<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use Iluminate\Support\Facades\Validator;
use Iluminate\Support\Facades\DB;
use App\Helpers\CustomHelper;

class AccountController extends Controller
{
    private $roles;
    function __construct(){
        $this->roles = [
            ['id' => '', 'name' => '-- Seleccionar --'],
            ['id' => 'USER', 'name' => 'Usuario'],
            ['id' => 'ADMIN', 'name' => 'Admin'],
            ['id' => 'DEV', 'name' => 'Developer']
        ]; 
    }

    function index(){
        $users = \DB::select("
            SELECT 
                account.id,
                profile.id as profile_id,
                account.username,
                account.status,
                CONCAT(profile.name,' ',profile.lastname) as name,
                profile.document,
                profile.email,
                profile.birth_date,
                profile.role,
                profile.image,
                account.create_at,
                account.update_at
            FROM account  
            INNER JOIN profile ON profile.account_id = account.id
            WHERE 1
        ");
        return view('user.index', [
            'users' => $users
        ]);
    }

    function new(){
        return view("user.new", [
            'page_title' => 'Nuevo',
            'roles' => $this->roles
        ]);
    }

    function create(UserCreateRequest $request){   
        $name_array = str_split($request->input('name'));
        $user_generate = strtolower($name_array[0].$request->input('lastname'));
        $dataAccount = [
            'username' => $user_generate,
            'password' => $request->input('document'),
            'status' => 'I'
        ];
        \DB::table('account')->insert($dataAccount);
        $idAccount = \DB::getPdo()->lastInsertId();
        

        $dataProfile = [
            'account_id' => $idAccount,
            'name' => $request->input('name'),
            'lastname' => $request->input('lastname'),
            'document' => $request->input('document'),
            'email' => $request->input('email'),
            'birth_date' => $request->input('birth_date'),
            'image' => '',
            'role' => $request->input('role')
        ]; 
        \DB::table('profile')->insert($dataProfile);
        $idProfile = \DB::getPdo()->lastInsertId();

        
        return redirect('/')->with('success', 'Usuario creado con exito.');
    }

    function edit($id){
        $user_data = \DB::table('account')
        ->select(
            "account.id",
            "profile.id as profile_id",
            "profile.name",
            "profile.lastname",
            "profile.document",
            "account.username",
            "account.status",
            "profile.email",
            "profile.birth_date",
            "profile.role",
            "profile.image",
            "account.create_at",
            "account.update_at"
        )
        ->join('profile', 'account.id', '=', 'profile.account_id')
        ->where('account.id',$id)->first();
        
        
        return view("user.edit", [
            'page_title' => 'Editar',
            'user' => $user_data,
            'roles' => $this->roles
        ]);
    }

    function update(UserUpdateRequest $request){
        $profile_edit_data = $request->all();
        $profile = \DB::table('profile')
            ->where('id', $profile_edit_data['profile_id'])->first();
        $profile_data = (array) $profile;
        $profile_update_data = verifyEditData($profile_data, $profile_edit_data);

        if (!empty($profile_update_data)){
            $affected_pf = \DB::table('profile')->where('account_id',$profile_edit_data['id'])
            ->update($profile_update_data);
            return redirect()->back()->with('success', 'Datos actualizados con exito.');
        }
        
    }

    function delete($id){
        $result = \DB::table('account')
            ->where('id', $id)->delete();        
        return redirect('/')->with('success', 'Usuario eliminado.');
    }

}
