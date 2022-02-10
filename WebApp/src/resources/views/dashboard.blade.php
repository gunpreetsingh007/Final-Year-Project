<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<style>
#aifeedid {
  margin: 6px 8px;
}

.button{ 
 
  border: none;
  color: white;
  text-decoration: none;
  text-align: center;
  font-size: 25px;
  margin: 6px 8px;
  display: block;
  cursor: pointer;
  height: 170px;
  width: 170px;
  border-radius: 12px;
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
 
}
.button:active {
  transform: translateY(4px);
}
#wordofday {
border: 12px solid #B22222;
border-radius: 10px;
margin-top: 16px;
margin-bottom: 4px;
right: 0px;
}

@media (min-width: 1200px) {
    #feed{
        max-width: 759px;
    }
}
.sidepanel {
  height: 100%; /* Specify a height */
  width: 0; /* 0 width - change this with JavaScript */
  position: fixed; /* Stay in place */
  z-index: 1; /* Stay on top */
  top: 0;
  left: 0;
  background-color: #ecedef; /* Black*/
  overflow-x: hidden; /* Disable horizontal scroll */
  padding-top: 60px; /* Place content 60px from the top */
  transition: 0.5s; /* 0.5 second transition effect to slide in the sidepanel */
}

/* The sidepanel links */
.sidepanel a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

/* When you mouse over the navigation links, change their color */
.sidepanel a:hover {
  color: #FFFFFF;
}

/* Position and style the close button (top right corner) */
.sidepanel .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

/* Style the button that is used to open the sidepanel */
.openbtn {
  font-size: 20px;
  cursor: pointer;
  background-color: #FFFFFF;
  color: black;
  padding: 10px 15px;
  border: none;
}

.openbtn:hover {
  
}
</style>
</head>
<x-app-layout>
<div id="mySidepanel" class="sidepanel">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div class="container"><button class="button btn btn-primary" onclick="window.location.href='/technews'">Tech News</button></div>
  <div class="container"><button class="button btn btn-primary" onclick="window.location.href='/aifunc'">AI</button></div>
  <div class="container"><button class="button btn btn-primary" onclick="window.location.href='/mlfunc'">Machine Learning</button></div>
  <div class="container"><button class="button btn btn-primary" onclick="window.location.href='/astronomyfunc'">Astronomy</button></div>
  <div class="container"><button class="button btn btn-primary" onclick="window.location.href='/bigdatafunc'">Big data</button></div>
  <div class="container"><button class="button btn btn-primary" onclick="window.location.href='/cvfunc'">Computer vision</button></div>
  <div class="container"><button class="button btn btn-primary" onclick="window.location.href='/cryptofunc'">Cryptography</button></div>
  <div class="container"><button class="button btn btn-primary" onclick="window.location.href='/dtfunc'">Digital technology</button></div>
  <div class="container"><button class="button btn btn-primary" onclick="window.location.href='/healthfunc'">Health care</button></div>
</div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        <button class="openbtn" onclick="openNav()">&#9776;</button>  {{ __('Dashboard') }}
        </h2>
    </x-slot>
<br>
<button type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#exampleModalCenter">Click here to check <br> Word of the Day</button>
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <p class="modal-title h2 font-weight-normal" id="exampleModalLongTitle">Word of the Day</p>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="card-body">
    <p class="card-title font-weight-bold h2">{{$dict->word}}</p>
    <p class="card-text font-italic h5">{{$dict->property}}</p>
    <p class="card-text font-weight-normal h5">{{$dict->def}}</p>
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<br>
<br>
@if($entity=="Technews")
<div class="container" id="feed">
@foreach($scrape as $row)
{!! $row["technewscol"] !!}
@endforeach
</div>
@else
<br>
<div class="container" id="feed">
@foreach($scrape as $row)
<div id="aifeedid" class="card">
  <div class="card-header">
  <a href="https://news.mit.edu.{{$row->Url}}" class="modal-title h3 font-weight-normal" id="exampleModalLongTitle">{{$row->Title}}</a>
  </div>
  <div class="card-body">
    <p class="card-title h5 font-weight-normal font-italic">{{$row->Body}}</p>
    <p class="card-text">{{$row->date}}</p>
  </div>
</div>
@endforeach
</div>
@endif

       

</x-app-layout>
<script>
/* Set the width of the sidebar to 250px (show it) */
function openNav() {
  document.getElementById("mySidepanel").style.width = "250px";
}

/* Set the width of the sidebar to 0 (hide it) */
function closeNav() {
  document.getElementById("mySidepanel").style.width = "0";
} 
</script>




