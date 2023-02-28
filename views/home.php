<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CLIENT INFORMATION</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
  <link rel="icon" type="image/png" href="img/complogo.png" class="rounded-full">
<script src="https://cdn.tailwindcss.com"></script>

</head>
<body>
  <header>
  <nav class="bg-blue-900 opacity-50 border-b-2 border-gray-700 border-opacity-50 drop-shadow-3xl ">
        <div class="container mx-auto px-6 py-3 ">
            <div class="md:flex md:items-center md:justify-between">
                <div class="flex justify-between items-center">
                    
                    <div class="text-xl font-semibold ">
                    <img  src="img/complogo.png" class="inline-block h-12 w-12 mb-3" > <a href="home.php" class="  uppercase text-gray-400 text-xl lg:text-3xl font-bold hover:text-blue-100 hover:text-opacity-50 md:text-2xl">EPS </a>
                    </div>

                    <!-- Mobile menu button -->
                    <div class="flex md:hidden">
                        <button type="button" class="hamburger duration-1000 transition-transform text-gray-500 hover:text-gray-600 focus:outline-none focus:text-gray-600" aria-label="toggle menu" data-target>
                            <svg viewBox="0 0 24 24" class="h-6 w-6 fill-current">
                                <path fill-rule="evenodd" d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
                <div class="category hidden -mx-4 md:flex md:items-center duration-1000 transition-shadow ">
                    <a href="modules/clientadd.php" class="block  mx-4 mt-2 md:mt-0 text-lg text-gray-300 text-[50px] uppercase font-bold hover:text-blue-100 hover:text-opacity-50">Clients</a>
                    <a href="modules/payroll.php" class="block mx-4 mt-2 md:mt-0 text-lg text-gray-300 text-[50px] uppercase font-bold hover:text-blue-100 hover:text-opacity-50">Payroll</a>
                </div>
            </div>
        </div>
    </nav>


    <div class="w-full bg-fixed bg-cover bg-center " style="height:50rem; background-image: url(img/emp.jpg);">
        <div class="flex items-center justify-center h-full w-full bg-gray-900 bg-opacity-50 ">
            <div class="text-center">
                <h1 class="text-gray-300 text-4xl font-semibold uppercase md:text-6xl lg:text-7xl">EMPLOYEE PAYROLL SYSTEM <span class="underline text-blue-300">EPS</span></h1>
                <button class="mt-4 px-4 py-2 bg-blue-600 text-white text-sm uppercase font-medium rounded hover:bg-blue-500 focus:outline-none focus:bg-blue-500">Start tour</button>
            </div>
        </div>
    </div>

  </header>


  <section>

  </section>

</body>
<script src="js/client.js"></script>

</html>