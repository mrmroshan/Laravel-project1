<?php

namespace App\Http\Controllers;

use \Illuminate\Http\Request;

use App\NiceAction;

use App\NiceActionLog;

use DB;

class NiceActionController extends Controller
{
   
   public function getHome()
   {
       $actions = NiceAction::orderBy('niceness' , 'desc')->get();
       
       $logged_actions = NiceActionLog::all();
       
       $query = "";
       
       /* //filtering results
       //nice_action here is not table name but the method specified in NiceActionCtrl.
       $logged_actions = NiceActionLog::whereHas('nice_action',function($query){
           $query->where('name','=','kiss');
       })->get();
       */
       /*
       $query = DB::table('nice_action_logs')
                    ->join('nice_actions','nice_action_logs.nice_action_id', '=', 'nice_actions.id')
                    ->where('nice_actions.name','=','kiss')
                    ->get();
        */
        
        //
        //$query = DB::table('nice_action_logs')
        //        ->insertGetId([
        //            'nice_action_id' => DB::table('nice_actions')->select('id')->where('name','=', 'Hug' )->first()->id 
        //            ]);
                    
        //update example
        $hug = NiceAction::where('name', '=', 'Hug')->first();
        if($hug){
            $hug->name = 'Smail and Hug';
            $hug->update();
        }
        
        //delete example
        $wave = NiceAction::where('name','=', 'Greet')->first();
        if($wave){
            $wave->delete();
        }
        
       return view('home',['actions' => $actions,'logged_actions' => $logged_actions,'db'=> $query]);
   }
   
    public function getNiceAction($action,$name = null)
    {
        if($name === null){
            $name = 'You';
        }
        $nice_action = NiceAction::where('name',$action)->first();
        $nice_action_log  = new NiceActionLog();
        $nice_action->logged_actions()->save($nice_action_log);
         
        return view('actions.nice' , ['action'=> $action,'name' => $name]);
    }
    
    public function postInsertNiceAction(Request $request)
    {
        $this->validate($request,[
                'name' => 'required|alpha|unique:nice_actions',
                'niceness' => 'required|numeric'
            ]);
            $action = new NiceAction();
            $action->name = ucfirst ( strtolower($request['name']));
            $action->niceness = $request['niceness'];
            $action->save();
            
            $actions = NiceAction::all();
            
        return redirect()->route('home',['actions' => $actions]);
    }
    
    private function transformName($name)
    {
        $prefix = 'KING ';
        return $prefix.strtoupper($name);
    }
}