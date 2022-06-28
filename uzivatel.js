$(document).on('submit','#formular',function(e){
        e.preventDefault();

        $.ajax({
        method:"POST",
        url: "uzivatel_data.php",
        data:$(this).serialize(),
        success: function(data){

          var parsed_data = JSON.parse(data);
          $status = parsed_data.status;
          $message = parsed_data.message;

        $('#msg').html($message).delay(20000).slideUp();
        if($status == 'OK'){
        $(location).prop('href', 'uzivatel_report.html');
      }
    }});
});
$('#vratit').click(function(){
    $(location).prop('href', 'uzivatel_report.html');
});
function reg_btn_vytvorit(){
$('#vytvorit').click(function(){
    $(location).prop('href', 'uzivatel_form.php');
});};
function NactiData(){
  $.ajax({
                  url: "uzivatel_vypis.php",
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
      { "data": "Email" },
      { "data": "Heslo" },
      { "data": "Tel" },
      { "data": "Adresa" },
      { "data": "typuzi" },
      { "data": "rodicTel" },
      { "data": "rodicEma" },
      { "data": "DeleteLink"},
      { "data": "EditLink"}
  ]
} );
}
})
};

function mazani(cislo){
$.ajax({
  url:'delete.php',
  method: 'POST',
  data: {sid: cislo},
  success: function(data){
    $('#msg').html();
    if (data == "YES" ){
      $('#msg').html("<p>Post deleted successfully!</p>");
      p = cislo;
      selektor = "input[name='but"+p+"']";
      $(selektor).parent().parent().remove();

    }else{
      $('#msg').html(data);
    }
  }
})
};
