<!-- Content Wrapper. Contains page content -->
 
  <!-- /.content-wrapper -->

  <footer class="main-footer">
   
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark"></aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $(document).on('change','.province',function(){
      console.log("hmm its change");
      var province_id=$(this).val();
      console.log(province_id);
      var div=$(this).parent();
      console.log(div);
      var op=" ";
      $.ajax({
        type:'get',
        url:'{!!URL::to('findDistrictName')!!}',
        data:{'province_id':province_id},
        success:function(data){
        op+='<option value="0" selected>=== Select district ===</option>';
        for(var i=0;i<data.length;i++)
        {
        op+='<option value="'+data[i].district_id+'">'+data[i].district_name+'</option>';
        }
        div.find('.district').html(" ");
        div.find('.district').append(op);
        },
        error:function(){
        }
      });
    });
    $(document).on('change','.district',function(){
      var district_id=$(this).val();
      var div=$(this).parent();
      var op=" ";
      $.ajax({
        type:'get',
        url:'{!!URL::to('findLocalLevelName')!!}',
        data:{'district_id':district_id},
        success:function(data){
        console.log(data);
        console.log(data.length);
        op+='<option value="0" selected >=== Select VDC/MUN ===</option>';
        for(var i=0;i<data.length;i++){
        op+='<option value="'+data[i].locallevel_id+'">'+data[i].locallevel_name+'</option>';
        }
        div.find('.localLevel').html(" ");
        div.find('.localLevel').append(op);
        },
        error:function(){
        }
      });
    });
   $(document).on('change','.province',function(){
      var province_id=$(this).val();
      var div=$(this).parent();
      var op=" ";
      $.ajax({
        type:'get',
        url:'{!!URL::to('findLocalLevelNameprov')!!}',
        data:{'province_id':province_id},
        success:function(data){
        console.log(data);
        console.log(data.length);
        op+='<option value="0" selected >=== Select VDC/MUN ===</option>';
        for(var i=0;i<data.length;i++){
        op+='<option value="'+data[i].locallevel_id+'">'+data[i].locallevel_name+'</option>';
        }
        div.find('.localLevel').html(" ");
        div.find('.localLevel').append(op);
        },
        error:function()
        {
        }
      });
     }); 
  });     
</script>
<script type="text/javascript">
   $(document).ready(function() {    
    $('input[type=text]').on('keyup', function(event) {    
    this.value = this.value.split(' ').map(eachWord=>
    eachWord.charAt(0).toUpperCase() + eachWord.slice(1)
    ).join(' ');
    });
  });
</script>

<script>
$("#setsearchdate").click(function(e){
var j = document.getElementById("num").value;
if(j>0){
a = new Date();
console.log(j);
//console.log('To Date is: ' +document.getElementById("dateD").value.toLocaleString());
var k = a.toLocaleString();//to stringvalue
console.log(k)
var temp = new Date(k);
var f=temp.setDate(temp.getDate()-j);//todatestring- number entered
console.log(f);
var g = new Date(f);//string to date
var h = g.toDateString();//string to date
console.log(h);
var i = new Date(h);
console.log('0'+(i.getMonth() + 1) + '/0' + i.getDate() + '/' +  i.getFullYear());// format 
// console.log(i.getFullYear()+'-'+ i.getMonth() < 10 ? '0' +i.getMonth() : '' + i.getMonth() +i.getDate() < 10 ? '0' +i.getDate() : '' + i.getDate());
var dataI = new Date(i);
document.getElementById("dateD").value =(i.getFullYear()+'/'+ (i.getMonth() < 10 ? '0' +(i.getMonth()+1) : '' + (i.getMonth()+1))+'/' +(i.getDate() < 10 ? '0' +i.getDate() : '' + i.getDate())); //store in value of input type
}
})
</script>
<script type="text/javascript">
  $(document).ready( function(){
    $('#dtable').DataTable({
             ordering: false
        });
});
</script>
 <script>
  $( function() {
    $( ".datepicker" ).datepicker({dateFormat: 'yy/mm/dd'}); 
  });
     </script>

<script type="text/javascript">
var url = window.location;
//console.log(url);
$('ul.treeview-menu a').filter(function(e) {
   return this.href == url;
}).parentsUntil(".sidebar-menu > .treeview-menu").addClass('active');
</script>
<script type="text/javascript">
$(function(){
    var url = window.location.pathname;
    var urlexp = window.location.pathname.split('/');
         urlexp1 = urlexp[1];
         console.log(urlexp1)
        urlRegExp = new RegExp(url.replace(/\/$/,'') + "$"); // create regexp to match current url pathname and remove trailing slash if present as it could collide with the link in navigation in case trailing slash wasn't present there
        // now grab every link from the navigation

        var newPathname = "/"+urlexp1;
        
        console.log(newPathname);
        newpathnameregExp = new RegExp(newPathname.replace(/\/$/,'') + "$");
        
        //console.log(urlexp1);
        $('ul.treeview-menu a').each(function(e){
            // and test its normalized href against the url pathname regexp
            if(urlRegExp.test(this.href.replace(/\/$/,''))){
                $(this).parentsUntil(".sidebar-menu > .treeview-menu").addClass('active');
                return false;
            }
            else if(newpathnameregExp.test(this.href.replace(/\/$/,''))){
                $(this).parentsUntil(".sidebar-menu > .treeview-menu").addClass('active');
            }
        });

});

</script>

<script src="https://momentjs.com/downloads/moment-with-locales.min.js"></script>
<script src="https://momentjs.com/downloads/moment.min.js"></script>
<script src="{{ asset('plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
<script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('dist/js/app.min.js') }}"></script>
<script src="{{ asset('dist/js/demo.js') }}"></script>
<script src="{{ asset('js/jstree.min.js') }}"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
@yield('scripts')