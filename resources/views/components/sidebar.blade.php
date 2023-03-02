<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

    <li class="nav-item" style="margin: 0; padding: 0;">
    </li>
    
    <li class="nav-header" style="margin-top: -23px;">MENU UTAMA</li>

    <x-nav-link 
        text="Artikel Berita" 
        icon="newspaper" 
        url="{{ route('admin.dashboard') }}"
        active="{{ request()->routeIs('admin.dashboard') ? ' active' : '' }}"
    />
    
    <x-nav-link 
        text="Penggalangan" 
        icon="th-list"
        url="{{ route('admin.campaign.index') }}"
        active="{{ request()->routeIs('admin.campaign.index') ? ' active' : '' }}"
    />
    
    <x-nav-link 
        text="Daftar Donasi" 
        icon="users"
        url="{{ route('admin.donation') }}"
        active="{{ request()->routeIs('admin.donation') ? ' active' : '' }}"
    />
    
    <x-nav-link 
        text="Kontak" 
        icon="inbox"
        url="{{ route('admin.contact.index') }}"
        active="{{ request()->routeIs('admin.contact.index') ? ' active' : '' }}"
    />

    <li class="nav-header">LAINNYA</li>
    
    <x-nav-link 
        text="Profile" 
        icon="user" 
        url="{{ route('admin.profile') }}"
        active="{{ request()->routeIs('admin.profile') ? ' active' : '' }}"
    />


    <li class="nav-item">
      <a href="#" class="nav-link" id="logout">
        <i class="nav-icon fas fa-sign-out-alt"></i>
        <p>
          Logout
        </p>
      </a>
    </li>
    </ul>
</nav>