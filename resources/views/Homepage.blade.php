<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/all.min-new.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
        <div class="row main">
            <div class="col-12">
                <div class="data_bar">
                    <div class="date"><span id="h"></span> : <span id="m"></span> <span id="ampm"></span> | <span id="day"></span>/<span id="month"></span>/<span id="year"></span></div>
                    <div class="income"><h6>إجمالي اليوم</h6><h4>3206.50</h4></div>
                    <div><a href="/logout">تسجيل الخروج</a></div>
                </div>
<div class="top_bar">
    <a href="/NewOrder">عملية جديدة</a>
    <a href="#!">أخر التعاملات</a>
    <a href="/Products">المنتجات</a>
    <a href="/AddProduct">إضافة منتج</a>
</div>
            </div>
        </div>
    </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="/js/script.js"></script>
<script>
    var date = new Date();
var day = date.getDate();
var month = date.getMonth() + 1;
var year = date.getFullYear();
var hour= date.getHours();
var minute= date.getMinutes();

document.getElementById("day").textContent = day;
document.getElementById("month").textContent = month;
document.getElementById("year").textContent = year;
if(hour > 12){
    hour = '0' + (parseInt(hour) - 12);
}else{
    hour = '0' + hour;
}

if(minute < 10){
    minute = '0' + minute;
}

setInterval(() => {
        document.getElementById("h").textContent = hour;
document.getElementById("m").textContent = minute;
if(hour > 12){
    document.getElementById("ampm").textContent = 'pm'; 
}else{
    document.getElementById("ampm").textContent = 'am';  
}
},1000);
</script>
</body>
</html>