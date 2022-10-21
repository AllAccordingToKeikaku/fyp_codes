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
            <div style="width:1200px;margin-left:auto;margin-right:auto;background-color:#FEF2E5;">
                <img src="../MoshiQ2 IMG Assets/Logo.png" style="float:left;margin-left:0px;width:500px;height:200px;display:block">
                <div style="padding-top:90px;">
                    <span class="mouseOverEffects" style="width:auto;margin-left:150px;cursor:pointer;">
                        <input type="button" value="HOME" style="border:0px;font-size:14;background-color:transparent;cursor:pointer;" onclick="homeFunction()">
                    </span>
                    <span class="mouseOverEffects" style="width:auto;cursor:pointer;">
                        <input type="button" value="DELIVERY" style="border:0px;font-size:14;background-color:transparent;cursor:pointer;" onclick="deliveryFunction()">
                    </span>
                    <span class="mouseOverEffects" style="width:auto;cursor:pointer;">
                        <input type="button" value="RESERVATIONS" style="border:0px;font-size:14;background-color:transparent;cursor:pointer;" onclick="reservationFunction()">
                    </span>
                    <span class="mouseOverEffects" style="width:auto;cursor:pointer;">
                        <input type="button" value="TRAFFIC" style="border:0px;font-size:14;background-color:transparent;cursor:pointer;">
                    </span>
                    <span class="mouseOverEffects" style="width:auto;cursor:pointer;">
                        <input type="button" value="MENU" style="border:0px;font-size:14;background-color:transparent;cursor:pointer;">
                    </span>
                    <span style="margin-left:30px">
                        <img src="../MoshiQ2 IMG Assets/Homepage Profile Icon.png" style="height:40px;width:auto">
                    </span>
                    <span class="mouseOverEffects" style="width:auto;cursor:pointer;">
                        <input type="button" value="sign in" style="border:0px;font-size:14;background-color:transparent;cursor:pointer;" onclick="signInFunction()">
                    </span>
                </div>
                <div>
                    <center><img src="../MoshiQ2 IMG Assets/homePage.png" style="display:block;width:80%;height:auto;padding:50px"></center>
                </div>

                <div id="aboutUs" style="height:700px;width:auto;background-color:#F1FFB7;">
                    <center><img src="../MoshiQ2 IMG Assets/philosophy.png" style="display:inline-block;width:50%;height:auto;background:transparent;margin-top:50px"></center>
                    <center><text style="width:70%;display:block;margin-top:50px;font-size:25px">Totally redefining food culture and comfort food with its healthier option of 100% plant based menu, MoshiQ2 is a 100% plant-based poke bowl with a full sensory experience. 
                        From smelling the aroma of your favourite food, hearing the crackle of goodness, to tasting the perfect combination of our farm fresh, protein-packed greens. 
                        We have fused the concept of a sustainable, convenient and yet delicious options that are nutritious and great in taste!</text></center>
                        <center><img src="../MoshiQ2 IMG Assets/dietryType.png" style="display:block;width:50%;height:auto;background:transparent;margin-top:50px"></center>
                </div>
                <div style="height:auto;width:100%;background-color:#FFE5C9;">
                    <center><img src="../MoshiQ2 IMG Assets/excitingPromos.png" style="display:inline-block;width:50%;height:auto;background:transparent;margin-top:50px"></center></br>
                    <center><img src="../MoshiQ2 IMG Assets/awaits.png" style="display:inline-block;height:auto;background:transparent;margin-left:40%"></center>
                </div>
                <div id="promotions" style="width:auto;">
                    <img src="../MoshiQ2 IMG Assets/Promo 1.png" style="float:left;width:50%;height:800px;display:inline-block">
                    <img src="../MoshiQ2 IMG Assets/Promo 2.png" style="width:50%;height:800px;display:inline-block">
                </div>
            </div>
        </form>
    </body>
</html>