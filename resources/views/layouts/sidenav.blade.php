    <div class="sidenav-menu">

        {{-- Logo --}}
        <a href="{{ route('user.dashboard.chatbot') }}" class="logo">
            <span class="logo-light">
                <span class="logo-lg"><img
                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTGq0hduQjo2OWUNNBUrIy_D06HSSJvvSIgAezWL3DlyQ&s=10"
                        alt="Logo"></span>
                <span class="logo-sm text-center"><img
                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTGq0hduQjo2OWUNNBUrIy_D06HSSJvvSIgAezWL3DlyQ&s=10"
                        alt="Logo kecil"></span>
            </span>
        </a>

        {{-- Tombol bawaan template (hover & tutup sidebar mobile) --}}
        <button class="button-sm-hover"><i class="ti ti-circle align-middle"></i></button>
        <button class="button-close-fullsidebar"><i class="ti ti-x align-middle"></i></button>

        <div data-simplebar>
            <ul class="side-nav">
                <li class="side-nav-item">
                    <a href="{{ route('user.dashboard.chatbot') }}"
                        class="side-nav-link {{ request()->routeIs('user.dashboard.chatbot') ? 'active' : '' }}">
                        <span class="menu-icon"><i class="ti ti-message-chatbot"></i></span>
                        <span class="menu-text">Chatbot</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
