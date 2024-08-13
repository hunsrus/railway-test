<?php
  // ini_set('display_errors', 1);

  require_once "includes/config_session.inc.php";

  // $_SESSION['username'] = "AEEA";

  try {
      require_once "includes/dbh.inc.php";

      $query = "SELECT * FROM users;";

      $stmt = $pdo->prepare($query);

      $stmt->execute();

      $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

      $pdo = null;
      $stmt = null;

  } catch (PDOException $e) {
      header("Location: error-500.html");
      die("Query failed: " . $e->getMessage());
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Mazer Admin Dashboard</title>
    
    <link rel="icon" href="/assets/static/images/logo/favicon.png" type="image/png">
    

  <link rel="stylesheet" crossorigin href="./assets/compiled/css/app.css">
  <link rel="stylesheet" crossorigin href="./assets/compiled/css/app-dark.css">
  <link rel="stylesheet" crossorigin href="./assets/compiled/css/iconly.css">
</head>

<body>
    <script src="assets/static/js/initTheme.js"></script>
    <div id="app">
        <div id="sidebar">
            <div class="sidebar-wrapper active">
    <div class="sidebar-header position-relative">
        <div class="d-flex justify-content-between align-items-center">
            <div class="logo">
                <a href="index.html"><img src="./assets/static/images/logo/favicon.png" alt="Logo" style="height: 32px;"><a class="text fs-4"> MUV</a></a>
            </div>
            <div class="theme-toggle d-flex gap-2  align-items-center mt-2">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true"
                    role="img" class="iconify iconify--system-uicons" width="20" height="20"
                    preserveAspectRatio="xMidYMid meet" viewBox="0 0 21 21">
                    <g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path
                            d="M10.5 14.5c2.219 0 4-1.763 4-3.982a4.003 4.003 0 0 0-4-4.018c-2.219 0-4 1.781-4 4c0 2.219 1.781 4 4 4zM4.136 4.136L5.55 5.55m9.9 9.9l1.414 1.414M1.5 10.5h2m14 0h2M4.135 16.863L5.55 15.45m9.899-9.9l1.414-1.415M10.5 19.5v-2m0-14v-2"
                            opacity=".3"></path>
                        <g transform="translate(-210 -1)">
                            <path d="M220.5 2.5v2m6.5.5l-1.5 1.5"></path>
                            <circle cx="220.5" cy="11.5" r="4"></circle>
                            <path d="m214 5l1.5 1.5m5 14v-2m6.5-.5l-1.5-1.5M214 18l1.5-1.5m-4-5h2m14 0h2"></path>
                        </g>
                    </g>
                </svg>
                <div class="form-check form-switch ms-2 mt-1 fs-6">
                    <input class="form-check-input" type="checkbox" id="toggle-dark" style="cursor: pointer">
                    <label class="form-check-label"></label>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true"
                    role="img" class="iconify iconify--mdi" width="20" height="20" preserveAspectRatio="xMidYMid meet"
                    viewBox="0 0 24 24">
                    <path fill="currentColor"
                        d="m17.75 4.09l-2.53 1.94l.91 3.06l-2.63-1.81l-2.63 1.81l.91-3.06l-2.53-1.94L12.44 4l1.06-3l1.06 3l3.19.09m3.5 6.91l-1.64 1.25l.59 1.98l-1.7-1.17l-1.7 1.17l.59-1.98L15.75 11l2.06-.05L18.5 9l.69 1.95l2.06.05m-2.28 4.95c.83-.08 1.72 1.1 1.19 1.85c-.32.45-.66.87-1.08 1.27C15.17 23 8.84 23 4.94 19.07c-3.91-3.9-3.91-10.24 0-14.14c.4-.4.82-.76 1.27-1.08c.75-.53 1.93.36 1.85 1.19c-.27 2.86.69 5.83 2.89 8.02a9.96 9.96 0 0 0 8.02 2.89m-1.64 2.02a12.08 12.08 0 0 1-7.8-3.47c-2.17-2.19-3.33-5-3.49-7.82c-2.81 3.14-2.7 7.96.31 10.98c3.02 3.01 7.84 3.12 10.98.31Z">
                    </path>
                </svg>
            </div>
            <div class="sidebar-toggler  x">
                <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
            </div>
        </div>
    </div>

    <div class="sidebar-menu">
        <ul class="menu">
            <li class="sidebar-title">Menu</li>
            
            <li
                class="sidebar-item active ">
                <a href="index.html" class='sidebar-link'>
                    <i class="bi bi-grid-fill"></i>
                    <span>Inicio</span>
                </a>
                
    
            </li>
    
            <li
                class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-person-circle"></i>
                    <span>Mi Cuenta</span>
                </a>
                
                <ul class="submenu ">
                    
                    <li class="submenu-item  ">
                        <a href="account-profile.html" class="submenu-link">Perfil</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="account-security.html" class="submenu-link">Seguridad</a>
                        
                    </li>
    
                    <li class="submenu-item  ">
                        <a href="auth-login.html" class="submenu-link">Ingresar</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="auth-register.html" class="submenu-link">Registrarse</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="index-logueado.html" class="submenu-link">Ejemplo logueado</a>
                        
                    </li>
                    
                </ul>
                
    
            </li>
            
            <li
                class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-stack"></i>
                    <span>Components</span>
                </a>
                
                <ul class="submenu ">
                    
                    <li class="submenu-item  ">
                        <a href="component-accordion.html" class="submenu-link">Accordion</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="component-alert.html" class="submenu-link">Alert</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="component-badge.html" class="submenu-link">Badge</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="component-breadcrumb.html" class="submenu-link">Breadcrumb</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="component-button.html" class="submenu-link">Button</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="component-card.html" class="submenu-link">Card</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="component-carousel.html" class="submenu-link">Carousel</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="component-collapse.html" class="submenu-link">Collapse</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="component-dropdown.html" class="submenu-link">Dropdown</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="component-list-group.html" class="submenu-link">List Group</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="component-modal.html" class="submenu-link">Modal</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="component-navs.html" class="submenu-link">Navs</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="component-pagination.html" class="submenu-link">Pagination</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="component-placeholder.html" class="submenu-link">Placeholder</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="component-progress.html" class="submenu-link">Progress</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="component-spinner.html" class="submenu-link">Spinner</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="component-toasts.html" class="submenu-link">Toasts</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="component-tooltip.html" class="submenu-link">Tooltip</a>
                        
                    </li>
                    
                </ul>
                
    
            </li>
            
            <li
                class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-collection-fill"></i>
                    <span>Extra Components</span>
                </a>
                
                <ul class="submenu ">
                    
                    <li class="submenu-item  ">
                        <a href="extra-component-avatar.html" class="submenu-link">Avatar</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="extra-component-comment.html" class="submenu-link">Comment</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="extra-component-divider.html" class="submenu-link">Divider</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="extra-component-date-picker.html" class="submenu-link">Date Picker</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="extra-component-flag.html" class="submenu-link">Flag</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="extra-component-sweetalert.html" class="submenu-link">Sweet Alert</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="extra-component-toastify.html" class="submenu-link">Toastify</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="extra-component-rating.html" class="submenu-link">Rating</a>
                        
                    </li>
                    
                </ul>
                
    
            </li>
            
            <li
                class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-grid-1x2-fill"></i>
                    <span>Layouts</span>
                </a>
                
                <ul class="submenu ">
                    
                    <li class="submenu-item  ">
                        <a href="layout-default.html" class="submenu-link">Default Layout</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="layout-vertical-1-column.html" class="submenu-link">1 Column</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="layout-vertical-navbar.html" class="submenu-link">Vertical Navbar</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="layout-rtl.html" class="submenu-link">RTL Layout</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="layout-horizontal.html" class="submenu-link">Horizontal Menu</a>
                        
                    </li>
                    
                </ul>
                
    
            </li>
            
            <li class="sidebar-title">Forms &amp; Tables</li>
            
            <li
                class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-hexagon-fill"></i>
                    <span>Form Elements</span>
                </a>
                
                <ul class="submenu ">
                    
                    <li class="submenu-item  ">
                        <a href="form-element-input.html" class="submenu-link">Input</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="form-element-input-group.html" class="submenu-link">Input Group</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="form-element-select.html" class="submenu-link">Select</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="form-element-radio.html" class="submenu-link">Radio</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="form-element-checkbox.html" class="submenu-link">Checkbox</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="form-element-textarea.html" class="submenu-link">Textarea</a>
                        
                    </li>
                    
                </ul>
                
    
            </li>
            
            <li
                class="sidebar-item  ">
                <a href="form-layout.html" class='sidebar-link'>
                    <i class="bi bi-file-earmark-medical-fill"></i>
                    <span>Form Layout</span>
                </a>
                
    
            </li>
            
            <li
                class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-journal-check"></i>
                    <span>Form Validation</span>
                </a>
                
                <ul class="submenu ">
                    
                    <li class="submenu-item  ">
                        <a href="form-validation-parsley.html" class="submenu-link">Parsley</a>
                        
                    </li>
                    
                </ul>
                
    
            </li>
            
            <li
                class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-pen-fill"></i>
                    <span>Form Editor</span>
                </a>
                
                <ul class="submenu ">
                    
                    <li class="submenu-item  ">
                        <a href="form-editor-quill.html" class="submenu-link">Quill</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="form-editor-ckeditor.html" class="submenu-link">CKEditor</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="form-editor-summernote.html" class="submenu-link">Summernote</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="form-editor-tinymce.html" class="submenu-link">TinyMCE</a>
                        
                    </li>
                    
                </ul>
                
    
            </li>
            
            <li
                class="sidebar-item  ">
                <a href="table.html" class='sidebar-link'>
                    <i class="bi bi-grid-1x2-fill"></i>
                    <span>Table</span>
                </a>
                
    
            </li>
            
            <li
                class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                    <span>Datatables</span>
                </a>
                
                <ul class="submenu ">
                    
                    <li class="submenu-item  ">
                        <a href="table-datatable.html" class="submenu-link">Datatable</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="table-datatable-jquery.html" class="submenu-link">Datatable (jQuery)</a>
                        
                    </li>
                    
                </ul>
                
    
            </li>
            
            <li class="sidebar-title">Extra UI</li>
            
            <li
                class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-pentagon-fill"></i>
                    <span>Widgets</span>
                </a>
                
                <ul class="submenu ">
                    
                    <li class="submenu-item  ">
                        <a href="ui-widgets-chatbox.html" class="submenu-link">Chatbox</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="ui-widgets-pricing.html" class="submenu-link">Pricing</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="ui-widgets-todolist.html" class="submenu-link">To-do List</a>
                        
                    </li>
                    
                </ul>
                
    
            </li>
            
            <li
                class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-egg-fill"></i>
                    <span>Icons</span>
                </a>
                
                <ul class="submenu ">
                    
                    <li class="submenu-item  ">
                        <a href="ui-icons-bootstrap-icons.html" class="submenu-link">Bootstrap Icons </a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="ui-icons-fontawesome.html" class="submenu-link">Fontawesome</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="ui-icons-dripicons.html" class="submenu-link">Dripicons</a>
                        
                    </li>
                    
                </ul>
                
    
            </li>
            
            <li
                class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-bar-chart-fill"></i>
                    <span>Charts</span>
                </a>
                
                <ul class="submenu ">
                    
                    <li class="submenu-item  ">
                        <a href="ui-chart-chartjs.html" class="submenu-link">ChartJS</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="ui-chart-apexcharts.html" class="submenu-link">Apexcharts</a>
                        
                    </li>
                    
                </ul>
                
    
            </li>
            
            <li
                class="sidebar-item  ">
                <a href="ui-file-uploader.html" class='sidebar-link'>
                    <i class="bi bi-cloud-arrow-up-fill"></i>
                    <span>File Uploader</span>
                </a>
                
    
            </li>
            
            <li
                class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-map-fill"></i>
                    <span>Maps</span>
                </a>
                
                <ul class="submenu ">
                    
                    <li class="submenu-item  ">
                        <a href="ui-map-google-map.html" class="submenu-link">Google Map</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="ui-map-jsvectormap.html" class="submenu-link">JS Vector Map</a>
                        
                    </li>
                    
                </ul>
                
    
            </li>
            
            <li
                class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-three-dots"></i>
                    <span>Multi-level Menu</span>
                </a>
                
                <ul class="submenu ">
                    
                    <li class="submenu-item  has-sub">
                        <a href="#" class="submenu-link">First Level</a>
                        
                        <ul class="submenu submenu-level-2 ">
    
                            
                            <li class="submenu-item ">
                                <a href="ui-multi-level-menu.html" class="submenu-link">Second Level</a>
                            </li>
                            
    
                        </ul>
                        
                    </li>
                    
                    <li class="submenu-item  has-sub">
                        <a href="#" class="submenu-link">Another Menu</a>
                        
                        <ul class="submenu submenu-level-2 ">
    
                            
                            <li class="submenu-item ">
                                <a href="ui-multi-level-menu.html" class="submenu-link">Second Level Menu</a>
                            </li>
                            
    
                        </ul>
                        
                    </li>
                    
                </ul>
                
    
            </li>
            
            <li class="sidebar-title">Pages</li>
            
            <li
                class="sidebar-item  ">
                <a href="application-email.html" class='sidebar-link'>
                    <i class="bi bi-envelope-fill"></i>
                    <span>Email Application</span>
                </a>
                
    
            </li>
            
            <li
                class="sidebar-item  ">
                <a href="application-chat.html" class='sidebar-link'>
                    <i class="bi bi-chat-dots-fill"></i>
                    <span>Chat Application</span>
                </a>
                
    
            </li>
            
            <li
                class="sidebar-item  ">
                <a href="application-gallery.html" class='sidebar-link'>
                    <i class="bi bi-image-fill"></i>
                    <span>Photo Gallery</span>
                </a>
                
    
            </li>
            
            <li
                class="sidebar-item  ">
                <a href="application-checkout.html" class='sidebar-link'>
                    <i class="bi bi-basket-fill"></i>
                    <span>Checkout Page</span>
                </a>
                
    
            </li>
            
            <li
                class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-person-badge-fill"></i>
                    <span>Authentication</span>
                </a>
                
                <ul class="submenu ">
                    
                    <li class="submenu-item  ">
                        <a href="auth-login.html" class="submenu-link">Login</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="auth-register.html" class="submenu-link">Register</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="auth-forgot-password.html" class="submenu-link">Forgot Password</a>
                        
                    </li>
                    
                </ul>
                
    
            </li>
            
            <li
                class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-x-octagon-fill"></i>
                    <span>Errors</span>
                </a>
                
                <ul class="submenu ">
                    
                    <li class="submenu-item  ">
                        <a href="error-403.html" class="submenu-link">403</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="error-404.html" class="submenu-link">404</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="error-500.html" class="submenu-link">500</a>
                        
                    </li>
                    
                </ul>
                
    
            </li>
            
            <li class="sidebar-title">Raise Support</li>
            
            <li
                class="sidebar-item  ">
                <a href="https://zuramai.github.io/mazer/docs" class='sidebar-link'>
                    <i class="bi bi-life-preserver"></i>
                    <span>Documentation</span>
                </a>
                
    
            </li>
            
            <li
                class="sidebar-item  ">
                <a href="https://github.com/zuramai/mazer/blob/main/CONTRIBUTING.md" class='sidebar-link'>
                    <i class="bi bi-puzzle"></i>
                    <span>Contribute</span>
                </a>
                
    
            </li>
            
            <li
                class="sidebar-item  ">
                <a href="https://github.com/zuramai/mazer#donation" class='sidebar-link'>
                    <i class="bi bi-cash"></i>
                    <span>Donate</span>
                </a>
                
    
            </li>
            
        </ul>
    </div>
    
    
</div>
        </div>
        <div id="main">
            <header class="mb-3 d-flex justify-content-between align-items-center">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
                <!-- este div esta solamente para que el boton de ingresar se mantenga a la izquierda cuando se oculta el burger -->
                <div></div>
                <a href="auth-login.html" class="btn icon icon-left btn-primary"><i data-feather="user"></i>
                    Ingresar</a>
            </header>
            
<div class="page-heading">
    <h3>Bienvenido a MUV</h3>
    <p class="text-subtitle text-muted">[Información general sobre el gimnasio]</p>
</div> 

<div class="page-content"> 

    <section class="row">
        <div class="col-12 col-lg-9">
            <div class="row">
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <a href="#card-turnos">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon purple mb-2">
                                        <i class="iconly-boldCalendar"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Turnos</h6>
                                    <h6 class="font-extrabold mb-0">18/20</h6>
                                </div>
                            </div> 
                        </div>
                        </a>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <a href="#card-precios">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon blue mb-2">
                                        <!-- <i class="iconly-boldWallet"></i> -->
                                        <i class="bi-cash-coin"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Precios</h6>
                                    <h6 class="font-extrabold mb-0">Ver más</h6>
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <a href="#card-ubicacion">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon green mb-2">
                                        <i class="iconly-boldLocation"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Ubicación</h6>
                                    <h6 class="font-extrabold mb-0">Ver mapa</h6>
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <a href="#card-contacto">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon red mb-2">
                                        <i class="bi-envelope-at-fill"></i>
                                        <!-- <i class="iconly-boldBookmark"></i> -->
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Contacto</h6>
                                    <h6 class="font-extrabold mb-0">Ver info</h6>
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="card" id="card-turnos">
                <div class="card-header">
                    <h4>Selector de turnos</h4>
                </div>
                <div class="card-body">
                    <p>Elegí un día de la semana para ver los turnos disponibles</p>
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <span class="badge bg-success badge-pill badge-round me-1">8</span>
                                    <span>Lunes</span>
                                
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="list-group">
                                        <button type="button" class="list-group-item list-group-item-action list-group-item-danger" data-bs-toggle="modal" data-bs-target="#modal-turno-ingresar">
                                            Turno 1
                                        </button>
                                        <button type="button" class="list-group-item list-group-item-action" data-bs-toggle="modal" data-bs-target="#modal-turno-ingresar">
                                            Turno 2
                                        </button>
                                        <button type="button" class="list-group-item list-group-item-action" data-bs-toggle="modal" data-bs-target="#modal-turno-ingresar">
                                            Turno 3
                                        </button>
                                        <button type="button" class="list-group-item list-group-item-action list-group-item-success" data-bs-toggle="modal" data-bs-target="#modal-turno-ingresar">
                                            Turno 4
                                        </button>
                                        <button type="button" class="list-group-item list-group-item-action" data-bs-toggle="modal" data-bs-target="#modal-turno-ingresar">
                                            Turno 5
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <span class="badge bg-warning badge-pill badge-round me-1">2</span>
                                    Martes
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="list-group">
                                        <button type="button" class="list-group-item list-group-item-action list-group-item-danger">
                                            Turno 1
                                        </button>
                                        <button type="button" class="list-group-item list-group-item-action">
                                            Turno 2
                                        </button>
                                        <button type="button" class="list-group-item list-group-item-action">
                                            Turno 3
                                        </button>
                                        <button type="button" class="list-group-item list-group-item-action list-group-item-success">
                                            Turno 4
                                        </button>
                                        <button type="button" class="list-group-item list-group-item-action">
                                            Turno 5
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    <span class="badge bg-success badge-pill badge-round me-1">9</span>
                                    Miércoles
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="list-group">
                                        <button type="button" class="list-group-item list-group-item-action list-group-item-danger">
                                            Turno 1
                                        </button>
                                        <button type="button" class="list-group-item list-group-item-action">
                                            Turno 2
                                        </button>
                                        <button type="button" class="list-group-item list-group-item-action">
                                            Turno 3
                                        </button>
                                        <button type="button" class="list-group-item list-group-item-action list-group-item-success">
                                            Turno 4
                                        </button>
                                        <button type="button" class="list-group-item list-group-item-action">
                                            Turno 5
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    <span class="badge bg-danger badge-pill badge-round me-1">0</span>
                                    Jueves
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="list-group">
                                        <button type="button" class="list-group-item list-group-item-action list-group-item-danger">
                                            Turno 1
                                        </button>
                                        <button type="button" class="list-group-item list-group-item-action list-group-item-danger">
                                            Turno 2
                                        </button>
                                        <button type="button" class="list-group-item list-group-item-action list-group-item-danger">
                                            Turno 3
                                        </button>
                                        <button type="button" class="list-group-item list-group-item-action list-group-item-danger">
                                            Turno 4
                                        </button>
                                        <button type="button" class="list-group-item list-group-item-action list-group-item-danger">
                                            Turno 5
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    <span class="badge bg-warning badge-pill badge-round me-1">1</span>
                                    Viernes
                                </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="list-group">
                                        <button type="button" class="list-group-item list-group-item-action list-group-item-danger">
                                            Turno 1
                                        </button>
                                        <button type="button" class="list-group-item list-group-item-action list-group-item-danger">
                                            Turno 2
                                        </button>
                                        <button type="button" class="list-group-item list-group-item-action">
                                            Turno 3
                                        </button>
                                        <button type="button" class="list-group-item list-group-item-action list-group-item-danger">
                                            Turno 4
                                        </button>
                                        <button type="button" class="list-group-item list-group-item-action list-group-item-danger">
                                            Turno 5
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        
            <!-- UBICACION -->
            <div class="page-heading">
                <div class="page-title">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Ubicación</h3>
                        <p class="text-subtitle text-muted">Encontranos en Miguel David 1676</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="card-ubicacion">
                        <h5 class="card-title">Ver en Google Maps</h5>
                    </div>
                    <div class="card-body">
                        <div class="googlemaps">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1510.532288853613!2d-60.499175632378574!3d-31.770399680066987!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95b44c2d2e3c1cb7%3A0xb3dac78f59a480ad!2sMuv%20Centro%20De%20Entrenamiento!5e0!3m2!1ses-419!2sar!4v1717175985490!5m2!1ses-419!2sar" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    Simple Datatable
                </h5>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>City</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                          if(empty($results))
                          {
                            echo "<tr>";
                            echo "<td>-</td>";
                            echo "<td>NO DATA</td>";
                            echo "<td>-</td>";
                            echo "</tr>";
                          }else{
                            foreach($results as $row)
                            {
                              echo "<tr>";
                              echo "<td>" . htmlspecialchars($row["username"]) . "</td>";
                              echo "<td>" . htmlspecialchars($row["email"]) . "</td>";
                              echo "<td>" . "123456789" . "</td>";
                              echo "<td>" . "Dirección" . "</td>";
                              echo "<td>" . "<span class=\"badge bg-success\">Active</span>" . "</td>";
                              echo "</tr>";
                            }
                          }
                        ?>
                        <!-- <tr>
                            <td>Graiden</td>
                            <td>vehicula.aliquet@semconsequat.co.uk</td>
                            <td>076 4820 8838</td>
                            <td>Offenburg</td>
                            <td>
                                <span class="badge bg-success">Active</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Dale</td>
                            <td>fringilla.euismod.enim@quam.ca</td>
                            <td>0500 527693</td>
                            <td>New Quay</td>
                            <td>
                                <span class="badge bg-success">Active</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Nathaniel</td>
                            <td>mi.Duis@diam.edu</td>
                            <td>(012165) 76278</td>
                            <td>Grumo Appula</td>
                            <td>
                                <span class="badge bg-danger">Inactive</span>
                            </td>
                        </tr> -->
                    </tbody>
                </table>
            </div>
        </div>
        
            <!-- CONTACTO -->
            <div class="page-heading">
                <div class="page-title">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Información de contacto</h3>
                        <p class="text-subtitle text-muted">Seguinos en nuestras redes sociales!</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-4">
                    <div class="card" id="card-contacto">
                        <div class="card-body">
                            <div class="d-flex justify-content-center align-items-center flex-column">
                                <div class="avatar avatar-2xl">
                                    <img src="./assets/compiled/jpg/2.jpg" alt="Avatar">
                                </div>

                                <h4 class="mt-3">Nombre Apellido</h4>
                                <p class="text-small">A qué se dedica</p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body py-4 px-4">
                            <div class="d-flex align-items-center">
                                <h5 class="ms-3"><i class="bi-instagram"></i></h5>
                                <h6 class="text-muted ms-3 mb-2">@instagram</h6>
                            </div>
                            <div class="d-flex align-items-center">
                                <h5 class="ms-3"><i class="bi-twitter-x"></i></h5>
                                <h6 class="text-muted ms-3 mb-2">@twitter/x</h6>
                            </div>
                            <div class="d-flex align-items-center">
                                <h5 class="ms-3"><i class="bi-facebook"></i></h5>
                                <h6 class="text-muted ms-3 mb-2">@facebook</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-center align-items-center">
                            <div class="d-flex justify-content-center align-items-center flex-column me-3">
                                <h1><i class="bi bi-instagram"></i></h5>
                                <p class="text-small">@instagram</p>
                            </div>
                            <div class="d-flex justify-content-center align-items-center flex-column me-3">
                                <h1><i class="bi bi-twitter-x"></i></h5>
                                <p class="text-small">@twitter/x</p>
                            </div>
                            <div class="d-flex justify-content-center align-items-center flex-column">
                                <h1><i class="bi bi-facebook"></i></h5>
                                <p class="text-small">@facebook</p>
                            </div>
    
                        </div>
                    </div>
                </div> -->
                <div class="col-12 col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Formulario de sugerencias</h4>
                            <p class="card-text">
                                Tu opinión es fundamental para dar forma a nuestro futuro.
                                Guía nuestras decisiones, inspira la innovación y asegura
                                que estemos satisfaciendo tus necesidades. Ya sea que hayas
                                tenido una experiencia estelar o hayas encontrado algún desafío,
                                queremos escucharte. Tu opinión alimenta nuestro compromiso
                                con la mejora continua.
                            </p>
                            <form class="form" method="post">
                                <div class="form-body">
                                    <div class="form-group">
                                        <label for="feedback1" class="sr-only">Nombre</label>
                                        <input type="text" id="feedback1" class="form-control" placeholder="Nombre"
                                            name="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="feedback4" class="sr-only">Apellido</label>
                                        <input type="text" id="feedback4" class="form-control" placeholder="Apellido"
                                            name="LastName">
                                    </div>
                                    <div class="form-group">
                                        <label for="feedback2" class="sr-only">Email</label>
                                        <input type="email" id="feedback2" class="form-control" placeholder="Email"
                                            name="email">
                                    </div>
                                    <div class="form-group">
                                        <select name="reason" class="form-control">
                                            <option value="Inquiry">Consulta</option>
                                            <option value="Complain">Queja</option>
                                            <option value="Other">Otro</option>
                                        </select>
                                    </div>
                                    <div class="form-group form-label-group">
                                        <textarea class="form-control" id="label-textarea" rows="3"
                                            placeholder="Sujerencia"></textarea>
                                        <label for="label-textarea"></label>
                                    </div>
                                </div>
                                <div class="form-actions d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1">Enviar</button>
                                    <button type="reset" class="btn btn-light-primary">Cancelar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-3">
            <div class="card">
                <div class="card-body py-4 px-4">
                    <div class="d-flex align-items-center">
                        <div class="avatar avatar-xl">
                            <img src="./assets/compiled/jpg/1.jpg" alt="Face 1">
                        </div>
                        <div class="ms-3 name">
                            <h5 class="font-bold">Gimnasio MUV</h5>
                            <h6 class="text-muted mb-0">@instagram</h6>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center align-items-center mt-3">
                        <h5 class="ms-3"><i class="bi-instagram"></i></h5>
                        <h5 class="ms-3"><i class="bi-twitter-x"></i></h5>
                        <h5 class="ms-3"><i class="bi-facebook"></i></h5>
                        <h5 class="ms-3"><i class="bi-whatsapp"></i></h5>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Lista de avisos</h4>
                </div>
                    <div class="card-body">
                    <p>
                        Enterate de las últimas novedades!
                    </p>
                    <div class="list-group">
                        <a data-bs-toggle="modal" data-bs-target="#modal-info" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1 text-info">Aviso 1 - Información</h5>
                            </div>
                            <p class="mb-1">
                                [Aeea contenido del aviso 1 ...]
                            </p>
                            <small>Hace 3 días</small>
                        </a>
                        <a data-bs-toggle="modal" data-bs-target="#modal-warning" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1 text-warning">Aviso 2 - Alerta</h5>
                            </div>
                            <p class="mb-1">
                                [Aeea contenido del aviso 2 ...]
                            </p>
                            <small>Hace 5 días</small>
                        </a>
                        <a data-bs-toggle="modal" data-bs-target="#modal-danger" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1 text-danger">Aviso 3 - Importante</h5>
                            </div>
                            <p class="mb-1">
                                [Aeea contenido del aviso 3 ...]
                            </p>
                            <small>Hace 7 días</small>
                        </a>
                        <div class="px-4">
                            <button data-bs-toggle="modal" data-bs-target="#modal-scroll-inside" class='btn btn-block btn-xl btn-outline-primary font-bold mt-3'>
                                Ver todo
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

<!-- Modal para pedir ingresar cuando se requiera -->
<div class="modal fade text-left" id="modal-turno-ingresar" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel160" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
        role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title white" id="myModalLabel160">Reservar turno
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal"
                    aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                Necesitás ingresar a tu cuenta para reservar un turno!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-secondary"
                    data-bs-dismiss="modal">
                    <!-- <i class="bx bx-x d-block d-sm-none"></i> -->
                    <span class="d-block d-sm-block">Cerrar</span>
                </button>
                <a href="auth-login.html">
                    <button type="button" class="btn btn-primary ms-1"
                        data-bs-dismiss="modal">
                        <!-- <i class="bx bx-check d-block d-sm-none"></i> -->
                        <span class="d-block d-sm-block">Ingresar</span>
                    </button>
                </a>
            </div>
        </div>
    </div>
</div>

<!--Danger theme Modal -->
<div class="modal fade text-left" id="modal-danger" tabindex="-1" role="dialog"
aria-labelledby="myModalLabel120" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
        role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title white" id="myModalLabel120">Danger Modal
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal"
                    aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                Tart lemon drops macaroon oat cake chocolate toffee chocolate
                bar icing. Pudding jelly beans
                carrot cake pastry gummies cheesecake lollipop. I love cookie
                lollipop cake I love sweet
                gummi bears cupcake dessert.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-secondary"
                    data-bs-dismiss="modal">
                    <!-- <i class="bx bx-x d-block d-sm-none"></i> -->
                    <span class="d-block d-sm-block">Cerrar</span>
                </button>
                <button type="button" class="btn btn-danger ms-1"
                    data-bs-dismiss="modal">
                    <!-- <i class="bx bx-check d-block d-sm-none"></i> -->
                    <span class="d-block d-sm-block">Aceptar</span>
                </button>
            </div>
        </div>
    </div>
</div>

<!--info theme Modal -->
<div class="modal fade text-left" id="modal-info" tabindex="-1" role="dialog"
aria-labelledby="myModalLabel130" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
        role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title white" id="myModalLabel130">Info Modal
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal"
                    aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                Tart lemon drops macaroon oat cake chocolate toffee chocolate
                bar icing. Pudding jelly beans
                carrot cake pastry gummies cheesecake lollipop. I love cookie
                lollipop cake I love sweet
                gummi bears cupcake dessert.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-secondary"
                    data-bs-dismiss="modal">
                    <!-- <i class="bx bx-x d-block d-sm-none"></i> -->
                    <span class="d-block d-sm-block">Cerrar</span>
                </button>
                <button type="button" class="btn btn-info ms-1"
                    data-bs-dismiss="modal">
                    <!-- <i class="bx bx-check d-block d-sm-none"></i> -->
                    <span class="d-block d-sm-block">Aceptar</span>
                </button>
            </div>
        </div>
    </div>
</div>

<!--warning theme Modal -->
<div class="modal fade text-left" id="modal-warning" tabindex="-1" role="dialog"
aria-labelledby="myModalLabel140" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
        role="document">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h5 class="modal-title white" id="myModalLabel140">Warning Modal
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal"
                    aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                Tart lemon drops macaroon oat cake chocolate toffee chocolate
                bar icing. Pudding jelly beans
                carrot cake pastry gummies cheesecake lollipop. I love cookie
                lollipop cake I love sweet
                gummi bears cupcake dessert.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-secondary"
                    data-bs-dismiss="modal">
                    <!-- <i class="bx bx-x d-block d-sm-none"></i> -->
                    <span class="d-block d-sm-block">Cerrar</span>
                </button>
                <button type="button" class="btn btn-warning ms-1"
                    data-bs-dismiss="modal">
                    <!-- <i class="bx bx-check d-block d-sm-none"></i> -->
                    <span class="d-block d-sm-block">Aceptar</span>
                </button>
            </div>
        </div>
    </div>
</div>

<!--scrolling content Modal -->
<div class="modal fade" id="modal-scroll-inside" tabindex="-1" role="dialog"
aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Scrolling long
                    Content</h5>
                <button type="button" class="close" data-bs-dismiss="modal"
                    aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <p>
                    Biscuit powder jelly beans. Lollipop candy canes croissant icing
                    chocolate cake. Cake fruitcake
                    powder pudding pastry
                </p>
                <p>
                    Tootsie roll oat cake I love bear claw I love caramels caramels halvah
                    chocolate bar. Cotton
                    candy
                    gummi bears pudding pie apple pie cookie. Cheesecake jujubes lemon drops
                    danish dessert I love
                    caramels powder
                </p>
                <p>
                    Chocolate cake icing tiramisu liquorice toffee donut sweet roll cake.
                    Cupcake dessert icing
                    dragée dessert. Liquorice jujubes cake tart pie donut. Cotton candy
                    candy canes lollipop liquorice
                    chocolate marzipan muffin pie liquorice.
                </p>
                <p>
                    Powder cookie jelly beans sugar plum ice cream. Candy canes I love
                    powder sugar plum tiramisu.
                    Liquorice pudding chocolate cake cupcake topping biscuit. Lemon drops
                    apple pie sesame snaps
                    tootsie roll carrot cake soufflé halvah. Biscuit powder jelly beans.
                    Lollipop candy canes
                    croissant icing chocolate cake. Cake fruitcake powder pudding pastry.
                </p>
                <p>
                    Tootsie roll oat cake I love bear claw I love caramels caramels halvah
                    chocolate bar. Cotton
                    candy gummi bears pudding pie apple pie cookie. Cheesecake jujubes lemon
                    drops danish dessert I
                    love caramels powder.
                </p>
                <p>
                    dragée dessert. Liquorice jujubes cake tart pie donut. Cotton candy
                    candy canes lollipop liquorice
                    chocolate marzipan muffin pie liquorice.
                </p>
                <p>
                    Powder cookie jelly beans sugar plum ice cream. Candy canes I love
                    powder sugar plum tiramisu.
                    Liquorice pudding chocolate cake cupcake topping biscuit. Lemon drops
                    apple pie sesame snaps
                    tootsie roll carrot cake soufflé halvah.Biscuit powder jelly beans.
                    Lollipop candy canes croissant
                    icing chocolate cake. Cake fruitcake powder pudding pastry.
                </p>
                <p>
                    Tootsie roll oat cake I love bear claw I love caramels caramels halvah
                    chocolate bar. Cotton
                    candy gummi bears pudding pie apple pie cookie. Cheesecake jujubes lemon
                    drops danish dessert I
                    love caramels powder.
                </p>
                <p>
                    Chocolate cake icing tiramisu liquorice toffee donut sweet roll cake.
                    Cupcake dessert icing
                    dragée dessert. Liquorice jujubes cake tart pie donut. Cotton candy
                    candy canes lollipop liquorice
                    chocolate marzipan muffin pie liquorice.
                </p>
                <p>
                    Powder cookie jelly beans sugar plum ice cream. Candy canes I love
                    powder sugar plum tiramisu.
                    Liquorice pudding chocolate cake cupcake topping biscuit. Lemon drops
                    apple pie sesame snaps
                    tootsie roll carrot cake soufflé halvah. Biscuit powder jelly beans.
                    Lollipop candy canes
                    croissant icing chocolate cake. Cake fruitcake powder pudding pastry.
                </p>
                <p>
                    Tootsie roll oat cake I love bear claw I love caramels caramels halvah
                    chocolate bar. Cotton
                    candy gummi bears pudding pie apple pie cookie. Cheesecake jujubes lemon
                    drops danish dessert I
                    love caramels powder.
                </p>
                <p>
                    Chocolate cake icing tiramisu liquorice toffee donut sweet roll cake.
                    Cupcake dessert icing
                    dragée dessert. Liquorice jujubes cake tart pie donut. Cotton candy
                    candy canes lollipop liquorice
                    chocolate marzipan muffin pie liquorice.
                </p>
                <p>
                    Powder cookie jelly beans sugar plum ice cream. Candy canes I love
                    powder sugar plum tiramisu.
                    Liquorice pudding chocolate cake cupcake topping biscuit. Lemon drops
                    apple pie sesame snaps
                    tootsie roll carrot cake soufflé halvah.
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-secondary"
                    data-bs-dismiss="modal">
                    <!-- <i class="bx bx-x d-block d-sm-none"></i> -->
                    <span class="d-block d-sm-block">Cerrar</span>
                </button>
                <button type="button" class="btn btn-primary ms-1" data-bs-dismiss="modal">
                    <!-- <i class="bx bx-check d-block d-sm-none"></i> -->
                    <span class="d-block d-sm-block">Aceptar</span>
                </button>
            </div>
        </div>
    </div>
</div>

            <footer>
    <div class="footer clearfix mb-0 text-muted">
        <div class="float-start">
            <p>2023 &copy; Mazer</p>
        </div>
        <div class="float-end">
            <p>Crafted with <span class="text-danger"><i class="bi bi-heart-fill icon-mid"></i></span>
                by <a href="https://saugi.me">Saugi</a></p>
        </div>
    </div>
</footer>
        </div>
    </div>
    <script src="assets/static/js/components/dark.js"></script>
    <script src="assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    
    
    <script src="assets/compiled/js/app.js"></script>


</body>

</html>