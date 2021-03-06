<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="csrf_token" content="{{ csrf_token() }}" />
  <link rel="icon" href="../../favicon.ico">

  <title>MedCrip</title>

  <link href="css/bootstrap.css" rel="stylesheet">
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link href="css/main.css" rel="stylesheet">
<link href="css/font-awesome.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">


  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->


</head>
<body id="app-layout">
  <div class="navbar-wrapper">
  <div class="container">
      <nav class="navbar navbar-inverse navbar-static-top">
    <div class="top-nav">
    <ul>
      <li><a href="javascript:void(0)" id="patientHead"><img src="images/patients-icon.png"> Patients</a></li>
      <li><a href="javascript:void(0)" id="doctorHead"><img src="images/doctor-icon.png"> Doctor</a></li>
      <li><a href="javascript:void(0)" id="pharmacyHead"><img src="images/pharmacies-icon.png"> Pharmacies</a></li>
    </ul>
    </div>
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
      <img src="images/brand.png">
      </a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
              <li><a href="#">Home</a></li>
              <li><a href="#">About Us</a></li>
              <li><a href="#">How We Work</a></li>
      <li><a href="#">Pharmacy</a></li>
      <li><a href="#">Faq’s</a></li>
      <li><a href="#">Contact Us</a></li>
            </ul>
          </div>
        </div>
      </nav>

    </div>
  </div>

<div class="login-section clearfix">
  <aside class="lefts">
    <div class="user"><img class="icon icons8-Checked-User-Male" width="60" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAADzElEQVR4nO2b0XnqMAyFGYERGKEjsEHZAG9QNigbtBskG5QNygawQdgANvjvg50WZCVxYlHCd3PemsTHOrYk2zKdzSZMmDDBCMAL8A58Awd+cQjP3oGXR9tpDmAFVKSjAlaPtjsbwCLM7FB8A4tH6xiE4O7nDPE1zjxbWATxTSgBdy0qfO/CuyY8xyDg3V6b+R0J7hza7xo8obP9w4Ee85sBPBuF5/seNpsBn+2zxV/xaYMw3tWBeKnbGXDKcKgsbDUHeuJbGPAuFN7xJURgK4wsDbnl6rC14jYDsBdGOkNuJ7j3Vtxm4HZvb+qmSngdrLjNIIP02fizMQ0AXP4wBC5W3GZgSoJ8CiNLQ265DH5acZtBcVP4nzZCs9lsBpyEoV8GnF+C82Rg6n2gxCrYH4acocn2IE6GAG8DeN4Unv0dTLYFPhfIJZHgyouE9gvF7Qmc44x9CfS6QI0CWBOXxNbhXRPGWwfQEAZB84S+uABLhX8OvAIf+CpUddWmvmcogNcHyP8xckleZfgsxeND5KMn7zkMxvyvhM/xtzwWZXGCYAvOM/B+b/G5s/4XOHAPb8DPUBt2+L3CEpHRw7MNekm8CSf8FnxFnFRX4Z3cnNWopA254osWIx09Rhzv7psW40/02BCF/jWuqo9dbR1o4i/4OuHgDoirTOA9pDdnGFTNu/KqS8TF0Fp8lns18JZZxs7UkyUMLbKib3iOObMeeLUTYJnDKfilJ5x72xxcqlJmPjumiGsLJwveK/45cU4o+5JIFzXZqwfj5DLqDHiX4m95cj33IdNcdJtrZOCWYXUy4KzFFuK59IK084Yy+2YuSuz+jeUv0k6XcqaLq3fJfUnSSjR0SQ3TuGU9QZ2VK2GNfSviayzDe+lt+xQDtdqfZYKSgxvlFUWYS/gm+lbR0r0nIC5TZV+BC/4bKO+1/COFdYpP7U8zUK6hEWkOUgxqE9hHfGp/soGM0WWW4pj/KPjVpbVFaB/xMgSOKQbKNdq0TqcMcOPSlDgIrqX9oCR4g0Eq2/l73QJ1DILraDtsGbwnlFnp/E1QwyC4hHaVaDOOwitxMdUltHEZ38OYbpyJw6AiYa8RRLmE77SDXGlhuwmCgdILsu8Zr/jlxYvJKdYU6AWRortlJ2+h8G4NTLYH8Z6AMHtDS2LalVv32v8ooBcuwMfvugfPGv0fNkwLLXcBfrfWVtr+wF+RybJ4fW2mCa/FP81l6xw9HIYiu275EOATY86F64WxJrxU4L2h7DkQl9Dm+Wa9Dfxef+25DZFjePbJWLa3EyZMeEr8A2icMvGKvgDcAAAAAElFTkSuQmCC"></div>
    <h2>Application Login</h2>
    <p> It is recomended that use Internet Explorer 9 and above, Firefox 3.5 and above and Google Chrome for best view and functionality. </p>
    <span>
      <img src="images/app-icon.png">
    </span>
  </aside>

  @yield('content')

</div>

  <footer>
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-sm-10 col-md-offset-1 col-sm-offset-1">
        <div class="row">
          <div class="col-md-6">
            <div class="newsletter">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Subscribe to our newsletter">
                <span class="input-group-btn">
                <button class="btn btn-default" type="button">Register</button>
                </span>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="social-icons">
              <ul>
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                <li><a href="#"><i class="fa fa-youtube"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-md-5 col-sm-5">
            <h3>NewsFeed</h3>
            <img src="images/feedblog.jpg">
          </div>
          <div class="col-md-3 col-sm-3">
            <h3>Medical Login</h3>
            <ul>
              <li><a href="#">Experiment</a></li>
              <li><a href="#">About Us</a></li>
              <li><a href="#">Careers</a></li>
              <li><a href="#">Press</a></li>
            </ul>
          </div>
          <div class="col-md-4 col-sm-4">
            <h3>Get In Touch</h3>
            <div class="info">
              <img class="icon icons8-Marker" width="25" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFAAAABQCAYAAACOEfKtAAAD+0lEQVR4nO2bzXWjMBDHXQJHLF1cgjtIOojPfh6FEtzBpgN8iMRx3UHSgd1B0oHdgd3B7gE7j11mQAgJCazfe1zy8mCQ5z9fErNZJBKJRCKRSMQGKoWndyZeCiZ+Va93Jl5UCk++7QsOyddLxSGXTHwpLv7oXOX/Qi75eunbfm8oLl67LFrzYopX3+8zGIptVoqJU9+Fq11MnIp08+z7/ZyRJ1miGHxYX7jaQsJHnmSJ7/e1iuTrpa7XSQZnxeEoGXxKJt7KCz5vfzvreuNk4qNim5Xk4tL80vCt5rAt0mzRdr8izRZqDlvF4bvxh+DiMnpJK7ZZtSzcsc9LFunmWXE4Nj1jtIso+XrZ4HlXxTYrW8+6/VBXyhNHJ+cyYVAxD751pNqVIs0WpKyZOI0qsdDZFo4uXyRPsoSUNIMPV8+1ShmXcM8bwgtui4h64ijiISHdqwvZUpRyRmIiE6ehbDBCcshw+dhLGLpQFYDkkA1tizZ4bwtHX/Zg8VAy8eXLnkbKqUpYcYeKx0GWNZKLHZY4fNuFJRTJxJtvu2qg8p3D1rddZds3Ahnj8jXLvGUCgEPFkw+mieiWkWu2mdzLGXisMZOvZPCb6mslFzvDe9amOEHVhHj50j37tg8fzF4c7U48lFYkkom3epyBz673aZusmP4w5Twx4ESCL2B3A9sXzyx+2bLPGXEBe4LFwJAkHHwMRLOwQePuLIkgA46gsnA5QrJTByom9mQZYyA7qg4MbsCKtkyGk49bIV2RnfneCVFieW8xa2C9sEkctG4XVsIYFuROoSYfPqVChZYgpzGzGd4y+RxgEtXB2Zc9reAy9jf5wCZEQcr3DpXxfEiGHvAOtzdjBF60iv3gdqDlkL/tBW2ojSUPu3KIEgLeUKqCnqIa0Asx7ws6efyPTy8cvffNZj/1F7axvXf9bKIVvAbXurWBjZBceyHpfSGNrnTx4YWT8b47Q3ohVfeN0vvukF7I4WD7Wf9ug07A++7QXmhvoEke4Riz91VBhwwWe2S05x1T3dcGVRfaqM1c3jso8Im1uPSJUXmSJfhB9gAnzn1xEaeGiK9BQW1bmpQ1dNHsfxvBGdRLm5Q1RNkS/ryvL5Tsumx0k+efp1K2NJEnWUKMu7Q+hqE+4pEMzqMvmnXp40E2PHgSUAmlaf+E6ndHMaq3jUlCedjEQUHKETmcjh0Wf5jE0QS+GS8uVa8q0myBdRyT6ndNafg48UfKtHQn2nF0hTzSNoctKd2QTxgMDTV4Lb82R796H/+g1DY6p1MftubTBTvL91DDgr7QeyhRuto0SjlKVw/8y6IoXW0QKUfpdqVaYMeC2RDJxS4WzD3IkyyJ0o1EIpHIZPkLO/hzoSIhVJcAAAAASUVORK5CYII=">
              <span>New Street 254 ( London )</span>
            </div>
            <div class="info">
              <img class="icon icons8-New-Post" width="25"  src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFAAAABQCAYAAACOEfKtAAADBklEQVR4nO2cwVHrMBRFVYKXydMmJaSElJB1xnrjDqCDpAOzkbxMOoAOSAekA+gAOvh/YWeGb8nBtmRL4d8zowUzxEjX1vXTfUyEAAAAAAAAAABwbxipXjHGD2Ek/8EYPyBgUAGJT5r4gNE9DPGpU8BqkW9ie3LqVIt8AwE9gICe3BTQLNVj7Ammjlmqx5tv4Yp4H3uSqVIR73uWMeq1zIos9oRTocyKrC6ch9SBxO9a7taxJx8bLXdrQ/zerw6U/PX9Zy35U0tVxF5ELLRUhZb8eUsj6y3cLhSbLV3GXszcGKnKtg5a8lOvMkZLVbSV/l98scyKTBO/tZ+6607sXQdquVtrUh/2lv69vqjlbt3esprUx/c1Dyqkm7fP2X6Uf58vNruubV3n9q4bdRLRkp8sEUkdZ1nZDGhSR5ffuX539FHOUL613tLEb9WiWE21sKmpFsXK5XeG8m33ZzzOwlru1kaqS9sX7/EMXS3yjV2iqMtPHu8dJtRvKfViPfJLfgi2uonRS35wWNJLnyojWBqjiQ8uX0y51Gluvu13xIe+1wgaZzUXuwtfrMsy2+9GrjmMgPUFi5XLF28Z8dwYyrcuvxtzoycJVMusyFxHwBSiMVcEZYhPY61m0kS6HTbWk1XPMXyxvqnq2ZqPZ2g8eaTf5YtzHgFD+Z2LWXoizRHQ8sU5joDuCEpdQu2CWZtKc0djrgjKEJ9C/o3Zu3Idh/Sg0VhX5D7FEx+lremKxkK1DFyRezuCCkm0vrArGvP1xQ6/syKokERvrIeKxoZEUCGJLqAQ7paBJn7r8+T8FLlPTRICCjGuZeCK3PtEUCFJRkAhhkVjPhFUSJIS8MqtaCxEBBWSJAUUortlMDRyn5pkBRTC3TKI6XcukhZQiO5ozCeCCknyAl75JxpL6P8W70ZAIeq0O7X2wF0JmCIQ0BMI6AkE9AQCegIBPYGAnkBATyCgJxDQEwjoCQT0BAJ6clNATepYEe8xuke7vYAvnfAcENBfQHXGGD9iezIAAAAAAAAAgMH8BYj1YNV95uHAAAAAAElFTkSuQmCC">
              <span>support@medcrip.com</span>
            </div>
            <div class="info">
              <img class="icon icons8-Phone" width="25"  src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFAAAABQCAYAAACOEfKtAAAEMklEQVR4nO1cy1XjMBR1CV460oYS0gGUkHWO9cYdQAekg7CRvCQdDB0kHYQOoIO4g5lFZNDnZWKPFCxZuud4BRby5X2urmQXRUZGRkaGE7ZlU4qK3bdVczf1XKJCW9UPgrK9oPDn+2J7TtfLqecWNLZlU3LCXnXivi9O4bQtm3LqeQYJTtdLTuB4ibyvi7DfU881OHC6XnIKJyNl39uqfjj/HF50EuvVxFMOB5yyxo4y2JmpKih7z6lsACOPU9bgv7te5lRWgJDXXUtNTmCTU7nAyRsqUZJPZSsVR5CH3p9SKm/LpjS67SjyeiSbyoLAzteDJ5fK27IptW5LYOMyXnKpfF7ffj+wj4hJKpVNAn2Nm1Qq64LZj7NipzLsfIwbJASFrn/Qfp3rA+Za2efYQUFQdvDVRFRIG+xT9Q59jR0U1KLPCRx9ji1IvbpFjQ0KZr3yadUnQWBR6HVQLNiTt3E1kc4OvsYNDlrBJ/DhY8y2au6GWGKzgJ3G7h3T2IDqZq0Fi0Lvxq4d0xTos46+HqYf6BKF6kYUJ+zT3ywDhw/d5vMfER1cH972FmfceS9BNQLGdmTTiUny+IfVAAYu72xvkb3deKrhghP2ptpRQyNJ7+T+3J3oIEVwN7ahmPdxAsfZ679LEAv2pHl6A5d45vp39rb+v6BZXRROQ1PS9AI5hZdbzzVIuKSkXQ8TWI1gMLUhJ+x1yH3nrqxIopRJNPeOhxIhTYpOpN6ZzWgaVw91EsfcOytgRAyth7Y7kyyJZj0c3lSse5Ml0VjvDm0qRZFJ/ILVVDKJ4+AqUTKJBbZxnkkcDUznjTmNNeZA+2zhqvNcSZQ+5C99F5Dto9pKMB2YsSRKnahHMmXba/fxBTzaLwPpTlA0dpprTcPLAU6AIPVKEPi4SJwxj2gOefoh0ejuBI79GPLnezzaYHcmtl6ZzS2qaHQlUUqkA0YAGmGEvZlbDmeFYBw1jikafUgU62VG62KHa40Ci+hoohEjcWxnlM2pMyLuc6zUiTYafei8syvODoJCxwls/jdyoo1GX2LZ10NGGY2YzhtjQPhGlNGI2vuEvU45YSwaBYGPoEm0DIiJN99x7RnwsRTcCpveiTFlU7BRWBSSRGunD05TOzH6fCKw1tCOOFFdvNV7gzeHlDmdWRd/MgLk0k/5Pk5kB0PRQk7hxBfw+CN/3/gyU1ReYg+sLspo2N/ypKt1Ci32N0vRlKZwagk83+hvqf+s96C771Ao619L5PpKL+TTVt3sznTL9OrwtHZ4jwUhLwrZ8j9oq+ZOPbPtSiT2UbWp9eePQH4A0jYAZGrzBTxeS0FB6lWS5KnglDXonoeiIVsCz6Ji931absumbAk8+7DVZoNzB0UazcArafJUyJr2gjcb9Jpvw3CF/GTppt8CQGql9RHJjCtoq/ohyqVZRkZGRmD4CwCbTDvHl1H1AAAAAElFTkSuQmCC">
              <span>1 2345 67893</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
<div class="copyright">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <p>2017 © ALLRIGHT RESERVED <span>MEDCRIP</span></p>
      </div>
      <div class="col-md-6">
        <img src="images/payment-icon.png">
      </div>
    </div>
  </div>
</div>



  <!-- Script -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  {{-- <script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places"></script>
  <script src="js/jquery.geocomplete.min.js"></script> --}}
  <script>
    (function(a){if(typeof define==="function"&&define.amd&&define.amd.jQuery){define(["jquery"],a)}else{if(typeof module!=="undefined"&&module.exports){a(require("jquery"))}else{a(jQuery)}}}(function(f){var y="1.6.15",p="left",o="right",e="up",x="down",c="in",A="out",m="none",s="auto",l="swipe",t="pinch",B="tap",j="doubletap",b="longtap",z="hold",E="horizontal",u="vertical",i="all",r=10,g="start",k="move",h="end",q="cancel",a="ontouchstart" in window,v=window.navigator.msPointerEnabled&&!window.navigator.pointerEnabled&&!a,d=(window.navigator.pointerEnabled||window.navigator.msPointerEnabled)&&!a,C="TouchSwipe";var n={fingers:1,threshold:75,cancelThreshold:null,pinchThreshold:20,maxTimeThreshold:null,fingerReleaseThreshold:250,longTapThreshold:500,doubleTapThreshold:200,swipe:null,swipeLeft:null,swipeRight:null,swipeUp:null,swipeDown:null,swipeStatus:null,pinchIn:null,pinchOut:null,pinchStatus:null,click:null,tap:null,doubleTap:null,longTap:null,hold:null,triggerOnTouchEnd:true,triggerOnTouchLeave:false,allowPageScroll:"auto",fallbackToMouseEvents:true,excludedElements:"label, button, input, select, textarea, a, .noSwipe",preventDefaultEvents:true};f.fn.swipe=function(H){var G=f(this),F=G.data(C);if(F&&typeof H==="string"){if(F[H]){return F[H].apply(this,Array.prototype.slice.call(arguments,1))}else{f.error("Method "+H+" does not exist on jQuery.swipe")}}else{if(F&&typeof H==="object"){F.option.apply(this,arguments)}else{if(!F&&(typeof H==="object"||!H)){return w.apply(this,arguments)}}}return G};f.fn.swipe.version=y;f.fn.swipe.defaults=n;f.fn.swipe.phases={PHASE_START:g,PHASE_MOVE:k,PHASE_END:h,PHASE_CANCEL:q};f.fn.swipe.directions={LEFT:p,RIGHT:o,UP:e,DOWN:x,IN:c,OUT:A};f.fn.swipe.pageScroll={NONE:m,HORIZONTAL:E,VERTICAL:u,AUTO:s};f.fn.swipe.fingers={ONE:1,TWO:2,THREE:3,FOUR:4,FIVE:5,ALL:i};function w(F){if(F&&(F.allowPageScroll===undefined&&(F.swipe!==undefined||F.swipeStatus!==undefined))){F.allowPageScroll=m}if(F.click!==undefined&&F.tap===undefined){F.tap=F.click}if(!F){F={}}F=f.extend({},f.fn.swipe.defaults,F);return this.each(function(){var H=f(this);var G=H.data(C);if(!G){G=new D(this,F);H.data(C,G)}})}function D(a5,au){var au=f.extend({},au);var az=(a||d||!au.fallbackToMouseEvents),K=az?(d?(v?"MSPointerDown":"pointerdown"):"touchstart"):"mousedown",ax=az?(d?(v?"MSPointerMove":"pointermove"):"touchmove"):"mousemove",V=az?(d?(v?"MSPointerUp":"pointerup"):"touchend"):"mouseup",T=az?(d?"mouseleave":null):"mouseleave",aD=(d?(v?"MSPointerCancel":"pointercancel"):"touchcancel");var ag=0,aP=null,a2=null,ac=0,a1=0,aZ=0,H=1,ap=0,aJ=0,N=null;var aR=f(a5);var aa="start";var X=0;var aQ={};var U=0,a3=0,a6=0,ay=0,O=0;var aW=null,af=null;try{aR.bind(K,aN);aR.bind(aD,ba)}catch(aj){f.error("events not supported "+K+","+aD+" on jQuery.swipe")}this.enable=function(){aR.bind(K,aN);aR.bind(aD,ba);return aR};this.disable=function(){aK();return aR};this.destroy=function(){aK();aR.data(C,null);aR=null};this.option=function(bd,bc){if(typeof bd==="object"){au=f.extend(au,bd)}else{if(au[bd]!==undefined){if(bc===undefined){return au[bd]}else{au[bd]=bc}}else{if(!bd){return au}else{f.error("Option "+bd+" does not exist on jQuery.swipe.options")}}}return null};function aN(be){if(aB()){return}if(f(be.target).closest(au.excludedElements,aR).length>0){return}var bf=be.originalEvent?be.originalEvent:be;var bd,bg=bf.touches,bc=bg?bg[0]:bf;aa=g;if(bg){X=bg.length}else{if(au.preventDefaultEvents!==false){be.preventDefault()}}ag=0;aP=null;a2=null;aJ=null;ac=0;a1=0;aZ=0;H=1;ap=0;N=ab();S();ai(0,bc);if(!bg||(X===au.fingers||au.fingers===i)||aX()){U=ar();if(X==2){ai(1,bg[1]);a1=aZ=at(aQ[0].start,aQ[1].start)}if(au.swipeStatus||au.pinchStatus){bd=P(bf,aa)}}else{bd=false}if(bd===false){aa=q;P(bf,aa);return bd}else{if(au.hold){af=setTimeout(f.proxy(function(){aR.trigger("hold",[bf.target]);if(au.hold){bd=au.hold.call(aR,bf,bf.target)}},this),au.longTapThreshold)}an(true)}return null}function a4(bf){var bi=bf.originalEvent?bf.originalEvent:bf;if(aa===h||aa===q||al()){return}var be,bj=bi.touches,bd=bj?bj[0]:bi;var bg=aH(bd);a3=ar();if(bj){X=bj.length}if(au.hold){clearTimeout(af)}aa=k;if(X==2){if(a1==0){ai(1,bj[1]);a1=aZ=at(aQ[0].start,aQ[1].start)}else{aH(bj[1]);aZ=at(aQ[0].end,aQ[1].end);aJ=aq(aQ[0].end,aQ[1].end)}H=a8(a1,aZ);ap=Math.abs(a1-aZ)}if((X===au.fingers||au.fingers===i)||!bj||aX()){aP=aL(bg.start,bg.end);a2=aL(bg.last,bg.end);ak(bf,a2);ag=aS(bg.start,bg.end);ac=aM();aI(aP,ag);be=P(bi,aa);if(!au.triggerOnTouchEnd||au.triggerOnTouchLeave){var bc=true;if(au.triggerOnTouchLeave){var bh=aY(this);bc=F(bg.end,bh)}if(!au.triggerOnTouchEnd&&bc){aa=aC(k)}else{if(au.triggerOnTouchLeave&&!bc){aa=aC(h)}}if(aa==q||aa==h){P(bi,aa)}}}else{aa=q;P(bi,aa)}if(be===false){aa=q;P(bi,aa)}}function M(bc){var bd=bc.originalEvent?bc.originalEvent:bc,be=bd.touches;if(be){if(be.length&&!al()){G(bd);return true}else{if(be.length&&al()){return true}}}if(al()){X=ay}a3=ar();ac=aM();if(bb()||!am()){aa=q;P(bd,aa)}else{if(au.triggerOnTouchEnd||(au.triggerOnTouchEnd==false&&aa===k)){if(au.preventDefaultEvents!==false){bc.preventDefault()}aa=h;P(bd,aa)}else{if(!au.triggerOnTouchEnd&&a7()){aa=h;aF(bd,aa,B)}else{if(aa===k){aa=q;P(bd,aa)}}}}an(false);return null}function ba(){X=0;a3=0;U=0;a1=0;aZ=0;H=1;S();an(false)}function L(bc){var bd=bc.originalEvent?bc.originalEvent:bc;if(au.triggerOnTouchLeave){aa=aC(h);P(bd,aa)}}function aK(){aR.unbind(K,aN);aR.unbind(aD,ba);aR.unbind(ax,a4);aR.unbind(V,M);if(T){aR.unbind(T,L)}an(false)}function aC(bg){var bf=bg;var be=aA();var bd=am();var bc=bb();if(!be||bc){bf=q}else{if(bd&&bg==k&&(!au.triggerOnTouchEnd||au.triggerOnTouchLeave)){bf=h}else{if(!bd&&bg==h&&au.triggerOnTouchLeave){bf=q}}}return bf}function P(be,bc){var bd,bf=be.touches;if(J()||W()){bd=aF(be,bc,l)}if((Q()||aX())&&bd!==false){bd=aF(be,bc,t)}if(aG()&&bd!==false){bd=aF(be,bc,j)}else{if(ao()&&bd!==false){bd=aF(be,bc,b)}else{if(ah()&&bd!==false){bd=aF(be,bc,B)}}}if(bc===q){if(W()){bd=aF(be,bc,l)}if(aX()){bd=aF(be,bc,t)}ba(be)}if(bc===h){if(bf){if(!bf.length){ba(be)}}else{ba(be)}}return bd}function aF(bf,bc,be){var bd;if(be==l){aR.trigger("swipeStatus",[bc,aP||null,ag||0,ac||0,X,aQ,a2]);if(au.swipeStatus){bd=au.swipeStatus.call(aR,bf,bc,aP||null,ag||0,ac||0,X,aQ,a2);if(bd===false){return false}}if(bc==h&&aV()){clearTimeout(aW);clearTimeout(af);aR.trigger("swipe",[aP,ag,ac,X,aQ,a2]);if(au.swipe){bd=au.swipe.call(aR,bf,aP,ag,ac,X,aQ,a2);if(bd===false){return false}}switch(aP){case p:aR.trigger("swipeLeft",[aP,ag,ac,X,aQ,a2]);if(au.swipeLeft){bd=au.swipeLeft.call(aR,bf,aP,ag,ac,X,aQ,a2)}break;case o:aR.trigger("swipeRight",[aP,ag,ac,X,aQ,a2]);if(au.swipeRight){bd=au.swipeRight.call(aR,bf,aP,ag,ac,X,aQ,a2)}break;case e:aR.trigger("swipeUp",[aP,ag,ac,X,aQ,a2]);if(au.swipeUp){bd=au.swipeUp.call(aR,bf,aP,ag,ac,X,aQ,a2)}break;case x:aR.trigger("swipeDown",[aP,ag,ac,X,aQ,a2]);if(au.swipeDown){bd=au.swipeDown.call(aR,bf,aP,ag,ac,X,aQ,a2)}break}}}if(be==t){aR.trigger("pinchStatus",[bc,aJ||null,ap||0,ac||0,X,H,aQ]);if(au.pinchStatus){bd=au.pinchStatus.call(aR,bf,bc,aJ||null,ap||0,ac||0,X,H,aQ);if(bd===false){return false}}if(bc==h&&a9()){switch(aJ){case c:aR.trigger("pinchIn",[aJ||null,ap||0,ac||0,X,H,aQ]);if(au.pinchIn){bd=au.pinchIn.call(aR,bf,aJ||null,ap||0,ac||0,X,H,aQ)}break;case A:aR.trigger("pinchOut",[aJ||null,ap||0,ac||0,X,H,aQ]);if(au.pinchOut){bd=au.pinchOut.call(aR,bf,aJ||null,ap||0,ac||0,X,H,aQ)}break}}}if(be==B){if(bc===q||bc===h){clearTimeout(aW);clearTimeout(af);if(Z()&&!I()){O=ar();aW=setTimeout(f.proxy(function(){O=null;aR.trigger("tap",[bf.target]);if(au.tap){bd=au.tap.call(aR,bf,bf.target)}},this),au.doubleTapThreshold)}else{O=null;aR.trigger("tap",[bf.target]);if(au.tap){bd=au.tap.call(aR,bf,bf.target)}}}}else{if(be==j){if(bc===q||bc===h){clearTimeout(aW);clearTimeout(af);O=null;aR.trigger("doubletap",[bf.target]);if(au.doubleTap){bd=au.doubleTap.call(aR,bf,bf.target)}}}else{if(be==b){if(bc===q||bc===h){clearTimeout(aW);O=null;aR.trigger("longtap",[bf.target]);if(au.longTap){bd=au.longTap.call(aR,bf,bf.target)}}}}}return bd}function am(){var bc=true;if(au.threshold!==null){bc=ag>=au.threshold}return bc}function bb(){var bc=false;if(au.cancelThreshold!==null&&aP!==null){bc=(aT(aP)-ag)>=au.cancelThreshold}return bc}function ae(){if(au.pinchThreshold!==null){return ap>=au.pinchThreshold}return true}function aA(){var bc;if(au.maxTimeThreshold){if(ac>=au.maxTimeThreshold){bc=false}else{bc=true}}else{bc=true}return bc}function ak(bc,bd){if(au.preventDefaultEvents===false){return}if(au.allowPageScroll===m){bc.preventDefault()}else{var be=au.allowPageScroll===s;switch(bd){case p:if((au.swipeLeft&&be)||(!be&&au.allowPageScroll!=E)){bc.preventDefault()}break;case o:if((au.swipeRight&&be)||(!be&&au.allowPageScroll!=E)){bc.preventDefault()}break;case e:if((au.swipeUp&&be)||(!be&&au.allowPageScroll!=u)){bc.preventDefault()}break;case x:if((au.swipeDown&&be)||(!be&&au.allowPageScroll!=u)){bc.preventDefault()}break}}}function a9(){var bd=aO();var bc=Y();var be=ae();return bd&&bc&&be}function aX(){return !!(au.pinchStatus||au.pinchIn||au.pinchOut)}function Q(){return !!(a9()&&aX())}function aV(){var bf=aA();var bh=am();var be=aO();var bc=Y();var bd=bb();var bg=!bd&&bc&&be&&bh&&bf;return bg}function W(){return !!(au.swipe||au.swipeStatus||au.swipeLeft||au.swipeRight||au.swipeUp||au.swipeDown)}function J(){return !!(aV()&&W())}function aO(){return((X===au.fingers||au.fingers===i)||!a)}function Y(){return aQ[0].end.x!==0}function a7(){return !!(au.tap)}function Z(){return !!(au.doubleTap)}function aU(){return !!(au.longTap)}function R(){if(O==null){return false}var bc=ar();return(Z()&&((bc-O)<=au.doubleTapThreshold))}function I(){return R()}function aw(){return((X===1||!a)&&(isNaN(ag)||ag<au.threshold))}function a0(){return((ac>au.longTapThreshold)&&(ag<r))}function ah(){return !!(aw()&&a7())}function aG(){return !!(R()&&Z())}function ao(){return !!(a0()&&aU())}function G(bc){a6=ar();ay=bc.touches.length+1}function S(){a6=0;ay=0}function al(){var bc=false;if(a6){var bd=ar()-a6;if(bd<=au.fingerReleaseThreshold){bc=true}}return bc}function aB(){return !!(aR.data(C+"_intouch")===true)}function an(bc){if(!aR){return}if(bc===true){aR.bind(ax,a4);aR.bind(V,M);if(T){aR.bind(T,L)}}else{aR.unbind(ax,a4,false);aR.unbind(V,M,false);if(T){aR.unbind(T,L,false)}}aR.data(C+"_intouch",bc===true)}function ai(be,bc){var bd={start:{x:0,y:0},last:{x:0,y:0},end:{x:0,y:0}};bd.start.x=bd.last.x=bd.end.x=bc.pageX||bc.clientX;bd.start.y=bd.last.y=bd.end.y=bc.pageY||bc.clientY;aQ[be]=bd;return bd}function aH(bc){var be=bc.identifier!==undefined?bc.identifier:0;var bd=ad(be);if(bd===null){bd=ai(be,bc)}bd.last.x=bd.end.x;bd.last.y=bd.end.y;bd.end.x=bc.pageX||bc.clientX;bd.end.y=bc.pageY||bc.clientY;return bd}function ad(bc){return aQ[bc]||null}function aI(bc,bd){bd=Math.max(bd,aT(bc));N[bc].distance=bd}function aT(bc){if(N[bc]){return N[bc].distance}return undefined}function ab(){var bc={};bc[p]=av(p);bc[o]=av(o);bc[e]=av(e);bc[x]=av(x);return bc}function av(bc){return{direction:bc,distance:0}}function aM(){return a3-U}function at(bf,be){var bd=Math.abs(bf.x-be.x);var bc=Math.abs(bf.y-be.y);return Math.round(Math.sqrt(bd*bd+bc*bc))}function a8(bc,bd){var be=(bd/bc)*1;return be.toFixed(2)}function aq(){if(H<1){return A}else{return c}}function aS(bd,bc){return Math.round(Math.sqrt(Math.pow(bc.x-bd.x,2)+Math.pow(bc.y-bd.y,2)))}function aE(bf,bd){var bc=bf.x-bd.x;var bh=bd.y-bf.y;var be=Math.atan2(bh,bc);var bg=Math.round(be*180/Math.PI);if(bg<0){bg=360-Math.abs(bg)}return bg}function aL(bd,bc){var be=aE(bd,bc);if((be<=45)&&(be>=0)){return p}else{if((be<=360)&&(be>=315)){return p}else{if((be>=135)&&(be<=225)){return o}else{if((be>45)&&(be<135)){return x}else{return e}}}}}function ar(){var bc=new Date();return bc.getTime()}function aY(bc){bc=f(bc);var be=bc.offset();var bd={left:be.left,right:be.left+bc.outerWidth(),top:be.top,bottom:be.top+bc.outerHeight()};return bd}function F(bc,bd){return(bc.x>bd.left&&bc.x<bd.right&&bc.y>bd.top&&bc.y<bd.bottom)}}}));!function(n){"use strict";n.fn.bsTouchSlider=function(i){var a=n(".carousel");return this.each(function(){function i(i){var a="webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend";i.each(function(){var i=n(this),t=i.data("animation");i.addClass(t).one(a,function(){i.removeClass(t)})})}var t=a.find(".item:first").find("[data-animation ^= 'animated']");a.carousel(),i(t),a.on("slide.bs.carousel",function(a){var t=n(a.relatedTarget).find("[data-animation ^= 'animated']");i(t)}),n(".carousel .carousel-inner").swipe({swipeLeft:function(n,i,a,t,e){this.parent().carousel("next")},swipeRight:function(){this.parent().carousel("prev")},threshold:0})})}}(jQuery);
    $('#bootstrap-touch-slider').bsTouchSlider();
  </script>

  @yield('page.bottom-script')

  <script src="js/bootstrap.min.js"></script>
  <script src="js/site.js"></script>
  <script>

  if(localStorage.getItem("patient")){
      $("#patientLogin").click();
       localStorage.removeItem("patient");

  }

  if(localStorage.getItem("doctor")){
      $("#doctorLogin").click();
      localStorage.removeItem("doctor");
  }

  if(localStorage.getItem("pharmist")){
      $("#pharmistLogin").click();
      localStorage.removeItem("pharmist");
  }

    $("#patientHead").click(function(){
      $("#patientLogin").click();
      $("#patient").click();
    });

    $("#doctorHead").click(function(){
      $("#doctorLogin").click();
      $("#doctor").click();
    });

    $("#pharmacyHead").click(function(){
      $("#pharmistLogin").click();
      $("#pharmacy").click();
    });

  </script>

</body>
</html>
