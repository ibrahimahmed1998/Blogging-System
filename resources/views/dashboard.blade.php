<!DOCTYPE html><html><head id="head"><title>Dashboard</title>
    <link href={{ 'regcss/main.css' }} rel="stylesheet">
    <link href={{ asset('css/main.css') }} rel="stylesheet">
    <script src={{ 'js/load_scripts.js' }}></script>
    <script src={{ 'js/make_aricle.js' }}></script>
    <script src={{ 'vendor/jquery/jquery.min.js' }}></script>
</head><body>@include('nav')
<div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins"> <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body"> <h2 class="title"><b>Admin Control</b></h2>
                    <div>
                        <div class="py-12">
                            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                    <div class="p-6 bg-white border-b border-gray-200">
                                        <div class="dropdown">

                                            <div class="collapse" id="collapseExample">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                        id="flexRadioDefault1" checked>
                                                    <label class="form-check-label"
                                                        for="flexRadioDefault1"><b>Science</b></label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                        id="flexRadioDefault2">
                                                    <label class="form-check-label"
                                                        for="flexRadioDefault2"><b>Technology</b></label>
                                                </div>

                                                <div id="article"
                                                    class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                                    <div style="margin:1%" class="mb-3">
                                                        <input type="text" id="title98" class="form-control"
                                                            id="exampleFormControlInput1"
                                                            placeholder="please write title of article here"><br>

                                                        <textarea id="body98" class="form-control"
                                                            id="exampleFormControlTextarea1" rows="3"
                                                            placeholder="please write as you like here"></textarea><br>

                                                        <button id="submit" type="button"
                                                            class="btn btn-primary btn-lg">Publish</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                            </div></div></div></div>
<script type="text/javascript">
    var token = localStorage.getItem("token"); var cat;

    $('#submit').click(function(event) {  event.preventDefault();

        var today = new Date();
        var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
        if(today.getHours() > 12)
        {
            hours = ( today.getHours() - 12 );
        }
        var time = hours + ":" + today.getMinutes() + ":" + today.getSeconds();

        var sub_title =  date+" "+time ;


        let title = $("input[id=title98]").val(); let body = $("textarea[id=body98]").val();

        if (title == "" || body == "") {   alert("Title and Body required") }
        else{
                if ($('input[id=flexRadioDefault1]').is(':checked')) {  cat = 1 }

                if ($('input[id=flexRadioDefault2]').is(':checked')) { cat = 2 }
                make_article(title, body, sub_title, cat);    }  });

    $('#logout').click(function(event) { event.preventDefault();  logout(token);  });
</script></body></html>
