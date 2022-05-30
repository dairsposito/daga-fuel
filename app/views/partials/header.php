<?php use App\Core\Session; ?>
<!-- This example requires Tailwind CSS v2.0+ -->
<div class="relative bg-white">

    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="flex justify-between items-center border-b-2 border-gray-100 py-6 md:justify-start md:space-x-10">
            <div class="flex justify-start lg:w-0 lg:flex-1">
                <a href="/">
                    <span class="sr-only">Workflow</span>
                    <img class="h-8 w-auto sm:h-10" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg" alt="">
                </a>
            </div>
            <div class="-mr-2 -my-2 md:hidden">
                <button type="button" class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500" aria-expanded="false" onclick="document.getElementById('drop-cel').style.display = 'block'">
                    <span class="sr-only">Open menu</span>
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>

            <?php
            if (isset(Session::getInstance()->id)) {
                $class = 'hidden md:flex space-x-10';
                require __DIR__ . '/../components/header/nav.php';
            }
            ?>

            <div class="hidden md:flex items-center justify-end md:flex-1 lg:w-0">
                <?php if (!isset(Session::getInstance()->id)) {
                    if ($view != 'login') {
                        $class = 'whitespace-nowrap text-base font-medium text-gray-500 hover:text-gray-900';
                        require __DIR__ . '/../components/header/signin.php';
                    }
                    if ($view != 'users/new-user') {
                        $class = 'ml-8 whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700';
                        require __DIR__ . '/../components/header/signup.php';
                    }
                } ?>
            </div>
        </div>
    </div>

    <div class="absolute top-0 inset-x-0 p-2 transition transform origin-top-right md:hidden" id="drop-cel">
        <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 bg-white divide-y-2 divide-gray-50">
            <div class="pt-5 pb-6 px-5">
                <div class="flex items-center justify-between">
                    <div>
                    </div>
                    <div class="-mr-2">
                        <button type="button" class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500" onclick="document.getElementById('drop-cel').style.display = 'none'">
                            <span class="sr-only">Close menu</span>
                            <!-- Heroicon name: outline/x -->
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="mt-6">
                    <?php
                    if (isset(Session::getInstance()->id)) {
                        $class = 'grid gap-y-8';
                        require __DIR__ . '/../components/header/nav.php';
                    } else {
                        if ($view != 'login') {
                            $class = 'w-full flex items-center justify-center px-4 py-2 border-b-8 border-transparent rounded-md shadow-sm text-base font-medium text-gray-500 hover:text-gray-900';
                            require __DIR__ . '/../components/header/signin.php';
                        }
                        if ($view != 'users/new-user') {
                            $class = 'w-full flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700';
                            require __DIR__ . '/../components/header/signup.php';
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>