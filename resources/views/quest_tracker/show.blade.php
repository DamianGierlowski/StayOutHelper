@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto px-4 py-6">
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="p-6 border-b border-gray-200">
                <div class="flex items-center justify-between mb-4">
                    <a href="{{ route('quests.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 transition-colors">
                        Back
                    </a>
                    <h2 class="text-2xl font-bold text-gray-800">{{ $quest->name }}</h2>
                </div>
            </div>

            <div class="p-6">
                <dl class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="flex">
                        <dt class="w-1/3 font-medium text-gray-600">Location:</dt>
                        <dd class="w-2/3 text-gray-800">{{ $quest->location->label() }}</dd>
                    </div>

                    <div class="flex">
                        <dt class="w-1/3 font-medium text-gray-600">Fraction:</dt>
                        <dd class="w-2/3 text-gray-800">{{ $quest->fraction->label() }}</dd>
                    </div>

                    <div class="flex">
                        <dt class="w-1/3 font-medium text-gray-600">Position:</dt>
                        <dd class="w-2/3 text-gray-800">{{ $quest->position }}</dd>
                    </div>

                    <div class="flex">
                        <dt class="w-1/3 font-medium text-gray-600">Cooldown:</dt>
                        <dd class="w-2/3 text-gray-800">{{ $quest->cooldown }} hours</dd>
                    </div>

                    <div class="flex">
                        <dt class="w-1/3 font-medium text-gray-600">Taken Date:</dt>
                        <dd class="w-2/3 text-gray-800">
                            {{ optional($quest->taken_date)->format('M d, Y') ?? 'N/A' }}
                        </dd>
                    </div>

                    <div class="flex">
                        <dt class="w-1/3 font-medium text-gray-600">NPC:</dt>
                        <dd class="w-2/3 text-gray-800">{{ $quest->npc }}</dd>
                    </div>
                </dl>
            </div>

            <div class="p-6 border-t border-gray-200 flex gap-3">
                <a href="{{ route('quests.edit', $quest) }}" class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600 transition-colors">
                    Edit
                </a>

                <form action="{{ route('quests.destroy', $quest) }}" method="POST">
                    @csrf @method('DELETE')
                    <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 transition-colors">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
