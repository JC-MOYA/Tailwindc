<?php 
require_once "../../controller/clients.controller.php";
require_once "../../model/clients.model.php";
require_once "../../model/connection.php";

  $idClient = $_GET['idClient'];

  $client = (new Connection)->connect()->query("SELECT * FROM clients WHERE id = $idClient")->fetch(PDO::FETCH_ASSOC);

  $clientid = $client['clientid'];
  $isactive = $client['isactive'];
  $cname = $client['cname']; 
  $email = $client['email'];
  $phone = $client['phone'];
  $address = $client['address'];
  $website = $client['website'];
  $cperson = $client['cperson'];
  $mobile = $client['mobile'];
?>  

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


</head>
<body>



<header>
  <nav class="bg-teal-900 opacity-50  border-b-2 border-gray-700 border-opacity-50 drop-shadow-5xl ">
        <div class="container mx-auto px-6 py-3 ">
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


  
  <div class="bg-no-repeat bg-cover bg-fixed "style="height:50rem; background-image: url(../img/forms.jpg);"> 
  <div class="grid grid-cols justify-center items-center bg-gray-900 bg-opacity-50 h-full w-full ">  
    <div class="  bg-gray-200  w-50% rounded-lg  ">
  <div class="p-8 rounded-lg border border-gray-400 ">
  <h1 class="font-bold text-3xl text-gray-700">CLIENT UPDATE</h1>

  <form  role="form" id="client-form" method="POST" autocomplete="nope">
    <div class="mt-8 grid grid-cols-1 lg:grid-cols-4  gap-4">
      <div class="col-span-1 lg:col-span-4">
        <input type="hidden" id="idClient" name="idClient" value="<?php echo $idClient;?>">
        <label for="input-1" class="text-sm text-gray-700 block mb-1 font-medium">Client's Name</label>
        <input type="text"  class="bg-gray-100 border border-gray-400 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full"id="tns-cname" placeholder="Enter Client Name" name="tns-cname" autocomplete="nope" value="<?php echo $cname;?>" required />
      </div>

      <div class=" col-span-1 lg:col-span-1">
        <label>&nbsp;</label>
        <div class="icheck-material-success">
          <input type="checkbox" id="num-isactive" name="num-isactive" value="1" <?php if ($isactive == "1") echo 'checked'; ?> />
          <label for="num-isactive">Active</label>
        </div>
      </div>

      <div class="col-span-1 lg:col-end-7">
        <label for="input-2" class="text-sm text-gray-700 block mb-1 font-medium">Client ID</label>
        <input type="text" class="bg-gray-100 border border-gray-400 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full" id="tns-clientid" name="tns-clientid" value="<?php echo $clientid;?>" readonly  />
      </div>

      <div class="col-span-1 lg:col-start-1 lg:col-end-7">
        <label for="input-3" class="text-sm text-gray-700 block mb-1 font-medium">Address</label>
        <input type="text"  class="bg-gray-100 border border-gray-400 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full" id="tns-address" placeholder="Enter Address" name="tns-address" autocomplete="nope" value="<?php echo $address;?>"/>
      </div>

 
        <div class="col-span-1 lg:col-span-3">
          <label for="input-4" class="text-sm text-gray-700 block mb-1 font-medium">Landline</label>
          <input type="text" class="bg-gray-100 border border-gray-400 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full" id="num-phone" placeholder="Enter Landline #" name="num-phone" autocomplete="nope" value="<?php echo $phone;?>" />
        </div>

        <div class="col-span-1 lg:col-span-3">
          <label for="input-5" class="text-sm text-gray-700 block mb-1 font-medium">Mobile #</label>
          <input type="text" class="bg-gray-100 border border-gray-400 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full" id="num-mobile" placeholder="Enter Mobile #" name="num-mobile" autocomplete="nope"  value="<?php echo $mobile;?>" />
        </div>
     

        
        <div class="col-span-1 lg:col-span-3">
          <label for="input-4" class="text-sm text-gray-700 block mb-1 font-medium">E-Mail</label>
          <input type="text" class="bg-gray-100 border border-gray-400 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full" id="tns-email" placeholder="Enter E-mail Address" name="tns-email" autocomplete="nope" value="<?php echo $email;?>"/>
        </div>
        <div class="col-span-1 lg:col-span-2">
          <label for="input-5" class="text-sm text-gray-700 block mb-1 font-medium">Website</label>
          <input type="text" class="bg-gray-100 border border-gray-400 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full" id="tns-website"  placeholder="Enter Website URL" name="tns-website" autocomplete="nope" value="<?php echo $website;?>"/>
        </div>
        <div class="col-span-1 lg:col-end-7">
          <label for="input-5" class="text-sm text-gray-700 block mb-1 font-medium">Contact Person</label>
          <input type="text" class="bg-gray-100 border border-gray-400 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full" id="tns-cperson" placeholder="Enter Contact Person" name="tns-cperson" autocomplete="nope" value="<?php echo $cperson;?>" />
        </div>
    </div>

    <div class="space-x-4 mt-8  justify-center flex">
      <button type="submit" class="py-2 px-4 bg-purple-500 text-white rounded hover:bg-teal-600 active:bg-blue-700 disabled:opacity-50"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mb-1 inline-block item-center">
      <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 3.75V16.5L12 14.25 7.5 16.5V3.75m9 0H18A2.25 2.25 0 0120.25 6v12A2.25 2.25 0 0118 20.25H6A2.25 2.25 0 013.75 18V6A2.25 2.25 0 016 3.75h1.5m9 0h-9" />
      </svg>
      &nbsp;&nbsp;Update</button>

      <button type="button" class="py-2 px-4 bg-teal-500 text-white rounded hover:bg-purple-600 active:bg-blue-700 disabled:opacity-50" onClick="location.href='clients.php'">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mb-1 inline-block item-center">
      <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 6.75h12M8.25 12h12m-12 5.25h12M3.75 6.75h.007v.008H3.75V6.75zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zM3.75 12h.007v.008H3.75V12zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm-.375 5.25h.007v.008H3.75v-.008zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
      </svg>
      &nbsp;&nbsp;Listing</button>

      <!-- Secondary -->
        </div>
      </form>
  </div>
    </div>
  </div>
            <?php
              $editClient = new ControllerClients();
              $editClient -> ctrEditClient();
            ?>
        
        </div><!--End Row-->


  <script src="../js/payroll.js"></script>
  <script src="../helpers/helper.js"></script>
  <script src="../js/client.js"></script>


</body>
</html>


