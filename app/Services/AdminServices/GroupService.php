<?php

namespace App\Services\AdminServices;

use App\Models\Group;

class GroupService
{

    public function  getAllGroups()
    {

        $groups = Group::paginate(15);
        return view('Dashboard.Group.groups', compact('groups'));
    }

    public function createGroupPage()
    {

        return view("Dashboard.Group.AddGroup");
    }

    public function storeGroup($request)
    {

        $data = $request->validated();
        $group =  Group::create($data);
        if ($group) return  redirect()->route('groups');
    }

    public function editGroupPage($groupId)
    {
        $group =  Group::findOrFail($groupId);
        return view("Dashboard.Group.EditGroup", compact('group'));
    }

    public function updateGroup($request, $groupId)
    {
        $data = $request->validated();
        $group = Group::where('id', '=', $groupId)->first();
        $group->update($data);

        if ($group) return redirect()->route('groups', ['groupId' => $groupId]);
    }

    public function deleteGroup($groupId)
    {
        $group = Group::where('id', '=', $groupId)->first();
        $group->delete();

        if ($group) return redirect()->route('groups');
    }
}