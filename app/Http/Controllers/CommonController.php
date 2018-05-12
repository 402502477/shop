<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class CommonController extends Controller
{
    protected function feedback($redirect, $message, $type)
    {
        session()->flash('message', $message);
        session()->flash('type', $type);
        return redirect($redirect);
    }

    protected function _toJson(array $array): string
    {
        $json = json_encode($array);
        return $json;
    }

    protected function _toAjax(string $message,string $type = 'information')
    {
        return $this->_toJson([
            'msg'  => $message,
            'type' => $type
        ]);
    }

    protected function _checkIsLoginUser($uid)
    {
        if(Auth::user()->id != $uid)
        {
            return $this->_toAjax(400,__('notices.auth.danger'));
        }
    }
    protected function _checkLogin()
    {
        $id = Auth::id() ?? null;
        if(empty($id))
        {
            return $this->_toAjax(__('notices.auth.danger'),'danger');
        }
    }
}
