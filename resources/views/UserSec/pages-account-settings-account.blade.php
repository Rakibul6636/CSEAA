<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/"
    data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Dashboard | {{$user->name}}</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/image/cseaa_logo.png" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="../assets/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../assets/js/config.js"></script>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                    <a href="{{ ('http://127.0.0.1:8000/') }}" class="app-brand-link">
                        <span class="app-brand-logo demo">
                            <img src="/image/cseaa_logo.png" class="w-10 " alt="...">
                        </span>
                        <span class="app-brand-text demo menu-text fw-bolder ms-2">CSEAA</span>
                    </a>

                    <a href="javascript:void(0);"
                        class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                        <i class="bx bx-chevron-left bx-sm align-middle"></i>
                    </a>
                </div>

                <div class="menu-inner-shadow"></div>

                <ul class="menu-inner py-1">
                    <!-- Dashboard -->
                    <li class="menu-item">
                        <a href="{{ route('index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Analytics">Dashboard</div>
                        </a>
                    </li>



                    <li class="menu-header small text-uppercase">
                        <span class="menu-header-text">Payment Section</span>
                    </li>
                    <li class="menu-item">
                        <a href="{{route('donation.create')}}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-dock-top"></i>
                            <div data-i18n="Basic">Make Donation</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{route('donation.report')}}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-cube-alt"></i>
                            <div data-i18n="Basic">Donation Report</div>
                        </a>
                    </li>
                    <!-- Components -->
                    <li class="menu-header small text-uppercase"><span class="menu-header-text">Accounts</span></li>
                    <!-- Cards -->
                    <li class="menu-item active">
                        <a href="{{ route('profile.edit', $user->id) }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-collection"></i>
                            <div data-i18n="Basic">Edit Account</div>
                        </a>
                    </li>
                    <!-- User interface -->


                    <!-- Extended components -->
                    <li class="menu-item">
                        <a href="{{ route('connection.list') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-copy"></i>
                            <div data-i18n="Extended UI">Connections</div>
                        </a>

                    </li>




                </ul>
            </aside>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                    id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="bx bx-menu bx-sm"></i>
                        </a>
                    </div>

                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <!-- Search -->
                        <div class="navbar-nav align-items-center">
                            <div class="nav-item d-flex align-items-center">
                                <h4>CSE BRUR Alumni Association</h4>

                            </div>
                        </div>
                        <!-- /Search -->

                        <ul class="navbar-nav flex-row align-items-center ms-auto">
                            <!-- Place this tag where you want the button to render. -->


                            <!-- User -->
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                                    data-bs-toggle="dropdown">
                                    <div class="avatar avatar-online">
                                        <img src="{{$user->profile->profileImage()}}" alt
                                            class="w-px-40 h-auto rounded-circle" />
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar avatar-online">
                                                        <img src="{{$user->profile->profileImage()}}" alt
                                                            class="w-px-40 h-auto rounded-circle" />
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <span class="fw-semibold d-block">{{$user->name}}</span>
                                                    <small class="text-muted">Member</small>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('profile.show', $user->id) }}">
                                            <i class="bx bx-user me-2"></i>
                                            <span class="align-middle">My Profile</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('profile.edit', $user->id) }}">
                                            <i class="bx bx-cog me-2"></i>
                                            <span class="align-middle">Settings</span>
                                        </a>
                                    </li>

                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>

                                    </li>
                                </ul>
                            </li>
                            <!--/ User -->
                        </ul>
                    </div>
                </nav>

                <!-- / Navbar -->

                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account Settings /</span>
                            Account</h4>

                        <div class="row">
                            <div class="col-md-12">
                                <ul class="nav nav-pills flex-column flex-md-row mb-3">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="javascript:void(0);"><i
                                                class="bx bx-user me-1"></i> Account</a>
                                    </li>
                                </ul>
                                <div class="card mb-4">
                                    <h5 class="card-header">Profile Details</h5>
                                    <!-- Account -->
                                    <form name="memberForm" id="formAccountSettings" method="post"
                                        action="/profile/{{$user->id}}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PATCH')
                                        <div class="card-body">
                                            <div class="d-flex align-items-start align-items-sm-center gap-4">
                                                <img src="/storage/{{$user->profile->image}}" alt="user-avatar"
                                                    class="d-block rounded" height="100" width="100"
                                                    id="uploadedAvatar" />
                                                <div class="button-wrapper">
                                                    <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                                        <span class="d-none d-sm-block">Upload new photo</span>
                                                        <i class="bx bx-upload d-block d-sm-none"></i>
                                                        <input type="file" id="upload" name="image"
                                                            class="account-file-input" hidden
                                                            accept="image/png, image/jpeg" />
                                                    </label>
                                                    <button type="button"
                                                        class="btn btn-outline-secondary account-image-reset mb-4">
                                                        <i class="bx bx-reset d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">Reset</span>
                                                    </button>

                                                    <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="my-0" />
                                        <div class="card-body">

                                            <div class="row">
                                                <div class="mb-3 col-md-6">
                                                    <label for="name" class="form-label">Name *</label>
                                                    <input class="form-control" type="text" id="name" name="name"
                                                        value="{{ old('name') ?? $user->name }}" autofocus required />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="designation" class="form-label">Designation</label>
                                                    <input class="form-control" type="text" name="designation"
                                                        id="designation"
                                                        placeholder="Present Position (If retd. last position)"
                                                        value="{{ old('designation') ?? $user->profile->designation }}" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="UserName" class="form-label">User Name *</label>
                                                    <input class="form-control" type="text" name="username"
                                                        id="UserName" value="{{ old('username') ?? $user->username }}"
                                                        required />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="workplace" class="form-label">Workplace</label>
                                                    <input class="form-control" type="text" name="workPlace"
                                                        id="workPlace"
                                                        value="{{ old('workPlace') ?? $user->profile->workPlace }}" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="email" class="form-label">E-mail *</label>
                                                    <input class="form-control" type="text" id="email" name="email"
                                                        value="{{ old('email') ?? $user->email }}" required
                                                        placeholder="shimul@example.com" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="session" class="form-label">Session</label>
                                                    <input type="text" class="form-control" id="session" name="session"
                                                        placeholder="e.g. 2015-16"
                                                        value="{{ old('session') ?? $user->profile->session }}" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label" for="mobile">Phone Number</label>
                                                    <div class="input-group input-group-merge">
                                                        <!-- <span class="input-group-text">US (+1)</span> -->
                                                        <input type="text" id="mobile" name="mobile"
                                                            class="form-control" placeholder="Mobile Number"
                                                            value="{{ old('mobile') ?? $user->profile->mobile }}" />
                                                    </div>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="batch" class="form-label">Batch</label>
                                                    <input type="text" class="form-control" id="batch" name="batch"
                                                        placeholder="batch"
                                                        value="{{ old('batch') ?? $user->profile->batch }}" />
                                                </div>

                                                <div class="mb-3 col-md-6">
                                                    <label for="gender" class="form-label pe-3">Gender</label>
                                                    <input type="radio" name="gender" id="gender" value="1"> F
                                                    <span></span>
                                                    <input type="radio" name="gender" id="gender" class="ps-3"
                                                        value="2"> M
                                                    <span></span>

                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="degree" class="form-label">Degree Earned</label>
                                                    <select id="degree" name="degree" class="select2 form-select"
                                                        value="{{ old('degree') ?? $user->profile->degree }}">
                                                        <option value="">Select degree</option>
                                                        <option value="bsc">B.Sc.</option>
                                                        <option value="msc">M.Sc.</option>
                                                        <option value="phd">PhD.</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="dob" class="form-label">Birth Date</label>
                                                    <input class="form-control" type="date" id="dob" name="dob"
                                                        value="{{ old('dob') ?? $user->profile->dob }}" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="fatherName" class="form-label">Father Name</label>
                                                    <input type="text" class="form-control" id="fatherName"
                                                        name="fatherName" placeholder="Father's name"
                                                        value="{{ old('fatherName') ?? $user->profile->fatherName }}" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label" for="bloodGroup">Blood Group</label>
                                                    <select id="bloodGroup" name="bloodGroup"
                                                        class="select2 form-select">
                                                        <option value="O+">O+</option>
                                                        <option value="O-">O-</option>
                                                        <option value="A+">A+</option>
                                                        <option value="A-">A-</option>
                                                        <option value="B+">B+</option>
                                                        <option value="B-">B-</option>
                                                        <option value="AB+">AB+</option>
                                                        <option value="AB-">AB-</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="motherName" class="form-label">Mother Name</label>
                                                    <input type="text" class="form-control" id="motherName"
                                                        name="motherName" placeholder="Mother's name"
                                                        value="{{ old('motherName') ?? $user->profile->motherName }}" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="url" class="form-label">URL(Any of your Personal
                                                        Profile)</label>
                                                    <input type="text" class="form-control" id="url" name="url"
                                                        placeholder="Personal Profile URL"
                                                        value="{{ old('url') ?? $user->profile->url }}" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="address" class="form-label">Address</label>
                                                    <input type="text" class="form-control" id="address" name="address"
                                                        placeholder="Your Address"
                                                        value="{{ old('address') ?? $user->profile->address }}" />
                                                </div>
                                            </div>
                                            <div class="mb-3 col-md-12">
                                                <label for="address" class="form-label">Your CV</label>
                                                <input type="file" name="cv" class="form-control pb-2">

                                            </div>
                                            <div class="mb-3 col-md-12">
                                                <label for="address" class="form-label">About Yourself</label>
                                                <textarea id="textar" class="form-control" name="about"
                                                    value="{{ old('about') ?? $user->profile->about }}" rows="10">
You can write about yourself,interest,hobby etc.
</textarea>
                                            </div>

                                            <div class="mt-2">
                                                <button type="submit" class="btn btn-primary me-2">Save
                                                    changes</button>
                                                <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                                            </div>
                                    </form>
                                </div>
                                <!-- /Account -->
                            </div>

                            <!-- / Content -->



                            <div class="content-backdrop fade"></div>
                        </div>
                        <!-- Content wrapper -->
                    </div>
                    <!-- / Layout page -->
                </div>

                <!-- Overlay -->
                <div class="layout-overlay layout-menu-toggle"></div>
            </div>
            <!-- / Layout wrapper -->



            <!-- Core JS -->
            <!-- build:js assets/vendor/js/core.js -->
            <script src="../assets/vendor/libs/jquery/jquery.js"></script>
            <script src="../assets/vendor/libs/popper/popper.js"></script>
            <script src="../assets/vendor/js/bootstrap.js"></script>
            <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

            <script src="../assets/vendor/js/menu.js"></script>
            <!-- endbuild -->

            <!-- Vendors JS -->

            <!-- Main JS -->
            <script src="../assets/js/main.js"></script>

            <!-- Page JS -->
            <script src="../assets/js/pages-account-settings-account.js"></script>

            <!-- Place this tag in your head or just before your close body tag. -->
            <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>