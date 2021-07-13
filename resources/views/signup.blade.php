<!DOCTYPE html> <html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register Forms</title>
    <link href={{ asset('vendor/mdi-font/css/material-design-iconic-font.min.css') }} rel="stylesheet" media="all">
    <link href={{ asset('vendor/font-awesome-4.7/css/font-awesome.min.css') }} rel="stylesheet" media="all">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href={{ 'vendor/select2/select2.min.css' }}rel="stylesheet" media="all">
    <link href={{ 'vendor/datepicker/daterangepicker.css' }} rel="stylesheet" media="all">
    <link href={{ 'regcss/main.css' }} rel="stylesheet" media="all">
</head>
<body>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680"><div class="card card-4"><div class="card-body">
                <h2 class="title"><b>Registration Form<b></h2>

                    <form>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">first name</label>
                                    <input class="input--style-4" type="text" name="fname" required >
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">last name</label>
                                    <input class="input--style-4" type="text" name="lname" required >
                                </div>
                            </div>
                        </div>

                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Email</label>
                                    <input class="input--style-4" type="email" name="email" required > </div>

                                <div class="input-group">
                                    <label class="label">password</label>
                                    <input class="input--style-4" type="password" name="password" required > </div>
                            </div>

                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Phone Number</label>
                                    <input class="input--style-4" type="text" name="phone" required > </div>
                            </div>
                        </div>
                        <div class="p-t-15">
                            <button id="submit" class="btn btn--radius-2 btn--blue" type="submit">Submit</button>
                            <button type="button" class="btn btn--radius-2 btn--blue"onclick="window.location.href='/'">back</button>
                        </div>
                    </div>
                </form></div></div></div></div>

    <script src={{ 'vendor/jquery/jquery.min.js'}}></script>
    <script src={{ 'vendor/select2/select2.min.js' }}></script>
    <script src={{ 'vendor/datepicker/moment.min.js' }}></script>
    <script src={{ 'vendor/datepicker/daterangepicker.js' }}></script>

    <script type="text/javascript">
    $('#submit').click(function(event){
        event.preventDefault();

        let fn = $("input[name=fname]").val();
        let ln = $("input[name=lname]").val();
        let phone1 = $("input[name=phone]").val();
        let email1 = $("input[name=email]").val();
        let pass = $("input[name=password]").val();

    // $.ajaxSetup({  headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });

        $.ajax({
            url:  "api/auth/add_user"  ,
            type: 'POST',
            data:{ fname:fn,  lname:ln, phone:phone1,  email:email1, password:pass   },

            success:function(response) {  alert('Joined Successfully ^_^ ') ;   var w = window.open('/')  },

            error: function(response){ var x =JSON.stringify(response) ; alert(x); } })
        })
</script></body></html>
