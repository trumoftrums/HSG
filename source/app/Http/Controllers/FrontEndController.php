<?php

namespace Vanguard\Http\Controllers;

use Intervention\Image\Gd\Commands\InvertCommand;
use Vanguard\Invest;
use Vanguard\News;
use Vanguard\Repositories\Activity\ActivityRepository;
use Vanguard\Repositories\User\UserRepository;
use Vanguard\Support\Enum\UserStatus;
use Auth;
use Carbon\Carbon;

class FrontEndController extends Controller
{
    /**
     * @var UserRepository
     */
    private $users;
    /**
     * @var ActivityRepository
     */
    private $activities;

    /**
     * DashboardController constructor.
     * @param UserRepository $users
     * @param ActivityRepository $activities
     */
    public function __construct(UserRepository $users, ActivityRepository $activities)
    {
        //$this->middleware('auth');
        $this->users = $users;
        $this->activities = $activities;
    }

    /**
     * Displays dashboard based on user's role.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('frontend.home', array());
    }

    public function tuyendung()
    {
        return view('frontend.tuyen-dung', array());
    }
    public function lienhe()
    {
        return view('frontend.lien-he', array());
    }
    public function giaiphapdautu()
    {
        return view('frontend.giai-phap-dau-tu', array());
    }
    public function hosocongty()
    {
        return view('frontend.ho-so-cong-ty', array());
    }
    public function nhansu()
    {
        return view('frontend.nhan-su', array());
    }
    public function doitac()
    {
        return view('frontend.doi-tac', array());
    }
    public function baocaotaichinh()
    {
        return view('frontend.bao-cao-tai-chinh', array());
    }
    public function hoidap()
    {
        return view('frontend.hoi-dap', array());
    }
    public function tintuc()
    {
        return view('frontend.tin-tuc', array());
    }
    public function dautu()
    {
        return view('frontend.dau-tu', array());
    }
    public function quanlytaichinhcanhan()
    {
        return view('frontend.dau-tu', array());
    }

}