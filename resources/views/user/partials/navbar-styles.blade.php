<style>
    /* Top Navigation */
    .dashboard-nav {
        background-color: #fff;
        border-bottom: 1px solid #e5e7eb;
        padding: 15px 20px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        position: sticky;
        top: 0;
        z-index: 100;
        box-shadow: 0 2px 4px rgba(0,0,0,0.05);
    }

    .nav-brand {
        display: flex;
        align-items: center;
        gap: 12px;
        font-size: 18px;
        font-weight: 700;
        color: #000;
        text-decoration: none;
    }

    .nav-brand-logo {
        width: 36px;
        height: 36px;
        background-color: #2563eb;
        border-radius: 6px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-weight: 900;
        font-size: 18px;
    }

    .nav-links {
        display: flex;
        gap: 25px;
        align-items: center;
        flex: 1;
        margin-left: 30px;
    }

    .nav-links a {
        text-decoration: none;
        color: #666;
        font-size: 13px;
        font-weight: 600;
        text-transform: uppercase;
        transition: color 0.2s;
        position: relative;
    }

    .nav-links a:hover {
        color: #2563eb;
    }

    .nav-links a.active {
        color: #2563eb;
    }

    .nav-links a.active::after {
        content: '';
        position: absolute;
        bottom: -18px;
        left: 0;
        right: 0;
        height: 2px;
        background-color: #2563eb;
    }

    .nav-right {
        display: flex;
        align-items: center;
        gap: 15px;
        position: relative;
    }

    .user-menu {
        display: flex;
        align-items: center;
        gap: 8px;
        cursor: pointer;
        font-weight: 600;
        font-size: 14px;
        padding: 8px 12px;
        border-radius: 6px;
        transition: background-color 0.2s;
    }

    .user-menu:hover {
        background-color: #f3f4f6;
    }

    .user-dropdown {
        display: none;
        position: absolute;
        top: 100%;
        right: 0;
        margin-top: 10px;
        background-color: #fff;
        border: 1px solid #e5e7eb;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        min-width: 180px;
        z-index: 1000;
    }

    .user-dropdown.active {
        display: block;
    }

    .user-dropdown a {
        display: block;
        padding: 12px 15px;
        color: #333;
        text-decoration: none;
        font-size: 14px;
        transition: background-color 0.2s;
        border-bottom: 1px solid #f0f0f0;
    }

    .user-dropdown a:last-child {
        border-bottom: none;
    }

    .user-dropdown a:hover {
        background-color: #f9fafb;
        color: #2563eb;
    }

    .user-dropdown button {
        background: none;
        border: none;
        width: 100%;
        text-align: left;
        padding: 12px 15px;
        cursor: pointer;
        color: #333;
        font-size: 14px;
        transition: background-color 0.2s;
    }

    .user-dropdown button:hover {
        background-color: #f9fafb;
        color: #dc2626;
    }

    .mobile-menu-toggle {
        display: none;
        flex-direction: column;
        gap: 5px;
        cursor: pointer;
        padding: 8px;
        -webkit-tap-highlight-color: transparent;
        touch-action: manipulation;
    }

    .mobile-menu-toggle span {
        width: 25px;
        height: 3px;
        background-color: #333;
        border-radius: 2px;
        transition: all 0.3s;
        display: block;
    }

    .mobile-menu-toggle:active {
        opacity: 0.7;
    }

    .mobile-menu {
        display: block;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100vh;
        background-color: #fff;
        z-index: 1000;
        padding: 20px;
        transform: translateX(-100%);
        transition: transform 0.3s ease-in-out;
        overflow-y: auto;
        visibility: hidden;
    }

    .mobile-menu.active {
        transform: translateX(0);
        visibility: visible;
    }

    .mobile-menu-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
        padding-bottom: 20px;
        border-bottom: 1px solid #e5e7eb;
    }

    .mobile-menu-links {
        display: flex;
        flex-direction: column;
        gap: 0;
    }

    .mobile-menu-links a {
        text-decoration: none;
        color: #333;
        font-size: 18px;
        font-weight: 600;
        text-transform: uppercase;
        padding: 15px 0;
        border-bottom: 1px solid #f0f0f0;
        transition: color 0.2s;
    }

    .mobile-menu-links a.active {
        color: #2563eb;
    }

    .mobile-menu-links a:hover {
        color: #2563eb;
    }

    @media (max-width: 768px) {
        .dashboard-nav {
            padding: 12px 15px;
        }

        .nav-brand {
            font-size: 16px;
        }

        .nav-brand-logo {
            width: 32px;
            height: 32px;
            font-size: 16px;
        }

        .nav-links {
            display: none;
        }

        .mobile-menu-toggle {
            display: flex;
        }

        .user-menu span:last-child {
            display: none;
        }

        .user-menu {
            font-size: 12px;
            padding: 6px 10px;
        }
    }

    @media (max-width: 480px) {
        .dashboard-nav {
            padding: 10px 12px;
        }

        .nav-brand {
            font-size: 14px;
        }

        .nav-brand-logo {
            width: 28px;
            height: 28px;
            font-size: 14px;
        }

        .mobile-menu-toggle {
            padding: 3px;
        }

        .mobile-menu-toggle span {
            width: 22px;
            height: 2px;
        }
    }
</style>

<script>
    function toggleUserDropdown() {
        const dropdown = document.getElementById('userDropdown');
        if (dropdown) {
            dropdown.classList.toggle('active');
        }
    }

    function toggleMobileMenu() {
        const menu = document.getElementById('mobileMenu');
        if (menu) {
            menu.classList.toggle('active');
            // Prevent body scroll when menu is open
            if (menu.classList.contains('active')) {
                document.body.style.overflow = 'hidden';
            } else {
                document.body.style.overflow = '';
            }
        }
    }

    // Close dropdowns when clicking outside
    document.addEventListener('DOMContentLoaded', function() {
        document.addEventListener('click', function(event) {
            const userMenu = document.querySelector('.user-menu');
            const userDropdown = document.getElementById('userDropdown');
            const mobileMenu = document.getElementById('mobileMenu');
            const mobileToggle = document.querySelector('.mobile-menu-toggle');

            if (userDropdown && userMenu && !userMenu.contains(event.target) && !userDropdown.contains(event.target)) {
                userDropdown.classList.remove('active');
            }

            if (mobileMenu && mobileToggle && !mobileMenu.contains(event.target) && !mobileToggle.contains(event.target)) {
                mobileMenu.classList.remove('active');
                document.body.style.overflow = '';
            }
        });

        // Close mobile menu when clicking on a link
        const mobileLinks = document.querySelectorAll('.mobile-menu-links a');
        mobileLinks.forEach(link => {
            link.addEventListener('click', function() {
                const mobileMenu = document.getElementById('mobileMenu');
                if (mobileMenu) {
                    mobileMenu.classList.remove('active');
                    document.body.style.overflow = '';
                }
            });
        });
    });
</script>

