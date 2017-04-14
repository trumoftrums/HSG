<?php

namespace Vanguard\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Vanguard\Http\Requests\User\UpdateUserRequest;
use Vanguard\Invest;
use Vanguard\Repositories\Invest\InvestRepository;
use Vanguard\Repositories\User\UserRepository;
use Auth;
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
    private $invest;
    public function __construct(BienDongRepository $biendong, InvestRepository $invest)
    {
        $this->biendong = $biendong;
        $this->invest = $invest;
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
        $edit = false;
        return view('manage-interest.add-lai-bien-dong', compact('edit'));
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

    public function deleteLaiBienDong($id)
    {
        $this->biendong->delete($id);

        return redirect()->route('interest.lai_bien_dong.list')
            ->withSuccess('Xóa lãi suất biến động thành công!');
    }

    public function createGoiLai()
    {
        return view('manage-interest.add-goi-lai', array());
    }

    public function listHopDongDauTu()
    {
        $perPage = 10;
        $statusCurr = Input::get('status');
        $listHopDong = $this->invest->paginate($perPage, Input::get('search'), Input::get('status'));

        return view('invest.list-hop-dong-dau-tu', compact('listHopDong', 'statusCurr'));
    }

    public function deleteHopDongDauTu($id)
    {
        $this->invest->updateStatus(Invest::STATUS_DELETED,$id);

        return redirect()->route('interest.list-hop-dong-dau-tu')
            ->withSuccess('Xóa hợp đồng thành công!');
    }

    public function updateHopDongDauTu($id)
    {
        $this->invest->updateStatus(Invest::STATUS_ACTIVED,$id);

        return redirect()->route('interest.list-hop-dong-dau-tu')
            ->withSuccess('Kích hoạt hợp đồng thành công!');
    }
}