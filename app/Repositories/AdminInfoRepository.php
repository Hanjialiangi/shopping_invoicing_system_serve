<?php

namespace App\Repositories;

use Czim\Repository\BaseRepository;
use App\Models\AdminInfo;
use App\Models\Auth;
use App\Models\ControlCenter;


class AdminInfoRepository extends BaseRepository
{
    public function model()
    {
        return AdminInfo::class;
    }

    /**
     * 登陆
     */
    public function login($request)
    {
        $account = $request->account;
        $password = $request->password;

        $result = AdminInfo::where('account',$account);
        if($result){
            $pass = AdminInfo::where('account',$account)->value('password');
            if($pass ===md5($password))
            {
                $token = $this->saveToken($account);
                return ['data'=>'success','token'=>$token];
            }
        }
        return ['data'=>'fail'];
    }

    /**
     * 保存token
     */
    public function saveToken($account)
    {
        $token = md5(strtotime('now'));
        $result = Auth::create([
            'account'=>$account,
            'token'=>$token
        ]);
        return $result->token;
    }

    /**
     * 验证登陆
     */
    public function verify($request)
    {
        $token = $request->token; //获取token
        $result = Auth::where('token',$token)->value('account');
        if(!$result){
            return ['message'=>'无效token'];
        }
        return ['data'=>$result];
    }
}