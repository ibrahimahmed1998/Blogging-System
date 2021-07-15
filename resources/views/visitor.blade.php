<!DOCTYPE html><html><head><title>test</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href={{asset('css/article.css')}}>
    <script src={{'js/logout.js' }}></script>
    <script src={{'js/addcomment.js' }}></script>
    <script src={{'js/list.js' }}></script>


</head><body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Articles Area</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav" >
                <li class="nav-item">
                    <div class="dropdown">
                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            Filter By
                        </a>
                        <ul id="list" class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li id="0" ><a class="dropdown-item" href="#">List All </a></li>
                            <li id="1" ><a class="dropdown-item" href="#">Science</a></li>
                            <li id="2" ><a class="dropdown-item" href="#">Tech</a></li>
                            </ul>
                        </div>
                </li>
                <li class="nav-item">   <a class="nav-link" href="/">Home</a> </li>
                <li class="nav-item"> <a class="nav-link" id="logout"  href="#">Logout</a> </li>
            </ul>
</div></div></nav>

    <div id="here" style=" margin-left:30%; margin-right:50%; margin-top:1%; margin-bottom:1%; "></div>

    <script type="text/javascript">
        var token = localStorage.getItem("token");        var filter = 0 ;

        $('#logout').click(function(event){   event.preventDefault();  logout(token); });

        $("#list li").click(function(){  $(".card").remove();  filter = $(this).attr('id') ;  list();  })

</script></body></html>
