<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Models\User;
use App\Models\Checklist;
use App\Services\ChecklistService;
// use Illuminate\Support\Facades\Auth;

class ChecklistController extends Controller
{
    public function show(Checklist $checklist) :View
    {
    	//sync_checklist from admin
    	(new ChecklistService())->sync_checklist($checklist, auth()->id());

    	return view('users.checklists.show', compact('checklist'));
    }
}
