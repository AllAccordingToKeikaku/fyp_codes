<?php
require_once("inboxDB.php");
?>
<!DOCTYPE html>
<html>
    <script>
        var isProfileClicked = false;
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
            window.location.replace("../customer/landingPage.php");
        }

        function displayInbox(){
            var slotArrays = '<?php echo json_encode($dataArray);?>'.replaceAll('[[','[').replaceAll(']]',']').replaceAll('],',']].').replaceAll('"',"");;
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
            var table = document.getElementById("displayInfo");
            y = 0;
            for (x=actualInboxArray.length-1;x>0;x--)
            {
                var row = table.insertRow(y);
                y++;
                var cell = row.insertCell(0);
                cell.innerHTML = '<text id="inboxListing' + String(x) + '"></text>';
                document.getElementById("inboxListing"+String(x)).innerHTML = createInboxListing(actualInboxArray[x][0], actualInboxArray[x][1].replaceAll('~~', ','), actualInboxArray[x][2]);          
            }   
        }
        function createInboxListing(status, description, date){
            var listing='<div style="border-radius:15px;background-color:#A8A1A166;border:0px;margin-top:2px;padding:5px;width:1025px">' +
                            '<text style="vertical-align:top;margin-right:auto;display:inline-block;width:100px;">' + status + '</text>' +
                            '<text style="margin-left:210px;margin-right:auto;display:inline-block;width:400px">' + description + '</text>' +
                            '<text style="vertical-align:top;margin-left:110px;margin-right:auto;display:inline-block;width:200px">' + date + '</text>' +
                        '</div>'
            return listing;
        }
    </script>
    <style>
        .mouseOverEffects{
            border-left : 3px solid white;
        }

        .mouseOverEffects:hover{
            border-left : 3px solid #437E96;
        }

        .buttonEffects {
          border: none;
          margin-top:20px;
          margin-left:auto;
          margin-right:auto;
          font-size: 20px;
          text-align: center;
          display: inline-block;
          background-color:#5BBDE4CC;
          border-radius:15px;
          width:200px;
          height:70px;
          font-size:35px;
          display:block;
        }
        .buttonEffects:hover {
                border: 2px solid black;
                cursor:pointer;
        }

        .example::-webkit-scrollbar {
            display: none;
        }

        /* Hide scrollbar for IE, Edge and Firefox */
        .example {
            -ms-overflow-style: none;  /* IE and Edge */
        }
    </style>
    <body onload="profileDetails();displayInbox()">
        <form>
            <div style="width:1100px;margin-left:auto;margin-right:auto">
                <div style="float:right">
                    <img src="../MoshiQ2 Assets/Profile Icon.png" style="display:block;margin-left:auto;width:70px;height:auto" onclick="profileClicked()"></br>
                    <div id="displayProfile" name="displayProfile" hidden>
                        <text style="margin-left:10%;margin-right:auto;display:inline-block" id="accountNameDetails"></text></br>
                        <input type="button" id="accountDrop" name="accountDrop" value="Account &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&#x25B2;" style="color:gray;margin-left:10px;margin-top:5px;height:30px;" onclick="clickedDrop()">
                        <input type="button" id="accountCollapse" name="accountCollapse" value="Account &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&#x25BC;" style="color:gray;margin-left:10px;margin-top:5px;height:30px;" onclick="clickedCollapse()" hidden>
                        <input type="button" id="accountSignOut" name="accountSignOut" value="Sign out &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;" style="margin-left:10px;margin-right:auto;margin-top:5px;width:188px;height:30px;" onclick="signOut()" hidden>
                    </div>
                </div>

                <div>
                    <img src="../MoshiQ2 Assets/Logo.png" style="margin-left:0px;width:500px;height:200px;display:block"></br>
                </div>

                <div>
                    <text style="margin-left:30%;margin-right:auto;display:inline-block;font-size:40px">INBOX</text>
                </div></br>

                <div style="background-color:#3280F466;margin-left:5%;">
                    <text style="margin-right:auto;display:inline-block;font-size:30px;width:100px">Status</text>
                    <text style="margin-left:210px;margin-right:auto;display:inline-block;font-size:30px;width:400px;">Description</text>
                    <text style="margin-left:110px;margin-right:auto;display:inline-block;font-size:30px;width:200px;">Date</text>
                </div>
                <div class="example" style="margin-left:5%;font-size:20px;height:300px;overflow:auto;">
                    <table id="displayInfo">
                    </table>
                </div>
                <input class="buttonEffects" type="button" value="Back">
            </div>
        </form>
    </body>
</html>