@extends('Dashboard.layouts.master')

@section('title')
    Settings Page
@endsection


@section('styles')
    <style>
        /* Basic styling for the settings page */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;

        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
            margin-left: 3%;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            margin-left: 3%;
        }

        input[type="text"],
        textarea {
            width: 90%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-left: 3%;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-left: 3%;
        }

        /* Additional CSS for specific elements */
        .social-media {
            margin-bottom: 20px;
            margin-left: 3%;
        }

        .social-media label {
            font-weight: normal;
            margin-left: 3%;
        }

        .social-media input[type="text"] {
            margin-bottom: 10px;
            margin-left: 3%;
        }

        .terms {
            margin-bottom: 20px;
            margin-left: 3%;
        }

        .terms textarea {
            height: 150px;
            margin-left: 3%;
        }

        .error {
            font-size: 18px;
            color: red;
            margin-left: 3%;
            margin-bottom: 1%;
        }
    </style>
@stop


@section('content')

    <body>
        <h1>Settings</h1>
        <form action="{{ route('updateAllSettings', ['settingId' => $settings->first()->id]) }}" method="POST">
            @csrf
            <label>About Us:</label>
            <textarea name="about_us" rows="4" cols="50">{{ $settings->first()->about_us }}</textarea>
            @error('about_us')
                <div class="error">{{ $message }}</div>
            @enderror

            <div class="social-media">
                <label>Social Media Links:</label>
                <input name="facebook" type="text" placeholder="Facebook URL" value="{{ $settings->first()->facebook }}">
                @error('facebook')
                    <div class="error">{{ $message }}</div>
                @enderror
                <input name="twitter" type="text" placeholder="Twitter URL" value="{{ $settings->first()->twitter }}">
                @error('twitter')
                    <div class="error">{{ $message }}</div>
                @enderror
                <input name="instagram" type="text" placeholder="Instagram URL"
                    value="{{ $settings->first()->instagram }}">
                @error('instagram')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="terms">
                <label>Terms:</label>
                <textarea name="terms" rows="10" cols="50">{{ $settings->first()->terms }}</textarea>
                @error('terms')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <label>Phone:</label>
            <input name="phone" type="text" value="{{ $settings->first()->phone }}">
            @error('phone')
                <div class="error">{{ $message }}</div>
            @enderror

            <label>Email:</label>
            <input name="email" type="text" value="{{ $settings->first()->email }}">
            @error('email')
                <div class="error">{{ $message }}</div>
            @enderror

            <input type="submit" value="Save">
        </form>
    </body>
@endsection

@section('scripts')

@stop
