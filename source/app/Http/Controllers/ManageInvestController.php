<?php

namespace Vanguard\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Vanguard\Http\Requests\User\UpdateUserRequest;
use Vanguard\Invest;
use Vanguard\InvestType;
use Vanguard\Repositories\Invest\InvestRepository;
use Vanguard\Repositories\InvestType\InvestTypeRepository;
use Vanguard\Repositories\User\UserRepository;
use Auth;
use Vanguard\Repositories\BienDong\BienDongRepository;
use Request;
use Vanguard\BienDong;
use Vanguard\Http\Requests\Invest\BienDongRequest;
use Vanguard\Support\Enum\UserStatus;
use Vanguard\User;


/**
 * Class UsersController
 * @package Vanguard\Http\Controllers
 */
class ManageInvestController extends Controller
{

    private $biendong;
    private $invest;
    public function __construct(BienDongRepository $biendong, InvestRepository $invest, InvestTypeRepository $investType)
    {
        $this->middleware('auth');
        $this->middleware('permission:invest.manage');
        $this->biendong = $biendong;
        $this->invest = $invest;
        $this->investType = $investType;
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
    /*
     * controller for manage interest package
     */
    public function listGoiLai()
    {
        $perPage = 10;
        $statusCurr = Input::get('status');
        $listGoiLai = $this->investType->paginate($perPage, '', Input::get('status'));
        foreach ($listGoiLai as $key => &$item) {
            $item->finalInvest = json_decode($item->finalInvest, true);
        }

        return view('manage-interest.list-goi-lai',
            compact('listGoiLai', 'statusCurr')
        );
    }
    public function createGoiLai()
    {
        $edit = false;
        return view('manage-interest.add-goi-lai', compact('edit'));
    }
    public function addGoiLai()
    {
        $params = Input::all();
        $this->investType->create($params);

        return redirect()->route('interest.goi_lai.create')
            ->withSuccess(trans('Tạo gói lãi thành công!'));
    }

    public function editGoiLai($id)
    {
        $edit = true;
        $goiLai = InvestType::find($id);
        $goiLai->finalInvest = json_decode($goiLai->finalInvest, true);

        return view('manage-interest.add-goi-lai', compact('edit', 'goiLai'));
    }
    public function updateGoiLai($id)
    {
        $params = Input::all();
        $this->investType->update($params, $id);

        return redirect()->route('interest.goi_lai.edit',$id)
            ->withSuccess(trans('Cập nhật gói lãi thành công!'));
    }

    public function deleteGoiLai($id)
    {
        $this->investType->delete($id);

        return redirect()->route('interest.goi_lai.list')
            ->withSuccess('Xóa gói lãi thành công!');
    }

    /*
     * controller for manage invest contract
     */

    public function listHopDongDauTu()
    {
        $perPage = 10;
        $statusCurr = Input::get('status');
        $idGoiDauTuCurr = Input::get('goi_dau_tu');
        $idUserCurr = Input::get('nha_dau_tu');
        $listHopDong = $this->invest->paginate($perPage, Input::get('search'), Input::get('nha_dau_tu'),Input::get('goi_dau_tu'), Input::get('status'));
        $listUser = User::where('status', "Active")->get();
        $listTypeInvest = InvestType::where('status', InvestType::STATUS_ACTIVED)->get();

        return view('invest.list-hop-dong-dau-tu',
            compact('listHopDong', 'statusCurr', 'idGoiDauTuCurr', 'idUserCurr', 'listUser', 'listTypeInvest')
        );
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