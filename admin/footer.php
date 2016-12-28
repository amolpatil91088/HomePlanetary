      </div>
      <footer class="main-footer">        
        <strong>Copyright &copy; 2016 <a href="Home/">Sungare Technologies Pvt. Ltd.</a></strong> All rights reserved.
      </footer>
      <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
      <script src="bootstrap/js/bootstrap.min.js"></script>
      <script src="dist/js/app.min.js"></script>
      <script src="plugins/datatables/jquery.dataTables.min.js"></script>
      <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
      <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
      <script type="text/javascript" src="js/on-off-switch.js"></script>
      <script type="text/javascript" src="js/on-off-switch-onload.js"></script>
      <link rel="stylesheet" type="text/css" href="css/on-off-switch.css"/>
      <script type="text/javascript" src="js/dropzone.js"></script>
      <script type="text/javascript">
          function getVal(type)
          {
              var employed = $("#employed").val();
              var city = $("#city").val();
              var sdate = $("#sdate").val();
              var edate = $("#edate").val();
               url = 'getval.php?table='+type;
              $("#show").empty();
              $.ajax({
                  url : url,
                  type: 'POST',
                  data : {employed: employed,city: city,sdate : sdate,edate:edate},
                  cache:true,
                  success: function(html){
                      $("#show").append(html);
                  }
              });
          }
          function deleteConfirm(){
              var result = confirm("Are you sure to delete users?");
              if(result){
                  return true;
              }else{
                  return false;
              }
          }
          $(document).ready(function(){
              $("#orderformdata").hide();
              $("#checkAll").change(function () {
                  $("input:checkbox").prop('checked', $(this).prop("checked"));
              });
              $(".moredetails").click(function(){
                  $("#orderdata").hide();
                  $("#orderformdata").show();
              });
              $('#select_all').on('click',function(){
                  if(this.checked){
                      $('.checkbox').each(function(){
                          this.checked = true;
                      });
                  }else{
                      $('.checkbox').each(function(){
                          this.checked = false;
                      });
                  }
              });
              $('.checkbox').on('click',function(){
                  if($('.checkbox:checked').length == $('.checkbox').length){
                      $('#select_all').prop('checked',true);
                  }else{
                      $('#select_all').prop('checked',false);
                  }
              });
          });
      </script>
      </body>
</html>