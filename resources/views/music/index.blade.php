@extends('layouts.app')

@section('title', 'Music Gallery')

@section('content')
    <!-- Success Message (shows when music is created/updated/deleted) -->
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6 text-center font-medium">
            {{ session('success') }}
        </div>
    @endif

    <!-- Header with Create Button -->
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-4xl font-bold text-gray-800">Music Gallery</h1>
        <a href="{{ route('music.create') }}" class="bg-gradient-to-r from-purple-500 to-pink-500 hover:from-purple-600 hover:to-pink-600 text-white font-semibold py-3 px-6 rounded-lg shadow-md transition duration-300 ease-in-out transform hover:scale-105">
            + Create Music
        </a>
    </div>

    @if($music->count() > 0)
        <!-- Music Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($music as $item)
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                    <!-- Card Header with song name -->
                    <div class="bg-gradient-to-r from-purple-500 to-pink-500 px-6 py-4">
                        <h3 class="text-xl font-bold text-white truncate">{{ $item->name }}</h3>
                    </div>
                    
                    <!-- Card Body -->
                    <div class="p-6">
                        <!-- Artist -->
                        <div class="mb-4">
                            <p class="text-sm text-gray-600 font-medium">Artist</p>
                            <p class="text-lg text-gray-800">{{ $item->artist }}</p>
                        </div>
                        
                        <!-- Genre -->
                        <div class="mb-6">
                            <p class="text-sm text-gray-600 font-medium">Genre</p>
                            <p class="text-lg text-gray-800">{{ $item->genre }}</p>
                        </div>
                        
                        <!-- Action Buttons (Edit & Delete) -->
                        <div class="flex items-center justify-between pt-4 border-t border-gray-200">
                            <span class="text-sm text-gray-500 font-medium">Actions</span>
                            <div class="flex gap-4">
                                <!-- Edit Button -->
                                <a href="{{ route('music.edit', $item) }}" 
                                   class="text-green-600 hover:text-green-800 font-medium transition-colors duration-200 flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                    Edit
                                </a>
                                
                                <!-- Delete Button with Confirmation -->
                                <form action="{{ route('music.destroy', $item) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this music?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="text-red-600 hover:text-red-800 font-medium transition-colors duration-200 flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <!-- Empty State (when no music exists) -->
        <div class="bg-white rounded-xl shadow-lg p-12 text-center">
            <div class="mb-6">
                <svg class="mx-auto h-16 w-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"></path>
                </svg>
            </div>
            <h3 class="text-2xl font-bold text-gray-700 mb-2">No Music Yet</h3>
            <p class="text-gray-500 mb-6">Start by adding your first music to the gallery!</p>
            <a href="{{ route('music.create') }}" class="inline-block bg-gradient-to-r from-purple-500 to-pink-500 hover:from-purple-600 hover:to-pink-600 text-white font-semibold py-3 px-8 rounded-lg shadow-md transition duration-300 ease-in-out">
                Add Your First Music
            </a>
        </div>
    @endif
@endsection