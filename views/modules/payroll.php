<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CLIENT INFORMATION</title>
  <link rel="stylesheet" type="text/css" href="../styles.css">
  <link rel="icon" type="image/png" href="../img/complogo.png" class="rounded-full">
  <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
  <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
  <!--Regular Datatables CSS-->
	<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
	<!--Responsive Extension Datatables CSS-->
	<link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
  <script href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

  <script href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

  <link rel="stylesheet" href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" />
  <script defer src="https://unpkg.com/alpinejs@3.9.1/dist/cdn.min.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>


</head>
<body> 

<?php
require_once "../../controller/payroll.controller.php";
require_once "../../model/payroll.model.php";

?>
 <header>
  <nav class="bg-purple-900 opacity-50 border-b-2 border-gray-700 border-opacity-50 drop-shadow-5xl ">
        <div class="container mx-auto px-6 py-3  ">
            <div class="md:flex md:items-center md:justify-between">
                <div class="flex justify-between items-center">
                <div class="text-xl font-semibold ">
                    <img  src="../img/complogo.png" class="inline-block h-12 w-12 mb-3" > <a href="../home.php" class="  uppercase text-gray-400 text-xl lg:text-3xl font-bold hover:text-blue-100 hover:text-opacity-50 md:text-2xl">EPS </a>
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
                    <a href="clientadd.php" class="block  mx-4 mt-2 md:mt-0 text-lg text-gray-300 text-[50px] uppercase font-bold hover:text-blue-100 hover:text-opacity-50">Clients</a>
                    <a href="payroll.php" class="block mx-4 mt-2 md:mt-0 text-lg text-gray-300 text-[50px] uppercase font-bold hover:text-blue-100 hover:text-opacity-50">Payroll</a>
                    
                </div>
            </div>
        </div>
    </nav>

  </header>

  <div class="bg-no-repeat bg-cover bg-fixed "style="height:50rem; background-image: url(../img/payroll.jpg);"> 
  <div class=" grid grid-cols justify-center items-center bg-gray-900 bg-opacity-50 h-full w-full ">  
  <div class=" bg-gray-200  w-50% rounded-lg  ">
  <div class="p-8 rounded-lg border border-gray-400 ">
  <h1 class="font-bold text-3xl text-gray-700">PAYROLL SYSTEM</h1>
        <form role="form" id="payroll-form" method="POST" autocomplete="nope">
            <div class="mt-8 grid grid-cols-1 lg:grid-cols-3  gap-4">

                 <input type="text" name="trans_type" id="trans_type" value="New" style="visibility:hidden;" required>
                 <div class="col-span-1 lg:col-start-1">
                    <label for="tns-empid" class="text-sm text-gray-700 block mb-1 font-medium">Emp ID</label>
                    <input type="text"  class="bg-gray-100 border border-gray-400 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full"  id="tns-empid" name="tns-empid" value="" disabled/>
                  </div>


                  <div class="col-span-1 lg:col-span-3">
                    <label for="tns-empname" class="text-sm text-gray-700 block mb-1 font-medium">Employee Name</label>
                    <input type="text"  class="bg-gray-100 border border-gray-400 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full" id="tns-empname" placeholder="Enter Client Name" name="tns-empname" autocomplete="nope" required/>
                  </div>


                  <div class="col-span-1 lg:col-end-7">
                      
                          <label for="txt-emptype"  class=" block mb-2 text-sm font-medium text-gray-900" > Emp Type</label>
                          <select  id="txt-emptype" name="txt-emptype" class=" text-center w-96 rounded-full drop-shadow-md bg-indigo-400 text-lg  duration-300 hover:bg-indigo-600 focus:ring-0 text-white ">
                            <option value="" selected >All</option>
                            <option value="Casual">Casual</option>
                            <option value="Temporary">Temporary</option>
                            <option value="Regular">Regular</option>
                          </select>
                      </div>
              </div>                                      

                <div class="mt-8 grid grid-cols-1 lg:grid-cols-4  gap-4">

                      <div class="col-end-1 lg:col-span-1">
                        <label for="num-rateperday" class="text-sm text-gray-700 block mb-1 font-medium">Rate Per Day</label>
                        <input type="text" class="bg-gray-100 border border-gray-400 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full numeric" id="num-rateperday" name="num-rateperday" value="0.00" autocomplete="nope"/>
                      </div>

                      <div class="col-span-1 lg:col-span-1">
                        <label for="num-numdayswork" class="text-sm text-gray-700 block mb-1 font-medium">No. of Days Worked</label>
                        <input type="text" class="bg-gray-100 border border-gray-400 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full numeric"  id="num-numdayswork" name="num-numdayswork" value="0.00" autocomplete="nope"/>
                      </div>

                      <div class="col-end-1 lg:col-span-1">
                        <label for="num-cola" class="text-sm text-gray-700 block mb-1 font-medium">Cost of Allowance</label>
                        <input type="text" class="bg-gray-100 border border-gray-400 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full numeric"  id="num-cola" name="num-cola" value="0.00" autocomplete="nope"/>
                      </div>

                      <div class="col-span-1 lg:col-span-1">
                        <label for="num-overtimehrs" class="text-sm text-gray-700 block mb-1 font-medium">Overtime Hours</label>
                        <input type="text" class="bg-gray-100 border border-gray-400 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full numeric" id="num-overtimehrs" name="num-overtimehrs" value="0.00" autocomplete="nope"/>
                      </div>
                                                                                                         
                  </div>
                   
                  <div class="mt-8 grid grid-cols-1 lg:grid-cols-1  gap-4">
                      <div class="col-span-1 lg:col-span-1">
                        <label for="num-gross" class="text-sm text-gray-700 block mb-1 font-medium">GROSS SALARY</label>
                        <input type="text" class="bg-gray-100 border border-gray-400 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full numeric" id="num-gross" name="num-gross" value="0.00" readonly/>
                      </div> 
                  </div>



                  <div class="mt-8 grid grid-cols-1 lg:grid-cols-4  gap-4">

                      <div class="col-end-1 lg:col-span-1">
                        <label for="num-tax" class="text-sm text-gray-700 block mb-1 font-medium">Tax</label>
                        <input type="text" class="bg-gray-100 border border-gray-400 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full numeric" id="num-tax" name="num-tax" value="0.00" autocomplete="nope"/>
                      </div>

                      <div class="col-span-1 lg:col-span-1">
                        <label for="num-philhealth" class="text-sm text-gray-700 block mb-1 font-medium">PhilHealth</label>
                        <input type="text" class="bg-gray-100 border border-gray-400 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full numeric"  id="num-philhealth" name="num-philhealth" value="0.00" readonly/>
                      </div>

                      <div class="col-end-1 lg:col-span-1">
                        <label for="num-sss" class="text-sm text-gray-700 block mb-1 font-medium">SSS</label>
                        <input type="text" class="bg-gray-100 border border-gray-400 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full numeric"  id="num-sss" name="num-sss" value="0.00" autocomplete="nope"/>
                      </div>

                      <div class="col-span-1 lg:col-span-1">
                        <label for="num-cshadvance" class="text-sm text-gray-700 block mb-1 font-medium">Cash Advance</label>
                        <input type="text" class="bg-gray-100 border border-gray-400 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full numeric" id="num-cshadvance" name="num-cshadvance" value="0.00" autocomplete="nope"/>
                      </div>
                                                                                                         
                  </div>
                  <div class="mt-8 grid grid-cols-1 lg:grid-cols-2  gap-4">
                    <div class="col-span-1 lg:col-span-1">
                      <label for="num-sss" class="text-sm text-gray-700 block mb-1 font-medium">TOTAL DEDUCTION</label>
                          <input type="text" class="bg-gray-100 border border-gray-400 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full numeric" id="num-totalded" name="num-totalded" value="0.00" readonly>
                      </div>

                      <div class="col-span-1 lg:col-span-1">
                      <label for="num-sss" class="text-sm text-gray-700 block mb-1 font-medium">NET SALARY</label>
                          <input type="text" class="bg-gray-100 border border-gray-400 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full numeric" id="num-netsalary" name="num-netsalary" value="0.00" readonly>
                      </div>  
                  </div>
            

              <div class="space-x-4 mt-8 justify-center flex">
                  <button type="button" class="py-2 px-4 bg-purple-500 text-white rounded hover:bg-indigo-600 active:bg-purple-700 disabled:opacity-50" id="btn-new"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mb-1 inline-block item-center">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m6.75 12H9m1.5-12H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                  </svg>
                  &nbsp;&nbsp;New</button>

                  <button type="submit" class="py-2 px-4 bg-teal-500 text-white rounded hover:bg-purple-600 active:bg-blue-700 disabled:opacity-50"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mb-1 inline-block item-center">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 3.75V16.5L12 14.25 7.5 16.5V3.75m9 0H18A2.25 2.25 0 0120.25 6v12A2.25 2.25 0 0118 20.25H6A2.25 2.25 0 013.75 18V6A2.25 2.25 0 016 3.75h1.5m9 0h-9" />
                  </svg>
                  &nbsp;&nbsp;Save</button>

                  <button type="button" class="py-2 px-4 bg-indigo-500 text-white rounded hover:bg-teal-600 active:bg-blue-700 disabled:opacity-50" id="btn-search" data-toggle="modal" data-target="#modal-search-payroll" onClick="location.href='payrollbrowse.php'">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mb-1 inline-block item-center">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 6.75h12M8.25 12h12m-12 5.25h12M3.75 6.75h.007v.008H3.75V6.75zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zM3.75 12h.007v.008H3.75V12zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm-.375 5.25h.007v.008H3.75v-.008zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                  </svg>
                  &nbsp;&nbsp;Search</button>
              </div>
            </div>  
          </div>    <!-- card -->
        </form>
      </div>
  
    </div><!--End Row-->
 

  <script src="../js/payroll.js"></script>
  <script src="../helpers/helper.js"></script>
  <script src="../js/client.js"></script>


</body>


</html>


