<?php

namespace Vanguard\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Vanguard\Http\Requests\User\UpdateUserRequest;
use Vanguard\Repositories\User\UserRepository;
use Auth;
use Vanguard\Repositories\InvestType\InvestTypeRepository;
use Vanguard\Repositories\BienDong\BienDongRepository;
use Request;
use Vanguard\BienDong;
use Vanguard\Http\Requests\Invest\BienDongRequest;
use Vanguard\Support\Enum\UserStatus;


/**
 * Class UsersController
 * @package Vanguard\Http\Controllers
 */
class ManageInvestController extends Controller
{

    private $biendong;
    public function __construct(BienDongRepository $biendong)
    {
        $this->biendong = $biendong;
    }
    public function listLaiBienDong()
    {
        $perPage = 10;
        $statusCurr = Input::get('status');
        $listLaiBienDong = $this->biendong->paginate($perPage, '', Input::get('status'));

        return view('manage-interest.list-lai-bien-dong', compact('listLaiBienDong', 'statusCurr'));
    }
    public function createLaiBienDong()
    {
        return view('manage-interest.add-lai-bien-dong', array());
    }
    public function addLaiBienDong()
    {
        $params = Input::all();
        $this->biendong->create($params);

        return redirect()->route('interest.lai_bien_dong.create')
            ->withSuccess(trans('Tạo lãi biến động thành công!'));
    }

    public function editLaiBienDong($id)
    {
        $edit = true;
        $biendong = BienDong::find($id);

        return view('manage-interest.add-lai-bien-dong', compact('edit', 'biendong'));
    }
    public function updateLaiBienDong($id)
    {
        $params = Input::all();
        $this->biendong->update($params, $id);

        return redirect()->route('interest.lai_bien_dong.edit',$id)
            ->withSuccess(trans('Cập nhật lãi biến động thành công!'));
    }
}