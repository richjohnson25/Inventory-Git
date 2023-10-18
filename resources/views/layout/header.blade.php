<div class="header">
    <h2>Inventory</h2>
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