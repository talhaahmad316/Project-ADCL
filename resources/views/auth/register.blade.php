<x-guest-layout>
    <form method="get" action="{{ route('register-store')}}">
        @csrf
        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block w-full mt-1" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>


        {{-- Assign role --}}

        <div>
            <x-input-label for="role" :value="__('Role')" />
            <select id="role" name="role" class="block w-full mt-1" required autofocus>
                <option value="1" @if (old('role') == 'super_admin') selected @endif>Super Admin</option>
                <option value="2" @if (old('role') == 'admin') selected @endif>Admin</option>
                <option value="3" @if (old('role') == 'user') selected @endif>User</option>
            </select>
            <x-input-error :messages="$errors->get('role')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">

            <button type="submit" class="btn btn-success"
                >Register</button>
        </div>
    </form>
</x-guest-layout>
