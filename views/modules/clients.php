
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
  <script src="https://cdn.tailwindcss.com"></script>

  
	<!--Regular Datatables CSS-->
	<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
	<!--Responsive Extension Datatables CSS-->
	<link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">


</head>
<body>


<?php
require_once "../../controller/clients.controller.php";
require_once "../../model/clients.model.php";
require_once "../../model/connection.php";

?>


<header class="bg-no-repeat bg-cover bg-fixed bg-gray-200 "style="height:80rem; background-image: url(../img/list.png);">
<div class="justify-center items-center bg-gray-900 bg-opacity-50 h-full w-full ">  

  <div class="container mx-auto">
            <div class="flex flex-col pt-20">
                <div class="w-full ">
                    <div class="p-8 border bg-gray-200 border-gray-300 rounded-2xl shadow">
                    <div class="p-8 border shadow-lg rounded-lg border-gray-400 overflow-y-scroll h-50% ">
                    <div class="section-title">
                      <h1 class=" relative font-extrabold text-6xl text-center  text-blue-800 italic "> CLIENT LIST </h1>
                    </div>
                    <button type="button" class="bg-blue-800 hover:bg-yellow-400 text-white font-bold py-2 px-4 mb-8 rounded-full " onClick="location.href='clientadd.php'"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 inline-block">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
                    </svg>
                    <span>&nbsp;ADD CLIENT</span> </button>


                        <table class="w-30 divide-y divide-gray-900 border-2 rounded-lg clientlist"  id="default-datatable">
                            <thead class="bg-gray-800 ">
                                <tr>
                                    <th class="w-2 md:w-80 text-3 md:text-[15px] text-white">
                                    Client
                                    </th>
                                    <th class="w-2 md:w-80 py-2 text-3 md:text-[15px] text-white">
                                    Email
                                    </th>
                                    <th class="w-2 md:w-80 py-2 text-3 md:text-[15px] text-white">
                                    Phone
                                    </th>
                                    <th class="w-2 md:w-80 py-2 text-3 md:text-[15px] text-white">
                                    Mobile
                                    </th>
                                    <th class="w-2 md:w-80 py-2 text-3 md:text-[15px] text-white">
                                    Contact Person
                                    </th>
                                    <th class="w-2 md:w-80 py-2 text-3 md:text-[15px] text-white">
                                    Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                              $clients = (new ControllerClients)->ctrShowClients();
                              foreach ($clients as $key => $value) {
                                echo '<tr class=" text-center border-indigo-300 rounded-b-lg gap-4">
                                        <td class="border-2 ">'.$value["cname"].'</td>
                                        <td class="border-2 ">'.$value["email"].'</td>
                                        <td class="border-2 ">'.$value["phone"].'</td>  
                                        <td class="border-2 ">'.$value["mobile"].'</td>
                                        <td class="border-2 ">'.$value["cperson"].'</td>            
                                        <td class="border-2 ">
                                          <div class="btn-group  gap-4 group-round m-1 rounded-lg">
                                            <button class="btn btn-sm btn-light  waves-effect waves-light btnEditClient" idClient="'.$value["id"].'"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-gray-900">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                            </svg>
                                            </button>
                                          </div>  
                                        </td>
                                      </tr>';
                                }
                            ?>
                          </tbody>

                        </table>
                    </div>
                </div>
              </div>
          </div>
    </div>
  </div>

</header>
  
  <!-- jQuery -->
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

  <!--Datatables -->
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

    <script>
            $(document).ready(function () {
                $('#default-datatable').DataTable();
                
            });

            $(".clientlist").on("click", "tbody .btnEditClient", function(){
              var idClient = $(this).attr("idClient");
              location.href = "clientedit.php?idClient="+idClient;
            }); 
        </script>


  <script src="../js/payroll.js"></script>
  <script src="../helpers/helper.js"></script>
  <script src="../js/client.js"></script>


</body>
</html>





