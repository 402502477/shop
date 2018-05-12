<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\CommonController;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends CommonController
{
    public function index(Request $rqt)
    {
        $users = User::select('id','name','email','info')->get();
        foreach ($users as &$key)
        {
            $key->info = json_decode($key->info);
        }
        return view('pages.user.index',[
            'users' => $users,
            'title' => __('pages.user'),
            'routeName' => $rqt->route()->getName(),
            //'current_uid' => Auth::id()
        ]);
    }
    public function detail($id)
    {
        $info = User::find($id);
        return view('pages.user.detail',[
            'info' => $info,
            'title' => __('pages.user.detail')
        ]);
    }

    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        //
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        //
    }
    public function destroy(Request $rqt)
    {
        $this->_checkLogin();

        $id = $rqt -> input('id',null);
        if(empty($id))
        {
            return $this->_toAjax(__('content.user.destroy.danger'),'danger');
        }

        if($id == Auth::id())
        {
            return $this->_toAjax(__('notices.handle.danger'),'danger');
        }

        $res = User::destroy($id);
        if($res)
        {
            return $this->_toAjax(__('content.user.destroy.success'),'success');
        }
    }
}
