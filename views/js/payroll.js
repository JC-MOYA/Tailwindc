// if (!$.fn.DataTable.isDataTable('.payrollTable')) {
//     var pl = $('.payrollTable').DataTable({
//       "ajax": "ajax/payroll_list.ajax.php", 
//       "deferRender": true,
//       "retrieve": true,
//       "processing": true,
//       "keys": true,
//       "language": {
//             'loadingRecords': 'Loading Payroll Records...',
//             'zeroRecords': 'No records to display',
//             "info": "Showing page _PAGE_ of _PAGES_"
//       }  
//     });
// }

if (!$.fn.DataTable.isDataTable('.payrollTable')) { 
  var events = $('#events');
  var pl = $('.payrollTable').DataTable({
      deferRender: true,
      processing: true,
      autoWidth: true,
      scrollY: '50vh',
      pagelength: 25,
      keys: true,
      lengthMenu: [[25, 50, -1], [25, 50, "All"]],
      dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
              language: {
                  loadingRecords: 'Loading products...',
                  search: '<span>[ F2 ] SEARCH:</span> _INPUT_',
                  searchPlaceholder: 'Type to filter...',
                  lengthMenu: '<span>Show:</span> _MENU_',
                  paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;' }
              }
  });
}  

$(function() {
   // down arrow on filter input control  
   $('div.dataTables_filter input').on('keyup keypress',function (event) {
        if (event.keyCode === 40) {
            alert("leave filter");
            $(this).blur();                  // leave focus on filter control
            pl.cell(':eq(0)', 0).focus();    // focus on first cell, 1 - 1st column
                                             // focus not all filtered table                               
        }
   });

   initialize();

   $('#client-form input[id^="num"]').on("keypress", function (e) {
      return _helper.isNumeric(e) ? true : e.preventDefault();
   });

   $('#client-form input[id^="tns"]').on("keypress", function (e) {
      return _helper.allChars(e) ? true : e.preventDefault();
   });    

   $("#btn-new").click(function(){
   	  $("#tns-empame").focus();
      swal.fire({
          title: 'Do you want create new payroll details?',
          type: 'question',
          showCancelButton: true,
          confirmButtonText: 'Yes',
          cancelButtonText: 'Cancel!',
          confirmButtonClass: 'btn btn-outline-success',
          cancelButtonClass: 'btn btn-outline-danger',
          allowOutsideClick: false,
          buttonsStyling: false
      }).then(function(result) {
          if(result.value) {
          	initialize();
          }
     });
   });

   $('#num-rateperday,#num-numdayswork,#num-cola,#num-overtimehrs,#num-tax,#num-philhealth,#num-sss,#num-cshadvance').on("change keyup", function(){
      let rateperday = toNumeric($('#num-rateperday').val());
      let numdayswork = toNumeric($('#num-numdayswork').val());
      let cola = toNumeric($('#num-cola').val());
      let overtimehrs = toNumeric($('#num-overtimehrs').val());
      let tax = toNumeric($('#num-tax').val());
      let sss = toNumeric($('#num-sss').val());
      let cshadvance = toNumeric($('#num-cshadvance').val());

      let gross = rateperday * numdayswork + cola + (overtimehrs * (rateperday / 8 * 1.30));
      let philhealth = (gross * 0.04) / 2;
      let totalded = tax + philhealth + sss + cshadvance;
      let netsalary = gross - totalded;

      $('#num-gross').val(formatNumber(gross.toFixed(2)));
      $('#num-philhealth').val(formatNumber(philhealth.toFixed(2)));
      $('#num-totalded').val(formatNumber(totalded.toFixed(2)));
      $('#num-netsalary').val(formatNumber(netsalary.toFixed(2)));
   });

   // SAVE PAYROLL
   $("#payroll-form").submit(function (e) {
      e.preventDefault();
      alert("save");
      if ($('#trans_type').val() == 'New'){
          var title = "DO YOU WANT TO SAVE NEW PAYROLL?";
          var text = "";
      }else{
          var title = "Do you want to update payroll details?";
          var text = "";
      }

      swal.fire({
          title: title,
          text: text,
          type: 'question',
          showCancelButton: true,
          confirmButtonText: 'Yes, Save it!',
          cancelButtonText: 'Cancel!',
          confirmButtonClass: 'btn btn-outline-success',
          cancelButtonClass: 'btn btn-outline-danger',
          allowOutsideClick: false,
          buttonsStyling: false
      }).then(function(result) {
          if(result.value) {
            var trans_type = $("#trans_type").val();
            var empid = $('#tns-empid').val();
            var empname = $('#tns-empname').val();
            var emptype = $('#txt-emptype').val();
            var rateperday = toNumeric($('#num-rateperday').val());
            var numdayswork = toNumeric($('#num-numdayswork').val());
            var cola = toNumeric($('#num-cola').val());
            var overtimehrs = toNumeric($('#num-overtimehrs').val());
            var gross = toNumeric($('#num-gross').val());
            var tax = toNumeric($('#num-tax').val());
            var philhealth = toNumeric($('#num-philhealth').val());
            var sss = toNumeric($('#num-sss').val());
            var cshadvance = toNumeric($('#num-cshadvance').val()); 
            var totalded = toNumeric($('#num-totalded').val());  
            var netsalary = toNumeric($('#num-netsalary').val());       
                        
            var payroll = new FormData();
            payroll.append("trans_type", trans_type);
            payroll.append("empid", empid);
            payroll.append("empname", empname);
            payroll.append("emptype", emptype);
            payroll.append("rateperday", rateperday);
            payroll.append("numdayswork", numdayswork);
            payroll.append("cola", cola);
            payroll.append("overtimehrs", overtimehrs);
            payroll.append("gross", gross);
            payroll.append("tax", tax);
            payroll.append("philhealth", philhealth);
            payroll.append("sss", sss);
            payroll.append("cshadvance", cshadvance);
            payroll.append("totalded", totalded);
            payroll.append("netsalary", netsalary);

            $.ajax({
               url:"../../ajax/payroll_save_record.ajax.php",
               method: "POST",
               data: payroll,
               cache: false,
               contentType: false,
               processData: false,
               dataType:"text",
               success:function(answer){
               },
               error: function () {
                  alert("Oops. Something went wrong!");
               },
               complete: function () {
                 swal.fire({
                    title: 'Payroll details successfully saved!',
                    type: 'success',
                    confirmButtonText: 'Got it!',
                    confirmButtonClass: 'btn btn-outline-success',
                    allowOutsideClick: false,
                    buttonsStyling: false
                 }).then(function(result){
                    if(result.value) {              
                      initialize();
                    }
                 })
               }
            })
          }
      });
   });

   pl.on('key', function (e, datatable, key, cell, originalEvent) {
      if (key == 13){
        var empid = $(this).find('td').first().text();
      }
   });

   $('div.dataTables_filter input').on('key-focus', function (e, datatable, cell) {
      alert("mom");
     // $(pl.row(cell.index().row).node()).addClass('row_selected');   
   });

   pl.on('key-blur', function (e, datatable, cell) {
     alert("mom");
     // $(pl.row(cell.index().row).node()).removeClass('row_selected');  
   });

   $('.payrollTable tbody').on('dblclick', 'tr', function () {
      // var empid = $('.payrollTable').DataTable().row(this).data()[0];
      // var empid = $('.payrollTable').DataTable().cell(this, 0).data();
      var empid = $(this).find('td').first().text();

      // var table = $('.payrollTable').DataTable();
      // var index = table.row(this).index();
      // var empid = table.cell(index,0).data();

      // var empid = $('.payrollTable').DataTable().cell($('.payrollTable').DataTable().row(this).index(), 0).data();



      // var empid = $(this).attr("empid"); XXX
      // var empid = $('.payrollTable').DataTable().cell().data(); XXX
      var data = new FormData();
      data.append("empid", empid);
      $.ajax({
         url:"../../ajax/payroll_get_record.ajax.php",
         method: "POST",
         data: data,
         cache: false,
         contentType: false,
         processData: false,
         dataType:"json",
         success:function(answer){
          $("#tns-empid").val(answer["empid"]);
          $("#tns-empname").val(answer["empname"]);
          $("#txt-emptype").val(answer["emptype"]).trigger('change');
          $("#num-rateperday").val(numberWithCommas(answer["rateperday"]));
          $("#num-numdayswork").val(numberWithCommas(answer["numdayswork"]));
          $("#num-cola").val(numberWithCommas(answer["cola"]));
          $("#num-overtimehrs").val(numberWithCommas(answer["overtimehrs"]));
          $("#num-gross").val(numberWithCommas(answer["gross"]));
          $("#num-tax").val(numberWithCommas(answer["tax"]));
          $("#num-philhealth").val(numberWithCommas(answer["philhealth"]));
          $("#num-sss").val(numberWithCommas(answer["sss"]));
          $("#num-cshadvance").val(numberWithCommas(answer["cshadvance"]));
          $("#num-totalded").val(numberWithCommas(answer["totalded"]));
          $("#num-netsalary").val(numberWithCommas(answer["netsalary"]));

          $("#trans_type").val("Update");
          $("#modal-search-payroll").modal('hide');
        }
      })
   }); 

   $('#mdl-emptype').on("change", function(){
      load_records();
   });      

   function initialize(){
     $("#tns-empname").val('');
     $("#tns-empid").val('');
     $("#txt-emptype").val('');
     $("#num-rateperday").val('0.00');
     $("#num-numdayswork").val('0.00');
     $("#num-cola").val('0.00');
     $("#num-overtimehrs").val('0.00');
     $("#num-gross").val('0.00');
     $("#num-tax").val('0.00');
     $("#num-philhealth").val('0.00');
     $("#num-sss").val('0.00');
     $("#num-cshadvance").val('0.00');
     $("#num-totalded").val('0.00');
     $("#num-netsalary").val('0.00');

     $("#trans_type").val('New');
     $("#tns-empname").focus();

     // $(".payrollTable").DataTable().clear();
     // pl.draw();
     load_records();
   } 	

   function load_records(){
      $(".payrollTable").DataTable().clear();
      pl.draw();
      
      var emptype = $('#mdl-emptype').val();
      let payroll_list = new FormData();
      payroll_list.append("emptype", emptype);
      $.ajax({
         url:"../../ajax/payroll_records.ajax.php",
         method: "POST",
         data: payroll_list,
         cache: false,
         contentType: false,
         processData: false,
         dataType:"json",
         success:function(answer){
            for(var i = 0; i < answer.length; i++) {
                let payroll = answer[i];
                let empid = payroll.empid;
                let empname = payroll.empname;
                let emptype = payroll.emptype;

                pl.row.add([empid, empname, emptype]); 
            }
            pl.draw();
         }
      })    
   }   
});    