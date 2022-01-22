window.addEventListener('load', function (e){
    BX.ready(function (e){
         if(Object.keys(geoDataObj)  .length>0) {

             ymaps.ready(initMarfamap);

             function initMarfamap() {

                 var map = new ymaps.Map(mapDomId, {
                     center: [centallat, centerlon],
                     zoom: 7,
                     controls: ['zoomControl']
                 })
                    objectManager = new ymaps.ObjectManager();
                     geoDataObj.features.forEach(function (obj) {
                         // // Задаём контент балуна.
                         obj.properties.balloonContent = obj.properties.description;

                         obj.options = {
                             preset: {
                                 "fillColor": obj.properties.fill,
                                 "fillOpacity": obj.properties["fill-opacity"],
                                 "strokeColor": obj.properties.stroke,
                                 "strokeWidth": 0
                             }
                         }
                     });
               //  Добавляем описание объектов в формате JSON в менеджер объектов.
                 objectManager.add(geoDataObj);
              //   Добавляем объекты на карту.
                 map.geoObjects.add(objectManager);

             }
         }
    })
})