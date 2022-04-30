<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\AdminInfoRepository;

class AdminInfoController extends Controller
{
    private $adminInfoRepository;

    public function __construct(AdminInfoRepository $adminInfoRepository)
    {
        $this->adminInfoRepository = $adminInfoRepository;
    }

    /**
     * 登陆
     */
    public function login(Request $request)
    {
        return $this->adminInfoRepository->login($request);
    }


    /**
     * 验证
     */
    public function verify(Request $request)
    {
        return $this->adminInfoRepository->verify($request);
    }
}