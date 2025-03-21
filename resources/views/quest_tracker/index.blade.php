@extends('layouts.app')

@section('content')


    <div class="container mx-auto p-4">
        <!-- Header -->
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Quest Tracker</h1>
            <a href="{{ route('quests.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Add New Quest</a>
        </div>

        <!-- Quest List -->
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <!-- Table -->
            <table class="min-w-full">
                <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Location</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fraction</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                @foreach($quests as $quest)
                    @php
                        // Always use UTC for calculations
                        $now = now()->utc();
                        $takenDate = $quest->taken_date?->utc();

                        $isAvailable = !$takenDate ||
                            $takenDate->diffInMinutes($now, false) >= $quest->cooldown;

                        $cooldownEnd = $isAvailable ? null : $takenDate->copy()->addMinutes($quest->cooldown);
                    @endphp
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">{{ $quest->name }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-500">{{ $quest->location->label() }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-500">{{ $quest->fraction->label()}}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($isAvailable)
                                <div class="available-indicator">
                                    <span class="badge bg-green-500 text-white px-3 py-1 rounded">Available Now!</span>
                                </div>
                            @else
                                <div class="cooldown-timer"
                                     data-cooldown-end="{{ $cooldownEnd->toIso8601String() }}"
                                     data-quest-id="{{ $quest->id }}">
        <span class="badge bg-yellow-500 text-black px-3 py-1 rounded">
            Available in: <span class="countdown font-mono"></span>
        </span>

                                </div>
                            @endif

                        </td>

                        <td class="px-6 py-4 whitespace-nowrap">
                            <a href="{{ route('quests.take', $quest) }}" class="text-blue-500 hover:text-blue-700 mr-2">Take</a>
                            <a href="{{ route('quests.show', $quest) }}" class="text-blue-500 hover:text-blue-700 mr-2">View</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const updateTimer = (timer) => {
                const endTime = new Date(timer.dataset.cooldownEnd);
                const countdownElement = timer.querySelector('.countdown');
                const now = new Date();

                // Use UTC for calculations
                const utcNow = Date.UTC(
                    now.getUTCFullYear(),
                    now.getUTCMonth(),
                    now.getUTCDate(),
                    now.getUTCHours(),
                    now.getUTCMinutes(),
                    now.getUTCSeconds()
                );

                const diff = endTime.getTime() - utcNow;

                if (diff <= 0) {
                    timer.outerHTML = '<span class="badge bg-green-500 text-white px-3 py-1 rounded">Available Now!</span>';
                    return true;
                }

                // Calculate remaining time using UTC values
                const hours = Math.floor(diff / (1000 * 60 * 60));
                const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((diff % (1000 * 60)) / 1000);

                countdownElement.textContent =
                    `${hours.toString().padStart(2, '0')}:` +
                    `${minutes.toString().padStart(2, '0')}:` +
                    `${seconds.toString().padStart(2, '0')}`;

                return false;
            };

            document.querySelectorAll('.cooldown-timer').forEach(timer => {
                // Clear existing interval if any
                if (timer.intervalId) clearInterval(timer.intervalId);

                // Initial update
                const expired = updateTimer(timer);

                // Start interval if still needed
                if (!expired) {
                    timer.intervalId = setInterval(() => updateTimer(timer), 1000);
                }
            });
        });
    </script>
@endsection
