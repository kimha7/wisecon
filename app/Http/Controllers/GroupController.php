<?php

namespace App\Http\Controllers;

use App\Models\Clients\Group;
use App\Models\Clients\Client;
use Illuminate\Http\Request;
use Session;


class GroupController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:manage-groups');
        $this->middleware('permission:manage-clients', ['only' => ['show','index']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Group::all()->sortByDesc('created_at');
        return view('site/groups/index')->withGroups($groups);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('site.groups.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(
            $request, [
            'name' => 'required|string|unique:groups|max:255',
            'landmark' => 'required|string|max:255',
            ]
        );


        $group = new Group;
        $group->name = $request->name;
        $group->landmark = $request->landmark;
        $group->save();

        Session::flash('success', $group->name . ' has been added');
        return redirect()->route('groups.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Group $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        $groups = Group::all();
        $clients = $group->clients()->get();
        return view('site/groups/show')->with(['clients' => $clients, 'group' => $group, 'groups' => $groups]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Group $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {
        return view('site.groups.edit')->with(['group'=>$group]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Group        $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group)
    {
        $this->validate(
            $request, [
            'name' => 'required|string|unique:groups|max:255',
            'landmark' => 'required|string|max:255',
            ]
        );

        $group->name = $request->name;
        $group->landmark = $request->landmark;
        $group->save();

        Session::flash('success', 'Group has been edited');
        return redirect()->route('groups.show', $group);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Group $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        //
    }

    public function transfer(Request $request, Group $group )
    {
        $this->validate(
            $request, [
            'client_id' => 'required|numeric',
            'group_id' => 'required|numeric',
            ]
        );

        $client = Client::find($request->client_id);
        $client->groups()->sync([$request->group_id]);
        $new_group = Group::find($request->group_id);

        Session::flash('success', $client->first_name . ' ' . $client->last_name . ' has been transfered to ' . $new_group->name);
        return redirect()->route('groups.show', $group);
    }
}
