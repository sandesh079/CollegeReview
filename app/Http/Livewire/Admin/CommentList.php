<?php

namespace App\Http\Livewire\Admin;

use App\Models\Comments;
use Livewire\Component;
use DB;
class CommentList extends Component
{
    public function deletecomment($id)
    {
        DB::table('Comments')->where('id', $id)->delete();
        session()->flash('success', 'Records Deleted');
    }

    public function render()
    {
        $commentLists = Comments::all();
        return view('livewire.admin.comment-list',['commentLists'=>$commentLists]);
    }
}
