window.addEventListener("LaravelMaps:MapInitialized", function (event) {
  var element = event.detail.element;
  var map = event.detail.map;
  var markers = event.detail.markers;
  var service = event.detail.service;
  // markers.options.offset = [0, -12];
  console.log(markers);
});

window.addEventListener("LaravelMaps:MarkerClicked", function (event) {
  var element = event.detail.element;
  var map = event.detail.map;
  var marker = event.detail.marker;
  var service = event.detail.service;
  marker.options.title = "Hey!";
  // console.log("marker:", marker.options);
});
