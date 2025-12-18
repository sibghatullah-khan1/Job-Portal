@extends('layouts.header')
@section('title', Auth::user()->name)
@section('content')
<div class="profile-page">
    <!-- Page Header -->
    <div class="page-header">
        <div class="container">
            <div class="header-content">
                <div class="header-text">
                    <h1 class="page-title">
                        <i class="fa fa-user"></i>
                        My Profile
                    </h1>
                    <p class="page-subtitle">Manage your account information and preferences</p>
                </div>
                <div class="header-actions">
                    <button class="btn btn-outline" id="printProfile">
                        <i class="fa fa-print"></i> Print Profile
                    </button>
                    <button class="btn btn-primary" id="shareProfile">
                        <i class="fa fa-share-alt"></i> Share Profile
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <!-- Profile Overview -->
        <div class="profile-overview">
            <div class="profile-main">
                <!-- Profile Header -->
                <div class="profile-header">
                    <div class="profile-avatar">
                        <div class="avatar-container">
                            <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=FC0002&color=fff&size=150" 
                                 alt="{{ Auth::user()->name }}" class="avatar-image" id="profileAvatar">
                            <div class="avatar-overlay">
                                <input type="file" id="avatarUpload" accept="image/*" style="display: none;">
                                <button class="avatar-upload-btn" onclick="document.getElementById('avatarUpload').click()">
                                    <i class="fa fa-camera"></i>
                                </button>
                            </div>
                        </div>
                        <div class="avatar-status">
                            <span class="status-dot online"></span>
                            <span class="status-text">Online</span>
                        </div>
                    </div>
                    
                    <div class="profile-info">
                        <div class="profile-name-actions">
                            <div>
                                <h1 class="profile-name">{{ Auth::user()->name }}</h1>
                                <p class="profile-title" id="profileTitle">Senior Frontend Developer</p>
                                <div class="profile-badges">
                                    <span class="badge verified">
                                        <i class="fa fa-check-circle"></i> Verified Profile
                                    </span>
                                    <span class="badge premium">
                                        <i class="fa fa-star"></i> Premium Member
                                    </span>
                                </div>
                            </div>
                            <div class="profile-actions">
                                <button class="btn btn-outline" id="editProfileBtn">
                                    <i class="fa fa-edit"></i> Edit Profile
                                </button>
                                <button class="btn btn-primary" id="downloadCV">
                                    <i class="fa fa-download"></i> Download CV
                                </button>
                            </div>
                        </div>
                        
                        <div class="profile-stats">
                            <div class="stat-item">
                                <div class="stat-number">85%</div>
                                <div class="stat-label">Profile Completion</div>
                                <div class="progress-bar">
                                    <div class="progress-fill" style="width: 85%"></div>
                                </div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-number">24</div>
                                <div class="stat-label">Jobs Applied</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-number">8</div>
                                <div class="stat-label">Interviews</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-number">2</div>
                                <div class="stat-label">Offers</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact Info -->
                <div class="contact-info">
                    <div class="contact-grid">
                        <div class="contact-item">
                            <i class="fa fa-envelope"></i>
                            <div class="contact-details">
                                <span class="contact-label">Email</span>
                                <span class="contact-value" id="contactEmail">{{ Auth::user()->email }}</span>
                            </div>
                        </div>
                        <div class="contact-item">
                            <i class="fa fa-phone"></i>
                            <div class="contact-details">
                                <span class="contact-label">Phone</span>
                                <span class="contact-value" id="contactPhone">+1 (555) 123-4567</span>
                            </div>
                        </div>
                        <div class="contact-item">
                            <i class="fa fa-map-marker"></i>
                            <div class="contact-details">
                                <span class="contact-label">Location</span>
                                <span class="contact-value" id="contactLocation">San Francisco, CA</span>
                            </div>
                        </div>
                        <div class="contact-item">
                            <i class="fa fa-link"></i>
                            <div class="contact-details">
                                <span class="contact-label">Portfolio</span>
                                <a href="#" class="contact-value" id="contactPortfolio">portfolio.example.com</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Profile Sidebar -->
            <div class="profile-sidebar">
                <div class="sidebar-card">
                    <h3 class="sidebar-title">
                        <i class="fa fa-shield"></i>
                        Account Security
                    </h3>
                    <div class="security-status">
                        <div class="security-item">
                            <i class="fa fa-lock"></i>
                            <div class="security-details">
                                <span class="security-label">Password</span>
                                <span class="security-status-text">Last changed 30 days ago</span>
                            </div>
                            <button class="btn-change" onclick="changePassword()">Change</button>
                        </div>
                        <div class="security-item">
                            <i class="fa fa-mobile"></i>
                            <div class="security-details">
                                <span class="security-label">2FA</span>
                                <span class="security-status-text">Not enabled</span>
                            </div>
                            <button class="btn-enable" onclick="enable2FA()">Enable</button>
                        </div>
                        <div class="security-item">
                            <i class="fa fa-clock-o"></i>
                            <div class="security-details">
                                <span class="security-label">Last Login</span>
                                <span class="security-status-text">Today, 10:30 AM</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="sidebar-card">
                    <h3 class="sidebar-title">
                        <i class="fa fa-bell"></i>
                        Notification Settings
                    </h3>
                    <div class="notification-settings">
                        <label class="switch">
                            <input type="checkbox" checked>
                            <span class="slider"></span>
                            <span class="switch-label">Email Notifications</span>
                        </label>
                        <label class="switch">
                            <input type="checkbox" checked>
                            <span class="slider"></span>
                            <span class="switch-label">SMS Alerts</span>
                        </label>
                        <label class="switch">
                            <input type="checkbox">
                            <span class="slider"></span>
                            <span class="switch-label">Job Recommendations</span>
                        </label>
                    </div>
                </div>

                <div class="sidebar-card">
                    <h3 class="sidebar-title">
                        <i class="fa fa-eye"></i>
                        Profile Visibility
                    </h3>
                    <div class="visibility-settings">
                        <div class="visibility-option">
                            <label class="radio-label">
                                <input type="radio" name="visibility" checked>
                                <span class="radio-custom"></span>
                                <span class="radio-text">Public</span>
                            </label>
                            <span class="visibility-desc">Visible to all employers</span>
                        </div>
                        <div class="visibility-option">
                            <label class="radio-label">
                                <input type="radio" name="visibility">
                                <span class="radio-custom"></span>
                                <span class="radio-text">Private</span>
                            </label>
                            <span class="visibility-desc">Visible only to employers you apply to</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Profile Tabs -->
        <div class="profile-tabs">
            <div class="tabs-header">
                <button class="tab-btn active" data-tab="about">About</button>
                <button class="tab-btn" data-tab="experience">Experience</button>
                <button class="tab-btn" data-tab="education">Education</button>
                <button class="tab-btn" data-tab="skills">Skills</button>
                <button class="tab-btn" data-tab="portfolio">Portfolio</button>
                <button class="tab-btn" data-tab="settings">Settings</button>
            </div>

            <div class="tabs-content">
                <!-- About Tab -->
                <div class="tab-pane active" id="about-tab">
                    <div class="about-section">
                        <div class="section-header">
                            <h3><i class="fa fa-user"></i> Professional Summary</h3>
                            <button class="btn-edit" onclick="editSummary()">Edit</button>
                        </div>
                        <div class="summary-content" id="summaryContent">
                            <p>Experienced Frontend Developer with 5+ years of expertise in building responsive web applications using React, Vue.js, and modern JavaScript frameworks. Passionate about creating intuitive user interfaces and optimizing frontend performance. Strong background in agile development methodologies and cross-functional team collaboration.</p>
                        </div>

                        <div class="section-header">
                            <h3><i class="fa fa-language"></i> Languages</h3>
                            <button class="btn-edit" onclick="editLanguages()">Edit</button>
                        </div>
                        <div class="languages-list" id="languagesList">
                            <div class="language-item">
                                <span class="language-name">English</span>
                                <div class="language-proficiency">
                                    <span class="proficiency-level">Native</span>
                                    <div class="proficiency-dots">
                                        <span class="dot filled"></span>
                                        <span class="dot filled"></span>
                                        <span class="dot filled"></span>
                                        <span class="dot filled"></span>
                                        <span class="dot filled"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="language-item">
                                <span class="language-name">Spanish</span>
                                <div class="language-proficiency">
                                    <span class="proficiency-level">Professional</span>
                                    <div class="proficiency-dots">
                                        <span class="dot filled"></span>
                                        <span class="dot filled"></span>
                                        <span class="dot filled"></span>
                                        <span class="dot filled"></span>
                                        <span class="dot"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="language-item">
                                <span class="language-name">French</span>
                                <div class="language-proficiency">
                                    <span class="proficiency-level">Intermediate</span>
                                    <div class="proficiency-dots">
                                        <span class="dot filled"></span>
                                        <span class="dot filled"></span>
                                        <span class="dot filled"></span>
                                        <span class="dot"></span>
                                        <span class="dot"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="section-header">
                            <h3><i class="fa fa-certificate"></i> Certifications</h3>
                            <button class="btn-edit" onclick="editCertifications()">Edit</button>
                        </div>
                        <div class="certifications-list" id="certificationsList">
                            <div class="certification-item">
                                <div class="certification-icon">
                                    <i class="fa fa-award"></i>
                                </div>
                                <div class="certification-details">
                                    <h4>React Developer Certification</h4>
                                    <span class="certification-issuer">Meta</span>
                                    <span class="certification-date">Issued: June 2023</span>
                                </div>
                            </div>
                            <div class="certification-item">
                                <div class="certification-icon">
                                    <i class="fa fa-award"></i>
                                </div>
                                <div class="certification-details">
                                    <h4>Google UX Design Professional</h4>
                                    <span class="certification-issuer">Google</span>
                                    <span class="certification-date">Issued: March 2023</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Experience Tab -->
                <div class="tab-pane" id="experience-tab">
                    <div class="experience-section">
                        <div class="section-header">
                            <h3><i class="fa fa-briefcase"></i> Work Experience</h3>
                            <button class="btn-add" onclick="addExperience()">
                                <i class="fa fa-plus"></i> Add Experience
                            </button>
                        </div>
                        <div class="experience-list" id="experienceList">
                            <!-- Experience 1 -->
                            <div class="experience-item">
                                <div class="experience-header">
                                    <div class="company-logo">
                                        <i class="fa fa-building"></i>
                                    </div>
                                    <div class="experience-details">
                                        <h4>Senior Frontend Developer</h4>
                                        <span class="company-name">TechCorp Inc.</span>
                                        <span class="experience-duration">Jan 2021 - Present · 3 years</span>
                                        <span class="experience-location">San Francisco, CA</span>
                                    </div>
                                    <div class="experience-actions">
                                        <button class="btn-action" title="Edit">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button class="btn-action" title="Delete">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="experience-description">
                                    <p>Lead frontend development for multiple client projects using React and TypeScript. Improved application performance by 40% through code optimization. Mentored 3 junior developers and established coding standards.</p>
                                    <div class="experience-tags">
                                        <span class="tag">React</span>
                                        <span class="tag">TypeScript</span>
                                        <span class="tag">Redux</span>
                                        <span class="tag">Next.js</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Experience 2 -->
                            <div class="experience-item">
                                <div class="experience-header">
                                    <div class="company-logo">
                                        <i class="fa fa-building"></i>
                                    </div>
                                    <div class="experience-details">
                                        <h4>Frontend Developer</h4>
                                        <span class="company-name">Digital Solutions</span>
                                        <span class="experience-duration">Mar 2019 - Dec 2020 · 1 year 9 months</span>
                                        <span class="experience-location">New York, NY</span>
                                    </div>
                                    <div class="experience-actions">
                                        <button class="btn-action" title="Edit">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button class="btn-action" title="Delete">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="experience-description">
                                    <p>Developed and maintained responsive web applications using Vue.js and JavaScript. Collaborated with UX designers to implement pixel-perfect interfaces. Reduced page load time by 30% through performance optimization.</p>
                                    <div class="experience-tags">
                                        <span class="tag">Vue.js</span>
                                        <span class="tag">JavaScript</span>
                                        <span class="tag">SCSS</span>
                                        <span class="tag">Webpack</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Education Tab -->
                <div class="tab-pane" id="education-tab">
                    <div class="education-section">
                        <div class="section-header">
                            <h3><i class="fa fa-graduation-cap"></i> Education</h3>
                            <button class="btn-add" onclick="addEducation()">
                                <i class="fa fa-plus"></i> Add Education
                            </button>
                        </div>
                        <div class="education-list" id="educationList">
                            <!-- Education 1 -->
                            <div class="education-item">
                                <div class="education-header">
                                    <div class="institution-logo">
                                        <i class="fa fa-university"></i>
                                    </div>
                                    <div class="education-details">
                                        <h4>Master of Science in Computer Science</h4>
                                        <span class="institution-name">Stanford University</span>
                                        <span class="education-duration">2017 - 2019</span>
                                        <span class="education-grade">GPA: 3.8/4.0</span>
                                    </div>
                                    <div class="education-actions">
                                        <button class="btn-action" title="Edit">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button class="btn-action" title="Delete">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="education-description">
                                    <p>Specialized in Human-Computer Interaction and Web Technologies. Published research paper on "Optimizing Frontend Performance in Modern Web Applications."</p>
                                </div>
                            </div>

                            <!-- Education 2 -->
                            <div class="education-item">
                                <div class="education-header">
                                    <div class="institution-logo">
                                        <i class="fa fa-university"></i>
                                    </div>
                                    <div class="education-details">
                                        <h4>Bachelor of Engineering in Computer Science</h4>
                                        <span class="institution-name">MIT</span>
                                        <span class="education-duration">2013 - 2017</span>
                                        <span class="education-grade">GPA: 3.9/4.0</span>
                                    </div>
                                    <div class="education-actions">
                                        <button class="btn-action" title="Edit">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button class="btn-action" title="Delete">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="education-description">
                                    <p>Graduated with Honors. President of Web Development Club. Completed thesis on "Progressive Web Applications."</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Skills Tab -->
                <div class="tab-pane" id="skills-tab">
                    <div class="skills-section">
                        <div class="section-header">
                            <h3><i class="fa fa-code"></i> Technical Skills</h3>
                            <button class="btn-add" onclick="addSkill()">
                                <i class="fa fa-plus"></i> Add Skill
                            </button>
                        </div>
                        <div class="skills-list" id="skillsList">
                            <!-- Technical Skills -->
                            <div class="skill-category">
                                <h4>Frontend Development</h4>
                                <div class="skill-items">
                                    <div class="skill-item">
                                        <span class="skill-name">React</span>
                                        <div class="skill-level">
                                            <div class="level-dots">
                                                <span class="dot filled"></span>
                                                <span class="dot filled"></span>
                                                <span class="dot filled"></span>
                                                <span class="dot filled"></span>
                                                <span class="dot filled"></span>
                                            </div>
                                            <span class="level-text">Expert</span>
                                        </div>
                                        <div class="skill-actions">
                                            <button class="btn-action" title="Edit">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="skill-item">
                                        <span class="skill-name">TypeScript</span>
                                        <div class="skill-level">
                                            <div class="level-dots">
                                                <span class="dot filled"></span>
                                                <span class="dot filled"></span>
                                                <span class="dot filled"></span>
                                                <span class="dot filled"></span>
                                                <span class="dot"></span>
                                            </div>
                                            <span class="level-text">Advanced</span>
                                        </div>
                                        <div class="skill-actions">
                                            <button class="btn-action" title="Edit">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="skill-category">
                                <h4>Backend Development</h4>
                                <div class="skill-items">
                                    <div class="skill-item">
                                        <span class="skill-name">Node.js</span>
                                        <div class="skill-level">
                                            <div class="level-dots">
                                                <span class="dot filled"></span>
                                                <span class="dot filled"></span>
                                                <span class="dot filled"></span>
                                                <span class="dot"></span>
                                                <span class="dot"></span>
                                            </div>
                                            <span class="level-text">Intermediate</span>
                                        </div>
                                        <div class="skill-actions">
                                            <button class="btn-action" title="Edit">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="skill-category">
                                <h4>Tools & Technologies</h4>
                                <div class="skill-items">
                                    <div class="skill-item">
                                        <span class="skill-name">Git</span>
                                        <div class="skill-level">
                                            <div class="level-dots">
                                                <span class="dot filled"></span>
                                                <span class="dot filled"></span>
                                                <span class="dot filled"></span>
                                                <span class="dot filled"></span>
                                                <span class="dot"></span>
                                            </div>
                                            <span class="level-text">Advanced</span>
                                        </div>
                                        <div class="skill-actions">
                                            <button class="btn-action" title="Edit">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Portfolio Tab -->
                <div class="tab-pane" id="portfolio-tab">
                    <div class="portfolio-section">
                        <div class="section-header">
                            <h3><i class="fa fa-briefcase"></i> Projects & Portfolio</h3>
                            <button class="btn-add" onclick="addProject()">
                                <i class="fa fa-plus"></i> Add Project
                            </button>
                        </div>
                        <div class="portfolio-grid" id="portfolioGrid">
                            <!-- Project 1 -->
                            <div class="project-card">
                                <div class="project-image">
                                    <img src="https://via.placeholder.com/300x200" alt="E-commerce Platform">
                                    <div class="project-overlay">
                                        <button class="btn-view">View Project</button>
                                    </div>
                                </div>
                                <div class="project-content">
                                    <h4>E-commerce Platform</h4>
                                    <p>Built a full-featured e-commerce platform with React and Node.js</p>
                                    <div class="project-tags">
                                        <span class="tag">React</span>
                                        <span class="tag">Node.js</span>
                                        <span class="tag">MongoDB</span>
                                    </div>
                                    <div class="project-actions">
                                        <button class="btn-action" title="Edit">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button class="btn-action" title="Delete">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Project 2 -->
                            <div class="project-card">
                                <div class="project-image">
                                    <img src="https://via.placeholder.com/300x200" alt="Task Management App">
                                    <div class="project-overlay">
                                        <button class="btn-view">View Project</button>
                                    </div>
                                </div>
                                <div class="project-content">
                                    <h4>Task Management App</h4>
                                    <p>Real-time task management application with Vue.js and Firebase</p>
                                    <div class="project-tags">
                                        <span class="tag">Vue.js</span>
                                        <span class="tag">Firebase</span>
                                        <span class="tag">PWA</span>
                                    </div>
                                    <div class="project-actions">
                                        <button class="btn-action" title="Edit">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button class="btn-action" title="Delete">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Settings Tab -->
                <div class="tab-pane" id="settings-tab">
                    <div class="settings-section">
                        <div class="settings-grid">
                            <!-- Account Settings -->
                            <div class="settings-card">
                                <h3><i class="fa fa-user-cog"></i> Account Settings</h3>
                                <div class="settings-form">
                                    <div class="form-group">
                                        <label>Display Name</label>
                                        <input type="text" class="form-control" value="{{ Auth::user()->name }}" id="displayName">
                                    </div>
                                    <div class="form-group">
                                        <label>Email Address</label>
                                        <input type="email" class="form-control" value="{{ Auth::user()->email }}" id="emailAddress">
                                    </div>
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input type="tel" class="form-control" value="+1 (555) 123-4567" id="phoneNumber">
                                    </div>
                                    <button class="btn btn-primary" onclick="updateAccount()">Save Changes</button>
                                </div>
                            </div>

                            <!-- Privacy Settings -->
                            <div class="settings-card">
                                <h3><i class="fa fa-shield"></i> Privacy Settings</h3>
                                <div class="settings-options">
                                    <label class="checkbox-label">
                                        <input type="checkbox" checked>
                                        <span class="checkbox-custom"></span>
                                        <span class="checkbox-text">Show profile to employers</span>
                                    </label>
                                    <label class="checkbox-label">
                                        <input type="checkbox">
                                        <span class="checkbox-custom"></span>
                                        <span class="checkbox-text">Allow connection requests</span>
                                    </label>
                                    <label class="checkbox-label">
                                        <input type="checkbox" checked>
                                        <span class="checkbox-custom"></span>
                                        <span class="checkbox-text">Show online status</span>
                                    </label>
                                    <label class="checkbox-label">
                                        <input type="checkbox">
                                        <span class="checkbox-custom"></span>
                                        <span class="checkbox-text">Allow search engine indexing</span>
                                    </label>
                                </div>
                            </div>

                            <!-- Danger Zone -->
                            <div class="settings-card danger-zone">
                                <h3><i class="fa fa-exclamation-triangle"></i> Danger Zone</h3>
                                <div class="danger-actions">
                                    <button class="btn btn-outline" onclick="deactivateAccount()">
                                        <i class="fa fa-user-times"></i> Deactivate Account
                                    </button>
                                    <button class="btn btn-danger" onclick="deleteAccount()">
                                        <i class="fa fa-trash"></i> Delete Account Permanently
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Reset and base styles */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        background: #f8fafc;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }

    /* Color Variables */
    :root {
        --primary-color: #FC0002;
        --primary-light: rgba(252, 0, 2, 0.1);
        --success-color: #28a745;
        --warning-color: #ffc107;
        --danger-color: #dc3545;
        --info-color: #17a2b8;
        --text-dark: #333333;
        --text-light: #666666;
        --border-color: #e5e7eb;
        --background-light: #f9fafb;
        --card-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    /* Page Header */
    .page-header {
        background: var(--primary-color);
        color: white;
        padding: 30px 0;
        margin-bottom: 30px;
    }

    .header-content {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 20px;
    }

    .header-text h1 {
        margin: 0 0 10px 0;
        font-size: 28px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .header-text p {
        margin: 0;
        opacity: 0.9;
    }

    /* Buttons */
    .btn {
        padding: 10px 20px;
        border-radius: 6px;
        font-weight: 600;
        font-size: 14px;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        border: 2px solid transparent;
        text-decoration: none;
    }

    .btn-primary {
        background: white;
        color: var(--primary-color) !important;
        border-color: white;
    }

    .btn-primary:hover {
        background: transparent;
        color: white !important;
    }

    .btn-outline {
        background: transparent;
        color: white !important;
        border-color: white;
    }

    .btn-outline:hover {
        background: white;
        color: var(--primary-color) !important;
    }

    .btn-success {
        background: var(--success-color);
        color: white !important;
        border: none;
    }

    .btn-success:hover {
        opacity: 0.9;
    }

    .btn-danger {
        background: var(--danger-color);
        color: white !important;
        border: none;
    }

    .btn-danger:hover {
        opacity: 0.9;
    }

    /* Profile Overview */
    .profile-overview {
        display: grid;
        grid-template-columns: 1fr 350px;
        gap: 30px;
        margin-bottom: 30px;
    }

    @media (max-width: 992px) {
        .profile-overview {
            grid-template-columns: 1fr;
        }
    }

    /* Profile Header */
    .profile-header {
        background: white;
        border-radius: 15px;
        padding: 30px;
        box-shadow: var(--card-shadow);
        margin-bottom: 20px;
        display: flex;
        gap: 30px;
        align-items: center;
    }

    @media (max-width: 768px) {
        .profile-header {
            flex-direction: column;
            text-align: center;
            padding: 20px;
        }
    }

    .profile-avatar {
        position: relative;
    }

    .avatar-container {
        position: relative;
        width: 150px;
        height: 150px;
        border-radius: 50%;
        overflow: hidden;
        border: 5px solid white;
        box-shadow: 0 0 20px rgba(0,0,0,0.1);
    }

    .avatar-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .avatar-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0,0,0,0.5);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .avatar-container:hover .avatar-overlay {
        opacity: 1;
    }

    .avatar-upload-btn {
        width: 40px;
        height: 40px;
        background: white;
        border: none;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        color: var(--primary-color);
        font-size: 16px;
    }

    .avatar-status {
        display: flex;
        align-items: center;
        gap: 5px;
        margin-top: 10px;
        justify-content: center;
    }

    .status-dot {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background: #28a745;
    }

    .status-dot.online {
        background: #28a745;
    }

    .status-dot.offline {
        background: #dc3545;
    }

    .status-text {
        font-size: 12px;
        color: var(--text-light);
    }

    .profile-info {
        flex: 1;
    }

    .profile-name-actions {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 20px;
        flex-wrap: wrap;
        gap: 20px;
    }

    .profile-name {
        margin: 0 0 5px 0;
        font-size: 32px;
        color: var(--text-dark);
    }

    .profile-title {
        margin: 0 0 15px 0;
        color: var(--text-light);
        font-size: 18px;
    }

    .profile-badges {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
    }

    .badge {
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }

    .badge.verified {
        background: #d4edda;
        color: #155724;
    }

    .badge.premium {
        background: #fff3cd;
        color: #856404;
    }

    .profile-actions {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
    }

    .profile-actions .btn {
        padding: 8px 16px;
        font-size: 14px;
    }

    .profile-stats {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        gap: 20px;
        background: var(--background-light);
        padding: 20px;
        border-radius: 10px;
    }

    .stat-item {
        text-align: center;
    }

    .stat-number {
        font-size: 24px;
        font-weight: 700;
        color: var(--primary-color);
        margin-bottom: 5px;
    }

    .stat-label {
        font-size: 12px;
        color: var(--text-light);
        margin-bottom: 8px;
        display: block;
    }

    .progress-bar {
        height: 6px;
        background: #e9ecef;
        border-radius: 3px;
        overflow: hidden;
    }

    .progress-fill {
        height: 100%;
        background: var(--primary-color);
        border-radius: 3px;
    }

    /* Contact Info */
    .contact-info {
        background: white;
        border-radius: 15px;
        padding: 25px;
        box-shadow: var(--card-shadow);
    }

    .contact-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
    }

    .contact-item {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .contact-item i {
        width: 40px;
        height: 40px;
        background: var(--primary-light);
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--primary-color);
        font-size: 18px;
    }

    .contact-details {
        flex: 1;
    }

    .contact-label {
        display: block;
        font-size: 12px;
        color: var(--text-light);
        margin-bottom: 3px;
    }

    .contact-value {
        display: block;
        font-size: 14px;
        color: var(--text-dark);
        font-weight: 500;
    }

    .contact-value a {
        color: var(--primary-color);
        text-decoration: none;
    }

    .contact-value a:hover {
        text-decoration: underline;
    }

    /* Profile Sidebar */
    .profile-sidebar {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .sidebar-card {
        background: white;
        border-radius: 15px;
        padding: 25px;
        box-shadow: var(--card-shadow);
    }

    .sidebar-title {
        margin: 0 0 20px 0;
        font-size: 18px;
        color: var(--text-dark);
        display: flex;
        align-items: center;
        gap: 10px;
    }

    /* Security Status */
    .security-status {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .security-item {
        display: flex;
        align-items: center;
        gap: 15px;
        padding: 10px 0;
        border-bottom: 1px solid var(--border-color);
    }

    .security-item:last-child {
        border-bottom: none;
    }

    .security-item i {
        width: 30px;
        height: 30px;
        background: var(--primary-light);
        border-radius: 6px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--primary-color);
        font-size: 14px;
    }

    .security-details {
        flex: 1;
    }

    .security-label {
        display: block;
        font-weight: 600;
        color: var(--text-dark);
        margin-bottom: 2px;
    }

    .security-status-text {
        display: block;
        font-size: 12px;
        color: var(--text-light);
    }

    .btn-change, .btn-enable {
        padding: 6px 12px;
        border: 1px solid var(--primary-color);
        background: transparent;
        color: var(--primary-color);
        border-radius: 4px;
        font-size: 12px;
        font-weight: 600;
        cursor: pointer;
    }

    .btn-enable {
        background: var(--primary-color);
        color: white;
    }

    /* Notification Settings */
    .notification-settings {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .switch {
        display: flex;
        align-items: center;
        gap: 10px;
        cursor: pointer;
    }

    .switch input {
        display: none;
    }

    .slider {
        position: relative;
        width: 40px;
        height: 20px;
        background: #ccc;
        border-radius: 20px;
        transition: background 0.3s ease;
    }

    .slider:before {
        content: '';
        position: absolute;
        width: 16px;
        height: 16px;
        background: white;
        border-radius: 50%;
        top: 2px;
        left: 2px;
        transition: transform 0.3s ease;
    }

    input:checked + .slider {
        background: var(--primary-color);
    }

    input:checked + .slider:before {
        transform: translateX(20px);
    }

    .switch-label {
        font-size: 14px;
        color: var(--text-dark);
    }

    /* Visibility Settings */
    .visibility-settings {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .visibility-option {
        display: flex;
        flex-direction: column;
        gap: 5px;
    }

    .radio-label {
        display: flex;
        align-items: center;
        gap: 10px;
        cursor: pointer;
    }

    .radio-label input {
        display: none;
    }

    .radio-custom {
        width: 18px;
        height: 18px;
        border: 2px solid #ccc;
        border-radius: 50%;
        position: relative;
    }

    .radio-label input:checked + .radio-custom {
        border-color: var(--primary-color);
    }

    .radio-label input:checked + .radio-custom:after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 10px;
        height: 10px;
        background: var(--primary-color);
        border-radius: 50%;
    }

    .radio-text {
        font-size: 14px;
        color: var(--text-dark);
        font-weight: 600;
    }

    .visibility-desc {
        font-size: 12px;
        color: var(--text-light);
        margin-left: 28px;
    }

    /* Profile Tabs */
    .profile-tabs {
        background: white;
        border-radius: 15px;
        box-shadow: var(--card-shadow);
        overflow: hidden;
        margin-bottom: 30px;
    }

    .tabs-header {
        display: flex;
        border-bottom: 1px solid var(--border-color);
        background: var(--background-light);
        overflow-x: auto;
    }

    .tab-btn {
        padding: 15px 25px;
        background: none;
        border: none;
        font-size: 14px;
        font-weight: 600;
        color: var(--text-light);
        cursor: pointer;
        white-space: nowrap;
        border-bottom: 3px solid transparent;
        transition: all 0.3s ease;
    }

    .tab-btn:hover {
        color: var(--primary-color);
    }

    .tab-btn.active {
        color: var(--primary-color);
        border-bottom-color: var(--primary-color);
    }

    .tabs-content {
        padding: 30px;
    }

    .tab-pane {
        display: none;
    }

    .tab-pane.active {
        display: block;
    }

    /* About Tab */
    .section-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
        padding-bottom: 15px;
        border-bottom: 2px solid var(--border-color);
    }

    .section-header h3 {
        margin: 0;
        font-size: 18px;
        color: var(--text-dark);
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .btn-edit, .btn-add {
        padding: 8px 16px;
        background: var(--primary-color);
        color: white;
        border: none;
        border-radius: 6px;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .btn-add {
        background: transparent;
        color: var(--primary-color);
        border: 1px solid var(--primary-color);
    }

    .summary-content {
        margin-bottom: 30px;
    }

    .summary-content p {
        line-height: 1.6;
        color: var(--text-dark);
    }

    /* Languages List */
    .languages-list {
        display: flex;
        flex-direction: column;
        gap: 15px;
        margin-bottom: 30px;
    }

    .language-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 15px;
        background: var(--background-light);
        border-radius: 8px;
    }

    .language-name {
        font-weight: 600;
        color: var(--text-dark);
    }

    .language-proficiency {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .proficiency-level {
        font-size: 12px;
        color: var(--text-light);
        min-width: 80px;
    }

    .proficiency-dots {
        display: flex;
        gap: 5px;
    }

    .dot {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background: #e9ecef;
    }

    .dot.filled {
        background: var(--primary-color);
    }

    /* Certifications List */
    .certifications-list {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .certification-item {
        display: flex;
        align-items: center;
        gap: 15px;
        padding: 15px;
        background: var(--background-light);
        border-radius: 8px;
    }

    .certification-icon {
        width: 40px;
        height: 40px;
        background: var(--primary-light);
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--primary-color);
        font-size: 18px;
    }

    .certification-details {
        flex: 1;
    }

    .certification-details h4 {
        margin: 0 0 5px 0;
        font-size: 16px;
        color: var(--text-dark);
    }

    .certification-issuer, .certification-date {
        display: block;
        font-size: 12px;
        color: var(--text-light);
    }

    /* Experience & Education Lists */
    .experience-list, .education-list {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .experience-item, .education-item {
        padding: 20px;
        background: var(--background-light);
        border-radius: 10px;
        border-left: 4px solid var(--primary-color);
    }

    .experience-header, .education-header {
        display: flex;
        gap: 15px;
        margin-bottom: 15px;
        position: relative;
    }

    .company-logo, .institution-logo {
        width: 50px;
        height: 50px;
        background: white;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--primary-color);
        font-size: 20px;
        flex-shrink: 0;
    }

    .experience-details, .education-details {
        flex: 1;
    }

    .experience-details h4, .education-details h4 {
        margin: 0 0 5px 0;
        font-size: 16px;
        color: var(--text-dark);
    }

    .company-name, .institution-name {
        display: block;
        font-size: 14px;
        color: var(--text-light);
        margin-bottom: 5px;
    }

    .experience-duration, .education-duration,
    .experience-location, .education-grade {
        display: block;
        font-size: 12px;
        color: var(--text-light);
    }

    .experience-actions, .education-actions {
        display: flex;
        gap: 5px;
    }

    .btn-action {
        width: 32px;
        height: 32px;
        border: 1px solid var(--border-color);
        background: white;
        border-radius: 6px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--text-dark);
        cursor: pointer;
    }

    .btn-action:hover {
        border-color: var(--primary-color);
        color: var(--primary-color);
    }

    .experience-description, .education-description {
        color: var(--text-dark);
        line-height: 1.6;
        margin-bottom: 15px;
    }

    .experience-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
    }

    .tag {
        padding: 4px 12px;
        background: var(--primary-light);
        color: var(--primary-color);
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
    }

    /* Skills Section */
    .skill-category {
        margin-bottom: 25px;
    }

    .skill-category h4 {
        margin: 0 0 15px 0;
        font-size: 16px;
        color: var(--text-dark);
    }

    .skill-items {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .skill-item {
        display: flex;
        align-items: center;
        gap: 15px;
        padding: 12px;
        background: white;
        border: 1px solid var(--border-color);
        border-radius: 8px;
    }

    .skill-name {
        min-width: 120px;
        font-weight: 600;
        color: var(--text-dark);
    }

    .skill-level {
        flex: 1;
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .level-dots {
        display: flex;
        gap: 5px;
    }

    .level-text {
        font-size: 12px;
        color: var(--text-light);
        min-width: 70px;
    }

    /* Portfolio Grid */
    .portfolio-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 20px;
    }

    .project-card {
        background: white;
        border: 1px solid var(--border-color);
        border-radius: 10px;
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .project-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    }

    .project-image {
        position: relative;
        height: 200px;
        overflow: hidden;
    }

    .project-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .project-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0,0,0,0.7);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .project-card:hover .project-overlay {
        opacity: 1;
    }

    .btn-view {
        padding: 8px 16px;
        background: white;
        color: var(--primary-color);
        border: none;
        border-radius: 4px;
        font-weight: 600;
        cursor: pointer;
    }

    .project-content {
        padding: 20px;
    }

    .project-content h4 {
        margin: 0 0 10px 0;
        font-size: 16px;
        color: var(--text-dark);
    }

    .project-content p {
        margin: 0 0 15px 0;
        color: var(--text-light);
        font-size: 14px;
        line-height: 1.5;
    }

    .project-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 5px;
        margin-bottom: 15px;
    }

    .project-actions {
        display: flex;
        gap: 5px;
    }

    /* Settings Section */
    .settings-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 20px;
    }

    .settings-card {
        background: white;
        border: 1px solid var(--border-color);
        border-radius: 10px;
        padding: 25px;
    }

    .settings-card h3 {
        margin: 0 0 20px 0;
        font-size: 18px;
        color: var(--text-dark);
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .settings-form {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .form-group {
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    .form-group label {
        font-size: 14px;
        font-weight: 600;
        color: var(--text-dark);
    }

    .form-control {
        padding: 10px 12px;
        border: 1px solid var(--border-color);
        border-radius: 6px;
        font-size: 14px;
        transition: border-color 0.3s ease;
    }

    .form-control:focus {
        outline: none;
        border-color: var(--primary-color);
    }

    .settings-options {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .checkbox-label {
        display: flex;
        align-items: center;
        gap: 10px;
        cursor: pointer;
    }

    .checkbox-label input {
        display: none;
    }

    .checkbox-custom {
        width: 18px;
        height: 18px;
        border: 2px solid #ccc;
        border-radius: 4px;
        position: relative;
    }

    .checkbox-label input:checked + .checkbox-custom {
        background: var(--primary-color);
        border-color: var(--primary-color);
    }

    .checkbox-label input:checked + .checkbox-custom:after {
        content: '✓';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: white;
        font-size: 12px;
        font-weight: bold;
    }

    .checkbox-text {
        font-size: 14px;
        color: var(--text-dark);
    }

    /* Danger Zone */
    .danger-zone {
        border-color: var(--danger-color);
    }

    .danger-zone h3 {
        color: var(--danger-color);
    }

    .danger-actions {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .danger-actions .btn {
        justify-content: center;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .header-content {
            flex-direction: column;
            text-align: center;
        }
        
        .profile-name-actions {
            flex-direction: column;
            align-items: center;
        }
        
        .profile-actions {
            justify-content: center;
        }
        
        .profile-stats {
            grid-template-columns: repeat(2, 1fr);
        }
        
        .tabs-header {
            overflow-x: auto;
            flex-wrap: nowrap;
        }
        
        .tab-btn {
            padding: 12px 15px;
            font-size: 13px;
        }
        
        .portfolio-grid {
            grid-template-columns: 1fr;
        }
        
        .experience-header, .education-header {
            flex-wrap: wrap;
        }
        
        .experience-actions, .education-actions {
            position: absolute;
            top: 0;
            right: 0;
        }
    }

    @media (max-width: 480px) {
        .profile-stats {
            grid-template-columns: 1fr;
        }
        
        .contact-grid {
            grid-template-columns: 1fr;
        }
        
        .settings-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize tab functionality
    const tabButtons = document.querySelectorAll('.tab-btn');
    const tabPanes = document.querySelectorAll('.tab-pane');
    
    tabButtons.forEach(button => {
        button.addEventListener('click', function() {
            const tabId = this.dataset.tab;
            
            // Update active tab button
            tabButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
            
            // Show active tab pane
            tabPanes.forEach(pane => {
                pane.classList.remove('active');
                if (pane.id === `${tabId}-tab`) {
                    pane.classList.add('active');
                }
            });
        });
    });

    // Profile actions
    const editProfileBtn = document.getElementById('editProfileBtn');
    if (editProfileBtn) {
        editProfileBtn.addEventListener('click', function() {
            // Switch to settings tab
            document.querySelector('[data-tab="settings"]').click();
        });
    }

    // Download CV
    const downloadCVBtn = document.getElementById('downloadCV');
    if (downloadCVBtn) {
        downloadCVBtn.addEventListener('click', function() {
            alert('Downloading CV...');
            // Here you would typically generate and download the CV
            setTimeout(() => {
                alert('CV downloaded successfully!');
            }, 1000);
        });
    }

    // Print Profile
    const printProfileBtn = document.getElementById('printProfile');
    if (printProfileBtn) {
        printProfileBtn.addEventListener('click', function() {
            window.print();
        });
    }

    // Share Profile
    const shareProfileBtn = document.getElementById('shareProfile');
    if (shareProfileBtn) {
        shareProfileBtn.addEventListener('click', function() {
            if (navigator.share) {
                navigator.share({
                    title: 'My Profile',
                    text: 'Check out my professional profile',
                    url: window.location.href
                });
            } else {
                // Fallback for browsers that don't support Web Share API
                const shareUrl = window.location.href;
                navigator.clipboard.writeText(shareUrl).then(() => {
                    alert('Profile link copied to clipboard!');
                });
            }
        });
    }

    // Avatar upload
    const avatarUpload = document.getElementById('avatarUpload');
    const profileAvatar = document.getElementById('profileAvatar');
    
    if (avatarUpload && profileAvatar) {
        avatarUpload.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                if (file.size > 5 * 1024 * 1024) { // 5MB limit
                    alert('File size must be less than 5MB');
                    return;
                }
                
                if (!file.type.startsWith('image/')) {
                    alert('Please select an image file');
                    return;
                }
                
                const reader = new FileReader();
                reader.onload = function(e) {
                    profileAvatar.src = e.target.result;
                    // Here you would typically upload to server
                    alert('Profile picture updated successfully!');
                };
                reader.readAsDataURL(file);
            }
        });
    }

    // Update account settings
    window.updateAccount = function() {
        const displayName = document.getElementById('displayName').value;
        const email = document.getElementById('emailAddress').value;
        const phone = document.getElementById('phoneNumber').value;
        
        if (!displayName.trim()) {
            alert('Display name is required');
            return;
        }
        
        if (!email.trim()) {
            alert('Email is required');
            return;
        }
        
        // Simulate API call
        setTimeout(() => {
            alert('Account settings updated successfully!');
        }, 1000);
    };

    // Security functions
    window.changePassword = function() {
        const newPassword = prompt('Enter new password:');
        if (newPassword) {
            if (newPassword.length < 8) {
                alert('Password must be at least 8 characters');
                return;
            }
            alert('Password changed successfully!');
        }
    };

    window.enable2FA = function() {
        if (confirm('Enable two-factor authentication?')) {
            alert('2FA enabled! Scan the QR code with your authenticator app.');
        }
    };

    // Edit functions
    window.editSummary = function() {
        const currentText = document.getElementById('summaryContent').querySelector('p').textContent;
        const newText = prompt('Edit your professional summary:', currentText);
        if (newText !== null) {
            document.getElementById('summaryContent').querySelector('p').textContent = newText;
        }
    };

    window.editLanguages = function() {
        alert('Opening language editor...');
    };

    window.editCertifications = function() {
        alert('Opening certification editor...');
    };

    // Add functions
    window.addExperience = function() {
        alert('Opening experience form...');
    };

    window.addEducation = function() {
        alert('Opening education form...');
    };

    window.addSkill = function() {
        alert('Opening skill form...');
    };

    window.addProject = function() {
        alert('Opening project form...');
    };

    // Danger zone functions
    window.deactivateAccount = function() {
        if (confirm('Are you sure you want to deactivate your account? You can reactivate it later.')) {
            alert('Account deactivated successfully.');
        }
    };

    window.deleteAccount = function() {
        if (confirm('WARNING: This will permanently delete your account and all data. This action cannot be undone.\n\nType DELETE to confirm:')) {
            const confirmation = prompt('Type DELETE to confirm:');
            if (confirmation === 'DELETE') {
                alert('Account deletion scheduled. You will receive a confirmation email.');
            } else {
                alert('Account deletion cancelled.');
            }
        }
    };

    // Initialize profile stats based on content
    function updateProfileStats() {
        // This would typically come from an API
        // For now, we'll simulate dynamic updates
        const experienceItems = document.querySelectorAll('.experience-item').length;
        const educationItems = document.querySelectorAll('.education-item').length;
        const skillItems = document.querySelectorAll('.skill-item').length;
        const projectItems = document.querySelectorAll('.project-card').length;
        
        // Update completion percentage
        const totalItems = experienceItems + educationItems + skillItems + projectItems;
        const completion = Math.min(85 + (totalItems * 5), 100); // Simulated completion
        
        const progressFill = document.querySelector('.progress-fill');
        const statNumber = document.querySelector('.stat-number');
        
        if (progressFill && statNumber) {
            progressFill.style.width = completion + '%';
            statNumber.textContent = completion + '%';
        }
    }

    // Initialize
    updateProfileStats();
});
</script>
@endsection