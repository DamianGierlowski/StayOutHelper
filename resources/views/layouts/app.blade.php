<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Quest Manager</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100">
@livewireScripts
<div class="flex h-screen">
    <!-- Left Sidebar -->
    <nav class=" text-gray-800 w-64 min-h-screen flex flex-col">
        <div class="p-4">
            <h1 class="text-2xl font-bold">
                <i class="fas fa-dungeon mr-2"></i>Stay Out Helper
            </h1>
        </div>

        <div class="flex-1 flex flex-col justify-between">
            <!-- Main Navigation -->
            <ul class="p-2 space-y-1">
{{--                <li>--}}
{{--                    <a href="#" class="flex items-center p-3 hover:bg-blue-700 rounded">--}}
{{--                        <i class="fas fa-home mr-3"></i>Dashboard--}}
{{--                    </a>--}}
{{--                </li>--}}
                <li>
                    <a href="{{ route('quests.index') }}" class="flex items-center p-3 hover:bg-blue-700 rounded">
                        <i class="fas fa-scroll mr-3"></i>Quests
                    </a>
                </li>
{{--                <li>--}}
{{--                    <a href="#" class="flex items-center p-3 hover:bg-blue-700 rounded">--}}
{{--                        <i class="fas fa-users mr-3"></i>Characters--}}
{{--                    </a>--}}
{{--                </li>--}}
            </ul>

            <!-- Bottom Section -->
{{--            <div class="p-2 border-t border-blue-700">--}}
{{--                <a href="#" class="flex items-center p-3 hover:bg-blue-700 rounded">--}}
{{--                    <i class="fas fa-cog mr-3"></i>Settings--}}
{{--                </a>--}}
{{--            </div>--}}
        </div>
    </nav>

    <!-- Main Content -->
    <div class="flex-1 overflow-auto">
        <!-- Page Content -->
        <main class="p-6">
            @yield('content')
        </main>
    </div>
</div>
</body>
</html>
