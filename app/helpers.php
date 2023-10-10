<?php


function state_list(){
    $states = DB::table('states')->get();
      return $states;
}

function district_list(){
    $district = DB::table('district')->get();
       return $district;
}




?>
