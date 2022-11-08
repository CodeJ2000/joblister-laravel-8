@extends('layouts.app')
@section('layout-holder')
<div class="cont_principal">
  <div class="cont_error">
    
  <h1>Oops</h1>  
    </div>
  <div class="cont_aura_1"></div>
  <div class="cont_aura_2"></div>
  </div>
<h1>Sorry! Not Found</h1>
<h2>Go <a href="{{route('account.index')}}">Home!</a></h2>
@endsection

@push('css')
<style>
 @import url("https://fonts.googleapis.com/css?family=Bungee");

body {
  background: #1b1b1b;
  color: white;
  font-family: "Bungee", cursive;
  margin-top: 50px;
  text-align: center;
}
a {
  color: #2aa7cc;
  text-decoration: none;
}
a:hover {
  color: white;
}
svg {
  width: 50vw;
}
.lightblue {
  fill: #444;
}
.eye {
  cx: calc(115px + 30px * var(--mouse-x));
  cy: calc(50px + 30px * var(--mouse-y));
}
#eye-wrap {
  overflow: hidden;
}
.error-text {
  font-size: 120px;
}
.alarm {
  animation: alarmOn 0.5s infinite;
}

@keyframes alarmOn {
  to {
    fill: darkred;
  }
}

</style>
@endpush

@push('js')
<script>
  var root = document.documentElement;
var eyef = document.getElementById('eyef');
var cx = document.getElementById("eyef").getAttribute("cx");
var cy = document.getElementById("eyef").getAttribute("cy");

document.addEventListener("mousemove", evt => {
  let x = evt.clientX / innerWidth;
  let y = evt.clientY / innerHeight;

  root.style.setProperty("--mouse-x", x);
  root.style.setProperty("--mouse-y", y);
  
  cx = 115 + 30 * x;
  cy = 50 + 30 * y;
  eyef.setAttribute("cx", cx);
  eyef.setAttribute("cy", cy);
  
});

document.addEventListener("touchmove", touchHandler => {
  let x = touchHandler.touches[0].clientX / innerWidth;
  let y = touchHandler.touches[0].clientY / innerHeight;

  root.style.setProperty("--mouse-x", x);
  root.style.setProperty("--mouse-y", y);
});
</script>
@endpush