@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-8 bg-gray-900 text-white rounded-lg shadow-lg">
        <h1 class="text-4xl font-extrabold mb-8 text-center text-purple-400">Admin Dashboard</h1>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Card 1: Manage Payroll -->
            <div class="bg-purple-800 rounded-lg shadow-md p-6 transform transition duration-500 hover:scale-105">
                <h2 class="text-2xl font-semibold text-purple-200">Manage Payroll</h2>
                <p class="mt-2 text-purple-100">Here you can manage all aspects of the payroll system.</p>
                <a href="#" class="block mt-4 text-center text-purple-400 hover:underline">Go to Payroll</a>
            </div>

            <!-- Card 2: Reports -->
            <div class="bg-purple-800 rounded-lg shadow-md p-6 transform transition duration-500 hover:scale-105">
                <h2 class="text-2xl font-semibold text-purple-200">Reports</h2>
                <p class="mt-2 text-purple-100">Generate various reports related to employee payroll and attendance.</p>
                <a href="#" class="block mt-4 text-center text-purple-400 hover:underline">Generate Reports</a>
            </div>

            <!-- Card 3: Settings -->
            <div class="bg-purple-800 rounded-lg shadow-md p-6 transform transition duration-500 hover:scale-105">
                <h2 class="text-2xl font-semibold text-purple-200">Settings</h2>
                <p class="mt-2 text-purple-100">Configure system settings and user management options.</p>
                <a href="#" class="block mt-4 text-center text-purple-400 hover:underline">Go to Settings</a>
            </div>
        </div>
    </div>
@endsection
