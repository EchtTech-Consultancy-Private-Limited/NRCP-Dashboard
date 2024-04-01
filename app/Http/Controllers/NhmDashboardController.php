<?php

namespace App\Http\Controllers;

use App\Http\Requests\NhmRequest;
use App\Models\NhmDashboard;
use App\Models\State;
use Illuminate\Http\Request;
use App\Services\FileSizeServices;
use Exception;
use Illuminate\Support\Facades\DB;

class NhmDashboardController extends Controller
{
    /**
     *  @ show all list index
     *
     * @return void
     */
    public function index()
    {
        try{
            $breadCrum = "NHM Dashboard";
            $states = State::get();
            return view('nhm.index',compact('states','breadCrum'));
        }catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
    }
    
    /**
     *  @ show create form of nhm 
     *
     * @return void
     */
    public function create()
    {
        try{
            $breadCrum = "NHM Dashboard";
            $states = State::get();
            return view('nhm.create',compact('states','breadCrum'));
        }catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
    }
    
    /**
     *  @store nhm data in table
     *
     * @param  mixed $request
     * @return void
     */
    public function store(NhmRequest $request)
    {
        try{
            DB::beginTransaction();
            $rops = $request->file('rops');
            $supplementaryRops = $request->file('supplementary_rops');
            if ($rops) {
                $ropsSize =  FileSizeServices::getFileSize($rops->getSize());
                $ropsName = $rops->getClientOriginalName();
                $rops->move(public_path('images/uploads/nhm'), $ropsName);
            }
            if ($supplementaryRops) {
                $supplementarySize =  FileSizeServices::getFileSize($supplementaryRops->getSize());
                $supplementaryRopsName = $supplementaryRops->getClientOriginalName();
                $supplementaryRops->move(public_path('images/uploads/nhm'), $supplementaryRopsName);
            }
            NhmDashboard::Create([
                'year' => $request->year,
                'state_id' => $request->state,
                'rops' => $ropsName ?? '',
                'rops_size' => $ropsSize ?? '',
                'supplementary_rops' => $supplementaryRopsName ?? '',
                'supplementary_rops_size' => $supplementarySize ?? '',
            ]);
            DB::commit();
            return redirect()->route('nhm.index')->with('message', 'NHM Add SuccessFull !');
        }catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
    }
    
    /**
     *  @view NHM state wise record
     *
     * @param  mixed $id
     * @return void
     */
    public function view($id)
    {
        try{
            $breadCrum = "NHM Dashboard";
            DB::beginTransaction();
            $nhms = NhmDashboard::with('state')->where('state_id',$id)->get();
            DB::commit();
            return view('nhm.view',compact('nhms','breadCrum'));
        }catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
    }
}
