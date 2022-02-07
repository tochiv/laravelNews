<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <h1 class="code-line" data-line-start=0 data-line-end=1 ><a id="News_site_0"></a>News site</h1>
                <h2 class="code-line" data-line-start=1 data-line-end=2 ><a id="Expected_technology_stack_for_project_1"></a>Expected technology stack for project;</h2>
                <ul>
                    <li class="has-line-data" data-line-start="2" data-line-end="3">Laravel 9 (dev branch)</li>
                    <li class="has-line-data" data-line-start="3" data-line-end="4">Php ^8.0</li>
                    <li class="has-line-data" data-line-start="4" data-line-end="5">Authentication ( Bootstrap )</li>
                    <li class="has-line-data" data-line-start="5" data-line-end="6">Admin Panel ( CMS - Content Management System)</li>
                    <li class="has-line-data" data-line-start="6" data-line-end="7">Frontend ( blade usage concept, generating laravel built-in components to avoid repeating codes )</li>
                    <li class="has-line-data" data-line-start="7" data-line-end="9">Using docker will be better.</li>
                </ul>
                <h2 class="code-line" data-line-start=9 data-line-end=10 ><a id="Description_ver_20_9"></a>Description ver 2.0</h2>
                <p class="has-line-data" data-line-start="10" data-line-end="14">Create News site that will include authentication system(basic laravel auth), 3 roles of users(admin, editor, basic user),<br>
                    admin panel(It’s place, where admin will check and approve or disapprove news that editor sends to admin),<br>
                    editor panel(It’s place, where editor will create new news and send to admin for approval(or disapproval)),<br>
                    news list with comments.</p>
                <h2 class="code-line" data-line-start=15 data-line-end=16 ><a id="Modules_expected_from_the_project_15"></a>Modules expected from the project</h2>
                <ul>
                    <li class="has-line-data" data-line-start="16" data-line-end="17">Create simple authentication system with laravel</li>
                    <li class="has-line-data" data-line-start="17" data-line-end="18">User/Role Management. Create 3 different role types<code>Example: Admin, editor, user</code>, on registration process set the default role as non-admin role to new users.</li>
                    <li class="has-line-data" data-line-start="18" data-line-end="20">Create news list. News will consist of: <code>Title, text, comments, publication date</code>.<br>
                        News will be shown on news page</li>
                    <li class="has-line-data" data-line-start="20" data-line-end="22">News that editor can write and send to admin(news for confirmation will be shown in admin panel) for confirmation,<br>
                        if admin approved it - add this news to your news list on news page.</li>
                    <li class="has-line-data" data-line-start="22" data-line-end="24">Users as <code>Editors</code> can write news and send to user as <code>Admin</code> for confirmation(news will be shown in admin panel),<br>
                        if admin approved it - add this news to your news list on news page.</li>
                    <li class="has-line-data" data-line-start="24" data-line-end="25">Securing the routes with the help of Middleware</li>
                    <li class="has-line-data" data-line-start="25" data-line-end="27">User’s should have avatar but filesystem should be using <code>Storage</code></li>
                </ul>
                <h2 class="code-line" data-line-start=27 data-line-end=28 ><a id="Rules_while_creating_the_application_27"></a>Rules while creating the application.</h2>
                <ul>
                    <li class="has-line-data" data-line-start="28" data-line-end="29">
                        <p class="has-line-data" data-line-start="28" data-line-end="29">Each sql related thing should be generated by the help of migration</p>
                    </li>
                    <li class="has-line-data" data-line-start="29" data-line-end="30">
                        <p class="has-line-data" data-line-start="29" data-line-end="30">Demo content should be generated with seeder optionally by the help of faker</p>
                    </li>
                    <li class="has-line-data" data-line-start="30" data-line-end="31">
                        <p class="has-line-data" data-line-start="30" data-line-end="31">Each form should be validated, neither inline nor externally</p>
                    </li>
                    <li class="has-line-data" data-line-start="31" data-line-end="33">
                        <p class="has-line-data" data-line-start="31" data-line-end="32">Controller’s should be well coded &amp; clean/readible</p>
                    </li>
                    <li class="has-line-data" data-line-start="33" data-line-end="36">
                        <p class="has-line-data" data-line-start="33" data-line-end="36">DO NOT USE<br>
                            composer<br>
                            Packages expect laravel default packages as known as <code>(ui, helper)</code></p>
                    </li>
                    <li class="has-line-data" data-line-start="36" data-line-end="41">
                        <p class="has-line-data" data-line-start="36" data-line-end="41">store your<br>
                            .env<br>
                            configurations also as<br>
                            .env.example<br>
                            for us for testing reason.</p>
                    </li>
                </ul>
            </div>
        </div>
    </body>
</html>
