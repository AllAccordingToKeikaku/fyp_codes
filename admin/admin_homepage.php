<?php
require_once("reservationInboxDB.php");
require_once("deliveryInboxDB.php");
?>
<!DOCTYPE html>
<html>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        var isProfileClicked = false;
        
        function emailFunction(){
            document.getElementById("emailDisplay").style.display = 'block';
            document.getElementById("createUserAccountDisplay").style.display = 'none';
            document.getElementById("viewUserAccountDisplay").style.display = 'none';
            document.getElementById("suspendUserAccountDisplay").style.display = 'none';
            document.getElementById("updateUserAccountDisplay").style.display = 'none';
        }

        function createUserAccountFunction(){
            document.getElementById("emailDisplay").style.display = 'none';
            document.getElementById("createUserAccountDisplay").style.display = 'block';
            document.getElementById("viewUserAccountDisplay").style.display = 'none';
            document.getElementById("suspendUserAccountDisplay").style.display = 'none';
            document.getElementById("updateUserAccountDisplay").style.display = 'none';
        }

        function viewUserAccountFunction(){
            document.getElementById("emailDisplay").style.display = 'none';
            document.getElementById("createUserAccountDisplay").style.display = 'none';
            document.getElementById("viewUserAccountDisplay").style.display = 'block';
            document.getElementById("suspendUserAccountDisplay").style.display = 'none';
            document.getElementById("updateUserAccountDisplay").style.display = 'none';
        }

        function suspendUserAccountFunction(){
            document.getElementById("emailDisplay").style.display = 'none';
            document.getElementById("createUserAccountDisplay").style.display = 'none';
            document.getElementById("viewUserAccountDisplay").style.display = 'none';
            document.getElementById("suspendUserAccountDisplay").style.display = 'block';
            document.getElementById("updateUserAccountDisplay").style.display = 'none';
        }

        function updateUserAccountFunction(){
            document.getElementById("emailDisplay").style.display = 'none';
            document.getElementById("createUserAccountDisplay").style.display = 'none';
            document.getElementById("viewUserAccountDisplay").style.display = 'none';
            document.getElementById("suspendUserAccountDisplay").style.display = 'none';
            document.getElementById("updateUserAccountDisplay").style.display = 'block';
        }

        function clickedDrop(){
            document.getElementById("accountDrop").style.display= "none";
            document.getElementById("accountCollapse").style.display = "block";
            document.getElementById("accountSignOut").style.display = "block";
        }

        function clickedCollapse(){
            document.getElementById("accountDrop").style.display = "block";
            document.getElementById("accountCollapse").style.display = "none";
            document.getElementById("accountSignOut").style.display = "none";
        }

        function signOut(){
            document.cookie.split(";").forEach(function(c) { document.cookie = c.replace(/^ +/, "").replace(/=.*/, "=;expires=" + new Date().toUTCString() + ";path=/"); });
            window.location.replace("../index.php");
        }

        function profileClicked(){
            if (isProfileClicked == false){
                isProfileClicked = true;
                document.getElementById("displayProfile").style.display = "block";
            }
            else{
                isProfileClicked = false;
                document.getElementById("displayProfile").style.display = "none";
            }
        }
        
        function profileDetails(){
            console.log(document.cookie);
            var tempLogInName = getCookie("fullName");
            document.getElementById('accountNameDetails').innerHTML = tempLogInName;
        }

        function getCookie(name){
            const cDecoded = decodeURIComponent(document.cookie);
            const cArray = cDecoded.split("; ");
            let result = null;
            
            cArray.forEach(element => {
                if(element.indexOf(name) == 0){
                    result = element.substring(name.length + 1)
                }
            })
            return result;
        }

        function displayEmailR(){
            document.getElementById('displayR').style.display = "block";
            document.getElementById('displayD').style.display  = "none";
            displayInbox("reservation");
        }

        function displayEmailD(){
            document.getElementById('displayR').style.display = "none";
            document.getElementById('displayD').style.display = "block";
            displayInbox("delivery");
        }

        function displayInbox(emailType){
            $("#displayReservationInfo tr").remove(); 
            $("#displayDeliveryInfo tr").remove(); 
            if(emailType == "reservation"){
                var slotArrays = '<?php echo json_encode($reservationInboxArray);?>'.replaceAll('[[','[').replaceAll(']]',']').replaceAll('],',']].').replaceAll('"',"");;
                var slotArray = slotArrays.split('].');
                var inboxArray = [];
                var actualInboxArray = [];
                var x;
                var y;
                var tempString = "";
                var tempString1 = "";

                var checkTOF = true;
                for (x=0;x<slotArray.length;x++)
                {
                    inboxArray.push(slotArray[x]);
                }
                for (x=0;x<inboxArray.length;x++){
                    tempString = String(inboxArray[x]).replaceAll('[','').replaceAll(']','');
                    tempString = tempString.split(',');
                    actualInboxArray.push(tempString);
                }
                var table = document.getElementById("displayReservationInfo");
                y = 0;
                for (x=actualInboxArray.length-1;x>=0;x--)
                {
                    var row = table.insertRow(y);
                    y++;
                    var cell = row.insertCell(0);
                    cell.innerHTML = '<text id="inboxListing' + String(x) + '"></text>';
                    document.getElementById("inboxListing"+String(x)).innerHTML = createInboxListing(actualInboxArray[x][0], actualInboxArray[x][1].replaceAll('~~', ','), actualInboxArray[x][2]);          
                }   
            }
            else if(emailType == "delivery"){
                var slotArrays = '<?php echo json_encode($deliveryInboxArray);?>'.replaceAll('[[','[').replaceAll(']]',']').replaceAll('],',']].').replaceAll('"',"");;
                var slotArray = slotArrays.split('].');
                var inboxArray = [];
                var actualInboxArray = [];
                var x;
                var y;
                var tempString = "";
                var tempString1 = "";

                var checkTOF = true;
                for (x=0;x<slotArray.length;x++)
                {
                    inboxArray.push(slotArray[x]);
                }
                for (x=0;x<inboxArray.length;x++){
                    tempString = String(inboxArray[x]).replaceAll('[','').replaceAll(']','');
                    tempString = tempString.split(',');
                    actualInboxArray.push(tempString);
                }
                var table = document.getElementById("displayDeliveryInfo");
                y = 0;
                for (x=actualInboxArray.length-1;x>=0;x--)
                {
                    var row = table.insertRow(y);
                    y++;
                    var cell = row.insertCell(0);
                    cell.innerHTML = '<text id="inboxListing' + String(x) + '"></text>';
                    document.getElementById("inboxListing"+String(x)).innerHTML = createInboxListing(actualInboxArray[x][0], actualInboxArray[x][1].replaceAll('~~', ','), actualInboxArray[x][2]);          
                } 
            }
        }
        
        function createInboxListing(status, description, date){
            var listing='<div style="border-radius:15px;background-color:#A8A1A166;border:0px;margin-top:2px;padding:5px;width:880px">' +
                            '<text style="vertical-align:top;margin-right:auto;display:inline-block;width:100px;">' + status + '</text>' +
                            '<text style="margin-left:100px;margin-right:auto;display:inline-block;width:400px">' + description + '</text>' +
                            '<text style="vertical-align:top;margin-left:10px;margin-right:auto;display:inline-block;width:200px">' + date + '</text>' +
                        '</div>'
            return listing;
        }

        function createMiscAccount(){
            alert("Create admin/staff/owner account clicked");
        }

        function createCustomerAccount(){
            alert("Create customer account clicked");
        }

        function checkProfileType(){
            if(document.getElementById("createAccountProfile").value == "Customer"){
                document.getElementById("customerType").style.display = "block";
                document.getElementById("miscType").style.display = "none";
            }
            else{
                document.getElementById("customerType").style.display = "none";
                document.getElementById("miscType").style.display = "block";
            }
        }
    </script>
    <style>
        .mouseOverEffects{
            border-left : 3px solid transparent;
            cursor: pointer;
        }

        .mouseOverEffects:hover{
            border-left : 3px solid #437E96;
            cursor: pointer;
        }

        .buttonEffects {
            border-radius: 10px;
            background-color: #437E96;
            border: none;
            color: white;
            width: 200px;
            height: auto;
            font-size: 20px;
            text-align: center;
            padding: 5px;
            display: inline-block;
        }
        .buttonEffects:hover {
            border: 2px solid black;
            cursor:pointer;
        }

        .arrow {
            border: solid black;
            border-width: 0 1px 1px 0;
            display: inline-block;
            padding: 3px;
        }

        .example::-webkit-scrollbar {
            display: none;
        }

        /* Hide scrollbar for IE, Edge and Firefox */
        .example {
            -ms-overflow-style: none;  /* IE and Edge */
        }

        .buttonHoverEffect {
            border: none;
            cursor:pointer;
        }
        .buttonHoverEffect:hover {
            border: 2px solid black;
            cursor:pointer;
        }
    </style>
    <body onload="profileDetails()" style="background-color:#FEF2E5">
        <form>
            <div style="width:1400px;margin-left:auto;margin-right:auto">
                <div style="float:right">
                    <img src="../MoshiQ2 IMG Assets/Profile Icon.png" style="display:block;margin-left:auto;width:70px;height:auto;cursor:pointer;" onclick="profileClicked()"></br>
                    <div id="displayProfile" name="displayProfile" style="float:right;margin-top:10px;padding:5px;z-index:1;position:relative;width:auto;height:auto;background-color:white;;border:1px solid black;border-radius:5px;display:none">
                        <text style="margin-left:10%;margin-right:auto;display:inline-block" id="accountNameDetails"></text></br>
                        <input type="button" id="accountDrop" name="accountDrop" value="Account &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&#x25B2;" style="color:gray;margin-top:5px;height:30px;width:200px;" onclick="clickedDrop()">
                        <input type="button" id="accountCollapse" name="accountCollapse" value="Account &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&#x25BC;" style="color:gray;margin-top:5px;width:200px;height:30px;" onclick="clickedCollapse()" hidden>
                        <input type="button" id="accountSignOut" name="accountSignOut" value="Sign out &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;" style="margin-top:5px;width:200px;height:30px;" onclick="signOut()" hidden>
                    </div></br>
                </div>

                <div>
                    <a href="admin_homepage.php"><img src="../MoshiQ2 IMG Assets/Logo.png" style="margin-left:0px;width:500px;height:200px;display:inline-block"></a>
                </div></br>

                <div style="float:left;margin-left:30px;display:inline-block">
                    <text style="color:#437E96;font-size:30px">EMAIL</text></br>
                    <div style="float:left;margin-left:40px;margin-top:30px;display:inline-block">
                        <div class="mouseOverEffects" style="width:150px">
                            <input type="button" id="emailButton" name="emailButton" value="Email" style="padding:10px;border:0px;background-color:transparent;cursor:pointer" onclick="emailFunction();"></br>
                        </div></br></br>
                    </div></br>

                    <text style="color:#437E96;font-size:30px;">ACCOUNTS</text></br>
                    <div style="float:left;margin-left:40px;margin-top:30px;display:inline-block">
                        <div class="mouseOverEffects" style="width:150px">
                            <input type="button" id="createUserAccountButton" name="createUserAccountButton" value="Create user account" style="padding:10px;border:0px;background-color:transparent;cursor:pointer" onclick="createUserAccountFunction()"></br>
                        </div>
                        <div class="mouseOverEffects" style="width:150px">
                            <input type="button" id="viewUserAccountButton" name="viewUserAccountButton" value="View user account" style="padding:10px;border:0px;background-color:transparent;cursor:pointer" onclick="viewUserAccountFunction()"></br>
                        </div>
                        <div class="mouseOverEffects" style="width:150px">
                            <input type="button" id="suspendUserAccountButton" name="suspendUserAccountButton" value="Suspend user account" style="padding:10px;border:0px;background-color:transparent;cursor:pointer" onclick="suspendUserAccountFunction()"></br>
                        </div>
                        <div class="mouseOverEffects" style="width:150px">
                            <input type="button" id="updateUserAccountButton" name="updateUserAccountButton" value="Update user account" style="padding:10px;border:0px;background-color:transparent;cursor:pointer" onclick="updateUserAccountFunction()"></br>
                        </div></br></br>
                    </div></br>
                </div>

                <div style="float:left;margin-left:300px;">
                    <div id="emailDisplay" style="display:none;width:900px;">
                        <text style="color:#437E96;font-size:40px;">
                            Email                               
                        </text></br></br></br>
                        <div>
                            <input class="buttonEffects" type="button" style="float:left;margin-left:15%;width:200px;font-size:20px;padding-5px;" value="Reservation email" onclick="displayEmailR()">
                            <input class="buttonEffects" type="button" style="float:right;margin-right:15%;width:200px;font-size:20px;padding-5px;" value="Delivery email" onclick="displayEmailD()"></br>
                        </div></br></br>
                        <div style="background-color:#3280F466;">
                            <text style="margin-right:auto;display:inline-block;font-size:20px;width:100px">Status</text>
                            <text style="margin-left:100px;margin-right:auto;display:inline-block;font-size:20px;width:400px;">Description</text>
                            <text style="margin-left:10px;margin-right:auto;display:inline-block;font-size:20px;width:200px;">Date</text>
                        </div>
                        <div id="displayR" class="example" style="font-size:20px;height:300px;overflow-y:auto;max-height:600px;display:none">
                            <table id="displayReservationInfo">
                            </table>
                        </div>
                        <div id="displayD" class="example" style="font-size:20px;height:300px;overflow-y:auto;max-height:600px;display:none">
                            <table id="displayDeliveryInfo">
                            </table>
                        </div>
                    </div>
                </div>    

                <div style="float:left;margin-left:300px;">
                    <div id="createUserAccountDisplay" style="display:none;width:600px;">
                        <text style="color:#437E96;font-size:30px;">
                            Create user account                              
                        </text></br></br>
                        <div id="createAccount" style="font-size:20px;display:block">
                            <label style="width:150px;display:inline-block">Profile type: </label>
                            <select id="createAccountProfile" style="margin-left:25px;width:304px;background-color:#A8A1A166;border:none;border-radius:5px;font-size:20px;cursor:pointer" onchange="checkProfileType()" onclick="checkProfileType()">
                                <option value="Admin">Admin</option>
                                <option value="Staff">Staff</option>
                                <option value="Owner">Owner</option>
                                <option value="Customer">Customer</option>
                            </select>
                            </br></br>
                            <div id="miscType" style="display:none">
                                <label style="width:150px;display:inline-block">Email: </label><input type="text" id="createAccountEmail" style="margin-top:5px;margin-left:30px;width:300px;background-color:#A8A1A166;border:none;border-radius:5px;font-size:20px" placeholder="Enter email address"></br></br>
                                <label style="width:150px;display:inline-block">Password: </label><input type="text" id="createAccountPassword" style="margin-left:30px;width:300px;background-color:#A8A1A166;border:none;border-radius:5px;font-size:20px" placeholder="Enter password"></br></br>
                                <label style="width:150px;display:inline-block">Description: </label><input type="text" id="createAccountDescription" style="margin-left:30px;width:300px;background-color:#A8A1A166;border:none;border-radius:5px;font-size:20px" placeholder="Enter description"></br></br>
                                <input type="button" class="buttonHoverEffect" style="display:inline-block;width:485px;height:40px;cursor:pointer;background-color:#5BBDE4CC;border-radius:10px" value="Create profile" onclick="createMiscAccount()">
                            </div>
                            <div id="customerType" style="display:none">
                                <label style="width:150px;display:inline-block">Full name: </label><input type="text" id="createAccountName" style="margin-left:30px;width:300px;background-color:#A8A1A166;border:none;border-radius:5px;font-size:20px" placeholder="Enter full name"></br></br>
                                <label style="width:150px;display:inline-block">Email: </label><input type="text" id="createAccountEmail" style="margin-top:5px;margin-left:30px;width:300px;background-color:#A8A1A166;border:none;border-radius:5px;font-size:20px" placeholder="Enter email address"></br></br>
                                <label style="width:150px;display:inline-block">Password: </label><input type="text" id="createAccountPassword" style="margin-left:30px;width:300px;background-color:#A8A1A166;border:none;border-radius:5px;font-size:20px" placeholder="Enter password"></br></br>
                                <label style="width:150px;display:inline-block">Phone number: </label><input type="text" id="createAccountNumber" style="margin-left:30px;width:300px;background-color:#A8A1A166;border:none;border-radius:5px;font-size:20px" placeholder="Enter phone number"></br></br>
                                <label style="width:150px;display:inline-block">Description: </label><input type="text" id="createAccountDescription" style="margin-left:30px;width:300px;background-color:#A8A1A166;border:none;border-radius:5px;font-size:20px" placeholder="Enter description"></br></br>
                                <input type="button" class="buttonHoverEffect" style="display:inline-block;width:485px;height:40px;cursor:pointer;background-color:#5BBDE4CC;border-radius:10px" value="Create profile" onclick="createCustomerAccount()">
                            </div>
                        </div></br>
                    </div>
                </div>
                <div style="float:left;margin-left:300px;">
                    <div id="viewUserAccountDisplay" style="display:none;width:600px;">
                        <text style="color:#437E96;font-size:30px;">
                            View user account                          
                        </text></br></br>
                        <div>
                            <input type="text" style="width:300px;height:30px;display:inline-block;font-size:20px;background-color:#A8A1A166;border:none;border-radius:5px;" placeholder="Enter email address">
                            <input type="button" class="buttonHoverEffect" style="margin-left:20px;width:100px;height:40px;display:inline-block;font-size:20px;cursor:pointer;background-color:#5BBDE4CC;border-radius:10px" value="search">
                        </div></br>
                        <div style="display:block">
                            <table rules="all">
                                <tr style="background-color:#5BBDE4CC;">
                                    <td style="width:200px;padding:5px">Profile Type</td>
                                    <td style="width:300px;padding:5px">Description</td>
                                    <td style="width:200px;padding:5px">Account status</td>
                                </tr>
                                <tr style="background-color:#A8A1A166;">
                                    <td id="profileType1" style="width:200px;padding:5px">Owner</td>
                                    <td id="profileDescription1" style="width:300px;padding:5px">Owner type</td>
                                    <td id="profileStatus1" style="width:200px;padding:5px">Suspended</td>
                                </tr>
                                <tr style="background-color:#A8A1A166;">
                                    <td id="profileType2" style="width:200px;padding:5px">Admin</td>
                                    <td id="profileDescription2" style="width:300px;padding:5px">Admin type</td>
                                    <td id="profileStatus2" style="width:200px;padding:5px">Active</td>
                                </tr>
                                <tr style="background-color:#A8A1A166;"> 
                                    <td id="profileType3" style="width:200px;padding:5px">Staff</td>
                                    <td id="profileDescription3" style="width:300px;padding:5px">Staff type</td>
                                    <td id="profileStatus3" style="width:200px;padding:5px">Active</td>
                                </tr>
                                <tr style="background-color:#A8A1A166;">
                                    <td id="profileType4" style="width:200px;padding:5px">Customer</td>
                                    <td id="profileDescription4" style="width:300px;padding:5px">Customer type</td>
                                    <td id="profileStatus4" style="width:200px;padding:5px">Suspended</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div style="float:left;margin-left:300px;">
                    <div id="suspendUserAccountDisplay" style="display:none;width:600px;">
                        <text style="color:#437E96;font-size:30px;">
                            Suspend user account                              
                        </text></br></br>
                        <div style="display:block">
                            <table rules="all">
                                <tr style="background-color:#5BBDE4CC;">
                                    <td style="width:200px;padding:5px"><center>Select</center></td>
                                    <td style="width:200px;padding:5px">Profile Type</td>
                                    <td style="width:300px;padding:5px">Description</td>
                                    <td style="width:200px;padding:5px">Account status</td>
                                </tr>
                                <tr style="background-color:#A8A1A166;">
                                    <td><center><input type="checkbox" style="cursor:pointer"></center></td>
                                    <td id="profileType1" style="width:200px;padding:5px">Owner</td>
                                    <td id="profileDescription1" style="width:300px;padding:5px">Owner type</td>
                                    <td id="profileStatus1" style="width:200px;padding:5px">Suspended</td>
                                </tr>
                                <tr style="background-color:#A8A1A166;">
                                    <td><center><input type="checkbox" style="cursor:pointer"></center></td>
                                    <td id="profileType2" style="width:200px;padding:5px">Admin</td>
                                    <td id="profileDescription2" style="width:300px;padding:5px">Admin type</td>
                                    <td id="profileStatus2" style="width:200px;padding:5px">Active</td>
                                </tr>
                                <tr style="background-color:#A8A1A166;"> 
                                    <td><center><input type="checkbox" style="cursor:pointer"></center></td>
                                    <td id="profileType3" style="width:200px;padding:5px">Staff</td>
                                    <td id="profileDescription3" style="width:300px;padding:5px">Staff type</td>
                                    <td id="profileStatus3" style="width:200px;padding:5px">Active</td>
                                </tr>
                                <tr style="background-color:#A8A1A166;">
                                    <td><center><input type="checkbox" style="cursor:pointer"></center></td>
                                    <td id="profileType4" style="width:200px;padding:5px">Customer</td>
                                    <td id="profileDescription4" style="width:300px;padding:5px">Customer type</td>
                                    <td id="profileStatus4" style="width:200px;padding:5px">Suspended</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div style="float:left;margin-left:300px;">
                    <div id="updateUserAccountDisplay" style="display:none;width:600px;">
                        <text style="color:#437E96;font-size:30px;">
                            Update user account                              
                        </text></br></br>
                        <text>Update user account</text>
                    </div>
                </div> 
            </div>
        </form>
    </body>
</html>