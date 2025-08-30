
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candidate Panel</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            font-family: 'Segoe UI', 'Roboto', 'Oxygen', 'Ubuntu', 'Cantarell', sans-serif;
            min-height: 100vh;
        }

        /* Odoo-style Main Header */
        .main-header {
            background: linear-gradient(135deg, #875a7b 0%, #6b4c93 100%);
            color: white;
            padding: 0.8rem 0;
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
        }

        .main-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 20"><defs><radialGradient id="g"><stop offset="20%" stop-color="%23ffffff" stop-opacity="0.1"/><stop offset="50%" stop-color="%23ffffff" stop-opacity="0.05"/><stop offset="100%" stop-color="%23ffffff" stop-opacity="0"/></radialGradient></defs><rect width="100" height="20" fill="url(%23g)"/></svg>');
            animation: shimmer 3s ease-in-out infinite;
        }

        @keyframes shimmer {

            0%,
            100% {
                opacity: 0.3;
            }

            50% {
                opacity: 0.8;
            }
        }

        .header-content {
            position: relative;
            z-index: 2;
        }

        .main-title {
            font-size: 1.8rem;
            font-weight: 300;
            margin-bottom: 0.2rem;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        .breadcrumb-custom {
            background: none;
            padding: 0;
            margin: 0;
            font-size: 0.85rem;
        }

        .breadcrumb-custom .breadcrumb-item {
            color: rgba(255, 255, 255, 0.8);
        }

        .breadcrumb-custom .breadcrumb-item.active {
            color: white;
            font-weight: 500;
        }

        .breadcrumb-custom .breadcrumb-item a {
            color: rgba(255, 255, 255, 0.9);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .breadcrumb-custom .breadcrumb-item a:hover {
            color: white;
        }

        /* Professional Container */
        .content-wrapper {
            background: white;
            border-radius: 15px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
            margin-top: -25px;
            position: relative;
            z-index: 10;
            overflow: hidden;
            animation: slideUp 0.8s ease-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .candidate-panel {
            background: transparent;
            border-radius: 0;
            box-shadow: none;
        }

        /* Fixed Sidebar with Light Theme */
        .profile-sidebar {
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            color: #334155;
            padding: 1.5rem;
            position: fixed;
            top: 0;
            left: 0;
            width: 305px;
            height: 150vh;
            overflow-y: auto;
            border-right: 1px solid #e2e8f0;
            z-index: 1000;
        }

        .profile-sidebar::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(102, 126, 234, 0.05) 0%, transparent 70%);
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {

            0%,
            100% {
                transform: translate(-50%, -50%) rotate(0deg);
            }

            50% {
                transform: translate(-50%, -50%) rotate(180deg);
            }
        }

        .profile-section {
            text-align: center;
            margin-bottom: 1.5rem;
            position: relative;
            z-index: 2;
        }

        .profile-image-wrapper {
            position: relative;
            display: inline-block;
            margin-bottom: 1rem;
        }

        .profile-image {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            border: 4px solid rgba(102, 126, 234, 0.3);
            object-fit: cover;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .profile-image:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
        }

        .status-badge {
            background: linear-gradient(45deg, #28a745, #20c997);
            width: 20px;
            height: 20px;
            border-radius: 50%;
            border: 3px solid white;
            position: absolute;
            bottom: 5px;
            right: 5px;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(40, 167, 69, 0.7);
            }

            70% {
                box-shadow: 0 0 0 10px rgba(40, 167, 69, 0);
            }

            100% {
                box-shadow: 0 0 0 0 rgba(40, 167, 69, 0);
            }
        }

        .profile-name {
            font-size: 1.4rem;
            font-weight: 600;
            margin-bottom: 0.3rem;
            color: #1e293b;
        }

        .profile-title {
            font-size: 0.9rem;
            color: #64748b;
            margin-bottom: 0;
            font-weight: 400;
        }

        .progress-custom {
            height: 8px;
            border-radius: 10px;
            background: #e2e8f0;
            overflow: hidden;
        }

        .progress-bar-custom {
            background: linear-gradient(90deg, #4299e1, #9f7aea);
            border-radius: 10px;
            position: relative;
            animation: progressFill 2s ease-out;
        }

        @keyframes progressFill {
            from {
                width: 0%;
            }
        }

        .action-buttons {
            display: flex;
            gap: 8px;
            margin: 1.5rem 0;
            position: relative;
            z-index: 2;
        }

        .btn-edit,
        .btn-resume {
            flex: 1;
            padding: 0.6rem 1rem;
            border-radius: 20px;
            font-weight: 500;
            transition: all 0.3s ease;
            font-size: 0.8rem;
        }

        .btn-edit {
            background: linear-gradient(135deg, #4299e1, #3182ce);
            border: none;
            color: white;
        }

        .btn-edit:hover {
            background: linear-gradient(135deg, #3182ce, #2c5282);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(66, 153, 225, 0.3);
        }

        .btn-resume {
            background: linear-gradient(135deg, #9f7aea, #805ad5);
            border: none;
            color: white;
        }

        .btn-resume:hover {
            background: linear-gradient(135deg, #805ad5, #6b46c1);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(159, 122, 234, 0.3);
        }

        .skill-tag {
            background: rgba(102, 126, 234, 0.1);
            color: #4c51bf;
            padding: 0.4rem 0.8rem;
            border-radius: 15px;
            font-size: 0.75rem;
            margin: 0.2rem;
            display: inline-block;
            border: 1px solid rgba(102, 126, 234, 0.2);
            transition: all 0.3s ease;
        }

        .skill-tag:hover {
            background: rgba(102, 126, 234, 0.2);
            transform: translateY(-1px);
        }

        .contact-item {
            display: flex;
            align-items: center;
            margin-bottom: 0.8rem;
            font-size: 0.85rem;
            padding: 0.5rem;
            border-radius: 8px;
            transition: all 0.3s ease;
            position: relative;
            z-index: 2;
        }

        .contact-item:hover {
            background: rgba(102, 126, 234, 0.05);
            transform: translateX(3px);
        }

        .contact-item i {
            width: 20px;
            margin-right: 0.6rem;
            color: #667eea;
            font-size: 0.9rem;
        }

        .verification-status {
            background: linear-gradient(135deg, #fc8181, #f56565);
            color: white;
            padding: 0.2rem 0.6rem;
            border-radius: 10px;
            font-size: 0.7rem;
            font-weight: 600;
            margin-left: auto;
        }

        /* Main Content Area with Gap */
        .main-content {
            margin-left: 300px;
            /* Gap from sidebar */
            padding: 1.5rem;
            background: transparent;
            min-height: 100vh;
        }

        .content-header {
            background: white;
            padding: 1.2rem 1.5rem;
            border-radius: 12px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
            margin-bottom: 1.5rem;
            animation: fadeInDown 0.6s ease-out;
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .info-card {
            background: white;
            border: none;
            border-radius: 10px;
            padding: 1rem;
            margin-bottom: 1rem;
            transition: all 0.3s ease;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            position: relative;
            overflow: hidden;
        }

        .info-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, #667eea, #764ba2);
            transform: translateX(-100%);
            transition: transform 0.6s ease;
        }

        .info-card:hover::before {
            transform: translateX(0);
        }

        .info-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
        }

        .info-label {
            font-size: 0.75rem;
            color: #64748b;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.3px;
            margin-bottom: 0.3rem;
        }

        .info-value {
            font-size: 0.95rem;
            color: #1e293b;
            font-weight: 600;
        }

        .nav-tabs-custom {
            border: none;
            margin-bottom: 1.5rem;
            background: white;
            border-radius: 12px;
            padding: 0.4rem;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
        }

        .nav-tabs-custom .nav-link {
            border: none;
            color: #64748b;
            font-weight: 500;
            padding: 0.8rem 1.5rem;
            border-radius: 8px;
            transition: all 0.3s ease;
            margin: 0 0.2rem;
            font-size: 0.9rem;
        }

        .nav-tabs-custom .nav-link:hover {
            color: #667eea;
            background: rgba(102, 126, 234, 0.05);
        }

        .nav-tabs-custom .nav-link.active {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            box-shadow: 0 3px 10px rgba(102, 126, 234, 0.3);
        }

        .experience-table {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            border: none;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
            animation: slideInUp 0.8s ease-out;
        }

        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .no-experience {
            text-align: center;
            padding: 2.5rem 1.5rem;
            color: #64748b;
            font-style: italic;
            background: linear-gradient(135deg, #f8fafc, #e2e8f0);
        }

        .no-experience i {
            font-size: 2.5rem;
            margin-bottom: 0.8rem;
            opacity: 0.5;
        }

        /* Image Preview Modal */
        .image-preview {
            max-width: 100%;
            max-height: 80vh;
            object-fit: contain;
            border-radius: 10px;
        }

        .modal-content {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        }

        .modal-header {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            border: none;
        }

        .modal-body {
            padding: 0;
        }

        .modal-footer {
            border: none;
            justify-content: center;
            padding: 1.5rem;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .profile-sidebar {
                position: relative;
                width: 100%;
                padding-top: 1.5rem;
                height: auto;
            }

            .main-content {
                margin-left: 0;
                padding-top: 1.5rem;
            }

            .main-title {
                font-size: 1.5rem;
            }
        }

        /* Loading Animation for sections */
        .info-card,
        .experience-table {
            opacity: 0;
            animation: fadeInUp 0.8s ease-out forwards;
        }

        .info-card:nth-child(1) {
            animation-delay: 0.1s;
        }

        .info-card:nth-child(2) {
            animation-delay: 0.2s;
        }

        .info-card:nth-child(3) {
            animation-delay: 0.3s;
        }

        .info-card:nth-child(4) {
            animation-delay: 0.4s;
        }

        .info-card:nth-child(5) {
            animation-delay: 0.5s;
        }

        .info-card:nth-child(6) {
            animation-delay: 0.6s;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>

    <!-- Fixed Left Sidebar -->
    <div class="profile-sidebar">
        <!-- Enhanced Profile Section -->
        <div class="profile-section">
            <div class="profile-image-wrapper">
                <img src="data:image/jpeg;base64,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"
                    alt="Profile" class="profile-image" id="profileImage" data-bs-toggle="modal"
                    data-bs-target="#imageModal" title="Click to view profile picture">
                <div class="status-badge" title="Online"></div>
            </div>
            <h4 class="profile-name">Rahul Koranga</h4>
            <p class="profile-title">Full Stack Web Developer</p>
        </div>

        <div class="contact-item">
            <i class="fas fa-envelope"></i>
            <span>s.krahul9718643439@gmail.com</span>
        </div>

        <div class="contact-item">
            <i class="fas fa-phone"></i>
            <span>09718643439</span>
            <span class="verification-status">Not Verified</span>
        </div>

        <div class="contact-item">
            <i class="fas fa-map-marker-alt"></i>
            <span>Delhi NCR</span>
        </div>

        <div class="mb-3 mt-3">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <span style="font-weight: 500; font-size: 0.85rem;">Profile Completion</span>
                <span class="fw-bold" style="font-size: 0.9rem;">88%</span>
            </div>
            <div class="progress progress-custom">
                <div class="progress-bar progress-bar-custom" style="width: 88%"></div>
            </div>
        </div>

        <div class="action-buttons">
            <button class="btn btn-edit" id="CandidateData-btn">
                <i class="fas fa-edit me-2"></i>Edit Profile
            </button>
            <button class="btn btn-resume">
                <i class="fas fa-file-alt me-2"></i>INSERT
            </button>
        </div>

        <div>
            <h6 class="mb-3" style="font-size: 0.9rem; font-weight: 600; color: #1e293b;">
                <i class="fas fa-code me-2"></i>Skills & Expertise
            </h6>
            <div>
                <span class="skill-tag">Programming</span>
                <span class="skill-tag">Web Development</span>
                <span class="skill-tag">Mobile Apps</span>
                <span class="skill-tag">Cloud Computing</span>
                <span class="skill-tag">Database</span>
            </div>
        </div>
    </div>

    <!-- Right Content -->
    <div class="main-content">
        <div class="content-header">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h3 class="mb-1" style="color: #1e293b; font-weight: 600; font-size: 1.4rem;">Candidate Overview
                    </h3>
                    <p class="mb-0 text-muted" style="font-size: 0.85rem;">Complete profile information and application
                        details</p>
                </div>
                <div class="badge bg-success" style="font-size: 0.8rem; padding: 0.4rem 0.8rem;">
                    <i class="fas fa-check-circle me-1"></i>Active
                </div>
            </div>
        </div>

        <!-- Personal Information Cards -->
        <div class="mb-4">
            <h5 class="mb-3" style="color: #334155; font-weight: 600; font-size: 1.1rem;">
                <i class="fas fa-user text-primary me-2"></i>Personal Information
            </h5>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <div class="info-card">
                        <div class="info-label">Designation</div>
                        <div class="info-value">Full Stack Web Developer</div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="info-card">
                        <div class="info-label">Experience</div>
                        <div class="info-value">2 Years</div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="info-card">
                        <div class="info-label">Current Salary</div>
                        <div class="info-value">₹45,000</div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="info-card">
                        <div class="info-label">Expected Salary</div>
                        <div class="info-value">₹60,000</div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="info-card">
                        <div class="info-label">Notice Period</div>
                        <div class="info-value">15 Days</div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="info-card">
                        <div class="info-label">Education</div>
                        <div class="info-value">Graduate</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabs -->
        <ul class="nav nav-tabs nav-tabs-custom">
            <li class="nav-item">
                <a class="nav-link active" href="#experience" data-bs-toggle="tab">
                    <i class="fas fa-briefcase me-2"></i>Work Experience
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#applications" data-bs-toggle="tab">
                    <i class="fas fa-file-alt me-2"></i>Applications
                </a>
            </li>
        </ul>

        <!-- Tab Content -->
        <div class="tab-content">
            <div class="tab-pane fade show active" id="experience">
                <div class="experience-table">
                    <div class="p-3">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th style="font-size: 0.85rem;">Company</th>
                                        <th style="font-size: 0.85rem;">Position</th>
                                        <th style="font-size: 0.85rem;">Duration</th>
                                        <th style="font-size: 0.85rem;">Industry</th>
                                        <th style="font-size: 0.85rem;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="5" class="no-experience">
                                            <i class="fas fa-briefcase"></i>
                                            <div style="font-size: 0.9rem;">No experience added. Please add your
                                                experience.</div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="applications">
                <div class="text-center py-4">
                    <i class="fas fa-file-alt fa-3x text-muted mb-3"></i>
                    <h5 class="text-muted" style="font-size: 1.1rem;">No applications found</h5>
                    <p class="text-muted" style="font-size: 0.9rem;">Applications will appear here once submitted.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal  insert-->
    <div class="modal fade" id="candidateDataModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Get in Touch</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="update-profile m-2">
                    <h4>Update Your Profile</h4>
                </div>
                <div class="modal-body m-3 mt-0">
                    <form id="contactForm" method = "POST" novalidate>
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <label for="image" class="form-label">Upload Photo</label>
                                <input type="file" class="form-control" name = "image" id="image" required>
                                <div class="invalid-feedback">
                                    Please enter your image.
                                </div>
                            </div>
                             <input type="hidden" name="candidate_id" value="<?= $row['id'] ?>">
                            <div class="col-md-6 mt-1">
                                <label for="name" class="form-label">Name:-</label>
                                <input type="text" class="form-control" name="name" id="name" required value="<?=$row['name']?>">
                                <div class="invalid-feedback">
                                    Please enter your name.
                                </div>
                            </div>
                            <div class="col-md-6 mt-1">
                                <label for="whatsapp" class="form-label">Whatsapp no:-</label>
                                <input type="text" class="form-control" id="whatsapp" placeholder="Enter your whatsapp no"
                                    required>
                                <div class="invalid-feedback">
                                    Please enter your whatsapp no.
                                </div>
                            </div>
                            <div class="col-md-8 mt-1">
                                <label for="email" class="form-label">Email Address:-</label>
                                <input type="email" class="form-control" name="email" id="email" required value="<?= $row['email'] ?>">
                                <div class="invalid-feedback">
                                    Please enter a valid email address.
                                </div>
                                <div class="col-md-12 mt-1 d-flex">
                                    <label for="email" class="form-label">Job Alert</label>
                                    <input type="checkbox" class="form-check-input" id="checkbox" required>
                                    <div class="invalid-feedback">
                                        Please enter a valid job alert.
                                    </div>
                                </div>
                            </div>
                            <div class="update-profile m-2">
                                <h4>Update Your Profile</h4>
                            </div>
                            <div class="col-md-12 d-grid">
                                <label for="name" class="form-label">Work Status:</label>
                                <select name="fr,Ex" id="work_status" class="form-control">
                                    <option value = "">--Select Work Status---</option>
                                    <option value="fresher">fresher</option>
                                    <option value="experience">experience</option>
                                </select>
                            </div>
                            <div class="col-md-6 mt-1" id="salary_box">
                                <label for="name" class="form-label">Salary: </label>
                                <input type="text" class="form-control" id="name" placeholder="Enter your experience"
                                    required>
                                <div class="invalid-feedback">
                                    Please enter your name.
                                </div>
                            </div>
                            <div class="col-md-6 mt-1">
                                <label for="name" class="form-label">Designation:- </label>
                                <input type="text" class="form-control" id="name" placeholder="Enter your Designation"
                                    required>
                                <div class="invalid-feedback">
                                    Please enter your name.
                                </div>
                            </div>
                            <div class="col-md-6 mt-1">
                                <label for="name" class="form-label">Gender:- </label>
                                <input type="text" class="form-control" id="name" placeholder="Enter your Gender"
                                    required>
                                <div class="invalid-feedback">
                                    Please enter your name.
                                </div>
                            </div>
                            <div class="col-md-6 mt-1">
                                <label for="name" class="form-label">Industry:- </label>
                                <input type="text" class="form-control" id="name" placeholder="Enter your Industry"
                                    required>
                                <div class="invalid-feedback">
                                    Please enter your name.
                                </div>
                            </div>
                            <div class="col-md-6 mt-1">
                                <label for="name" class="form-label">Department:- </label>
                                <input type="text" class="form-control" id="name" placeholder="Enter your Department"
                                    required>
                                <div class="invalid-feedback">
                                    Please enter your name.
                                </div>
                            </div>
                            <div class="col-md-6 mt-1">
                                <label for="name" class="form-label">Age:- </label>
                                <input type="text" class="form-control" id="name" placeholder="Enter your age" required>
                                <div class="invalid-feedback">
                                    Please enter your name.
                                </div>
                            </div>
                            <div class="col-md-6 mt-1">
                                <label for="name" class="form-label">Skill:- </label>
                                <input type="text" class="form-control" id="name" placeholder="Enter your Skill"
                                    required>
                                <div class="invalid-feedback">
                                    Please enter your name.
                                </div>
                            </div>
                            <div class="col-md-6 mt-1">
                                <label for="name" class="form-label">State:- </label>
                                <input type="text" class="form-control" id="name" placeholder="Enter your State"
                                    required>
                                <div class="invalid-feedback">
                                    Please enter your name.
                                </div>
                            </div>
                            <div class="col-md-6 mt-1">
                                <label for="name" class="form-label">Education:- </label>
                                <input type="text" class="form-control" id="name" placeholder="Enter your Education"
                                    required>
                                <div class="invalid-feedback">
                                    Please enter your name.
                                </div>
                            </div>
                            <div class="col-md-6 mt-1">
                                <label for="name" class="form-label">Expected Salary(Monthly):- </label>
                                <input type="text" class="form-control" id="name"
                                    placeholder="Enter your expected salary" required>
                                <div class="invalid-feedback">
                                    Please enter your name.
                                </div>
                            </div>
                            <div class="col-md-6 mt-1">
                                <label for="name" class="form-label">Notice Period:-</label>
                                <input type="text" class="form-control" id="name" placeholder="Enter your Notice Period"
                                    required>
                                <div class="invalid-feedback">
                                    Please enter your name.
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="name" class="form-label">Upload Resume:-(max size 2 mb)</label>
                                <input type="file" class="form-control" id="name" placeholder="Enter your full name"
                                    required>
                                <div class="invalid-feedback">
                                    Please enter your name.
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" form="contactForm" class="btn btn-primary">Send Message</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>

        // Show image in modal when clicked (view only)
        document.getElementById('profileImage').addEventListener('click', function () {
            document.getElementById('modalImage').src = this.src;
        });

        // Edit Profile Button
        document.querySelector('.btn-edit').addEventListener('click', function () {
            this.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Loading...';
            setTimeout(() => {
                this.innerHTML = '<i class="fas fa-edit me-2"></i>Edit Profile';
            }, 500);
        });

        $(document).on('click', '#CandidateData-btn', function () {
            setTimeout(() => {
            $('#candidateDataModal').modal('show')
            }, 500);
        })



        // Resume Button
        document.querySelector('.btn-resume').addEventListener('click', function () {
            this.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Loading...';
            setTimeout(() => {
                this.innerHTML = '<i class="fas fa-file-alt me-2"></i>Resume';
                alert('Resume download/view functionality would be implemented here');
            }, 1000);
        });

        // Add smooth scrolling animation for tabs
        document.querySelectorAll('.nav-link').forEach(tab => {
            tab.addEventListener('click', function () {
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.style.opacity = '0';
                    setTimeout(() => {
                        target.style.opacity = '1';
                        target.style.transform = 'translateY(0)';
                    }, 150);
                }
            });
        });

        // Add loading animation on page load
        window.addEventListener('load', function () {
            document.body.style.opacity = '0';
            setTimeout(() => {
                document.body.style.transition = 'opacity 0.5s ease';
                document.body.style.opacity = '1';
            }, 100);
        });

        // Animate info cards on scroll (if needed)
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        // Observe info cards
        document.querySelectorAll('.info-card').forEach(card => {
            observer.observe(card);
        });

        
        //MODEL FORM EDIT CHANGING FOR FRESHER AND EXPERIENCED
        $(document).ready(function(){
        $('#work_status').on('change', function(){
        let status = $(this).val();

        $.ajax({
            url: 'function/code.php', // backend file
            method: 'POST',
            data: { status: status },
            success: function(response){
                if(response.trim() === 'hide'){
                    $('#salary_box').hide();
                } else {
                    $('#salary_box').show();
                }
            }
        });
    });
});


            //MODEL EDIT FORM
    </script>
</body>

</html>