<!DOCTYPE html><html><head><title>test</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href={{asset('css/article.css')}}>
    <script src={{'js/logout.js' }}></script>

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
        var token = localStorage.getItem("token");
        var filter = 0 ;

        $('#logout').click(function(event){   event.preventDefault();

            $('#logout').click(function(event) {
            event.preventDefault();
            var token = localStorage.getItem("token");

               logout(token); });
        });

        $("#list li").click(function(){

            $(".card").remove();  filter = $(this).attr('id') ;

        $.ajax({  url:  "api/auth/list"  ,    type: 'get',
            headers: { 'Authorization': `Bearer ${token}` },
            success:function(response){

                var arr=[] ;
                var id ;

                if(filter==1 || filter==2){
                      arr = response.filter( (obj)=>{  return obj.category == filter; } );  }

                else{ for(let i=0;i<response.length;i++) { arr[i] = response[i]; }  }

                for (let i = 0; i < arr.length; i++)
                {
                    var div =document.createElement("div");
                        div.setAttribute("class","card") ;

                    var indiv =document.createElement("div");
                        indiv.setAttribute("class","card-body") ;
                        indiv.setAttribute("id",arr[i].id) ;    ////////////////////

                        div.appendChild(indiv);

                    var h5 =document.createElement("h5");
                        h5.setAttribute("class","card-title") ;
                        h5.innerHTML=arr[i].title;   ////////////////////
                        indiv.appendChild(h5);

                    var h6 =document.createElement("h6");
                        h6.setAttribute("class","card-subtitle mb-2 text-muted") ;
                        h6.innerHTML="test";     ////////////////////
                        indiv.appendChild(h6);

                    var p =document.createElement("p");
                        p.setAttribute("class","card-text") ;
                        p.innerHTML=arr[i].body;     ////////////////////
                        indiv.appendChild(p);

                    var bigdiv =document.createElement("div");
                        bigdiv.setAttribute("class","bg-white overflow-hidden shadow-sm sm:rounded-lg") ;

                        var anc =document.createElement("a");
                         anc.setAttribute("id",arr[i].id) ;
                         anc.setAttribute("class","btn btn-outline-info") ;
                         anc.setAttribute("data-bs-toggle","collapse") ;
                         anc.setAttribute("href","#collapseExample"+i) ;
                         anc.setAttribute("role","button") ;
                         anc.setAttribute("aria-expanded","false") ;
                         anc.setAttribute("aria-controls","collapseExample"+i) ;
                         anc.innerHTML="Comment"        ////////////////////
                         bigdiv.appendChild(anc);

                    var smalldiv =document.createElement("div");
                        smalldiv.setAttribute("class","collapse") ;
                        smalldiv.setAttribute("id","collapseExample"+i) ;
                        bigdiv.appendChild(smalldiv);

                    var artdiv =document.createElement("div");
                        artdiv.setAttribute("class","bg-white overflow-hidden shadow-sm sm:rounded-lg") ;
                        artdiv.setAttribute("id","article") ;
                        smalldiv.appendChild(artdiv);

                    var br =document.createElement("br");
                            artdiv.appendChild(br);

                    var txt =document.createElement("textarea");
                        txt.setAttribute("type","text") ;
                        txt.setAttribute("class","form-control") ;
                        txt.setAttribute("rows","3") ;
                        txt.setAttribute("id",arr[i].id) ;
                        txt.setAttribute("placeholder","please write Your Comment Here ") ;
                        artdiv.appendChild(txt);

                    var br2 =document.createElement("br");
                        artdiv.appendChild(br2);

                    var new_btn =document.createElement("button");
                        new_btn.setAttribute("class","btn btn-primary btn-lg") ;
                        new_btn.setAttribute("id",arr[i].id) ;
                        new_btn.innerHTML="Send" ;
                        artdiv.appendChild(new_btn);

                        indiv.appendChild(anc);
                        indiv.appendChild(bigdiv);

                    var x = document.getElementById("here").appendChild(div);
                }

        $('a').click(function(event){  event.preventDefault();   id = $(this).attr('id');  })

        $('.btn-lg').click(function(event){  event.preventDefault();

            myid = $(this).attr('id');

            if(myid!=id){ alert("please use send of same comment button :D "); }

            else{
                    let body = $(`textarea[id=${id}]`).val();

                    if (body ==''){ alert("No Comment Here ! ") }

                    else{
                         var token = localStorage.getItem("token");

                         $.ajax({
                            url: "api/auth/addcomment",
                            type: 'POST',   //contentType:'application/json',
                            headers: {   'Authorization': `Bearer ${token}` },
                            data:{  body:body  , articles_id:id },
                            success: function(response)
                             {
                                alert('Comment Added Successfully ...');
                                console.log(response);
                             },
                            error: function(err){ var x = JSON.stringify(err); alert(x); }
                             })
                        }
                }
            })  }, // end of success
        error: function(response){ var x =JSON.stringify(response) ; alert(x); }
    }) /* end of ajax */   }) // end of #list li
 </script></body></html>
