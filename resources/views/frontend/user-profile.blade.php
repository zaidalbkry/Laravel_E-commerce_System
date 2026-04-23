@extends('frontend.layout')

@section('content')
<div class="mx-auto max-w-2xl fb-card text-center">
        <table class="mb-6 w-full overflow-hidden rounded-xl border border-mint-100 text-left">
            <tr>
                <td class="border border-mint-100 bg-mint-50 p-3 font-semibold">Name:</td>
                <td class="border border-mint-100 p-3">{{ Auth::user()->name }}</td>
            </tr>
            <tr>
                <td class="border border-mint-100 bg-mint-50 p-3 font-semibold">Email:</td>
                <td class="border border-mint-100 p-3">{{ Auth::user()->email }}</td>
            </tr>
        </table>

        <div class="flex flex-wrap justify-center gap-3">
<a class="fb-btn-secondary" href="{{ route('logout') }}"
   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
   Log Out
</a>


            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
<button class="fb-btn-secondary" type="button" onclick="toggleEditInfoForm()">
    Edit Profile
</button>

<button class="fb-btn" type="button" onclick="togglePasswordForm()">
    Change Password
</button>

        </div>

        <div id="edit-info-form" style="display: none;" class="mt-6 rounded-xl border border-mint-100 bg-mint-50 p-4 text-start">
            <form method="POST" action="{{ route('profile.update') }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name">Name:</label>
                    <input type="text" class="mt-1 w-full rounded-xl border-mint-200" name="name" value="{{ Auth::user()->name }}" required>
                </div>

                <div class="mb-3">
                    <label for="email">Email:</label>
                    <input type="email" class="mt-1 w-full rounded-xl border-mint-200" name="email" value="{{ Auth::user()->email }}" required>
                </div>

                <button type="submit" class="fb-btn">Save</button>
            </form>
        </div>

        <div id="password-form" style="display: none;" class="mt-6 rounded-xl border border-mint-100 bg-mint-50 p-4 text-start">
            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <div class="mb-3">
                    <label for="current_password">Your Password:</label>
                    <input type="password" class="mt-1 w-full rounded-xl border-mint-200" name="current_password" required>
                </div>

                <div class="mb-3">
                    <label for="new_password">New Password</label>
                    <input type="password" class="mt-1 w-full rounded-xl border-mint-200" name="new_password" required>
                </div>

                <div class="mb-3">
                    <label for="new_password_confirmation">Confirm Password</label>
                    <input type="password" class="mt-1 w-full rounded-xl border-mint-200" name="new_password_confirmation" required>
                </div>

                <button type="submit" class="fb-btn">Save</button>
            </form>
        </div>
</div>
@endsection

@section('js-custom-files')
    <script>
        function togglePasswordForm() {
            const form = document.getElementById('password-form');
            form.style.display = form.style.display === 'none' ? 'block' : 'none';
        }

        function toggleEditInfoForm() {
            const form = document.getElementById('edit-info-form');
            form.style.display = form.style.display === 'none' ? 'block' : 'none';
        }
    </script>
@endsection
