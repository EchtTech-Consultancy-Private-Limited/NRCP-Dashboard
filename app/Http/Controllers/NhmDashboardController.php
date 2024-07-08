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
            $nhmExist = NhmDashboard::where(['year' => $request->year,'state_id' => $request->state])->exists();
            if ($nhmExist) {
                return redirect()->route('nhm.index')->with('error', 'NHM entry for this year already exists !');
            }
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
            $nhms = NhmDashboard::with('state')->where('state_id',$id)->orderBy('year', 'desc')->get();
            DB::commit();
            return view('nhm.view',compact('nhms','breadCrum'));
        }catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
            
        }
    }
    
    /**
     *  @edit get nhm record for edit
     *
     * @param  mixed $id
     * @return void
     */
    public function edit($id){
        try{
            $breadCrum = "NHM Dashboard";
            DB::beginTransaction();
            $states = State::get();
            $nhm = NhmDashboard::with('state')->where('id',$id)->first();
            DB::commit();
            return view('nhm.edit',compact('nhm','breadCrum','states'));
        }catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
    }    
    /**
     * update nhms record
     *
     * @param  mixed $id
     * @return void
     */
    public function update(NhmRequest $request, $id = ''){
        try{
            DB::beginTransaction();
            // $nhmExist = NhmDashboard::where(['year' => $request->year,'state_id' => $request->state])->exists();
            // if ($nhmExist) {
            //     return back()->with('error', 'NHM entry for this year already exists !');
            // }
            $rops = $request->file('rops');
            $supplementaryRops = $request->file('supplementary_rops');
            if ($rops) {
                $ropsSize =  FileSizeServices::getFileSize($rops->getSize());
                $ropsName = $rops->getClientOriginalName();
                $rops->move(public_path('images/uploads/nhm'), $ropsName);
            }else{
                $ropsName = $request->old_rops;
            }
            if ($supplementaryRops) {
                $supplementarySize =  FileSizeServices::getFileSize($supplementaryRops->getSize());
                $supplementaryRopsName = $supplementaryRops->getClientOriginalName();
                $supplementaryRops->move(public_path('images/uploads/nhm'), $supplementaryRopsName);
            }else{
                $supplementaryRopsName = $request->old_supplementary_rops;
            }
            NhmDashboard::where('id', $id)->Update([
                'year' => $request->year,
                'state_id' => $request->state,
                'rops' => $ropsName ?? '',
                'rops_size' => $ropsSize ?? '',
                'supplementary_rops' => $supplementaryRopsName ?? '',
                'supplementary_rops_size' => $supplementarySize ?? '',
            ]);
            DB::commit();
            return redirect()->route('nhm.index')->with('message', 'NHM Update SuccessFull !');
        }catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
    }
    
    /**
     * destroy
     *
     * @param  mixed $id
     * @return void
     */
    public function destroy($id)
    {
        NhmDashboard::where('id', $id)->delete();
        return redirect()->route('nhm.index')->with(['error'=>"NHM Deleted successfully.",'alert-type' => 'success','success'=>'1', 'tr'=>'tr_'.$id]);
    }
}
