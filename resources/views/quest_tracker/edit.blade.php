@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8 max-w-4xl">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">
            {{ isset($quest) ? 'Edit' : 'Create' }} Quest
        </h1>

        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg">
                <strong>There were some errors with your submission:</strong>
                <ul class="list-disc ml-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ isset($quest) ? route('quests.update', $quest) : route('quests.store') }}" method="POST" class="bg-white shadow-md rounded-lg p-6">
            @csrf
            @isset($quest)
                @method('PUT')
            @endisset

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Quest Name -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">Quest Name</label>
                    <input type="text" name="name" required
                           value="{{ old('name', $quest->name ?? '') }}"
                           class="w-full px-3 py-2 border rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('name') border-red-500 @enderror">
                    @error('name')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Cooldown -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">Cooldown (minutes)</label>
                    <input type="number" name="cooldown" min="0" required
                           value="{{ old('cooldown', $quest->cooldown ?? '') }}"
                           class="w-full px-3 py-2 border rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('cooldown') border-red-500 @enderror">
                    @error('cooldown')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Location Select -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">Location</label>
                    <select name="location" required
                            class="w-full px-3 py-2 border rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('location') border-red-500 @enderror">
                        @foreach($locations as $location)
                            <option value="{{ $location->value }}"
                                {{ old('location', optional($quest->location)->value ?? '') == $location->value ? 'selected' : '' }}>
                                {{ $location->label() }}
                            </option>
                        @endforeach
                    </select>
                    @error('location')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Fraction Select -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">Fraction</label>
                    <select name="fraction" required
                            class="w-full px-3 py-2 border rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('fraction') border-red-500 @enderror">
                        @foreach($fractions as $fraction)
                            <option value="{{ $fraction->value }}"
                                {{ old('fraction', optional($quest->fraction)->value ?? '') == $fraction->value ? 'selected' : '' }}>
                                {{ $fraction->label() }}
                            </option>
                        @endforeach
                    </select>
                    @error('fraction')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Position -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">Position</label>
                    <input type="text" name="position" required
                           value="{{ old('position', $quest->position ?? '') }}"
                           class="w-full px-3 py-2 border rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('position') border-red-500 @enderror">
                    @error('position')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- NPC -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">NPC</label>
                    <input type="text" name="npc" required
                           value="{{ old('npc', $quest->npc ?? '') }}"
                           class="w-full px-3 py-2 border rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('npc') border-red-500 @enderror">
                    @error('npc')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Buttons -->
            <div class="col-span-full flex justify-end space-x-4 mt-6">
                <a href="{{ route('quests.index') }}"
                   class="px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Cancel
                </a>
                <button type="submit"
                        class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    {{ isset($quest) ? 'Update' : 'Create' }} Quest
                </button>
            </div>
        </form>
    </div>
@endsection
