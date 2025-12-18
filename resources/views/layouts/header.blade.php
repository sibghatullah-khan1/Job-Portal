<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | JobSphere</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome 4 Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        :root {
            --primary-color: #FC0002;
            --primary-dark: #D40000;
            --primary-light: #FF3333;
            --primary-transparent: rgba(252, 0, 2, 0.1);
            --text-dark: #1f2937;
            --text-light: #6b7280;
            --accent-color: #FF6B6B;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f9fafb;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            margin: 0;
            padding: 0;
        }
        
        /* Navbar Styles */
        .job-navbar {
            background-color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 0.8rem 0;
            position: sticky;
            top: 0;
            z-index: 1030;
            height: 70px;
        }
        
        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: var(--primary-color) !important;
        }
        
        .nav-link {
            font-weight: 500;
            color: var(--text-dark) !important;
            padding: 0.5rem 1rem !important;
            margin: 0 3px;
            border-radius: 4px;
            transition: all 0.3s ease;
        }
        
        .nav-link:hover {
            background-color: var(--primary-transparent);
            color: var(--primary-color) !important;
        }
        
        .nav-link.active {
            background-color: var(--primary-color);
            color: white !important;
        }
        
        .nav-icon {
            margin-right: 6px;
            font-size: 0.9rem;
        }
        
        .dropdown-menu {
            border: none;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        
        .dropdown-item {
            padding: 0.5rem 1rem;
            transition: all 0.2s ease;
        }
        
        .dropdown-item:hover {
            background-color: var(--primary-transparent);
            color: var(--primary-color);
        }
        
        .dropdown-item i {
            margin-right: 8px;
            width: 16px;
        }
        
        .dropdown-divider {
            margin: 0.3rem 0;
        }
        
        /* Main Content Wrapper */
        .content-wrapper {
            display: flex;
            flex: 1;
            min-height: calc(100vh - 200px);
        }
        
        /* Sidebar Styles */
        .user-sidebar {
            width: 250px;
            background-color: white;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            overflow-y: auto;
            position: relative;
            border-right: 1px solid #e5e7eb;
            flex-shrink: 0;
        }
        
        .user-sidebar.collapsed {
            width: 60px;
        }
        
        .user-sidebar.collapsed .sidebar-link-text,
        .user-sidebar.collapsed .sidebar-title,
        .user-sidebar.collapsed .sidebar-dropdown-arrow {
            display: none !important;
        }
        
        .user-sidebar.collapsed .sidebar-link i {
            margin-right: 0;
            width: 100%;
            text-align: center;
        }
        
        .user-sidebar.collapsed .sidebar-dropdown-menu {
            display: none !important;
        }
        
        .user-sidebar.collapsed .sidebar-header {
            padding: 1rem 0.5rem 0.5rem;
        }
        
        .sidebar-header {
            padding: 1rem 1rem 0.5rem;
            border-bottom: 1px solid #e5e7eb;
            margin-bottom: 0.5rem;
            position: relative;
        }
        
        .sidebar-title {
            font-size: 0.9rem;
            color: var(--text-light);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            transition: opacity 0.3s ease;
        }
        
        .user-sidebar.collapsed .sidebar-title {
            opacity: 0;
        }
        
        .sidebar-links {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .sidebar-links li {
            margin-bottom: 2px;
        }
        
        .sidebar-link {
            display: flex;
            align-items: center;
            padding: 0.75rem 1rem;
            color: var(--text-dark);
            text-decoration: none;
            transition: all 0.2s ease;
            border-left: 3px solid transparent;
            white-space: nowrap;
        }
        
        .sidebar-link:hover {
            background-color: #f9fafb;
            color: var(--primary-color);
            border-left-color: var(--primary-color);
        }
        
        .sidebar-link.active {
            background-color: var(--primary-transparent);
            color: var(--primary-color);
            font-weight: 600;
            border-left-color: var(--primary-color);
        }
        
        .sidebar-link i {
            margin-right: 10px;
            font-size: 1rem;
            width: 20px;
            text-align: center;
            flex-shrink: 0;
        }
        
        .sidebar-link-text {
            flex-grow: 1;
            transition: opacity 0.3s ease;
        }
        
        .sidebar-dropdown-arrow {
            font-size: 0.8rem;
            transition: transform 0.3s ease;
            flex-shrink: 0;
        }
        
        .sidebar-dropdown.show .sidebar-dropdown-arrow {
            transform: rotate(180deg);
        }
        
        .sidebar-dropdown-menu {
            background-color: #f9fafb;
            border: none;
            border-left: 1px solid #e5e7eb;
            border-radius: 0;
            padding: 0.5rem 0;
            margin: 0;
            width: 100%;
            position: static !important;
            transform: none !important;
            box-shadow: none;
        }
        
        .sidebar-dropdown-item {
            padding: 0.6rem 1rem 0.6rem 2.5rem;
            color: var(--text-light);
            text-decoration: none;
            display: block;
            transition: all 0.2s ease;
            white-space: nowrap;
        }
        
        .sidebar-dropdown-item:hover {
            background-color: rgba(252, 0, 2, 0.05);
            color: var(--primary-color);
        }
        
        .sidebar-dropdown-item.active {
            background-color: rgba(252, 0, 2, 0.1);
            color: var(--primary-color);
            font-weight: 500;
        }
        
        .sidebar-dropdown-item i {
            margin-right: 8px;
            font-size: 0.9rem;
        }
        
        /* Logout button in sidebar */
        .sidebar-logout {
            margin-top: auto;
            border-top: 1px solid #e5e7eb;
            padding-top: 0.5rem;
        }
        
        .logout-link {
            display: flex;
            align-items: center;
            padding: 0.75rem 1rem;
            color: var(--text-dark);
            text-decoration: none;
            transition: all 0.2s ease;
            border-left: 3px solid transparent;
        }
        
        .logout-link:hover {
            background-color: rgba(252, 0, 2, 0.05);
            color: var(--primary-color);
        }
        
        .logout-link i {
            margin-right: 10px;
            font-size: 1rem;
            width: 20px;
            text-align: center;
            flex-shrink: 0;
        }
        
        .logout-text {
            flex-grow: 1;
            transition: opacity 0.3s ease;
        }
        
        .user-sidebar.collapsed .logout-text {
            display: none;
        }
        
        /* Fixed the toggle button position */
        .sidebar-toggle-btn {
            position: absolute;
            right: 10px;
            top: 10px;
            width: 25px;
            height: 25px;
            border-radius: 50%;
            background-color: var(--primary-color);
            color: white;
            border: 2px solid white;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            z-index: 1;
            box-shadow: 0 1px 3px rgba(0,0,0,0.2);
            transition: all 0.3s ease;
        }
        
        .sidebar-toggle-btn:hover {
            background-color: var(--primary-dark);
        }
        
        .sidebar-toggle-btn i {
            font-size: 0.7rem;
            transition: transform 0.3s ease;
        }
        
        .user-sidebar.collapsed .sidebar-toggle-btn i {
            transform: rotate(180deg);
        }
        
        /* Main Content Area */
        .main-content-area {
            flex: 1;
            padding: 20px;
            background-color: #f9fafb;
            overflow-y: auto;
        }
        
        .content-card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            padding: 25px;
            min-height: calc(100vh - 250px);
        }
        
        /* Responsive adjustments */
        @media (max-width: 992px) {
            .content-wrapper {
                flex-direction: column;
            }
            
            .user-sidebar {
                width: 100%;
                height: auto;
                max-height: 0;
                overflow: hidden;
                transition: max-height 0.3s ease;
                border-right: none;
                border-bottom: 1px solid #e5e7eb;
            }
            
            .user-sidebar.mobile-open {
                max-height: 500px;
            }
            
            .user-sidebar.collapsed {
                width: 100%;
            }
            
            .sidebar-toggle-btn {
                right: 15px;
                top: 12px;
            }
            
            .navbar-nav {
                padding-top: 1rem;
            }
            
            .nav-link {
                margin: 2px 0;
                padding: 0.7rem 1rem !important;
            }
        }
        
        /* Footer Styles - FIXED */
        .job-footer {
            background-color: white;
            border-top: 1px solid #e5e7eb;
            padding: 3rem 0 1.5rem;
            margin-top: auto;
            width: 100%;
        }
        
        .footer-title {
            color: var(--text-dark);
            font-weight: 600;
            margin-bottom: 1.2rem;
            font-size: 1.1rem;
        }
        
        .footer-links {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .footer-links li {
            margin-bottom: 0.5rem;
        }
        
        .footer-links a {
            color: var(--text-light);
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .footer-links a:hover {
            color: var(--primary-color);
        }
        
        /* Footer Bottom Section - Fixed Layout */
        .footer-bottom {
            border-top: 1px solid #e5e7eb;
            margin-top: 2rem;
            padding-top: 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }
        
        .copyright {
            color: var(--text-light);
            margin: 0;
            font-size: 0.9rem;
        }
        
        .footer-links-bottom {
            display: flex;
            align-items: center;
            gap: 15px;
            margin: 0;
            padding: 0;
            list-style: none;
        }
        
        .footer-links-bottom a {
            color: var(--text-light);
            text-decoration: none;
            font-size: 0.9rem;
            transition: color 0.3s ease;
        }
        
        .footer-links-bottom a:hover {
            color: var(--primary-color);
        }
        
        .footer-links-bottom span {
            color: var(--text-light);
            font-size: 0.9rem;
        }
        
        /* Responsive footer */
        @media (max-width: 768px) {
            .footer-bottom {
                flex-direction: column;
                text-align: center;
                gap: 10px;
            }
            
            .footer-links-bottom {
                justify-content: center;
            }
        }
        
        .social-icons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            margin-top: 1rem;
        }
        
        .social-icon {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background-color: #f3f4f6;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-dark);
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .social-icon:hover {
            background-color: var(--primary-color);
            color: white;
        }
        
        /* Button styling */
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .btn-primary:hover {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
        }
        
        .btn-outline-primary {
            color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .btn-outline-primary:hover {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        /* Links */
        a:not(.nav-link):not(.dropdown-item):not(.social-icon):not(.sidebar-link):not(.sidebar-dropdown-item):not(.logout-link):not(.footer-links-bottom a) {
            color: var(--primary-color);
            text-decoration: none;
        }
        
        a:not(.nav-link):not(.dropdown-item):not(.social-icon):not(.sidebar-link):not(.sidebar-dropdown-item):not(.logout-link):not(.footer-links-bottom a):hover {
            color: var(--primary-dark);
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <!-- Main Navbar Start -->
    <nav class="navbar navbar-expand-lg job-navbar">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand" href="{{route('welcome')}}">
                <img src="{{asset('images/logo.png')}}" height="40px" alt="JobSphere">
            </a>
            
            <!-- Mobile Toggle -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <!-- Navbar Content -->
            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link @if(request()->routeIs('welcome')) active @endif" href="{{route('welcome')}}">
                            <i class="fa fa-home nav-icon"></i> Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if(request()->routeIs('about')) active @endif" href="{{route('about')}}">
                            <i class="fa fa-info-circle nav-icon"></i> About
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if(request()->routeIs('jobs')) active @endif" href="{{route('client.jobs')}}">
                            <i class="fa fa-search nav-icon"></i> Available Jobs
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if(request()->routeIs('services')) active @endif" href="{{route('services')}}">
                            <i class="fa fa-cogs nav-icon"></i> Services
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if(request()->routeIs('contact')) active @endif" href="{{route('contact')}}">
                            <i class="fa fa-envelope nav-icon"></i> Contact
                        </a>
                    </li>
                </ul>
                
                <!-- Account Dropdown -->
                <ul class="navbar-nav">
                    @if (!Auth::check())
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="accountDropdown" role="button" data-bs-toggle="dropdown">
                            <i class="fa fa-user nav-icon"></i> Account
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="{{ route('login') }}">
                                <i class="fa fa-sign-in"></i> Login
                            </a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{route('register')}}">
                                <i class="fa fa-user-plus"></i> Register
                            </a></li>
                        </ul>
                    </li>
                    @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown">
                            <i class="fa fa-user-circle nav-icon"></i> {{Auth::user()->name}}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li>
                                <a class="dropdown-item" href="{{route('user.dashboard')}}">
                                    <i class="fa fa-tachometer"></i> Dashboard
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{route('user.setting')}}">
                                    <i class="fa fa-cog"></i> Settings
                                </a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        <i class="fa fa-sign-out"></i> Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <!-- Main Navbar End -->
    
    <!-- Main Content Wrapper Start -->
    <div class="content-wrapper">
        <!-- User Sidebar Start (Only for logged in users) -->
        @if (Auth::check())
        <div class="user-sidebar @if(session('sidebarCollapsed') == 'true') collapsed @endif" id="userSidebar">
            <!-- Toggle button -->
            <div class="sidebar-toggle-btn" id="sidebarToggle">
                <i class="fa fa-chevron-left"></i>
            </div>
            
            <div class="sidebar-header">
                <div class="sidebar-title">
                    <h6><i class="fa fa-user-circle"></i>{{Auth::user()->name}}</h6>
                </div>
            </div>
            
            <ul class="sidebar-links">
                <li>
                    <a href="{{route('user.dashboard')}}" class="sidebar-link @if(request()->routeIs('user.dashboard')) active @endif">
                        <i class="fa fa-tachometer"></i>
                        <span class="sidebar-link-text">Dashboard</span>
                    </a>
                </li>
                
                <!-- Your Jobs Dropdown -->
                <li class="sidebar-dropdown">
                    <a href="#" class="sidebar-link" data-bs-toggle="dropdown">
                        <i class="fa fa-briefcase"></i>
                        <span class="sidebar-link-text">Your Jobs</span>
                        <span class="sidebar-dropdown-arrow"><i class="fa fa-chevron-down"></i></span>
                    </a>
                    <div class="dropdown-menu sidebar-dropdown-menu">
                        <a href="{{route('jobs.create')}}" class="sidebar-dropdown-item @if(request()->routeIs('jobs.create')) active @endif">
                            <i class="fa fa-plus-circle"></i> Create New Job
                        </a>
                        <a href="{{route('jobs.index')}}" class="sidebar-dropdown-item @if(request()->routeIs('jobs.index')) active @endif">
                            <i class="fa fa-list"></i> All Jobs
                        </a>
                    </div>
                </li>
                
                <li>
                    <a href="{{route('user.yaj')}}" class="sidebar-link @if(request()->routeIs('user.yaj')) active @endif">
                        <i class="fa fa-paper-plane"></i>
                        <span class="sidebar-link-text">Your Applied Jobs</span>
                    </a>
                </li>
                
                <li>
                    <a href="{{route('user.profile')}}" class="sidebar-link @if(request()->routeIs('user.profile')) active @endif">
                        <i class="fa fa-user"></i>
                        <span class="sidebar-link-text">Profile</span>
                    </a>
                </li>
                
                <li>
                    <a href="{{route('user.setting')}}" class="sidebar-link @if(request()->routeIs('user.setting')) active @endif">
                        <i class="fa fa-cog"></i>
                        <span class="sidebar-link-text">Settings</span>
                    </a>
                </li>
                
                <!-- Logout in sidebar -->
                <li class="sidebar-logout">
                    <form action="{{ route('logout') }}" method="POST" class="w-100">
                        @csrf
                        <button type="submit" class="logout-link w-100 text-start border-0 bg-transparent">
                            <i class="fa fa-sign-out"></i>
                            <span class="logout-text">Logout</span>
                        </button>
                    </form>
                </li>
            </ul>
        </div>
        @endif
        <!-- User Sidebar End -->
        
        <!-- Main Content Area -->
        <div class="main-content-area">
            <div class="content-card">
                @yield('content')
            </div>
        </div>
    </div>
    <!-- Main Content Wrapper End -->

    <!-- Mobile Sidebar Toggle Button -->
    @if (Auth::check())
    <button class="btn btn-primary d-lg-none" id="mobileSidebarToggle" style="position: fixed; bottom: 20px; right: 20px; z-index: 1000; border-radius: 50%; width: 50px; height: 50px;">
        <i class="fa fa-bars"></i>
    </button>
    @endif
    
    <!-- Footer Start -->
    <footer class="job-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <img src="{{asset('images/logo.png')}}" height="70px" alt="">
                    <p style="color: var(--text-light); line-height: 1.6;">
                        Your trusted partner in finding the perfect career opportunity. 
                        Connecting talented professionals with top employers worldwide.
                    </p>
                    <div class="social-icons">
                        <a href="#" class="social-icon">
                            <i class="fa fa-facebook"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fa fa-twitter"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fa fa-linkedin"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fa fa-instagram"></i>
                        </a>
                    </div>
                </div>
                
                <div class="col-lg-2 col-md-6 mb-4">
                    <h5 class="footer-title">Quick Links</h5>
                    <ul class="footer-links">
                        <li><a href="{{route('welcome')}}">Home</a></li>
                        <li><a href="{{route('about')}}">About Us</a></li>
                        <li><a href="{{route('client.jobs')}}">Find Jobs</a></li>
                        <li><a href="{{route('services')}}">Services</a></li>
                        <li><a href="{{route('contact')}}">Contact</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-3 col-md-6 mb-4">
                    <h5 class="footer-title">Resources</h5>
                    <ul class="footer-links">
                        <li><a href="#">Career Tips</a></li>
                        <li><a href="#">Resume Builder</a></li>
                        <li><a href="#">Interview Prep</a></li>
                        <li><a href="#">Company Reviews</a></li>
                        <li><a href="#">Salary Guide</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-3 col-md-6 mb-4">
                    <h5 class="footer-title">Contact Info</h5>
                    <ul class="footer-links" style="color: var(--text-light);">
                        <li style="margin-bottom: 1rem;">
                            <i class="fa fa-map-marker" style="color: var(--primary-color); margin-right: 8px;"></i>
                            123 Job Street, Career City
                        </li>
                        <li style="margin-bottom: 1rem;">
                            <i class="fa fa-phone" style="color: var(--primary-color); margin-right: 8px;"></i>
                            +1 (555) 123-4567
                        </li>
                        <li style="margin-bottom: 1rem;">
                            <i class="fa fa-envelope" style="color: var(--primary-color); margin-right: 8px;"></i>
                            info@jobsphere.com
                        </li>
                    </ul>
                </div>
            </div>
            
            <!-- Footer Bottom Section - Fixed Layout -->
            <div class="footer-bottom">
                <!-- Left side: Copyright -->
                <p class="copyright">&copy; 2025 JobSphere. All rights reserved.</p>
                
                <!-- Right side: Links -->
                <ul class="footer-links-bottom">
                    <li><a href="#">Privacy Policy</a></li>
                    <li><span>|</span></li>
                    <li><a href="#">Terms of Service</a></li>
                    <li><span>|</span></li>
                    <li><a href="#">Cookie Policy</a></li>
                </ul>
            </div>
        </div>
    </footer>
    <!-- Footer End -->
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Sidebar toggle functionality
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('userSidebar');
            const sidebarToggle = document.getElementById('sidebarToggle');
            const mobileSidebarToggle = document.getElementById('mobileSidebarToggle');
            
            // Check if sidebar should be collapsed by default (from localStorage)
            const isCollapsed = localStorage.getItem('sidebarCollapsed') === 'true';
            
            if (sidebar && isCollapsed) {
                sidebar.classList.add('collapsed');
            }
            
            // Desktop sidebar toggle
            if (sidebarToggle) {
                sidebarToggle.addEventListener('click', function() {
                    sidebar.classList.toggle('collapsed');
                    
                    if (sidebar.classList.contains('collapsed')) {
                        localStorage.setItem('sidebarCollapsed', 'true');
                    } else {
                        localStorage.setItem('sidebarCollapsed', 'false');
                    }
                });
            }
            
            // Mobile sidebar toggle
            if (mobileSidebarToggle) {
                mobileSidebarToggle.addEventListener('click', function() {
                    if (sidebar) {
                        sidebar.classList.toggle('mobile-open');
                    }
                });
            }
            
            // Close sidebar when clicking outside on mobile
            document.addEventListener('click', function(event) {
                if (sidebar && mobileSidebarToggle && 
                    window.innerWidth < 992 && 
                    !sidebar.contains(event.target) && 
                    event.target !== mobileSidebarToggle && 
                    !mobileSidebarToggle.contains(event.target)) {
                    sidebar.classList.remove('mobile-open');
                }
            });
            
            // Initialize Bootstrap dropdowns
            var dropdownElements = [].slice.call(document.querySelectorAll('.sidebar-dropdown'));
            dropdownElements.map(function(dropdownEl) {
                return new bootstrap.Dropdown(dropdownEl);
            });
            
            // Close dropdown when clicking on a dropdown item
            document.querySelectorAll('.sidebar-dropdown-item').forEach(function(item) {
                item.addEventListener('click', function() {
                    // Close parent dropdown
                    var dropdown = this.closest('.sidebar-dropdown');
                    var bsDropdown = bootstrap.Dropdown.getInstance(dropdown.querySelector('.sidebar-link'));
                    if (bsDropdown) {
                        bsDropdown.hide();
                    }
                    
                    // On mobile, close sidebar after selection
                    if (window.innerWidth < 992 && sidebar) {
                        sidebar.classList.remove('mobile-open');
                    }
                });
            });
        });
    </script>
    
</body>
</html>