<?php

namespace App\Http\Controllers;

use App\Fractions;
use App\Locations;
use App\Models\QuestTaken;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class QuestTrackerController extends Controller
{
    public function index(): View
    {
        return view('quest_tracker.index', [
            'quests' => QuestTaken::all()
        ]);
    }

    public function create(): View
    {
        return view('quest_tracker.create', [
            'locations' => Locations::cases(),
            'fractions' => Fractions::cases()
        ]);
    }

    public function show(QuestTaken $quest): View
    {
        return view('quest_tracker.show', compact('quest'));
    }

    public function take(QuestTaken $quest): RedirectResponse
    {
        $quest->update(['taken_date' => now()]);
        return redirect()->route('quests.index');
    }


    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|enum:' . Locations::class,
            'fraction' => 'required|enum:' . Fractions::class,
            'position' => 'nullable|string|max:255',
            'cooldown' => 'required|integer|min:0',
            'npc' => 'nullable|string|max:255'
        ]);

        QuestTaken::create($validated);
        return redirect()->route('quests.index');
    }

    public function edit(QuestTaken $quest): View
    {
        return view('quest_tracker.edit', [
            'quest' => $quest,
            'locations' => Locations::cases(),
            'fractions' => Fractions::cases()
        ]);
    }

    public function update(Request $request, QuestTaken $quest): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|enum:' . Locations::class,
            'fraction' => 'required|enum:' . Fractions::class,
            'position' => 'nullable|string|max:255',
            'cooldown' => 'required|integer|min:0',
            'npc' => 'nullable|string|max:255'
        ]);

        $quest->update($validated);

        return redirect()->route('quests.show', $quest);
    }
    public function destroy(QuestTaken $quest): RedirectResponse
    {
        $quest->delete();
        return redirect()->route('quests.index');
    }
}
