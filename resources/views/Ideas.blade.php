<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Posts</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: black;
            padding-top: 70px;
            overflow-x: hidden;
        }
        header {
            background-color: rgb(230, 92, 0);
            position: fixed;
            width: 100%;
            top: 0;
            left: 0;
            z-index: 1000;
            transition: top 0.3s, background-color 0.3s;
        }
        header.hidden {
            top: -70px;
        }
        header.transparent {
            background-color: rgba(255, 140, 66, 0.8);
        }
        .navbar-brand img {
            height: 50px;
        }
        .nav-link {
            color: white !important;
            font-weight: bold;
            position: relative;
        }
        .nav-link.active::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -5px;
            width: 100%;
            height: 2px;
            background-color: white;
            border-radius: 2px;
        }
        .nav-link.active {
            text-decoration: none;
        }
        .banner {
            position: relative;
            background-image: url('https://suitmedia.static-assets.id/strapi/Ideas-9fcb42da2e.png');
            background-size: cover;
            background-position: center;
            height: 500px;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            overflow: hidden;
            background-attachment: fixed;
            transform: skewY(-3deg);
            transform-origin: bottom left;
        }
        .banner-text {
            position: relative;
            z-index: 1;
            transform: skewY(3deg);
        }
        .banner::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: -100px;
            width: calc(100% + 100px);
            height: 100px;
            background: linear-gradient(to top right, transparent);
            z-index: 0;
            transform: skewY(-3deg);
            transform-origin: bottom left;
        }
        .content {
            padding: 20px;
        }
        .card {
            margin-bottom: 20px;
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .card-img-top {
            object-fit: cover;
            height: 200px;
            width: 100%;
        }
        .card-title {
            display: -webkit-box;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            -webkit-line-clamp: 3;
            line-height: 1.2em;
        }
        .card-text {
            display: -webkit-box;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            -webkit-line-clamp: 3;
            line-height: 1.2em;
        }
        .pagination {
            justify-content: center;
        }
        .pagination .page-item.active .page-link {
            background-color: orange;
            border-color: orange;
            color: white;
        }
        .pagination .page-link {
            border-radius: 4px;
        }
        .pagination .page-link {
            border-radius: 0;
        }
        .pagination .page-item.disabled .page-link {
            cursor: not-allowed;
            opacity: 0.5;
        }
        .form-select {
            width: auto;
            display: inline-block;
        }
        .item-count {
            margin-right: 10px;
        }
        .page-link {
            padding: 0.5rem 1rem;
        }
        .page-link:hover {
            background-color: #f0f0f0;
        }
    </style>
</head>
<body>
    <header id="main-header">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="https://binus.ac.id/malang/communication/wp-content/uploads/sites/3/2021/07/suitmedia-internship-program-suitschool-2019-480x480.png" alt="Logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}" data-target="work">Work</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}" data-target="about">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}" data-target="services">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ url('/') }}" data-target="ideas">Ideas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}" data-target="careers">Careers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}" data-target="contacts">Contacts</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="banner">
        <div class="banner-text">
            <h1>Ideas</h1>
            <p>Where all our great things begin</p>
        </div>
    </div>

    <div class="content container mt-4">
        <div class="d-flex justify-content-between mb-3">
            <span class="item-count" id="itemCount">Showing 1-10</span>
            <div class="dropdown-container">
                <label for="sortSelect" class="dropdown-label">Sort by:</label>
                <select id="sortSelect" class="form-select">
                    <option value="-published_at" selected>Sort by Latest</option>
                    <option value="published_at">Sort by Oldest</option>
                </select>
                <label for="itemsPerPageSelect" class="dropdown-label">Show per page:</label>
                <select id="itemsPerPageSelect" class="form-select">
                    <option value="10" selected>10 per page</option>
                    <option value="20">20 per page</option>
                    <option value="50">50 per page</option>
                </select>
            </div>
        </div>

        <div id="postsContainer" class="row">
            <!-- Posts will be loaded here -->
        </div>

        <nav aria-label="Page navigation">
            <ul id="pagination" class="pagination">
                <!-- Pagination buttons will be dynamically inserted here -->
                <li class="page-item" id="prevPage">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <!-- Page numbers will be inserted here -->
                <li class="page-item" id="nextPage">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Intersection Observer Polyfill (for older browsers) -->
    <script src="https://cdn.jsdelivr.net/npm/intersection-observer@0.12.0/intersection-observer.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let sort = localStorage.getItem('sort') || '-published_at';
            let itemsPerPage = parseInt(localStorage.getItem('itemsPerPage')) || 10;
            let currentPage = parseInt(localStorage.getItem('currentPage')) || 1;
            let totalPages = 1;

            function loadPosts() {
                const pageNumber = parseInt(currentPage, 10);
                const pageSize = parseInt(itemsPerPage, 10);

                if (isNaN(pageNumber) || isNaN(pageSize) || pageNumber <= 0 || pageSize <= 0) {
                    console.error('Invalid page number or page size');
                    return;
                }

                const url = `https://suitmedia-backend.suitdev.com/api/ideas?page[number]=${pageNumber}&page[size]=${pageSize}&append[]=small_image&append[]=medium_image&sort=${sort}`;

                fetch(url, {
                    method: 'GET',
                    headers: {
                        'Accept': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.data.length > 0) {
                        document.getElementById('postsContainer').innerHTML = data.data.map(post => `
                            <div class="col-md-4">
                                <div class="card">
                                    <img src="${post.small_image && post.small_image[0] ? post.small_image[0].url : 'default-image.jpg'}" class="card-img-top" alt="${post.title}" loading="lazy">
                                    <div class="card-body">
                                        <h5 class="card-title">${post.title}</h5>
                                    </div>
                                </div>
                            </div>
                        `).join('');

                        document.getElementById('itemCount').textContent = `Showing ${((pageNumber - 1) * pageSize) + 1}-${Math.min(pageNumber * pageSize, data.meta.total)} of ${data.meta.total}`;

                        totalPages = Math.ceil(data.meta.total / pageSize);

                        updatePagination(pageNumber);
                    } else {
                        document.getElementById('postsContainer').innerHTML = '<p>No posts available.</p>';
                    }
                })
                .catch(error => {
                    console.error('Fetch error:', error);
                    document.getElementById('postsContainer').innerHTML = '<p>Error loading posts.</p>';
                });
            }

            function updatePagination(currentPage) {
                const visiblePageCount = 5;
                let startPage = Math.max(1, currentPage - Math.floor(visiblePageCount / 2));
                let endPage = Math.min(totalPages, startPage + visiblePageCount - 1);

                if (endPage - startPage + 1 < visiblePageCount) {
                    startPage = Math.max(1, endPage - visiblePageCount + 1);
                }

                let paginationHtml = '';
                for (let i = startPage; i <= endPage; i++) {
                    paginationHtml += `
                        <li class="page-item ${i === currentPage ? 'active' : ''}">
                            <a class="page-link" href="#" data-page="${i}">${i}</a>
                        </li>
                    `;
                }

                document.getElementById('pagination').innerHTML = `
                    <li class="page-item ${currentPage === 1 ? 'disabled' : ''}" id="prevPage">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    ${paginationHtml}
                    <li class="page-item ${currentPage === totalPages ? 'disabled' : ''}" id="nextPage">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                `;
            }

            document.getElementById('sortSelect').value = sort;
            document.getElementById('itemsPerPageSelect').value = itemsPerPage;

            loadPosts();

            document.getElementById('sortSelect').addEventListener('change', function() {
                sort = this.value;
                localStorage.setItem('sort', sort);
                loadPosts();
            });

            document.getElementById('itemsPerPageSelect').addEventListener('change', function() {
                itemsPerPage = this.value;
                localStorage.setItem('itemsPerPage', itemsPerPage);
                loadPosts();
            });

            document.getElementById('pagination').addEventListener('click', function(event) {
                if (event.target && event.target.matches('a.page-link')) {
                    event.preventDefault();
                    const targetPage = event.target.getAttribute('data-page');
                    if (targetPage) {
                        currentPage = parseInt(targetPage);
                        localStorage.setItem('currentPage', currentPage);
                        loadPosts();
                    }
                }
            });

            document.getElementById('pagination').addEventListener('click', function(event) {
                if (event.target.closest('#prevPage') && !event.target.closest('.disabled')) {
                    event.preventDefault();
                    if (currentPage > 1) {
                        currentPage--;
                        localStorage.setItem('currentPage', currentPage);
                        loadPosts();
                    }
                }

                if (event.target.closest('#nextPage') && !event.target.closest('.disabled')) {
                    event.preventDefault();
                    if (currentPage < totalPages) {
                        currentPage++;
                        localStorage.setItem('currentPage', currentPage);
                        loadPosts();
                    }
                }
            });

            let lastScrollTop = 0;
            window.addEventListener('scroll', function() {
                let currentScroll = window.pageYOffset || document.documentElement.scrollTop;
                if (currentScroll > lastScrollTop) {
                    document.getElementById('main-header').classList.add('hidden');
                } else {
                    document.getElementById('main-header').classList.remove('hidden');
                }
                lastScrollTop = currentScroll <= 0 ? 0 : currentScroll;
            });
        });

        document.addEventListener("DOMContentLoaded", function() {
            const navLinks = document.querySelectorAll('.nav-link');

            function setActiveLink(target) {
                navLinks.forEach(link => {
                    if (link.getAttribute('data-target') === target) {
                        link.classList.add('active');
                    } else {
                        link.classList.remove('active');
                    }
                });
            }

            const currentURL = window.location.hash;
            if (currentURL) {
                setActiveLink(currentURL);
            }

            navLinks.forEach(link => {
                link.addEventListener('click', function(event) {
                    event.preventDefault();
                    const target = this.getAttribute('data-target');
                    setActiveLink(target);
                    document.querySelector(target).scrollIntoView({ behavior: 'smooth' });
                });
            });
        });
    </script>
</body>
</html>
