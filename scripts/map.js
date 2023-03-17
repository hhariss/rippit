async function getLoc() {
  return await fetch("https://ipinfo.io/json").then((response) =>
    response.json()
  );
}

async function getLangLong() {
  return await getLoc()
    .then((res) => res.loc)
    .then((res) => res.split(","));
}

async function showMap() {
  var map = await getLangLong().then((el) => L.map("map").setView(el, 13));
  var marker = await getLangLong().then((el) => L.marker(el).addTo(map));

  marker.bindPopup("IP:" + (await getLoc().then((el) => el.ip))).openPopup();

  const tiles = L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
    attribution:
      '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
  }).addTo(map);

  const locate = L.control.locate().addTo(map);
}

showMap();
