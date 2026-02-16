@extends('layouts.auth')

@section('content')
<div style="width: 100%; max-width: 420px; padding: 20px;">
    <div style="background: white; padding: 40px; border-radius: 20px; box-shadow: 0 15px 35px rgba(0,0,0,0.2);">
        <div style="text-align: center; margin-bottom: 30px;">
            <img src="{{ asset('images/bps.png') }}" width="80" alt="Logo BPS">
            <h2 style="color: #0077B6; margin-top: 15px;">Login Admin</h2>
            <p style="color: #64748b; font-size: 14px;">Badan Pusat Statistik Kabupaten Pasuruan</p>
        </div>

        @if($errors->any())
            <div style="color: #ef4444; background: #fee2e2; padding: 10px; border-radius: 8px; margin-bottom: 20px; font-size: 14px;">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('login.post') }}" method="POST" autocomplete="off">
            @csrf
            
            {{-- Input palsu untuk mengelabui autofill Chrome --}}
            <input type="text" style="display:none" aria-hidden="true">
            <input type="password" style="display:none" aria-hidden="true">

            <div style="margin-bottom: 20px;">
                <label style="display:block; margin-bottom: 8px; font-weight: 600; color: #334155;">Email</label>
                <input type="email" name="email" required placeholder="admin@bps.go.id" 
                    style="width:100%; padding: 12px; border: 1px solid #cbd5e1; border-radius: 10px; box-sizing: border-box; outline-color: #0093DD;" 
                    autocomplete="none">
            </div>

            <div style="margin-bottom: 25px;">
                <label style="display:block; margin-bottom: 8px; font-weight: 600; color: #334155;">Password</label>
                <input type="password" name="password" required placeholder="••••••••"
                    style="width:100%; padding: 12px; border: 1px solid #cbd5e1; border-radius: 10px; box-sizing: border-box; outline-color: #0093DD;" 
                    autocomplete="new-password">
            </div>

            <button type="submit" style="width: 100%; padding: 14px; background: #F3921E; color: white; border: none; border-radius: 10px; font-weight: bold; cursor: pointer; font-size: 16px; transition: 0.3s;">
                MASUK SEKARANG
            </button>
        </form>
    </div>
</div>
@endsection