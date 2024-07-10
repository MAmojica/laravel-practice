<?php

namespace App\Http\Livewire\Sidenavigation;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

use App\Models\Modules;
use App\Models\Accessroles;

class Configurations extends Component
{
    public function render()
    {
    	$modules 					= Modules::where('group_id', 700)->pluck('id')->toArray();
    	$accessroles 				= Accessroles::where('user_id', Auth::user()->id)->pluck('module_id')->toArray();
        return view('livewire.sidenavigation.configurations',[
            'modules' 				=> $modules,
            'accessroles' 			=> $accessroles,
        ]);
    }
}
