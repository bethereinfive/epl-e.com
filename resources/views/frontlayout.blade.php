<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EPL-Earner e-commerce</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/img/logos.png') }}">
    <!-- Bootstrap CSS -->
    <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet" >
    <link href="{{ asset('frontend/css/style1.css') }}" rel="stylesheet" >
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet" >
    <link href="{{ asset('frontend/css/font-awesome.min.css') }}" rel="stylesheet" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.1.1/css/all.min.css" integrity="sha512-ioRJH7yXnyX+7fXTQEKPULWkMn3CqMcapK0NNtCN8q//sW7ZeVFcbMJ9RvX99TwDg6P8rAH2IqUSt2TLab4Xmw==" crossorigin="anonymous" referrerpolicy="no-referrer" />



    <style>
        *{
            --van-cell-group-background-color:white;
             --van-button-default-background-color:white;
             --defaltColor:#E30086;
        }

        section#bigbgs {
    background: #3F8ED3;
    padding-top: 180px;
    background-attachment: fixed;
    min-height: 100vh;
}

input:focus{
    outline: none;
}
input.input100 {
    width: 80%;
    margin: 5px auto;
    border: 0;
    border-radius: 19px;
    padding: 8px 18px;
}

form.pt-5 {
    text-align: center;
}

button.login100-form-btn {
    border: 0;
    background: red;
    font-size: 19px;
    font-weight: 600;
    color: white;
    padding: 8px 22px;
    border-radius: 32px;
    margin: 8px 0;
}
    </style>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div id="app">
        <component :is="$route.meta.layout || 'div'" >
            <router-view />
          </component>

    </div>
    <script>
console.log("{{ Auth::user() }}")

        if ("{{ Auth::user() }}") {

            const storeToken = localStorage.getItem('token');


            if(!storeToken){

                let data = {'_token': "{{ csrf_token() }}"};
                fetch("/logout", {
                method: "POST",
                headers: {'Content-Type': 'application/json'},
                body: JSON.stringify(data)
                }).then(res => {

                });

                // axios.post('/logout').then(()=>{
                //     // window.location.href = '/'
                // })
            }


        }else{

                localStorage.removeItem('token')
                localStorage.removeItem('user')
                localStorage.removeItem('userid')
                localStorage.removeItem('role')
                localStorage.removeItem('position')
        }

        </script>

    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}" ></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}" ></script>
    <script src="{{ asset('js/frontend.js?ver=1.0.5') }}"></script>



</body>
</html>
