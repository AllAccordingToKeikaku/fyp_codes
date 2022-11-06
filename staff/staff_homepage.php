<!DOCTYPE html>
<html>
    <script src="https://code.jquery.com/jquery-1.7.2.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script>
        var isProfileClicked = false;

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

        function changeTab(id){
            var collection = document.getElementsByClassName("sideBar");
            for(var x=0; x < collection.length; x++){
                if(collection[x].id == id+"DIV"){
                    document.getElementById(collection[x].id).style.display="block";
                }
                else{
                    document.getElementById(collection[x].id).style.display="none";
                }
            }
        }

        function createMenuItemFunction(){

        }

        function viewMenuItemFunction(){
            
        }

        function deleteMenuItemFunction(){
            
        }

        function searchMenuItemFunction(){
            
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
                    <a href="staff_homepage.php"><img src="../MoshiQ2 IMG Assets/Logo.png" style="margin-left:0px;width:500px;height:200px;display:inline-block"></a>
                </div></br>

                <div style="float:left;margin-left:30px;display:inline-block">
                    <text style="color:#437E96;font-size:30px;">Item</text></br>
                    <div style="float:left;margin-left:40px;margin-top:30px;display:inline-block">
                        <div class="mouseOverEffects" style="width:150px">
                            <input type="button" id="createMenuItem" name="createMenuItem" value="Create menu item" style="padding:10px;border:0px;background-color:transparent;cursor:pointer" onclick="changeTab(this.id);createMenuItemFunction()"></br>
                        </div>
                        <div class="mouseOverEffects" style="width:150px">
                            <input type="button" id="viewMenuItem" name="viewMenuItem" value="View menu item list" style="padding:10px;border:0px;background-color:transparent;cursor:pointer" onclick="changeTab(this.id);viewMenuItemFunction()"></br>
                        </div>
                        <div class="mouseOverEffects" style="width:150px">
                            <input type="button" id="deleteMenuItem" name="deleteMenuItem" value="Delete menu item" style="padding:10px;border:0px;background-color:transparent;cursor:pointer" onclick="changeTab(this.id);deleteMenuItemFunction()"></br>
                        </div>
                        <div class="mouseOverEffects" style="width:150px">
                            <input type="button" id="searchMenuItem" name="searchMenuItem" value="Search menu item" style="padding:10px;border:0px;background-color:transparent;cursor:pointer" onclick="changeTab(this.id);searchMenuItemFunction()"></br>
                        </div></br></br>
                    </div></br>

                    <text style="color:#437E96;font-size:30px;">Coupon</text></br>
                    <div style="float:left;margin-left:40px;margin-top:30px;display:inline-block">
                        <div class="mouseOverEffects" style="width:150px">
                            <input type="button" id="createCouponCode" name="createCouponCode" value="Create coupon code" style="padding:10px;border:0px;background-color:transparent;cursor:pointer" onclick="changeTab(this.id);createCouponCodeFunction()"></br>
                        </div>
                        <div class="mouseOverEffects" style="width:150px">
                            <input type="button" id="viewCouponCode" name="viewCouponCode" value="View coupon code list" style="padding:10px;border:0px;background-color:transparent;cursor:pointer" onclick="changeTab(this.id);viewCouponCodeFunction()"></br>
                        </div>
                        <div class="mouseOverEffects" style="width:150px">
                            <input type="button" id="deleteCouponCode" name="deleteCouponCode" value="Delete coupon code" style="padding:10px;border:0px;background-color:transparent;cursor:pointer" onclick="changeTab(this.id);deleteCouponCodeFunction()"></br>
                        </div>
                        <div class="mouseOverEffects" style="width:150px">
                            <input type="button" id="searchCouponCode" name="searchCouponCode" value="Search coupon code" style="padding:10px;border:0px;background-color:transparent;cursor:pointer" onclick="changeTab(this.id);searchCouponCodeFunction()"></br>
                        </div></br></br>
                    </div></br>

                    <text style="color:#437E96;font-size:30px;">Reservation</text></br>
                    <div style="float:left;margin-left:40px;margin-top:30px;display:inline-block">
                        <div class="mouseOverEffects" style="width:150px">
                            <input type="button" id="createReservation" name="createReservation" value="Create reservation" style="padding:10px;border:0px;background-color:transparent;cursor:pointer" onclick="changeTab(this.id);createReservationFunction()"></br>
                        </div>
                        <div class="mouseOverEffects" style="width:150px">
                            <input type="button" id="viewReservation" name="viewReservation" value="View reservation list" style="padding:10px;border:0px;background-color:transparent;cursor:pointer" onclick="changeTab(this.id);viewReservationFunction()"></br>
                        </div>
                        <div class="mouseOverEffects" style="width:150px">
                            <input type="button" id="deleteReservation" name="deleteReservation" value="Delete reservation" style="padding:10px;border:0px;background-color:transparent;cursor:pointer" onclick="changeTab(this.id);deleteReservationFunction()"></br>
                        </div>
                        <div class="mouseOverEffects" style="width:150px">
                            <input type="button" id="searchReservation" name="searchReservation" value="Search reservation" style="padding:10px;border:0px;background-color:transparent;cursor:pointer" onclick="changeTab(this.id);searchReservationFunction()"></br>
                        </div></br></br>
                    </div></br>

                    <text style="color:#437E96;font-size:30px;">Order</text></br>
                    <div style="float:left;margin-left:40px;margin-top:30px;display:inline-block">
                        <div class="mouseOverEffects" style="width:150px">
                            <input type="button" id="createOrder" name="createOrder" value="Create order" style="padding:10px;border:0px;background-color:transparent;cursor:pointer" onclick="changeTab(this.id);createOrderFunction()"></br>
                        </div>
                        <div class="mouseOverEffects" style="width:150px">
                            <input type="button" id="viewOrder" name="viewOrder" value="View order list" style="padding:10px;border:0px;background-color:transparent;cursor:pointer" onclick="changeTab(this.id);viewOrderFunction()"></br>
                        </div>
                        <div class="mouseOverEffects" style="width:150px">
                            <input type="button" id="deleteOrder" name="deleteOrder" value="Delete order" style="padding:10px;border:0px;background-color:transparent;cursor:pointer" onclick="changeTab(this.id);deleteOrderFunction()"></br>
                        </div>
                        <div class="mouseOverEffects" style="width:150px">
                            <input type="button" id="searchOrder" name="searchOrder" value="Search order" style="padding:10px;border:0px;background-color:transparent;cursor:pointer" onclick="changeTab(this.id);searchOrderFunction()"></br>
                        </div></br></br>
                    </div></br>
                </div>

                <div id="menuTab">
                    <div style="float:left;margin-left:200px;">
                    <form method="POST" action="create_item_data.php" enctype="multipart/form-data">
                        <div class="sideBar" id="createMenuItemDIV" style="display:none;width:auto">
                            <text style="color:#437E96;font-size:40px;">
                                Create menu item                               
                            </text></br></br></br>
                            <label style="width:150px;display:inline-block">Name: </label><input type="text" id="createItemName" name="createItemName" style="margin-top:5px;margin-left:30px;width:400px;background-color:#A8A1A166;border:none;border-radius:5px;font-size:20px;text-transform:uppercase" placeholder="POMELLO PUNCH"></br></br>
                            <label style="width:150px;display:inline-block">Category: </label>
                                <!--input type="text" id="createItemCategory" name="createItemCategory" style="margin-top:5px;margin-left:30px;width:400px;background-color:#A8A1A166;border:none;border-radius:5px;font-size:20px" placeholder="drinks"></br></br-->
                            <select id="createItemCategory" name="createItemCategory" style="margin-top:5px;margin-left:25px;width:405px;background-color:#A8A1A166;border:none;border-radius:5px;font-size:20px;cursor:pointer">
                                <option value="signature">Signature</option>
                                <option value="diy">DIY</option>
                                <option value="acai">Acai</option>
                                <option value="beverages">Beverages</option>
                            </select></br></br>
                            <label style="width:150px;display:inline-block">Price: </label><input type="text" id="createItemPrice" name="createItemPrice" style="margin-top:5px;margin-left:30px;width:400px;background-color:#A8A1A166;border:none;border-radius:5px;font-size:20px" placeholder="15.50"></br></br>
                            <label style="width:150px;display:inline-block">Description: </label><input type="text" id="createItemDescription" name="createItemDescription" style="margin-top:5px;margin-left:30px;width:400px;background-color:#A8A1A166;border:none;border-radius:5px;font-size:20px" placeholder="Savoury goodness"></br></br>
                            <label style="width:150px;display:inline-block">Picture link: </label>
                                <input type="file" id="my_image" name="my_image" style="margin-top:5px;margin-left:30px;width:400px;background-color:#A8A1A166;border:none;border-radius:5px;font-size:20px"></br></br>
                            <label style="width:150px;display:inline-block">Stock: </label>
                            <select id="createItemStock" name="createItemStock" style="margin-top:5px;margin-left:25px;width:405px;background-color:#A8A1A166;border:none;border-radius:5px;font-size:20px;cursor:pointer">
                                <option value="Available">Available</option>
                                <option value="Unavailable">Unavailable</option>
                            </select></br></br>
                            <input type="submit" class="buttonHoverEffect" name="createSubmit" style="display:inline-block;width:585px;height:40px;cursor:pointer;background-color:#5BBDE4CC;border-radius:10px" value="Create item">
                        </div>
                    </form>
                    </div>   
                    
                    <div style="float:left;margin-left:200px;">
                        <div class="sideBar" id="viewMenuItemDIV" style="display:none;width:800px;">
                            <text style="color:#437E96;font-size:40px;">
                                View menu item                               
                            </text></br></br></br>
                        </div>
                    </div>  
                    
                    <div style="float:left;margin-left:200px;">
                        <div class="sideBar" id="deleteMenuItemDIV" style="display:none;width:800px;">
                            <text style="color:#437E96;font-size:40px;">
                                Delete menu item                               
                            </text></br></br></br>
                        </div>
                    </div>    

                    <div style="float:left;margin-left:200px;">
                        <div class="sideBar" id="searchMenuItemDIV" style="display:none;width:800px;">
                            <text style="color:#437E96;font-size:40px;">
                                Search menu item                               
                            </text></br></br></br>
                        </div>
                    </div>
                </div>
                
                <div id="couponTab">
                    <div style="float:left;margin-left:200px;">
                        <div class="sideBar" id="createCouponCodeDIV" style="display:none;width:800px;">
                            <text style="color:#437E96;font-size:40px;">
                                Create coupon code                               
                            </text></br></br></br>
                        </div>
                    </div>   
                    
                    <div style="float:left;margin-left:200px;">
                        <div class="sideBar" id="viewCouponCodeDIV" style="display:none;width:800px;">
                            <text style="color:#437E96;font-size:40px;">
                                View coupon code                              
                            </text></br></br></br>
                        </div>
                    </div>  
                    
                    <div style="float:left;margin-left:200px;">
                        <div class="sideBar" id="deleteCouponCodeDIV" style="display:none;width:800px;">
                            <text style="color:#437E96;font-size:40px;">
                                Delete coupon code                              
                            </text></br></br></br>
                        </div>
                    </div>    

                    <div style="float:left;margin-left:200px;">
                        <div class="sideBar" id="searchCouponCodeDIV" style="display:none;width:800px;">
                            <text style="color:#437E96;font-size:40px;">
                                Search coupon code                            
                            </text></br></br></br>
                        </div>
                    </div>
                </div>

                <div id="reservationTab">
                    <div style="float:left;margin-left:200px;">
                        <div class="sideBar" id="createReservationDIV" style="display:none;width:800px;">
                            <text style="color:#437E96;font-size:40px;">
                                Create reservation                               
                            </text></br></br></br>
                        </div>
                    </div>   
                    
                    <div style="float:left;margin-left:200px;">
                        <div class="sideBar" id="viewReservationDIV" style="display:none;width:800px;">
                            <text style="color:#437E96;font-size:40px;">
                                View reservation                              
                            </text></br></br></br>
                        </div>
                    </div>  
                    
                    <div style="float:left;margin-left:200px;">
                        <div class="sideBar" id="deleteReservationDIV" style="display:none;width:800px;">
                            <text style="color:#437E96;font-size:40px;">
                                Delete reservation                              
                            </text></br></br></br>
                        </div>
                    </div>    

                    <div style="float:left;margin-left:200px;">
                        <div class="sideBar" id="searchReservationDIV" style="display:none;width:800px;">
                            <text style="color:#437E96;font-size:40px;">
                                Search reservation                             
                            </text></br></br></br>
                        </div>
                    </div>
                </div>

                <div id="orderTab">
                    <div style="float:left;margin-left:200px;">
                        <div class="sideBar" id="createOrderDIV" style="display:none;width:800px;">
                            <text style="color:#437E96;font-size:40px;">
                                Create order                               
                            </text></br></br></br>
                        </div>
                    </div>   
                    
                    <div style="float:left;margin-left:200px;">
                        <div class="sideBar" id="viewOrderDIV" style="display:none;width:800px;">
                            <text style="color:#437E96;font-size:40px;">
                                View order                             
                            </text></br></br></br>
                        </div>
                    </div>  
                    
                    <div style="float:left;margin-left:200px;">
                        <div class="sideBar" id="deleteOrderDIV" style="display:none;width:800px;">
                            <text style="color:#437E96;font-size:40px;">
                                Delete order                             
                            </text></br></br></br>
                        </div>
                    </div>    

                    <div style="float:left;margin-left:200px;">
                        <div class="sideBar" id="searchOrderDIV" style="display:none;width:800px;">
                            <text style="color:#437E96;font-size:40px;">
                                Search order                            
                            </text></br></br></br>
                        </div>
                    </div>
                </div>
            </div>
    </body>
</html>