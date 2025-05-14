<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-200">
            {{ __('Edit Todo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg dark:bg-gray-800">
                <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
                    <form method="POST" action="{{ route('todo.update', $todo) }}">
                        @csrf
                        @method('PATCH')
                        <div class="mb-6">
                            <x-input-label for="title" :value="__('Title')" />
                            <x-text-input id="title" name="title" type="text" class="block w-full mt-1"
                                value="{{ old('title', $todo->title) }}" required autofocus autocomplete="title" />
                            <x-input-error class="mt-2" :messages="$errors->get('title')" />
                        </div>
                        <div class="mb-6">
                            <x-input-label for="category_id" :value="__('Category')" />
                            <select name="category_id" id="category_id" required
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:bg-gray-700 dark:text-white focus:border-indigo-500 focus:ring-indigo-500">
                                <option value="">{{ __('Choose Category') }}</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $todo->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('category_id')" />
                        </div>
                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>

                            <a href="{{ route('todo.index') }}"
                                class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest 
                                text-gray-700 uppercase transition duration-150 ease-in-out bg-white border 
                                border-gray-300 rounded-md shadow-sm dark:bg-gray-800 dark:border-gray-500 
                                dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none 
                                focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 
                                disabled:opacity-25">
                                {{ __('Cancel') }}
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>