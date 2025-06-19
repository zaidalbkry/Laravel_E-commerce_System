@extends('frontend.layout')

@section('css-custom-files')
<style>
    .main-profile-card {
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
        padding: 30px;
        max-width: 600px;
        margin: 50px auto;
    }

    .info-table {
        width: 100%;
        margin-bottom: 30px;
        border-collapse: collapse;
    }

    .info-table td {
        border: 1px solid #ddd;
        padding: 10px 15px;
        font-weight: bold;
    }

    .info-table td.label {
        background-color: #f8f8f8;
        width: 35%;
        text-align: start;
    }

    .action-buttons {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
        justify-content: center;
    }

    .btn-custom {
        flex: 1 1 auto;
        min-width: 160px;
    }

    #edit-info-form, #password-form {
        background-color: #f9f9f9;
        padding: 20px;
        border-radius: 8px;
        margin-top: 20px;
    }
    .btn-custom span {
    vertical-align: middle;
    margin-left: 5px;
    text-transform: capitalize;
    font-weight: 500;
    color: rgb(10, 10, 10);
}

</style>
@endsection

@section('content')
<div class="container">
    <div class="main-profile-card text-center">
        <!-- ✅ معلومات المستخدم كجدول -->
        <table class="info-table">
            <tr>
                <td class="label">Name:</td>
                <td>{{ Auth::user()->name }}</td>
            </tr>
            <tr>
                <td class="label">Email:</td>
                <td>{{ Auth::user()->email }}</td>
            </tr>
        </table>

        <!-- ✅ الأزرار بشكل أفقي -->
        <div class="action-buttons">
<a class="btn btn-danger btn-custom" href="{{ route('logout') }}"
   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
   🚪 <span>Log Out</span>
</a>


            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
<button class="btn btn-warning btn-custom" onclick="toggleEditInfoForm()">
    📝 <span>Edit Profile</span>
</button>

<button class="btn btn-secondary btn-custom" onclick="togglePasswordForm()">
    🔒 <span>Change Password</span>
</button>

        </div>

        <!-- ✅ نموذج تعديل المعلومات -->
        <div id="edit-info-form" style="display: none;" class="mt-3 text-start">
            <form method="POST" action="{{ route('profile.update') }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" required>
                </div>

                <div class="mb-3">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}" required>
                </div>

                <button type="submit" class="btn btn-success">💾 Save</button>
            </form>
        </div>

        <!-- ✅ نموذج تغيير كلمة السر -->
        <div id="password-form" style="display: none;" class="mt-3 text-start">
            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <div class="mb-3">
                    <label for="current_password">Your Password:</label>
                    <input type="password" class="form-control" name="current_password" required>
                </div>

                <div class="mb-3">
                    <label for="new_password">New Password</label>
                    <input type="password" class="form-control" name="new_password" required>
                </div>

                <div class="mb-3">
                    <label for="new_password_confirmation">Confirm Password</label>
                    <input type="password" class="form-control" name="new_password_confirmation" required>
                </div>

                <button type="submit" class="btn btn-success">💾 SaveS</button>
            </form>
        </div>
    </div>
</div>
@endsection

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
