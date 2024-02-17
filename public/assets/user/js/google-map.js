function initMap()
{
  const options = {
    zoom: 10,
    center:{lat:13.391300211231535, lng:121.16590874436679}
  }

  let map = new google.maps.Map(
    document.getElementById('map'),
    options
  )

  let marker = new google.maps.Marker(
    {
      position: {lat:13.391244082497877, lng:121.16588676438288},
      map: map,
      icon: '/assets/user/images/loc.png'
    }
  )
}

initMap()