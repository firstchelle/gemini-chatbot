{{-- resources/views/user/chatbot.blade.php --}}
@extends('template', ['title' => 'Chatbot'])

@section('content')
    {{-- ===== Tema Pink & Putih =====
         Warna yang dipakai:
         pink #ec4899 | pink tua #db2777 | pink muda #fdf2f8 | garis pink #fbcfe8 --}}
    <style>
        /* ---------- Latar halaman ---------- */
        body,
        .content-page {
            background-color: #fdf2f8;
        }

        /* ---------- Sidebar ---------- */
        .sidenav-menu,
        .sidenav-menu .logo {
            background: #fff !important;
        }

        /* Bagian logo sama tinggi dengan topbar, tidak menutupi menu di bawahnya */
        .sidenav-menu .logo {
            height: 71px;
            overflow: hidden;
            position: relative;
        }

        .sidenav-menu .logo-light,
        .sidenav-menu .logo-dark,
        .sidenav-menu .logo-sm,
        .sidenav-menu .logo-lg {
            background: transparent !important;
        }

        /* Beri jarak agar menu tidak tertutup logo */
        .sidenav-menu .side-nav {
            padding-top: 12px;
        }

        .sidenav-menu {
            border-right: 1px solid #fbcfe8;
        }

        .sidenav-menu .side-nav-link,
        .sidenav-menu .side-nav-link:focus {
            background: transparent !important;
            color: #6b7280 !important;
            border: 0 !important;
            outline: 0 !important;
            box-shadow: none !important;
            border-radius: 10px;
            margin: 2px 10px;
        }

        .sidenav-menu .side-nav-link .menu-icon {
            color: #db2777 !important;
        }

        .sidenav-menu .side-nav-link:hover {
            background: #fce7f3 !important;
            color: #db2777 !important;
        }

        .sidenav-menu .side-nav-link.active {
            background: #ec4899 !important;
            color: #fff !important;
            box-shadow: 0 4px 10px rgba(236, 72, 153, .3) !important;
        }

        .sidenav-menu .side-nav-link.active .menu-icon,
        .sidenav-menu .side-nav-link.active .menu-text {
            color: #fff !important;
        }

        /* ---------- Topbar ---------- */
        .app-topbar {
            background: #fff;
            border-bottom: 1px solid #fbcfe8;
            display: flex;
            align-items: center;
            min-height: 70px;
            padding-top: 8px;
            padding-bottom: 8px;
        }

        .app-topbar .topbar-menu {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
        }

        .app-topbar .btn,
        .app-topbar .btn:hover,
        .app-topbar .btn:focus {
            box-shadow: none !important;
        }

        .sidenav-toggle-button,
        .sidenav-toggle-button:hover,
        .sidenav-toggle-button:focus {
            background: #fdf2f8 !important;
            border: 1px solid #fbcfe8 !important;
            color: #db2777 !important;
            box-shadow: none !important;
        }

        /* ---------- Footer ---------- */
        .footer {
            background: #fff;
            border-top: 1px solid #fbcfe8;
        }

        /* ---------- Tombol ---------- */
        .btn-primary {
            background: #ec4899;
            border-color: #ec4899;
            color: #fff;
        }

        .btn-primary:hover {
            background: #db2777;
            border-color: #db2777;
            color: #fff;
        }

        /* Saat ditekan / fokus: putih dengan tulisan pink */
        .btn-primary:active,
        .btn-primary:focus,
        .btn-primary:focus-visible,
        .btn-primary.active,
        .btn-check:checked+.btn-primary,
        :not(.btn-check)+.btn-primary:active {
            background: #fff !important;
            border-color: #ec4899 !important;
            color: #db2777 !important;
            box-shadow: none !important;
        }

        /* Saat AI sedang mengetik (tombol & input dinonaktifkan) */
        .btn-primary:disabled,
        .btn-primary.disabled,
        #chat-send:disabled {
            background: #fff !important;
            border-color: #f9a8d4 !important;
            color: #f472b6 !important;
            opacity: 1 !important;
            box-shadow: none !important;
        }

        .form-control:disabled,
        #chat-input:disabled {
            background: #fff !important;
            border-color: #fbcfe8 !important;
            color: #9ca3af !important;
            opacity: 1 !important;
        }

        .btn-outline-primary {
            color: #db2777;
            border-color: #ec4899;
        }

        .btn-outline-primary:hover {
            background: #ec4899;
            border-color: #ec4899;
            color: #fff;
        }

        /* Saat ditekan / fokus: semua tombol putih dengan tulisan pink */
        .btn-outline-primary:active,
        .btn-outline-primary:focus,
        .btn-outline-primary:focus-visible,
        .btn-outline-primary.active,
        .btn-outline-primary.show,
        .btn-outline-primary:first-child:active,
        .btn-secondary:active,
        .btn-secondary:focus,
        .btn-secondary.active,
        .btn-secondary.show,
        #chat-clear:active,
        #chat-clear:focus {
            background: #fff !important;
            border-color: #ec4899 !important;
            color: #db2777 !important;
            box-shadow: none !important;
        }

        /* ---------- Input ---------- */
        .form-control:focus {
            border-color: #ec4899;
            box-shadow: 0 0 0 .2rem rgba(236, 72, 153, .2);
        }

        /* ---------- Kotak chat ---------- */
        .chat-card {
            border: 1px solid #fbcfe8;
            border-radius: 16px;
            box-shadow: 0 4px 16px rgba(236, 72, 153, .08);
        }

        .chat-card .card-header,
        .chat-card .card-footer {
            background: #fff;
            border-color: #fbcfe8;
        }

        .chat-card .card-header {
            border-radius: 16px 16px 0 0;
        }

        .chat-card .card-footer {
            border-radius: 0 0 16px 16px;
        }

        #chat-box {
            background: #fff;
        }

        /* Gelembung pesan yang dibuat chatbot.js (pesan Anda: pink) */
        #chat-box .bg-dark,
        #chat-box .bg-secondary,
        #chat-box .bg-primary,
        #chat-box .text-bg-dark,
        #chat-box .text-bg-secondary,
        #chat-box .text-bg-primary,
        #chat-box .chat-user,
        #chat-box .user,
        #chat-box [class*="user"] {
            background: #ec4899 !important;
            border-color: #ec4899 !important;
            color: #fff !important;
        }
x   
        /* Pesan balasan AI: putih dengan garis pink */
        #chat-box .bg-white,
        #chat-box .bg-light,
        #chat-box .chat-bot,
        #chat-box .bot,
        #chat-box [class*="bot"]:not(#chat-placeholder) {
            background: #fff !important;
            border: 1px solid #fbcfe8 !important;
            color: #374151 !important;
            box-shadow: none !important;
        }

        /* Gelembung pesan (dipakai chatbot.js) */
        .chat-msg {
            max-width: 80%;
            padding: 10px 14px;
            margin-bottom: 10px;
            border-radius: 14px;
            word-wrap: break-word;
            white-space: pre-wrap;
        }

        .chat-msg.user {
            margin-left: auto;
            background: #ec4899;
            color: #fff;
            border-bottom-right-radius: 4px;
        }

        .chat-msg.bot {
            margin-right: auto;
            background: #fdf2f8;
            color: #374151;
            border: 1px solid #fbcfe8;
            border-bottom-left-radius: 4px;
        }
    </style>

    {{-- Judul halaman --}}
    <div class="page-title-head mt-5 mb-3 text-center">
        <h4 class="fs-20 fw-bold mb-1" style="color: #db2777;">Chatbot AI</h4>
        <p class="text-muted mb-0">Tanyakan apa saja kepada asisten Gemini</p>
    </div>

    {{-- Kotak chat --}}
    <div id="chatbot-app" class="card chat-card mx-auto" style="max-width: 800px;"
        data-url-kirim="{{ route('user.dashboard.chatbot.kirim') }}">

        {{-- Header --}}
        <div class="card-header d-flex justify-content-between align-items-center">
            <span class="fw-semibold">
                <i class="ti ti-sparkles me-1" style="color: #ec4899;"></i> Asisten Gemini
            </span>
            <button type="button" class="btn btn-sm btn-outline-primary" id="chat-clear">
                <i class="ti ti-trash me-1"></i> Bersihkan
            </button>
        </div>

        {{-- Area pesan --}}
        <div class="card-body overflow-auto" id="chat-box" style="height: 60vh;">
            <div class="text-center text-muted py-5" id="chat-placeholder">
                <i class="ti ti-message-chatbot fs-48 d-block mb-2" style="color: #f9a8d4;"></i>
                Halo! Ketik pesan di bawah untuk mulai mengobrol.
            </div>
        </div>

        {{-- Input pesan --}}
        <div class="card-footer">
            <div id="chat-form" class="input-group">
                @csrf
                <textarea class="form-control" id="chat-input" rows="1" placeholder="Ketik pesan..." required></textarea>
                <button type="button" class="btn btn-primary" id="chat-send">
                    <i class="ti ti-send me-1"></i> Kirim
                </button>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/chatbot.js') }}"></script>
@endpush
