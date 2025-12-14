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
        }
        
        /* Navbar Styles */
        .job-navbar {
            background-color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 0.8rem 0;
        }
        
        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: var(--primary-color) !important;
        }
        
        .navbar-brand i {
            margin-right: 8px;
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
        
        /* Footer Styles - Add these */
        .job-footer {
            background-color: white;
            border-top: 1px solid #e5e7eb;
            margin-top: 4rem;
            padding: 3rem 0 1.5rem;
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
        
        .footer-bottom {
            border-top: 1px solid #e5e7eb;
            margin-top: 2rem;
            padding-top: 1.5rem;
            text-align: center;
            color: var(--text-light);
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
        
        /* Button styling with the new primary color */
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
        a:not(.nav-link):not(.dropdown-item):not(.social-icon) {
            color: var(--primary-color);
            text-decoration: none;
        }
        
        a:not(.nav-link):not(.dropdown-item):not(.social-icon):hover {
            color: var(--primary-dark);
            text-decoration: underline;
        }
        
        /* Responsive */
        @media (max-width: 992px) {
            .navbar-nav {
                padding-top: 1rem;
            }
            
            .nav-link {
                margin: 2px 0;
                padding: 0.7rem 1rem !important;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg job-navbar">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand" href="{{route('welcome')}}">
                <img src="{{asset('images/logo.png')}}" height="60px" alt="JobSphere">
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
                        <a class="nav-link @if(request()->routeIs('jobs')) active @endif" href="{{route('jobs')}}">
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
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    @yield('content')
    
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
                        <li><a href="{{route('jobs')}}">Find Jobs</a></li>
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
            
            <div class="footer-bottom">
                <p>&copy; 2025 JobSphere. All rights reserved.</p>
                <div style="font-size: 0.9rem;">
                    <a href="#" style="color: var(--text-light); margin: 0 10px;">Privacy Policy</a>
                    <span>|</span>
                    <a href="#" style="color: var(--text-light); margin: 0 10px;">Terms of Service</a>
                    <span>|</span>
                    <a href="#" style="color: var(--text-light); margin: 0 10px;">Cookie Policy</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer End -->
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>