<?php
?>
<!DOCTYPE html>
<html>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        var isProfileClicked = false;
        
        function emailFunction(){
            document.getElementById("emailDisplay").style.display = 'block';
            document.getElementById("createUserProfileDisplay").style.display = 'none';
            document.getElementById("viewUserProfileDisplay").style.display = 'none';
            document.getElementById("suspendUserProfileDisplay").style.display = 'none';
            document.getElementById("updateUserProfileDisplay").style.display = 'none';
            document.getElementById("createUserAccountDisplay").style.display = 'none';
            document.getElementById("viewUserAccountDisplay").style.display = 'none';
            document.getElementById("suspendUserAccountDisplay").style.display = 'none';
            document.getElementById("updateUserAccountDisplay").style.display = 'none';
        }

        function createUserProfileFunction(){
            document.getElementById("emailDisplay").style.display = 'none';
            document.getElementById("createUserProfileDisplay").style.display = 'block';
            document.getElementById("viewUserProfileDisplay").style.display = 'none';
            document.getElementById("suspendUserProfileDisplay").style.display = 'none';
            document.getElementById("updateUserProfileDisplay").style.display = 'none';
            document.getElementById("createUserAccountDisplay").style.display = 'none';
            document.getElementById("viewUserAccountDisplay").style.display = 'none';
            document.getElementById("suspendUserAccountDisplay").style.display = 'none';
            document.getElementById("updateUserAccountDisplay").style.display = 'none';
        }

        function viewUserProfileFunction(){
            document.getElementById("emailDisplay").style.display = 'none';
            document.getElementById("createUserProfileDisplay").style.display = 'none';
            document.getElementById("viewUserProfileDisplay").style.display = 'block';
            document.getElementById("suspendUserProfileDisplay").style.display = 'none';
            document.getElementById("updateUserProfileDisplay").style.display = 'none';
            document.getElementById("createUserAccountDisplay").style.display = 'none';
            document.getElementById("viewUserAccountDisplay").style.display = 'none';
            document.getElementById("suspendUserAccountDisplay").style.display = 'none';
            document.getElementById("updateUserAccountDisplay").style.display = 'none';
        }

        function suspendUserProfileFunction(){
            document.getElementById("emailDisplay").style.display = 'none';
            document.getElementById("createUserProfileDisplay").style.display = 'none';
            document.getElementById("viewUserProfileDisplay").style.display = 'none';
            document.getElementById("suspendUserProfileDisplay").style.display = 'block';
            document.getElementById("updateUserProfileDisplay").style.display = 'none';
            document.getElementById("createUserAccountDisplay").style.display = 'none';
            document.getElementById("viewUserAccountDisplay").style.display = 'none';
            document.getElementById("suspendUserAccountDisplay").style.display = 'none';
            document.getElementById("updateUserAccountDisplay").style.display = 'none';
        }

        function updateUserProfileFunction(){
            document.getElementById("emailDisplay").style.display = 'none';
            document.getElementById("createUserProfileDisplay").style.display = 'none';
            document.getElementById("viewUserProfileDisplay").style.display = 'none';
            document.getElementById("suspendUserProfileDisplay").style.display = 'none';
            document.getElementById("updateUserProfileDisplay").style.display = 'block';
            document.getElementById("createUserAccountDisplay").style.display = 'none';
            document.getElementById("viewUserAccountDisplay").style.display = 'none';
            document.getElementById("suspendUserAccountDisplay").style.display = 'none';
            document.getElementById("updateUserAccountDisplay").style.display = 'none';
        }

        function createUserAccountFunction(){
            document.getElementById("emailDisplay").style.display = 'none';
            document.getElementById("createUserProfileDisplay").style.display = 'none';
            document.getElementById("viewUserProfileDisplay").style.display = 'none';
            document.getElementById("suspendUserProfileDisplay").style.display = 'none';
            document.getElementById("updateUserProfileDisplay").style.display = 'none';
            document.getElementById("createUserAccountDisplay").style.display = 'block';
            document.getElementById("viewUserAccountDisplay").style.display = 'none';
            document.getElementById("suspendUserAccountDisplay").style.display = 'none';
            document.getElementById("updateUserAccountDisplay").style.display = 'none';
        }

        function viewUserAccountFunction(){
            document.getElementById("emailDisplay").style.display = 'none';
            document.getElementById("createUserProfileDisplay").style.display = 'none';
            document.getElementById("viewUserProfileDisplay").style.display = 'none';
            document.getElementById("suspendUserProfileDisplay").style.display = 'none';
            document.getElementById("updateUserProfileDisplay").style.display = 'none';
            document.getElementById("createUserAccountDisplay").style.display = 'none';
            document.getElementById("viewUserAccountDisplay").style.display = 'block';
            document.getElementById("suspendUserAccountDisplay").style.display = 'none';
            document.getElementById("updateUserAccountDisplay").style.display = 'none';
        }

        function suspendUserAccountFunction(){
            document.getElementById("emailDisplay").style.display = 'none';
            document.getElementById("createUserProfileDisplay").style.display = 'none';
            document.getElementById("viewUserProfileDisplay").style.display = 'none';
            document.getElementById("suspendUserProfileDisplay").style.display = 'none';
            document.getElementById("updateUserProfileDisplay").style.display = 'none';
            document.getElementById("createUserAccountDisplay").style.display = 'none';
            document.getElementById("viewUserAccountDisplay").style.display = 'none';
            document.getElementById("suspendUserAccountDisplay").style.display = 'block';
            document.getElementById("updateUserAccountDisplay").style.display = 'none';
        }

        function updateUserAccountFunction(){
            document.getElementById("emailDisplay").style.display = 'none';
            document.getElementById("createUserProfileDisplay").style.display = 'none';
            document.getElementById("viewUserProfileDisplay").style.display = 'none';
            document.getElementById("suspendUserProfileDisplay").style.display = 'none';
            document.getElementById("updateUserProfileDisplay").style.display = 'none';
            document.getElementById("createUserAccountDisplay").style.display = 'none';
            document.getElementById("viewUserAccountDisplay").style.display = 'none';
            document.getElementById("suspendUserAccountDisplay").style.display = 'none';
            document.getElementById("updateUserAccountDisplay").style.display = 'block';
        }

        function clickedDrop(){
            document.getElementById("accountDrop").style.display= "none";
            document.getElementById("accountCollapse").style.display = "block";
            document.getElementById("accountSignOut").style.display = "block";
            document.getElementById("accountProfile").style.display = "block";
        }

        function clickedCollapse(){
            document.getElementById("accountDrop").style.display = "block";
            document.getElementById("accountCollapse").style.display = "none";
            document.getElementById("accountSignOut").style.display = "none";
            document.getElementById("accountProfile").style.display = "none";
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
    </script>
    <style>
        .mouseOverEffects{
            border-left : 3px solid transparent;
        }

        .mouseOverEffects:hover{
            border-left : 3px solid #437E96;
        }

        .buttonEffects {
            border-radius: 15px;
            transparent-space: normal;
            background-color: #437E96;
            border: none;
            color: transparent;
            width: 140px;
            height: 70px;
            font-size: 20px;
            text-align: center;
            display: inline-block;
            float: left;
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
    </style>
    <body onload="profileDetails()" style="background-color:#FEF2E5">
        <form>
            <div style="width:1100px;margin-left:auto;margin-right:auto">
                <div style="float:right">
                    <img src="../MoshiQ2 IMG Assets/Profile Icon.png" style="display:block;margin-left:auto;width:70px;height:auto;cursor:pointer;" onclick="profileClicked()"></br>
                    <div id="displayProfile" name="displayProfile" style="float:right;margin-top:10px;padding:5px;z-index:1;position:relative;width:auto;height:auto;background-color:white;;border:1px solid black;border-radius:5px;display:none">
                        <text style="margin-left:10%;margin-right:auto;display:inline-block" id="accountNameDetails"></text></br>
                        <input type="button" id="accountDrop" name="accountDrop" value="Account &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&#x25B2;" style="color:gray;margin-top:5px;height:30px;width:200px;" onclick="clickedDrop()">
                        <input type="button" id="accountCollapse" name="accountCollapse" value="Account &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&#x25BC;" style="color:gray;margin-top:5px;width:200px;height:30px;" onclick="clickedCollapse()" hidden>
                        <input type="button" id="accountProfile" name="accountProfile" value="Profile &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;" style="margin-top:5px;width:200px;height:30px;" onclick="location.href='../customer/accountDetails.php'" hidden>
                        <input type="button" id="accountSignOut" name="accountSignOut" value="Sign out &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;" style="margin-top:5px;width:200px;height:30px;" onclick="signOut()" hidden>
                    </div></br>
                </div>
                <div>
                    <img src="../MoshiQ2 IMG Assets/Logo.png" style="margin-left:0px;width:500px;height:200px;display:block"></br>
                </div>

                <div style="float:left;margin-left:30px;display:inline-block">
                    <text style="color:#437E96;font-size:30px">EMAIL</text></br>
                    <div style="float:left;margin-left:40px;margin-top:30px;display:inline-block">
                        <div class="mouseOverEffects" style="width:120px">
                            <input type="button" id="emailButton" name="emailButton" value="Email" style="padding:10px;border:0px;background-color:transparent" onclick="emailFunction()"></br>
                        </div></br></br>
                    </div></br>

                    <text style="color:#437E96;font-size:30px;">ROLES</text></br>
                    <div style="float:left;margin-left:40px;margin-top:30px;display:inline-block">
                        <div class="mouseOverEffects" style="width:120px">
                            <input type="button" id="createUserProfileButton" name="createUserProfileButton" value="Create user profile" style="padding:10px;border:0px;background-color:transparent" onclick="createUserProfileFunction()"></br>
                        </div>
                        <div class="mouseOverEffects" style="width:120px">
                            <input type="button" id="viewUserProfileButton" name="viewUserProfileButton" value="View user profile" style="padding:10px;border:0px;background-color:transparent" onclick="viewUserProfileFunction()"></br>
                        </div>
                        <div class="mouseOverEffects" style="width:120px">
                            <input type="button" id="suspendUserProfileButton" name="suspendUserProfileButton" value="Suspend user profile" style="padding:10px;border:0px;background-color:transparent" onclick="suspendUserProfileFunction()"></br>
                        </div>
                        <div class="mouseOverEffects" style="width:120px">
                            <input type="button" id="updateUserProfileButton" name="updateUserProfileButton" value="Update user profile" style="padding:10px;border:0px;background-color:transparent" onclick="updateUserProfileFunction()"></br>
                        </div></br></br>
                    </div></br>

                    <text style="color:#437E96;font-size:30px;">ACCOUNTS</text></br>
                    <div style="float:left;margin-left:40px;margin-top:30px;display:inline-block">
                        <div class="mouseOverEffects" style="width:120px">
                            <input type="button" id="createUserAccountButton" name="createUserAccountButton" value="Create user account" style="padding:10px;border:0px;background-color:transparent" onclick="createUserAccountFunction()"></br>
                        </div>
                        <div class="mouseOverEffects" style="width:120px">
                            <input type="button" id="viewUserAccountButton" name="viewUserAccountButton" value="View user account" style="padding:10px;border:0px;background-color:transparent" onclick="viewUserAccountFunction()"></br>
                        </div>
                        <div class="mouseOverEffects" style="width:120px">
                            <input type="button" id="suspendUserAccountButton" name="suspendUserAccountButton" value="Suspend user account" style="padding:10px;border:0px;background-color:transparent" onclick="suspendUserAccountFunction()"></br>
                        </div>
                        <div class="mouseOverEffects" style="width:120px">
                            <input type="button" id="updateUserAccountButton" name="updateUserAccountButton" value="Update user account" style="padding:10px;border:0px;background-color:transparent" onclick="updateUserAccountFunction()"></br>
                        </div></br></br>
                    </div></br>
                </div>

                <div style="float:left;margin-left:300px;">
                    <div id="emailDisplay" style="display:none;width:600px;">
                        <text style="color:#437E96;font-size:30px;">
                            Email                               
                        </text></br></br>
                        <text>Display Email Stuff</text>
                    </div>
                </div>    

                <div style="float:left;margin-left:300px;">
                    <div id="createUserProfileDisplay" style="display:none;width:600px;">
                        <text style="color:#437E96;font-size:30px;">
                            Create user profile                              
                        </text></br></br>
                        <text>Create user profile</text>
                    </div>
                </div>
                <div style="float:left;margin-left:300px;">
                    <div id="viewUserProfileDisplay" style="display:none;width:600px;">
                        <text style="color:#437E96;font-size:30px;">
                            View user profile                          
                        </text></br></br>
                        <text>View user profile</text>
                    </div>
                </div> 
                <div style="float:left;margin-left:300px;">
                    <div id="suspendUserProfileDisplay" style="display:none;width:600px;">
                        <text style="color:#437E96;font-size:30px;">
                            Suspend user profile                              
                        </text></br></br>
                        <text>Suspend user profile</text>
                    </div>
                </div>
                <div style="float:left;margin-left:300px;">
                    <div id="updateUserProfileDisplay" style="display:none;width:600px;">
                        <text style="color:#437E96;font-size:30px;">
                            Update user profile                              
                        </text></br></br>
                        <text>Update user profile</text>
                    </div>
                </div>

                <div style="float:left;margin-left:300px;">
                    <div id="createUserAccountDisplay" style="display:none;width:600px;">
                        <text style="color:#437E96;font-size:30px;">
                            Create user account                              
                        </text></br></br>
                        <text>Create user account</text>
                    </div>
                </div>
                <div style="float:left;margin-left:300px;">
                    <div id="viewUserAccountDisplay" style="display:none;width:600px;">
                        <text style="color:#437E96;font-size:30px;">
                            View user account                          
                        </text></br></br>
                        <text>View user account</text>
                    </div>
                </div>
                <div style="float:left;margin-left:300px;">
                    <div id="suspendUserAccountDisplay" style="display:none;width:600px;">
                        <text style="color:#437E96;font-size:30px;">
                            Suspend user account                              
                        </text></br></br>
                        <text>Suspend user account</text>
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