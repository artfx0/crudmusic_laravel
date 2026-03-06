@extends('layouts.app')

@section('title', 'Edit Music')

@section('content')
    <div class="max-w-2xl mx-auto">
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <!-- Header -->
            <div class="gradient-bg px-8 py-6">
                <h2 class="text-3xl font-bold text-white">Edit music</h2>
            </div>
            
            <!-- Form -->
            <form action="{{ route('music.update', $music) }}" method="POST" class="p-8">
                @csrf
                @method('PUT')

                <!-- Name Field -->
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                        Name
                    </label>
                    <input class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-200 @error('name') border-red-500 @enderror"
                           id="name"
                           type="text"
                           name="name"
                           value="{{ old('name', $music->name) }}"
                           placeholder="Enter song name"
                           autocomplete="off">
                    @error('name')
                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Artist Field -->
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="artist">
                        Artist
                    </label>
                    <input class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-200 @error('artist') border-red-500 @enderror"
                           id="artist"
                           type="text"
                           name="artist"
                           value="{{ old('artist', $music->artist) }}"
                           placeholder="Enter artist name"
                           autocomplete="off">
                    @error('artist')
                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Genre Field -->
                <div class="mb-8">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="genre">
                        Genre
                    </label>
                    <input class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-200 @error('genre') border-red-500 @enderror"
                           id="genre"
                           type="text"
                           name="genre"
                           value="{{ old('genre', $music->genre) }}"
                           placeholder="Enter genre"
                           autocomplete="off">
                    @error('genre')
                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Buttons -->
                <div class="flex items-center gap-4">
                    <button type="submit" 
                            class="bg-gradient-to-r from-purple-500 to-pink-500 hover:from-purple-600 hover:to-pink-600 text-white font-bold py-3 px-8 rounded-lg shadow-md transition duration-300 ease-in-out transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">
                        Save Music
                    </button>
                    <a href="{{ route('music.index') }}" 
                       class="bg-gray-400 hover:bg-gray-500 text-white font-bold py-3 px-8 rounded-lg shadow-md transition duration-300 ease-in-out transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection