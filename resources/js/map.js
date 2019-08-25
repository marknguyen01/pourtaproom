import 'ol/ol.css';
import Map from 'ol/Map';
import View from 'ol/View';
import Overlay from 'ol/Overlay.js';
import {fromLonLat} from 'ol/proj';
import TileLayer from 'ol/layer/Tile';
import OSM from 'ol/source/OSM';


const overlay = new Overlay({
    element: document.getElementById('popup')
})


const map = new Map({
  target: 'map',
  controls: [],
  interactions: [],
  layers: [
    new TileLayer({
      source: new OSM()
    })
  ],
  overlays: [overlay],
  view: new View({
    center: fromLonLat([-80.817757, 35.220890]),
    zoom: 17
  })
});

map.on('postcompose', function() {
    let mapWidth = this.getSize()[0];
    const overlayEl = overlay.getElement();
    overlayEl.style.width = mapWidth - 24 + 'px';
    overlay.setPosition(fromLonLat([-80.817757, 35.220890]));
});
