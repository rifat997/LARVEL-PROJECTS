<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DependancyController extends Controller
{
    public function index(Request $request){
        $data['country'] = DB::table('country')->orderBy('country', 'asc')->get();
        return view('index', $data);
    }

    public function getState(Request $request){
        $country_id = $request->post('country_id');
        $state = DB::table('state')->where('country', $country_id)->orderBy('state', 'asc')->get();
        //print_r($state);
        $html='<option value="">*****Select State*****</option>';
        foreach($state as $item){
            $html .= '<option value=" '.$item->id.' ">'.$item->state.'</option>';
        }
        echo $html;
    }


    public function getCity(Request $request){
        $state_id = $request->post('state_id');
        $city = DB::table('city')->where('state', $state_id)->orderBy('city', 'asc')->get();
        //print_r($state);
        $html='<option value="">*****Select City*****</option>';
        foreach($city as $item){
            $html .= '<option value=" '.$item->id.' ">'.$item->city.'</option>';
        }
        echo $html;
    }
}
