<!DOCTYPE html>
<html>
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
        <form method="POST">
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
                    <text style="color:#437E96;font-size:30px;">Item</text></br>
                    <div style="float:left;margin-left:40px;margin-top:30px;display:inline-block">
                        <div class="mouseOverEffects" style="width:150px">
                            <input type="button" id="createMenuItem" name="createMenuItem" value="Create menu item" style="padding:10px;border:0px;background-color:transparent;cursor:pointer" onclick="createMenuItemFunction()"></br>
                        </div>
                        <div class="mouseOverEffects" style="width:150px">
                            <input type="button" id="viewMenuItem" name="viewMenuItem" value="View menu item list" style="padding:10px;border:0px;background-color:transparent;cursor:pointer" onclick="viewMenuItemFunction()"></br>
                        </div>
                        <div class="mouseOverEffects" style="width:150px">
                            <input type="button" id="deleteMenuItem" name="deleteMenuItem" value="Delete menu item" style="padding:10px;border:0px;background-color:transparent;cursor:pointer" onclick="deleteMenuItemFunction()"></br>
                        </div>
                        <div class="mouseOverEffects" style="width:150px">
                            <input type="button" id="searchMenuItem" name="searchMenuItem" value="Search menu item" style="padding:10px;border:0px;background-color:transparent;cursor:pointer" onclick="searchMenuItemFunction()"></br>
                        </div></br></br>
                    </div></br>

                    <text style="color:#437E96;font-size:30px;">Coupon</text></br>
                    <div style="float:left;margin-left:40px;margin-top:30px;display:inline-block">
                        <div class="mouseOverEffects" style="width:150px">
                            <input type="button" id="createCouponCode" name="createCouponCode" value="Create coupon code" style="padding:10px;border:0px;background-color:transparent;cursor:pointer" onclick="createCouponCodeFunction()"></br>
                        </div>
                        <div class="mouseOverEffects" style="width:150px">
                            <input type="button" id="viewCouponCode" name="viewCouponCode" value="View coupon code list" style="padding:10px;border:0px;background-color:transparent;cursor:pointer" onclick="viewCouponCodeFunction()"></br>
                        </div>
                        <div class="mouseOverEffects" style="width:150px">
                            <input type="button" id="deleteCouponCode" name="deleteCouponCode" value="Delete coupon code" style="padding:10px;border:0px;background-color:transparent;cursor:pointer" onclick="deleteCouponCodeFunction()"></br>
                        </div>
                        <div class="mouseOverEffects" style="width:150px">
                            <input type="button" id="searchCouponCode" name="searchCouponCode" value="Search coupon code" style="padding:10px;border:0px;background-color:transparent;cursor:pointer" onclick="searchCouponCodeFunction()"></br>
                        </div></br></br>
                    </div></br>

                    <text style="color:#437E96;font-size:30px;">Reservation</text></br>
                    <div style="float:left;margin-left:40px;margin-top:30px;display:inline-block">
                        <div class="mouseOverEffects" style="width:150px">
                            <input type="button" id="createReservationButton" name="createReservationButton" value="Create reservation" style="padding:10px;border:0px;background-color:transparent;cursor:pointer" onclick="createReservationFunction()"></br>
                        </div>
                        <div class="mouseOverEffects" style="width:150px">
                            <input type="button" id="viewReservationButton" name="viewReservationButton" value="View reservation list" style="padding:10px;border:0px;background-color:transparent;cursor:pointer" onclick="viewReservationFunction()"></br>
                        </div>
                        <div class="mouseOverEffects" style="width:150px">
                            <input type="button" id="deleteReservationButton" name="deleteReservationButton" value="Delete reservation" style="padding:10px;border:0px;background-color:transparent;cursor:pointer" onclick="deleteReservationFunction()"></br>
                        </div>
                        <div class="mouseOverEffects" style="width:150px">
                            <input type="button" id="searchReservationButton" name="searchReservationButton" value="Search reservation" style="padding:10px;border:0px;background-color:transparent;cursor:pointer" onclick="searchReservationFunction()"></br>
                        </div></br></br>
                    </div></br>

                    <text style="color:#437E96;font-size:30px;">Order</text></br>
                    <div style="float:left;margin-left:40px;margin-top:30px;display:inline-block">
                        <div class="mouseOverEffects" style="width:150px">
                            <input type="button" id="createOrderButton" name="createOrderButton" value="Create order" style="padding:10px;border:0px;background-color:transparent;cursor:pointer" onclick="createOrderFunction()"></br>
                        </div>
                        <div class="mouseOverEffects" style="width:150px">
                            <input type="button" id="viewOrderButton" name="viewOrderButton" value="View order list" style="padding:10px;border:0px;background-color:transparent;cursor:pointer" onclick="viewOrderFunction()"></br>
                        </div>
                        <div class="mouseOverEffects" style="width:150px">
                            <input type="button" id="deleteOrderButton" name="deleteOrderButton" value="Delete order" style="padding:10px;border:0px;background-color:transparent;cursor:pointer" onclick="deleteOrderFunction()"></br>
                        </div>
                        <div class="mouseOverEffects" style="width:150px">
                            <input type="button" id="searchOrderButton" name="searchOrderButton" value="Search order" style="padding:10px;border:0px;background-color:transparent;cursor:pointer" onclick="searchOrderFunction()"></br>
                        </div></br></br>
                    </div></br>
                </div>
            </div>
        </form>
    </body>
</html>