<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\ContactMessage;
use App\Models\Module;
use App\Models\Page;
use App\Models\Post;

class DashboardController extends Controller
{
    public function __invoke()
    {
        return view('admin.dashboard', [
            'moduleCount' => Module::count(),
            'activeModuleCount' => Module::active()->count(),
            'pageCount' => Page::count(),
            'postCount' => Post::count(),
            'blogPostCount' => BlogPost::count(),
            'unreadMessages' => ContactMessage::whereNull('read_at')->count(),
            'latestMessages' => ContactMessage::latest()->take(5)->get(),
        ]);
    }
}
