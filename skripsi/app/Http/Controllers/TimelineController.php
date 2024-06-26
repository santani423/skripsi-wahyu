<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Timeline;
use Illuminate\Http\Request;

class TimelineController extends Controller
{
    public function indexAdmin()
    {
        $timelines = Timeline::get();
        return inertia('Admin/Timelines/Index', [
            'timelines' => $timelines
        ]);
    }

    public function indexUser(Order $order)
    {
        $timelines = Timeline::get();
        return inertia('User/Timeline', [
            'timelines' => $timelines,
            'order' => $order
        ]);
    }

    public function create()
    {
        return inertia('Admin/Timelines/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
           'name' => 'required'
        ]);

        Timeline::create([
            'name' => $request->name
        ]);

        return to_route('index-timeline');
    }

    public function edit(Timeline $timeline)
    {
        return inertia('Admin/Timelines/Edit', [
            'timeline' => $timeline
        ]);
    }

    public function update(Timeline $timeline, Request $request)
    {
        $request->validate([
            'name' => 'required'
         ]);

         $timeline->update([
            'name' => $request->name
         ]);

         return to_route('index-timeline');
    }

    public function destroy(Timeline $timeline)
    {
        $timeline->delete();
    }
}
