<?php

namespace App\Http\Livewire\Admin;

use App\Models\User as ModelsUser;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class User extends Component
{
    use WithPagination;
    public function render()
    {
        $users = ModelsUser::where('type','user')->paginate(4);
        $latest=  DB::table('users')->where('type','user')->latest('created_at')->first();
        $count  = DB::table('users')->where('type','user')->count();
        return view('livewire.admin.user',['users'=>$users,'latest'=>$latest,'count'=>$count]);
    }
}
