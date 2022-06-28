$(document).on('submit','#formular',function(e){
        e.preventDefault();

        $.ajax({
        method:"POST",
        url: "douc_pred_data.php",
        data:$(this).serialize(),
        success: function(data){
  
          var parsed_data = JSON.parse(data);
          $status = parsed_data.status;
          $message = parsed_data.message;

        $('#msg').html($message).delay(20000).slideUp();
        if($status == 'OK'){
        $(location).prop('href', 'douc_pred_report.html');
      }
    }});
});
$('#vratit').click(function(){
    $(location).prop('href', 'douc_pred_report.html');
});
function reg_btn_vytvorit_douc_pred(){
$('#vytvorit').click(function(){
    $(location).prop('href', 'douc_pred_form.php');
});};
function NactiData_douc_pred(){
  console.log("ahoj");
  $.ajax({
                  url: "douc_pred_vypis.php",
                  method: "POST",
                  data: { type: 'usertable' },
                  dataType: "json",
                  success: function (data) {
                      console.log(data);

  $('#example').DataTable( {
  data: data,
  columns: [
      { "data": "Jmeno" },
      { "data": "Prijmeni" },
      { "data": "Nazev" },
      { "data": "DeleteLink"},
      { "data": "EditLink"}
  ]
} );
}
})
};

function mazani_douc_pred(cislo,doucuj){
$.ajax({
  url:'douc_pred_data.php',
  method: 'POST',
  data: {sid: cislo,
    pid: doucuj,
  action : 'delete'},
  success: function(data){
    $('#msg').html();
    if (data == "YES" ){
      $('#msg').html("<p>Post deleted successfully!</p>");
      p = cislo;
      selektor = "input[name='douc_pred_but"+p+""+doucuj+"']";
      $(selektor).parent().parent().remove();

    }else{
      $('#msg').html(data);
    }
  }
})
};
