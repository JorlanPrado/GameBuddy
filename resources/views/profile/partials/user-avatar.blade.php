<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Avatar') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Select your account's avatar.") }}
        </p>
    </header>

    <form method="POST" action="{{ route('updateAvatar') }}">
        @csrf
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-3 m-4 " style="display: inline-block;">
                    <label>
                        <input type="radio" name="avatar" value="avatar1.jpg" {{ $selectedAvatar === 'avatar1.jpg' ? 'checked' : '' }}>
                        <img src="/img/avatars/avatar1.jpg" alt="image.png" style="border-radius: 50%;">
                    </label>
                </div>

                <div class="col-md-3 m-4 " style="display: inline-block;margin-left: 40px;">
                    <label>
                        <input type="radio" name="avatar" value="avatar2.jpg" {{ $selectedAvatar === 'avatar2.jpg' ? 'checked' : '' }}>
                        <img src="/img/avatars/avatar2.jpg" alt="image.png" style="border-radius: 50%;">
                    </label>
                </div>

                <div class="col-md-3 m-4 " style="display: inline-block;margin-left: 40px;">
                    <label>
                        <input type="radio" name="avatar" value="avatar4.jpg" {{ $selectedAvatar === 'avatar4.jpg' ? 'checked' : '' }}>
                        <img src="/img/avatars/avatar4.jpg" alt="image.png" style="border-radius: 50%;">
                    </label>
                </div>

                <div class="col-md-3 mt-4 " style="display: inline-block; ">
                    <label>
                        <input type="radio" name="avatar" value="avatar3.jpg" {{ $selectedAvatar === 'avatar3.jpg' ? 'checked' : '' }}>
                        <img src="/img/avatars/avatar3.jpg" alt="image.png" style="border-radius: 50%;">
                    </label>
                </div>

                <div class="col-md-3 m-4 " style="display: inline-block;margin-left: 40px;">
                    <label>
                        <input type="radio" name="avatar" value="avatar5.jpg" {{ $selectedAvatar === 'avatar5.jpg' ? 'checked' : '' }}>
                        <img src="/img/avatars/avatar5.jpg" alt="image.png" style="border-radius: 50%;">
                    </label>
                </div>

                <div class="col-md-3 m-4 " style="display: inline-block;margin-left: 40px;">
                    <label>
                        <input type="radio" name="avatar" value="avatar6.jpg" {{ $selectedAvatar === 'avatar6.jpg' ? 'checked' : '' }}>
                        <img src="/img/avatars/avatar6.jpg" alt="image.png" style="border-radius: 50%;">
                    </label>
                </div>

                <div class="col-md-3 mt-4 " style="display: inline-block; ">
                    <label>
                        <input type="radio" name="avatar" value="avatar8.jpg" {{ $selectedAvatar === 'avatar8.jpg' ? 'checked' : '' }}>
                        <img src="/img/avatars/avatar8.jpg" alt="image.png" style="border-radius: 50%;">
                    </label>
                </div>

                <div class="col-md-3 m-4 " style="display: inline-block;margin-left: 40px;">
                    <label>
                        <input type="radio" name="avatar" value="avatar7.jpg" {{ $selectedAvatar === 'avatar7.jpg' ? 'checked' : '' }}>
                        <img src="/img/avatars/avatar7.jpg" alt="image.png" style="border-radius: 50%;">
                    </label>
                </div>

                <div class="col-md-3 m-4 " style="display: inline-block;margin-left: 40px;">
                    <label>
                        <input type="radio" name="avatar" value="avatar9.jpg" {{ $selectedAvatar === 'avatar9.jpg' ? 'checked' : '' }}>
                        <img src="/img/avatars/avatar9.jpg" alt="image.png" style="border-radius: 50%;">
                    </label>
                </div>

            </div>
        </div>

        <div class="flex items-center gap-4" style="margin-top: 40px;">
            <x-primary-button type="submit">{{ __('Save') }}</x-primary-button>
        </div>

        @if ($errors->has('avatar'))
            <p class="mt-4" style="color: red;">{{ $errors->first('avatar') }}</p>
        @endif
    </form>

</section>
