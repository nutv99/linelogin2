<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>LIFF - LINE Front-end Framework</title>
  <style>
    body { margin: 16px }
    button, img { display: none; width: 40% }
    button { padding: 16px }
  </style>
</head>
<body>
  <h1>Page 2--</h1>
  <img id="pictureUrl" style='width:100px'>
  <div id="userdata" class="bordergray flex">
     
  </div>
  <button id="btnLogIn" onclick="logIn()">Log In</button>
  <button id="btnLogOut" onclick="logOut()">Log Out</button>
  <script src="https://static.line-scdn.net/liff/edge/2/sdk.js"></script>
  <script>
    function logOut() {
      liff.logout()
      window.location.reload()
    }
    function logIn() {

    //    liff.login({ redirectUri: 'https://helloline-111.herokuapp.com/' })
	
      liff.login()  
    }
    async function getUserProfile() {
      const profile = await liff.getProfile()
      document.getElementById("pictureUrl").style.display = "block"

      document.getElementById("pictureUrl").src = profile.pictureUrl
	  document.getElementById("userdata").innerHTML = profile.userId + '<br>';
	  document.getElementById("userdata").innerHTML += profile.displayName + '<br>';
	  document.getElementById("userdata").innerHTML += profile.statusMessage + '<br>';
	  const email = liff.getDecodedIDToken().email; 
	  document.getElementById("userdata").innerHTML += email ;


    }

    async function main() {
      await liff.init({ liffId: "1656885645-br566eM7" })
      if (liff.isInClient()) {
        getUserProfile()
      } else {
        if (liff.isLoggedIn()) {
          getUserProfile()
          document.getElementById("btnLogIn").style.display = "none"
          document.getElementById("btnLogOut").style.display = "block"
        } else {
          document.getElementById("btnLogIn").style.display = "block"
          document.getElementById("btnLogOut").style.display = "none"
        }
      }
    }

    main()
  </script>
</body>
</html>