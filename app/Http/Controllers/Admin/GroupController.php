<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\AdminServices\GroupService;
use App\Http\Requests\AdminRequests\EditGroupRequest;
use App\Http\Requests\AdminRequests\StoreGroupRequest;

class GroupController extends Controller
{
    protected  $groupService;

    public function __construct(GroupService $groupService)
    {
        $this->groupService = $groupService;
    }

    public function index()
    {
        return $this->groupService->getAllGroups();
    }


    public function create()
    {
        return $this->groupService->createGroupPage();
    }


    public function store(StoreGroupRequest $request)
    {
        return $this->groupService->storeGroup($request);
    }


    public function edit(string $groupId)
    {
        return $this->groupService->editGroupPage($groupId);
    }


    public function update(EditGroupRequest $request, int $groupId)
    {
        return $this->groupService->updateGroup($request , $groupId);
    }


    public function destroy(int $groupId)
    {
        return $this->groupService->deleteGroup($groupId);
    }
}