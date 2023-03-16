<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel 8 Phone Number OTP Auth Example</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5" style="max-width: 550px">
        <button id="cap_controller" class="btn btn-link mt-3">
             @if(isset($_GET['captcha']))
             without Recaptcha Verifier
             @else
             with Recaptcha Verifier
             @endif
        </button>
        <div class="alert alert-danger" id="error" style="display: none;"></div>
        <h3>Add Phone Number</h3>
        <div class="alert alert-success" id="successAuth" style="display: none;"></div>
        <form>
            <label>Phone Number:</label>
            <input type="text" id="number" class="form-control" placeholder="+91 ********">
            <div id="recaptcha-container"></div>
            <button type="button" class="btn btn-primary mt-3" onclick="sendOTP();">Send OTP</button>
        </form>

        <div id="verify" class="mb-5 mt-5 d-none">
            <h3>Add verification code</h3>
            <div class="alert alert-success" id="successOtpAuth" style="display: none;"></div>
            <form>
                <input type="text" id="verification" class="form-control" placeholder="Verification code" maxlength="6">
            </form>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Firebase App (the core Firebase SDK) is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script>

    <script>
        var firebaseConfig = {
            apiKey: "AIzaSyCQwr0km5pe5vRzPEpeEwQtaUaj1_ih4zE",
            authDomain: "verify-mob.firebaseapp.com",
            databaseURL: "https://verify-mob.firebaseio.com",
            projectId: "verify-mob",
            storageBucket: "verify-mob.appspot.com",
            messagingSenderId: "895785357662",
            appId: "1:895785357662:web:60d196706d24ef89a2bfcf"
        };
        firebase.initializeApp(firebaseConfig);
    </script>
    <script type="text/javascript">
        window.onload = function () {
            render();
        };
        function render() {
            @if(isset($_GET['captcha']) ) 
                window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container');
                recaptchaVerifier.render();
            @else
                window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier(
                    "recaptcha-container",
                    {
                        size: "invisible",
                        callback: function(response) {
                            submitPhoneNumberAuth();
                        }
                    }
                );
            @endif
        }
        function sendOTP() {
            var number = $("#number").val();
            firebase.auth().signInWithPhoneNumber(number, window.recaptchaVerifier).then(function (confirmationResult) {
                window.confirmationResult = confirmationResult;
                coderesult = confirmationResult;
                console.log(coderesult);
                $("#successAuth").text("Message sent");
                $("#successAuth").show();
                $('#verify').removeClass('d-none');
            }).catch(function (error) {
                $("#error").text(error.message);
                $("#error").show();
            });
        }
        function verify() {
            var code = $("#verification").val();
            coderesult.confirm(code).then(function (result) {
                var user = result.user;
                $("#error").text('');
                $("#error").hide();
                $("#successOtpAuth").text("Auth is successful");
                $("#successOtpAuth").show();
            }).catch(function (error) {
                $("#error").text(error.message);
                $("#error").show();
            });
        }
    $( document ).ready(function() {
        $("#verification").keyup(function(){
            if( $(this).val().toString().length == 6)verify();
        });
        $("#cap_controller").on('click',function(){
            @if(isset($_GET['captcha']) ) 
            window.location.href  ='/';
            @else
            window.location.href  ='/?captcha';
            @endif ;
        });
    });
    </script>
</body>
</html>