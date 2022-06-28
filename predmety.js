$(document).on('submit','#formular',function(e){
        e.preventDefault();

        $.ajax({
        method:"POST",
        url: "predmety_data.php",
        data:$(this).serialize(),
        success: function(data){

          var parsed_data = JSON.parse(data);
          $status = parsed_data.status;
          $message = parsed_data.message;

        $('#msg').html($message).delay(20000).slideUp();
        if($status == 'OK'){
        $(location).prop('href', 'predmety_report.html');
      }
    }});
});
$('#vratit').click(function(){
    $(location).prop('href', 'predmety_report.html');
});
function reg_btn_vytvorit_pred(){
$('#vytvorit').click(function(){
    $(location).prop('href', 'predmety_form.php');
});};
function NactiData_pred(){
  $.ajax({
                  url: "predmety_vypis.php",
                  method: "POST",
                  data: { type: 'usertable' },
                  dataType: "json",
                  success: function (data) {
                      console.log(data);

  $('#example').DataTable( {
  data: data,
  columns: [
      { "data": "predmet" },
      { "data": "popis" },
      { "data": "DeleteLink"},
      { "data": "EditLink"}
  ]
} );
}
})
};

function mazani_pred(cislo){
$.ajax({
  url:'predmety_data.php',
  method: 'POST',
  data: {sid: cislo,
  action : 'delete'},
  success: function(data){
    $('#msg').html();
    if (data == "YES" ){
      $('#msg').html("<p>Post deleted successfully!</p>");
      p = cislo;
      selektor = "input[name='pred_but"+p+"']";
      $(selektor).parent().parent().remove();

    }else{
      $('#msg').html(data);
    }
  }
})
};
