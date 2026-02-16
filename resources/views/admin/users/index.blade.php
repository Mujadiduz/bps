@extends('layouts.admin')

@section('admin_content')
<div class="card">
    <h3 style="margin-bottom: 20px;">Tambah Admin Baru</h3>
    @if($errors->any())
    <div style="background: #fee2e2; color: #ef4444; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
        <ul style="margin: 0;">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(session('success'))
    <div style="background: #dcfce7; color: #16a34a; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
        {{ session('success') }}
    </div>
@endif
    <form action="{{ route('admin.users.store') }}" method="POST">
        @csrf
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 15px;">
            <input type="text" name="name" placeholder="Nama Lengkap" required style="padding: 12px; border: 1px solid #ddd; border-radius: 8px;">
            <input type="email" name="email" placeholder="Email BPS" required style="padding: 12px; border: 1px solid #ddd; border-radius: 8px;">
            <input type="password" name="password" placeholder="Password" required style="padding: 12px; border: 1px solid #ddd; border-radius: 8px;">
            <button type="submit" style="background: var(--bps-blue); color: white; border: none; padding: 12px; border-radius: 8px; cursor: pointer; font-weight: bold;">
                <i class="fas fa-user-plus"></i> Tambah Admin
            </button>
        </div>
    </form>
</div>

<div class="card">
    <h3 style="margin-bottom: 20px;">Daftar Administrator</h3>
    <div style="overflow-x: auto;">
        <table style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr style="background: #f8fafc; text-align: left; border-bottom: 2px solid #eee;">
                    <th style="padding: 15px;">Nama</th>
                    <th style="padding: 15px;">Email</th>
                    <th style="padding: 15px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr style="border-bottom: 1px solid #eee;">
                    <td style="padding: 15px;">{{ $user->name }}</td>
                    <td style="padding: 15px;">{{ $user->email }}</td>
                    <td style="padding: 15px;">
                        @if($user->id !== auth()->id()) {{-- Pengecekan ID yang aman --}}
                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus admin ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="color: #ef4444; background: none; border: none; cursor: pointer; font-size: 18px;">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        @else
                            <span style="color: var(--bps-blue); font-size: 12px; font-weight: bold;">Sedang Aktif</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection