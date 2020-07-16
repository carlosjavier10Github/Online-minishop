<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{


	public function userLogued(Request $request){
		if ($request->ajax()){
			$user = Auth::user();
			if (Auth::id() != null){
				$userId = Auth::id();
				return response()->json([
					'success' => true,
					'userId' =>  $userId,
					'user' =>  $user,
				] , 200);
			}
			else
			{
				return response()->json([
					'success' => true,
					'userId' =>  false,
				] , 200);

			}

		}

	}
}
