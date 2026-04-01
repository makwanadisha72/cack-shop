<style>
/* ================= HEADER ================= */
.top-header {
    background: linear-gradient(90deg, #91c8ff, #caf8cf);
    padding: 12px 0;
}

/* BRAND */
.brand-name {
    font-size: 26px;
    font-weight: 700;
    color: #ffffff;
    margin: 0;
    letter-spacing: 0.5px;
}

/* NAV WRAP */
.header-nav {
    display: flex;
    justify-content: flex-end;
}

/* ================= LOGOUT BUTTON ================= */
.logout-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 8px 22px;

    border-radius: 999px;
    border: 2px solid #ef6262;

    background: #ffffff;
    color: #ef6262;

    font-size: 15px;
    font-weight: 600;
    letter-spacing: 0.4px;
    text-decoration: none;

    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
    transition: all 0.25s ease;
}

/* ICON */
.logout-btn i {
    font-size: 18px;
}

/* HOVER */
.logout-btn:hover {
    background: #ef6262;
    color: #ffffff;
    box-shadow: 0 10px 22px rgba(239, 98, 98, 0.35);
    transform: translateY(-2px);
}

/* ACTIVE (CLICK EFFECT) */
.logout-btn:active {
    transform: translateY(0);
    box-shadow: 0 5px 12px rgba(239, 98, 98, 0.25);
}

/* FOCUS (ACCESSIBILITY) */
.logout-btn:focus {
    outline: none;
    box-shadow: 0 0 0 4px rgba(239, 98, 98, 0.35);
}
</style>

<div class="top-header">
    <div class="container">
        <div class="row align-items-center">

            <!-- LOGO -->
            <div class="col-md-6">
                <h2 class="brand-name">CackShop</h2>
            </div>

            <!-- LOGOUT -->
            <div class="col-md-6">
                <div class="header-nav">
                    <a href="{{ route('singhout') }}" class="logout-btn">
                        <i class="ion-ios-log-out"></i>
                        Logout
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>
