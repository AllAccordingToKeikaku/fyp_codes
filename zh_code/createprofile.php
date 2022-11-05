<!-- user will key in new profile's details into these inputs -->
<form action="createprofile.php" method="POST">




<form action = "" method = "POST">
  <table>
    <tr>
      <td> Profile Name </td>
      <td> <input type = "text" name= "profile_name" placeholder = "Enter desired name" 
      </td>
    </tr>
<!-- user will tick the functions the new profile will have access to -->
<span class="options">
            <label for="functions">Functions:</label><br>
                <input type="checkbox" id="menu" name="menu" value="menu" checked="checked">
                <label for="menu">Menu</label><br>

                <input type="checkbox" id="orders" name="orders" value="orders">
                <label for="orders">Orders</label><br>
                
                <input type="checkbox" id="report" name="report" value="report">
                <label for="coupon">Coupon</label><br>

                <input type="checkbox" id="user" name="user" value="user">
                <label for="user">User</label><br>

                <input type="checkbox" id="others" name="others" value="others">
                <label for="report">Report</label><br>
  
        </span><br><br>

        <div>

<tr>
  <td> Description </td>
  <td> <input type = "text" name= "profile_description" placeholder = "Enter description" 
  </td>
</tr>


</form>
    