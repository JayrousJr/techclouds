<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Gallery;
use App\Models\Project;
use App\Models\Service;
use App\Models\ProjectClass;
use App\Models\ServiceOrder;
use Illuminate\Http\Request;
use App\Models\SocialNetwork;

class SiteLinkController extends Controller
{
    public function about()
    {
        // $data['members'] = User::all();
        $data['socialnetwork'] = SocialNetwork::all();
        $members = User::whereIn('role', ['Administrator', 'Manager'])->whereIn('team_member', [1])
            ->select('profile_photo_path', 'name', 'profession', 'languages')
            ->get();

        return view('/site/about', $data, ['members' => $members]);
    }

    public function services()
    {
        $data['services'] = Service::whereIn('is_Active', [1])->get();
        $data['socialnetwork'] = SocialNetwork::all();
        $count = Service::count();
        return view(
            '/site/services',
            $data,
            ['count' => $count]
        );
    }
    public function contact()
    {
        $data['socialnetwork'] = SocialNetwork::all();
        $data['user'] = User::all();
        return view('/site/contact', $data);
    }
    public function gallery()
    {
        $data['socialnetwork'] = SocialNetwork::all();
        $data['images'] = Gallery::orderBy('created_at', 'desc')->get();
        return view('/site/gallery', $data);
    }
    public function viewproject(ServiceOrder $project)
    {
        $data['socialnetwork'] = SocialNetwork::all();
        $data['project'] = $project;
        return view('/site/project-single', $data);
    }
    public function serviceSingle(Service $service)
    {
        $data['socialnetwork'] = SocialNetwork::all();
        $data['service'] = $service;
        return view('/site/service-single', $data);
    }
    public function Projects()
    {
        $data['socialnetwork'] = SocialNetwork::all();
        $count = User::count();
        $data['class'] = ProjectClass::all();
        $data['projects'] = ServiceOrder::all();
        //passing the variables to the view
        return view(
            '/site/project',
            $data,
            ['count' => $count]
        );
    }

    function blog()
    {
        // 
        $data['socialnetwork'] = SocialNetwork::all();
        return view('/site/blog', $data);
    }
}
