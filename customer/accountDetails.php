<?php
require_once("ordersDB.php");
require_once("reservationDB.php");
?>
<!DOCTYPE html>
<html>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        isProfileClicked = false;

        function ordersFunction(){
            $("#divTable tr").remove(); 
            
            document.getElementById("ordersDisplay").style.display = 'inline-block';
            document.getElementById("reservationsDisplay").style.display = 'none';
            document.getElementById("accountDisplay").style.display = 'none';
            document.getElementById("promoDisplay").style.display = 'none';
            document.getElementById("notificationsDisplay").style.display = 'none';

            var dataArrays = '<?php echo json_encode($ordersArray);?>'.replaceAll('[[','[').replaceAll(']]',']').replaceAll('],',']].').replaceAll('"',"");
            var dataArray = dataArrays.split('].');
            var orderArray = [];
            var orderArrays = [];
            var dateArray = [];
            var dayArray = [];
            var timeArray = [];
            var itemArray = [];
            var tempItemArray = [];
            var tempItemsArray = [];
            var priceArray = [];
            var orderStatusArray = [];
            var actualOrderArray = [];
            const weekday = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
            var x;
            var tempString = "";
            for (x=0;x<dataArray.length;x++)
            {
                orderArray.push(dataArray[x]);
            }
            for (x=0;x<orderArray.length;x++){
                tempString = String(orderArray[x]).replaceAll('[','').replaceAll(']','');
                tempString = tempString.split(',');
                actualOrderArray.push(tempString);
            }
            for (x=0;x<actualOrderArray.length;x++)
            {
                tempItemsArray = [];
                if(actualOrderArray[x][1] == getCookie("accountID")){
                    orderArrays.push("#" + actualOrderArray[x][0]);
                    dateArray.push(actualOrderArray[x][2]);
                    timeArray.push(actualOrderArray[x][3]);
                    priceArray.push(actualOrderArray[x][4]);
                    orderStatusArray.push(actualOrderArray[x][5]);

                    var getD = new Date(actualOrderArray[x][2]);
                    dayArray.push(weekday[getD.getDay()]);

                    for(var y=7; y<18; y++){
                        var itemName;
                        switch(y){
                            case 7:
                                itemName = "HAWAIIAN SALMON";
                                break;
                            case 8:
                                itemName = "COLOURFUL GODDESS";
                                break;
                            case 9:
                                itemName = "SPICY MIXED SALMON";
                                break;
                            case 10:
                                itemName = "SHOYU TUNA SPECIAL";
                                break;
                            case 11:
                                itemName = "FULL VEGGIELICIOUS";
                                break;
                            case 12:
                                itemName = "AVOCADO SUPREME";
                                break;
                            case 13:
                                itemName = "SUMMER FLING";
                                break;
                            case 14:
                                itemName = "CHOC SWEET";
                                break;
                            case 15:
                                itemName = "CARAMEL NUTTIN";
                                break;
                            case 16:
                                itemName = "INCREDIBLE HULK";
                                break;
                            case 17:
                                itemName = "ORANGE MADNESS";
                                break;
                            case 18:
                                itemName = "SPIDEY SENSES";
                                break;
                        }
                        if(actualOrderArray[x][y] != 0){
                            tempItemsArray.push(actualOrderArray[x][y] + "x " + itemName);
                        }
                    }
                    tempItemArray.push(tempItemsArray);
                }
            }
            
            var x;
            var y;
            var tempString = "";
            var table = document.getElementById('ordersList');

            for (x=0; x<orderArrays.length; x++){
                var row = table.insertRow(x);
                var cell = row.insertCell(0);
                cell.innerHTML = '<text id="order' + String(x) + '"></text>';
            }

            var table = document.getElementById('deliveredList');

            for (x=0; x<orderArrays.length; x++){
                var row = table.insertRow(x);
                var cell = row.insertCell(0);
                cell.innerHTML = '<text id="delivered' + String(x) + '"></text>';
            }

            for (x=0; x<tempItemArray.length; x++){
                tempString = "";
                if(tempItemArray[x].length <= 1){
                    tempString = tempItemArray[x] + '</br>';
                    itemArray.push(tempString);
                }
                else{                    
                    for (y=0;y<tempItemArray[x].length; y++){
                        tempString += tempItemArray[x][y] + '</br>'; 
                    }
                    itemArray.push(tempString);
                }
            }
            var j=0;
            //for (x=0; x<orderArrays.length; x++){
            for (x=orderArrays.length-1; x>=0; x--){
                if(orderStatusArray[x] == "In-progress"){
                    document.getElementById("order"+String(j)).innerHTML = '<text style="border-radius:15px;background-color:#C7FAC9;border:0px;margin-top:2px;width:600px;padding:5px;display:inline-block">' +
                                                            '<b>Order ID:</b> '+ orderArrays[x] + '</br>' +
                                                            '<b>Date & Time:</b> '+ dateArray[x] + 
                                                            ' (' + dayArray[x] + '), ' + timeArray[x] +
                                                            '</br></br>' + itemArray[x] + '</br>' +  
                                                            '<text><b><u>Total cost: </u></b></text>' +
                                                            '<b style="float:right;">' + priceArray[x] + 
                                                            '</b></text></br>';
                }
                else{
                    document.getElementById("delivered"+String(j)).innerHTML = '<text style="border-radius:15px;background-color:#C7FAC9;border:0px;margin-top:2px;width:600px;padding:5px;display:inline-block">' +
                                                            '<b>Order ID:</b> '+ orderArrays[x] + '</br>' +
                                                            '<b>Date & Time:</b> '+ dateArray[x] + 
                                                            ' (' + dayArray[x] + '), ' + timeArray[x] +
                                                            '</br></br>' + itemArray[x] + '</br>' +  
                                                            '<text><b><u>Total cost: </u></b></text>' +
                                                            '<b style="float:right;">' + priceArray[x] + 
                                                            '</b></text></br>';
                }
                j++;
            }
        }

        function reservationsFunction(){
            $("#divTable tr").remove(); 
            document.getElementById("ordersDisplay").style.display = 'none';
            document.getElementById("reservationsDisplay").style.display = 'block';
            document.getElementById("accountDisplay").style.display = 'none';
            document.getElementById("promoDisplay").style.display = 'none';
            document.getElementById("notificationsDisplay").style.display = 'none';

            var dataArrays = '<?php echo json_encode($reservationsArray);?>'.replaceAll('[[','[').replaceAll(']]',']').replaceAll('],',']].').replaceAll('"',"");
            var dataArray = dataArrays.split('].');
            var reservationArray = [];
            var reservationArrays = [];
            var dateArray = [];
            var dayArray = [];
            var timeArray = [];
            var seatsArray = [];
            var paxArray = [];
            var idArray = [];
            var actualReservationArray = [];
            const weekday = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
            var x;
            var tempString = "";
            for (x=0;x<dataArray.length;x++)
            {
                reservationArray.push(dataArray[x]);
            }
            for (x=0;x<reservationArray.length;x++){
                tempString = String(reservationArray[x]).replaceAll('[','').replaceAll(']','');
                tempString = tempString.split(',');
                actualReservationArray.push(tempString);
            }
            for (x=0;x<actualReservationArray.length;x++)
            {
                if(actualReservationArray[x][1] == getCookie("accountID")){
                    reservationArrays.push(actualReservationArray[x][0]);
                    dateArray.push(actualReservationArray[x][6]);
                    paxArray.push(actualReservationArray[x][8]);
                    idArray.push(actualReservationArray[x][0]);
                    seatsArray.push(actualReservationArray[x][9]);
                    var getD = new Date(actualReservationArray[x][6]);
                    dayArray.push(weekday[getD.getDay()]);

                    var timeValue;
                    switch(actualReservationArray[x][7]){
                        case 'timeSlot1':
                            timeValue = "11:00";
                            break;
                        case 'timeSlot2':
                            timeValue = "12:00";
                            break;
                        case 'timeSlot3':
                            timeValue = "13:00";
                            break;
                        case 'timeSlot4':
                            timeValue = "14:00";
                            break;
                        case 'timeSlot5':
                            timeValue = "15:00";
                            break;
                        case 'timeSlot6':
                            timeValue = "16:00";
                            break;
                        case 'timeSlot7':
                            timeValue = "17:00";
                            break;
                        case 'timeSlot8':
                            timeValue = "18:00";
                            break;
                        case 'timeSlot9':
                            timeValue = "19:00";
                            break;
                        case 'timeSlot10':
                            timeValue = "20:00";
                            break;
                    }
                    timeArray.push(timeValue);
                }
            }

            var x;
            var y;
            var tempString = "";
            var table = document.getElementById('reservationsList');

            for (x=0; x<reservationArrays.length; x++){
                var row = table.insertRow(x);
                var cell = row.insertCell(0);
                cell.innerHTML = '<text id="reservation' + String(x) + '"></text>';
            }

            var j=0;
            for (x=reservationArrays.length-1; x>=0; x--){
                document.getElementById("reservation"+String(j)).innerHTML = '<text style="border-radius:15px;background-color:#A0D5EB;border:0px;margin-top:2px;width:600px;padding:5px;display:inline-block">' +
                                                        '<b>Reservation ID:</b> ' + idArray[x] + '</br></br>' +
                                                        '<b>Date & Time:</b> '+ dayArray[x] + ', ' + dateArray[x] + ', ' + timeArray[x] + '</br></br>' +
                                                        '<b>Pax amount:</b> ' + paxArray[x] + '</br></br>' +
                                                        '<b>Seating area(s):</b> ' + seatsArray[x] + '</text></br>'
                                                        ;     
                j++;           
            }
        }

        function accountFunction(){
            document.getElementById("ordersDisplay").style.display = 'none';
            document.getElementById("reservationsDisplay").style.display = 'none';
            document.getElementById("accountDisplay").style.display = 'block';
            document.getElementById("promoDisplay").style.display = 'none';
            document.getElementById("notificationsDisplay").style.display = 'none';
        }

        function promoFunction(){
            document.getElementById("ordersDisplay").style.display = 'none';
            document.getElementById("reservationsDisplay").style.display = 'none';
            document.getElementById("accountDisplay").style.display = 'none';
            document.getElementById("promoDisplay").style.display = 'block';
            document.getElementById("notificationsDisplay").style.display = 'none';
        }

        function notificationsFunction(){
            document.getElementById("ordersDisplay").style.display = 'none';
            document.getElementById("reservationsDisplay").style.display = 'none';
            document.getElementById("accountDisplay").style.display = 'none';
            document.getElementById("promoDisplay").style.display = 'none';
            document.getElementById("notificationsDisplay").style.display = 'block';
        }

        function reminderFunction(){
            document.getElementById("ordersDisplay").style.display = 'none';
            document.getElementById("reservationsDisplay").style.display = 'none';
            document.getElementById("accountDisplay").style.display = 'none';
            document.getElementById("promoDisplay").style.display = 'none';
            document.getElementById("notificationsDisplay").style.display = 'none';
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

        function goToUpdateFunction(){
            document.getElementById('accountCustomerTab').style.display = "none";
            document.getElementById('updateAccountTab').style.display = "block";
        }

        function deleteAccountFunction(){

        }

        function returnToFunction(){
            document.getElementById('accountCustomerTab').style.display = "block";
            document.getElementById('updateAccountTab').style.display = "none";
        }

        function updateAccountFunction(){

        }
    </script>
    <style>
        .mouseOverEffects:hover{
            border-left : 3px solid #437E96;
        }

        .buttonEffects{
            border: none;
        }

        .buttonEffects:hover{
            border: 2px solid black;
            display: inline-block;
        }

        .example::-webkit-scrollbar {
            display: none;
        }

        /* Hide scrollbar for IE, Edge and Firefox */
        .example {
            -ms-overflow-style: none;  /* IE and Edge */
        }
    </style>
    <body onload="profileDetails();" style="background-color:#FEF2E5">
        <form >
            <div style="width:1100px;margin-left:auto;margin-right:auto;">
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
                    <a href="customer_landingPage.php"><img src="../MoshiQ2 IMG Assets/Logo.png" style="margin-left:0px;width:500px;height:200px;display:inline-block"></a></br></br>
                </div>

                <div style="float:left;margin-left:30px;display:inline-block">
                    <text style="color:#437E96;font-size:30px">ACCOUNT</text></br>
                    <div style="float:left;margin-left:40px;margin-top:30px;display:inline-block">
                    <div class="mouseOverEffects" style="width:120px">
                        <input type="button" id="ordersButton" name="ordersButton" value="Orders" style="padding:10px;border:0px;background-color:transparent;cursor:pointer;width:120px;text-align:left;" onclick="ordersFunction()"></br>
                    </div>

                    <div class="mouseOverEffects" style="width:120px">
                        <input type="button" id="reservationsButton" name="reservationsButton" value="Reservations" style="padding:10px;border:0px;background-color:transparent;cursor:pointer;width:120px;text-align:left" onclick="reservationsFunction()"></br>
                    </div>

                    <div class="mouseOverEffects" style="width:120px">
                        <input type="button" id="accountButton" name="accountButton" value="Account" style="padding:10px;border:0px;background-color:transparent;cursor:pointer;width:120px;text-align:left" onclick="accountFunction()"></br>
                    </div>

                    <div class="mouseOverEffects" style="width:120px">
                        <input type="button" id="promoButton" name="promoButton" value="Promo Codes" style="padding:10px;border:0px;background-color:transparent;cursor:pointer;width:120px;text-align:left" onclick="promoFunction()"></br>
                    </div>

                    <div class="mouseOverEffects" style="width:120px">
                        <input type="button" id="notificationsButton" name="notificationsButton" value="Notifications" style="padding:10px;border:0px;background-color:transparent;cursor:pointer;width:120px;text-align:left" onclick="notificationsFunction()"></br>
                    </div>
                </div>
                </div>

                <div style="float:left;margin-left:300px;">
                    <div id="ordersDisplay" style="display:none;width:600px;">
                        <text style="color:#437E96;font-size:30px;">
                            Orders                               
                        </text>
                        </br></br>
                        <text style="font-size:20px;color:black;display:inline-block">
                            Keep track of your upcoming and past orders all in one place.
                        </text>
                        </br></br></br>
                        <text style="color:#437E96;font-size:30px;">
                            Upcoming Orders                               
                        </text>
                        </br></br>
                        <div id="divTable" class="example" style="overflow-y:scroll;width:650px">
                            <table id="ordersList"></table>
                        </div>                
                        </br></br></br>
                        <text style="color:#437E96;font-size:30px;">
                            Past Orders                               
                        </text>
                        <div id="divTable" class="example" style="overflow-y:scroll;width:650px">
                            <table id="deliveredList"></table>
                        </div> 
                    </div>

                    <div id="reservationsDisplay" style="display:none;width:600px;">
                        <text style="color:#437E96;font-size:30px;">
                            Reservations                              
                            </text>
                        </br></br>
                        <text style="font-size:20px;color:black;display:inline-block">
                            Keep track of your reservations all in one place.
                        </text>
                        </br></br>
                        <div id="divTable" class="example" style="overflow-y:scroll;width:650px">
                            <table id="reservationsList"></table>
                        </div>                
                    </div>

                    <div id="accountDisplay" style="display:none">
                        <div id="accountCustomerTab" style="display:block">
                            <text style="color:#437E96;font-size:30px;">
                                Account - Customer                         
                            </text>
                            </br></br>
                            <label style="width:100px;display:inline-block;text-align:left;font-size:20px;background-color:#3280F466;padding-left:5px">Email: </label><input type="text" style="margin-left:20px;background-color:#A8A1A166;display:inline-block;border:none;border-radius:5px;font-size:20px" placeholder="Enter email address"></br></br>
                            <label style="width:100px;display:inline-block;text-align:left;font-size:20px;background-color:#3280F466;padding-left:5px">Name: </label><input type="text" style="margin-left:20px;background-color:#A8A1A166;display:inline-block;border:none;border-radius:5px;font-size:20px" placeholder="Enter name"></br></br>
                            <label style="width:100px;display:inline-block;text-align:left;font-size:20px;background-color:#3280F466;padding-left:5px">Number: </label><input type="text" style="margin-left:20px;background-color:#A8A1A166;display:inline-block;border:none;border-radius:5px;font-size:20px" placeholder="Enter number"></br></br></br></br>
                            <input type="button" class="buttonEffects" style="font-size:15px;width:150px;padding:10px;background-color:#5BBDE4CC;border-radius:10px;cursor:pointer" value="Update account" onclick="goToUpdateFunction()">
                            <input type="button" class="buttonEffects" style="margin-left:50px;font-size:15px;width:150px;padding:10px;background-color:#F80000CC;border-radius:10px;cursor:pointer" value="Delete account" onclick="deleteAccountFunction()">
                        </div>

                        <div id="updateAccountTab" style="display:none">
                            <text style="color:#437E96;font-size:30px;">
                                Update account                          
                            </text>
                            </br></br>                       
                            <label style="width:100px;display:inline-block;text-align:left;font-size:20px;background-color:#3280F466;padding-left:5px">Email: </label><input type="text" style="margin-left:20px;background-color:#A8A1A166;display:inline-block;border:none;border-radius:5px;font-size:20px" placeholder="Enter email address"></br></br>
                            <label style="width:100px;display:inline-block;text-align:left;font-size:20px;background-color:#3280F466;padding-left:5px">Name: </label><input type="text" style="margin-left:20px;background-color:#A8A1A166;display:inline-block;border:none;border-radius:5px;font-size:20px" placeholder="Enter name"></br></br>
                            <label style="width:100px;display:inline-block;text-align:left;font-size:20px;background-color:#3280F466;padding-left:5px">Number: </label><input type="text" style="margin-left:20px;background-color:#A8A1A166;display:inline-block;border:none;border-radius:5px;font-size:20px" placeholder="Enter number"></br></br>
                            <label style="width:100px;display:inline-block;text-align:left;font-size:20px;background-color:#3280F466;padding-left:5px">Password: </label><input type="text" style="margin-left:20px;background-color:#A8A1A166;display:inline-block;border:none;border-radius:5px;font-size:20px" placeholder="Enter password"></br></br>
                            <input type="button" class="buttonEffects" style="font-size:15px;width:150px;padding:10px;background-color:#5BBDE4CC;border-radius:10px;cursor:pointer" value="Back" onclick="returnToFunction()">
                            <input type="button" class="buttonEffects" style="margin-left:50px;font-size:15px;width:150px;padding:10px;background-color:#F80000CC;border-radius:10px;cursor:pointer" value="Update account" onclick="updateAccountFunction()">
                        </div>
                    </div>

                    <div id="promoDisplay" style="display:none">
                        <text style="color:#437E96;font-size:30px;">
                            Promo Codes                             
                        </text>
                        </br>
                        <text style="font-size:20px;color:black">
                            Keep track of your upcoming and past orders all in one place.
                        </text>
                    </div>

                    <div id="notificationsDisplay" style="display:none">
                        <text style="color:#437E96;font-size:30px;">
                            Notifications                              
                        </text>
                        </br>
                        <text style="font-size:20px;color:black">
                            Keep track of your upcoming and past orders all in one place.
                        </text>
                    </div>
                </div>         
            </div>
        </form>
    </body>
</html>