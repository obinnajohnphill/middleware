<?php
/**
 * Created by PhpStorm.
 * User: obinna
 * Date: 24/03/18
 * Time: 12:02
 */

namespace App\Http\Controllers ;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

use App\Members;


class MembersController extends Controller
{
    public function processForm() {
        $searchItem = Input::get('searchItem') ;
        return Redirect::to('members/'. $searchItem) ;
    }

    public function show($searchItem) {
        $result = Members::where('title','like',"%$searchItem%")
            ->orwhere('firstname','like',"%$searchItem%")
            ->orwhere('lastname','like',"%$searchItem%")
            ->orwhere('email','like',"%$searchItem%")
            ->orderBy('firstname', 'ASC')->get();
        return view('result')->with('name', $result);
    }


}