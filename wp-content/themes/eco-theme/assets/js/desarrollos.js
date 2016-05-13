var map;
  function initialize() {
    if(lat){
      var myLatlng = new google.maps.LatLng(lat,lng);
      var myLatlngPin = new google.maps.LatLng(19.702839,-101.1942387);
      myLatlngPin = new google.maps.LatLng(lat,lng);

      var myOptions = {
         zoom: 15,
         center: myLatlng,
         mapTypeId: google.maps.MapTypeId.ROADMAP
         }
      map = new google.maps.Map(document.getElementById("map_canvas"), myOptions); 

      var marker = new google.maps.Marker({
        draggable: true,
        position: myLatlngPin, 
        map: map,
        title: "Ubicación"
        }
        );

      google.maps.event.addListener(marker, 'dragend', function (event) {
        document.getElementById("latbox").value = this.getPosition().lat();
        document.getElementById("lngbox").value = this.getPosition().lng();
      });

      google.maps.event.addListener(marker, 'click', function (event) {
        document.getElementById("latbox").value = this.getPosition().lat();
        document.getElementById("lngbox").value = this.getPosition().lng();
      });
    }
}
var offset;
$(document).ready(function(){
   offset= $('.single-desarrollos .form').offset().top;
});
$( window ).scroll(function() {
  if($(window).innerWidth()>767){
    if(($(window).scrollTop() > offset)&&($(window).scrollTop() < ($('.single-desarrollos .relacionados').offset().top-$('.single-desarrollos .form').innerHeight()-40))){
      $('.single-desarrollos .form').css('top',  ($(window).scrollTop()-$('.header').innerHeight())+'px');
    }else{
      if($(window).scrollTop() < offset){
          $('.single-desarrollos .form').css('top', '0px');
      }else{
          $('.single-desarrollos .form').css('top', ($('.single-desarrollos .relacionados').offset().top-$('.single-desarrollos .form').innerHeight()-140)+'px');
      }
    }
    
  }
});