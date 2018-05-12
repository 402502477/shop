<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\CommonController;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends CommonController
{
    public function index(Request $rqt)
    {
        $user = Auth::user();
        $info = json_decode( $user->info ) ?? null;

        return view('pages.profile',[
            'notify' => [
                'type' => session()->get('type'),
                'msg' => session()->get('message'),
            ],
            'data' => $user,
            'info' => $info,
            'routeName' => $rqt -> route() -> getName(),
            'title' => __('pages.profile')
        ]);
    }
    public function getProfile()
    {
        $user = Auth::user();
        $info = json_decode( $user->info,1 ) ?? [];
        return $this->_toJson($info);
    }

    public function create()
    {
        //
    }

    public function store()
    {
    }

    public function show($id)
    {
        //
    }

    public function edit($id,Request $request)
    {
        $this->_checkIsLoginUser($id);
        $user = User::find($id);

        $this->validate($request, [
            'firstName' => 'nullable|max:10',
            'lastName' => 'nullable|max:10',
            'contact' => 'nullable|integer',
            'birthday' => 'nullable|date|max:10',
            'address' => 'nullable|string|max:200',
            'city' => 'nullable|string|max:50',
            'country' => 'nullable|string|max:50',
            'postal' => 'nullable|integer',
            'aboutMe' => 'nullable|string|max:255',
            'avatar_text' => 'nullable|string'
        ]);
        $data = $request -> input();
        $data['avatar'] = $data['avatar_text'];
        unset($data['_token']);
        unset($data['avatar_text']);

        $file = $request -> file('avatar');
        if($file)
        {
            $this->validate($request, [
                'avatar'  => 'nullable|image'
            ]);
            $fileName = $this->_fileUpload($file);
            $this->_deleteAvatar( $user->info );
            $data['avatar'] = $fileName;
        }


        $user -> info = json_encode($data);
        $res = $user -> save();
        if($res)
        {
            return $this->_toAjax(__('notices.update.success'));
        }
        return $this->_toAjax(__('notices.update.danger'));
    }

    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
    protected function _fileUpload($fileObject)
    {
        $path = 'assets/upload/avatar/'.date('Ymd',time()).'/';
        $fileType = $fileObject->getClientOriginalExtension();
        $fileName = md5(time().rand(10000,9999)).'.'.$fileType;
        $fileObject ->move($path,$fileName);
        return  $path.$fileName;
    }
    protected function _deleteAvatar($userInfo)
    {
        $info =json_decode($userInfo);
        $avatar = $info -> avatar ?? null;
        if($avatar)
        {
            $file = Storage::disk('local');
            if($file->exists($info->avatar))
            {
                $file->delete($info->avatar);
            }
        }

    }
}
