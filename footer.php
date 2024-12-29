</section>
  <footer> footer</footer>
  </div>  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/datatables.net/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#myTable').DataTable();  // Initialize the DataTable
    });
  </script>
<script>
$('#myTable').DataTable({
  // Pagination options
  "paging": true,            // Enable or disable pagination (default is true)
  "pageLength": 10,          // Number of rows per page (default is 10)
  "lengthChange": true,      // Allow users to change the number of rows per page (default is true)
  
  // Search options
  "searching": true,         // Enable or disable the search box (default is true)
  
  // Sorting options
  "ordering": true,          // Enable or disable sorting (default is true)
  "order": [[0, 'asc']],     // Default sorting order. [0, 'asc'] sorts by the first column in ascending order
  
  // Column visibility and order
  "columnDefs": [
    {
      "targets": [0,1],      // Disable sorting on specific columns (Age and Salary)
      "orderable": false
    },
    // {
    //   "targets": 3,           // Set a specific column to hidden by default (Start Date column)
    //   "visible": false
    // }
  ],
  

});


function checkdel(allobj){
 let all= document.querySelectorAll('.delc');
 for(let i=0;i<all.length;i++){
  all[i].checked=allobj.checked;
 }
  ditem.style.display=allobj.checked?"":'none';
 }


function displaybtn(){
 let alls= document.querySelectorAll('.delc');
 counter=0;
 for(let i=0;i<alls.length;i++){
  if(alls[i].checked){
    counter++;

    
  }
 }
 ditem.style.display=counter?"":'none';
 if(counter==alls.length){
  all.checked=true;
 }
 else{
  all.checked=false;
 }
 }
 

 
</script>
<!-- Bootstrap JS and Popper.js -->
<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</body>
</html>
 