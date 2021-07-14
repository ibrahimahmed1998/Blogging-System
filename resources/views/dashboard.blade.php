<!DOCTYPE html>
<html>

<head>
    <title>Register Forms</title>
    <link href={{ 'regcss/main.css' }} rel="stylesheet">
    <script src={{ 'vendor/jquery/jquery.min.js' }}></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</head>

<body>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title"><b>Admin Control</b></h2>
                    <div>
                        <div class="py-12">
                            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                    <div class="p-6 bg-white border-b border-gray-200">
                                        <div class="dropdown">
                                            <p>

                                                <a id="create" class="btn btn-outline-info" data-bs-toggle="collapse"
                                                    href="#collapseExample" role="button" aria-expanded="false"
                                                    aria-controls="collapseExample">Create Artical </a>

                                                <a id="logout" class="btn btn-outline-success" href="#collapseExample"
                                                    role="button" aria-expanded="false"
                                                    aria-controls="collapseExample">Logout </a>


                                            <div class="collapse" id="collapseExample">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                        id="flexRadioDefault1" checked>
                                                    <label class="form-check-label"
                                                        for="flexRadioDefault1">Science</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                        id="flexRadioDefault2">
                                                    <label class="form-check-label"
                                                        for="flexRadioDefault2">Technology</label>
                                                </div>
                                                </p>
                                                <div id="article"
                                                    class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                                    <div style="margin:1%" class="mb-3">
                                                        <input type="text" id="title98" class="form-control"
                                                            id="exampleFormControlInput1"
                                                            placeholder="please write title of your article here ">
                                                        <br>
                                                        <textarea id="body98" class="form-control"
                                                            id="exampleFormControlTextarea1" rows="3"
                                                            placeholder="please write as you like here"></textarea>
                                                        <br>
                                                        <button id="submit" type="button"
                                                            class="btn btn-primary btn-lg">Publish</button>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

<script type="text/javascript">
    $('#submit').click(function(event) {
        event.preventDefault();

        let title98 = $("input[id=title98]").val();
        let body98 = $("textarea[id=body98]").val();
        let _token = $('meta[name="csrf-token"]').attr('content');
        let cat;

        if ($('input[id=flexRadioDefault1]').is(':checked')) {
            cat = 1
        }
        if ($('input[id=flexRadioDefault2]').is(':checked')) {
            cat = 2
        }
        var token =  "{{ csrf_token() }}";

        console.log("cat is : "+cat);
        console.log("token is: "+token);

        $.ajaxSetup({  headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });

        $.ajax({
            url: "api/auth/article",
            type: 'POST',
            beforeSend: function (xhr) {
             xhr.setRequestHeader('Authorization', 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTYyNjI3NTM0OCwiZXhwIjoxNjI2Mjc4OTQ4LCJuYmYiOjE2MjYyNzUzNDgsImp0aSI6Ims0dmxLcG5oUHJVUTVrTTQiLCJzdWIiOjEsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.FkvIlYRa49PmwwPAcugt-TIABmTIykJhPMkM7Qv7i_A');
             },

            data: {
                title: title98,
                body: body98,
                sub_title: "test",
                _token:token,
                category: cat,
            },


            success: function(response) {
                // alert('Article Created Successfully ...');
                console.log(response);
            },
            error: function(err) {

            var x = JSON.stringify(err);
            console.log(x);
            alert(x);
            }

        });
    });

    $('#logout').click(function(event) {
        event.preventDefault();

        let token = "0";

        $.ajax({

             success: function(response) {
                 alert('Logout Successfully ...');
                 window.location.href = '/';
                 console.log(response);
            }
        });
    });

</script></body></html>
