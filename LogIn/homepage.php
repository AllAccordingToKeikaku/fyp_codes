<!DOCTYPE html>
<html>
    <script>
        function reservationFunction(){
            window.location.replace("../reservation/reservation_details.php");
        }

        function deliveryFunction(){
            window.location.replace("../customer/customer_landingPage.php");
        }

        function homeFunction(){
            window.location.replace("../LogIn/homePage.php");
        }

        function signInFunction(){
            window.location.replace("../LogIn/logInScreen.php");
        }
    </script>
    <style>
        .mouseOverEffects:hover{
            border-bottom : 3px solid #437E96;
            display: inline-block;
        }
    </style>
    <body>
        <form>
            <div style="width:1200px;margin-left:auto;margin-right:auto;">
                <img src="../MoshiQ2 Assets/Logo.png" style="float:left;margin-left:0px;width:500px;height:200px;display:block">
                <div style="padding-top:90px;">
                    <span class="mouseOverEffects" style="width:auto;margin-left:150px;cursor:pointer;">
                        <input type="button" value="HOME" style="border:0px;font-size:14;background-color:white;cursor:pointer;" onclick="homeFunction()">
                    </span>
                    <span class="mouseOverEffects" style="width:auto;cursor:pointer;">
                        <input type="button" value="DELIVERY" style="border:0px;font-size:14;background-color:white;cursor:pointer;" onclick="deliveryFunction()">
                    </span>
                    <span class="mouseOverEffects" style="width:auto;cursor:pointer;">
                        <input type="button" value="RESERVATIONS" style="border:0px;font-size:14;background-color:white;cursor:pointer;" onclick="reservationFunction()">
                    </span>
                    <span class="mouseOverEffects" style="width:auto;cursor:pointer;">
                        <input type="button" value="TRAFFIC" style="border:0px;font-size:14;background-color:white;cursor:pointer;">
                    </span>
                    <span class="mouseOverEffects" style="width:auto;cursor:pointer;">
                        <input type="button" value="MENU" style="border:0px;font-size:14;background-color:white;cursor:pointer;">
                    </span>
                    <span style="margin-left:30px">
                        <img src="../MoshiQ2 Assets/Homepage Profile Icon.png" style="height:40px;width:auto">
                    </span>
                    <span class="mouseOverEffects" style="width:auto;cursor:pointer;">
                        <input type="button" value="sign in" style="border:0px;font-size:14;background-color:white;cursor:pointer;" onclick="signInFunction()">
                    </span>
                </div>
                <div>
                    <img src="../MoshiQ2 Assets/homePage.png" style="display:block;width:100%;height:auto;">
                </div>

                <div id="aboutUs" style="height:700px;width:auto;border:1px solid black;margin-top:10px">
                    <center>About Us</center>
                </div>

                <div id="promotions" style="width:auto;margin-top:10px">
                    <img src="../MoshiQ2 Assets/Promo 1.png" style="float:left;width:50%;height:auto;display:inline-block">
                    <img src="../MoshiQ2 Assets/Promo 2.png" style="width:50%;height:auto;display:inline-block">
                </div>
            </div>
        </form>
    </body>
</html>