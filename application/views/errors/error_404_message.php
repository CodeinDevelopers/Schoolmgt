 <!--metatags-->
 <meta charset="utf-8" />
 <title>Page Not Found - Acamedium</title>
 <meta name="theme-color" content="#fff">
 <!--/metatags-->
 <!--Website Favicon Logo-->
 <link rel="shortcut icon" href="assets/images/favicon/favicon.ico">
 <link rel="apple-touch-icon" sizes="180x180" href="assets/images/favicon/apple-touch-icon.png">
 <link rel="icon" type="image/png" sizes="32x32" href="assets/images/favicon/favicon-32x32.png">
 <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon/favicon-16x16.png">
 <link rel="manifest" href="assets/images/favicon/site.webmanifest">
 <!--Website Favicon Logo-->
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Arial, sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: rgb(249, 250, 251);
            padding: 1rem;
            position: relative;
            overflow-x: hidden;
        }

        .error-container {
            text-align: center;
            max-width: 32rem;
        }

        .error-code {
            font-size: 120px;
            color: #94a3b8;
            font-weight: 300;
            line-height: 1.2;
        }

        .error-title {
            font-size: 1.5rem;
            color: #334155;
            margin-bottom: 1rem;
            font-weight: 600;
        }

        .error-message {
            color: #64748b;
            margin-bottom: 2rem;
            line-height: 1.5;
        }

        .button-container {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
            margin-bottom: 4rem;
        }

        .button {
            display: inline-flex;
            align-items: center;
            padding: 0.75rem 1.5rem;
            border-radius: 0.375rem;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.2s;
            cursor: pointer;
            border: none;
            font-size: 1rem;
        }

        .button svg {
            width: 20px;
            height: 20px;
            margin-right: 0.5rem;
        }

        .button-primary {
            background-color: #ff5951;
            color: white;
        }

        .button-primary:hover {
            background-color: #cc271f;
        }

        .button-secondary {
            background-color: rgb(63, 211, 199);
            color: white;
        }

        .button-secondary:hover {
            background-color: rgb(14, 197, 182);
        }

        .button-outline {
            border: 2px solid #2563eb;
            color: #2563eb;
            background-color: transparent;
        }

        .button-outline:hover {
            background-color: #2563eb;
            color: white;
        }

        .logo-container {
            position: absolute;
            bottom: 2rem;
            left: 50%;
            transform: translateX(-50%);
            opacity: 0.7;
            transition: opacity 0.3s;
        }

        .logo-container:hover {
            opacity: 1;
        }

        .logo {
            width: 150px;
            height: auto;
        }

        @media (max-height: 600px) {
            .logo-container {
                position: relative;
                bottom: auto;
                margin-top: 2rem;
            }
        }
        
    </style>
</head>
<body>
    <div class="error-container">
        <h1 class="error-code">404</h1>
        <h2 class="error-title">Lost in the Digital Wilderness 🧭</h2>
        <p class="error-message">
           ehm, Looks like you’ve wandered off the path! This page is a bit of a ghost town.
        </p>
        <div class="button-container">
            <button onclick="goToRoot()" class="button button-primary">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Take me home
            </button>
            <a href="/ticket.html" class="button button-secondary">
                <svg width="30px" height="30px" viewBox="0 0 24 24" id="_24x24_On_Light_Support" data-name="24x24/On Light/Support" xmlns="http://www.w3.org/2000/svg" fill="#ffffff" stroke=""><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <rect id="view-box" width="24" height="24" fill="none"></rect> <path id="Shape" d="M8,17.751a2.749,2.749,0,0,1,5.127-1.382C15.217,15.447,16,14,16,11.25v-3c0-3.992-2.251-6.75-5.75-6.75S4.5,4.259,4.5,8.25v3.5a.751.751,0,0,1-.75.75h-1A2.753,2.753,0,0,1,0,9.751v-1A2.754,2.754,0,0,1,2.75,6h.478c.757-3.571,3.348-6,7.022-6s6.264,2.429,7.021,6h.478a2.754,2.754,0,0,1,2.75,2.75v1a2.753,2.753,0,0,1-2.75,2.75H17.44A5.85,5.85,0,0,1,13.5,17.84,2.75,2.75,0,0,1,8,17.751Zm1.5,0a1.25,1.25,0,1,0,1.25-1.25A1.251,1.251,0,0,0,9.5,17.751Zm8-6.75h.249A1.251,1.251,0,0,0,19,9.751v-1A1.251,1.251,0,0,0,17.75,7.5H17.5Zm-16-2.25v1A1.251,1.251,0,0,0,2.75,11H3V7.5H2.75A1.251,1.251,0,0,0,1.5,8.751Z" transform="translate(1.75 2.25)" fill="#ffffff"></path> </g></svg>
                Get Support
            </a>
            <a href="https://monitor.codeindevelopers.com.ng/s/codeindevelopers" class="button button-outline">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                </svg>
                System Status
            </a>
        </div>
        
    </div>
    <div class="logo-container">
    <img src="assets/images/common/logo-new-light.png" alt="Acamedium" class="logo">
    </div>

    <script>
        function goToRoot() {
            // Get the root URL of the current domain
            const rootUrl = window.location.origin;
            // Navigate to the root URL
            window.location.href = rootUrl;
        }
    </script>
</body>
</html>