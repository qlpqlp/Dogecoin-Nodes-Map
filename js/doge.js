var map = new ol.Map({
  target: 'map',
  layers: [
    new ol.layer.Tile({
        source: new ol.source.OSM()
    })
  ],
    view: new ol.View({
    center: ol.proj.fromLonLat([0, 0]),
    zoom: 2
  })
});
var currZoom = map.getView().getZoom();
map.on('moveend', function(e) {
  var newZoom = map.getView().getZoom();
  if (currZoom != newZoom) {
    if (newZoom < 15){
      $(".redDogeMiner").css({"width" : "" + (5) + "vw", "height": "" + (5) + "vh"});
      $(".starlinkDogeMiner").css({"width" : "" + (5) + "vw", "height": "" + (5) + "vh"});
      $(".yhellowDogeMiner").css({"width" : "" + (3) + "vw", "height": "" + (3) + "vh"});
      $(".blueDogeMiner").css({"width" : "" + (3) + "vw", "height": "" + (3) + "vh"});
      $(".greyDogeMiner").css({"width" : "" + (2) + "vw", "height": "" + (2) + "vh"});
    }else{
      $(".redDogeMiner").css({"width" : "" + (newZoom + 1) + "vw", "height": "" + (newZoom + 1) + "vh"});
      $(".starlinkDogeMiner").css({"width" : "" + (newZoom + 1) + "vw", "height": "" + (newZoom + 1) + "vh"});
      $(".yhellowDogeMiner").css({"width" : "" + (newZoom) + "vw", "height": "" + (newZoom) + "vh"});
      $(".blueDogeMiner").css({"width" : "" + (newZoom) + "vw", "height": "" + (newZoom) + "vh"});
      $(".greyDogeMiner").css({"width" : "" + (newZoom - 5) + "vw", "height": "" + (newZoom - 5) + "vh"}); };
    currZoom = newZoom;
  }
});
