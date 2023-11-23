<div class="header">
    @if($auth)
        <button onclick="openSidenav()" class="sidebarBtn">&#9776;</button>
    @else
        <h2>Inventory</h2>
    @endif
    <div class="rightHeader">
        @if($auth)
            <div class="profile-dropdown">
                <button onclick="profileMenu()" class="profileBtn">{{Auth::user()->name}}</button>
                <div id="profileMenu" class="profile-menu-content">
                    <a href="/profile">Profile</a>
                    <a href="/logout">Logout</a>
                </div>
            </div>
        @else
            <a href="/home">Home</a>
            <a href="/register">Register</a>
            <a href="/login">Login</a>
        @endif
    </div>
</div>