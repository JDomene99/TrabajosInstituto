const menu = document.querySelector("#myLinks");
const showMenu = document.querySelector("#mostrar");
const $buttonLocalidad = document.querySelector("#buttonLocalidad");
const $localidadForm = document.querySelector("#formLocalidad");

showMenu.addEventListener("click", () => {
  window.getComputedStyle(menu).display == "none" ? menu.style.display = "block" : menu.style.display = "none";
});


$buttonLocalidad.addEventListener('click', () => {
  window.getComputedStyle($localidadForm).display == "none" ? $localidadForm.style.display = "block" : $localidadForm.style.display = "none";
});


const $butonSendTextLocalidad = document.querySelector("#enviarLocalidad");
$butonSendTextLocalidad.addEventListener('click', () => {
  const $name = document.querySelector("#nameLocalidad").value;
  console.log($name);

  const infoPais = async () => {
    const key = '&appid=25acedae9f11a0f8f4329506d1037295';
    const url = 'https://api.openweathermap.org/data/2.5/weather?q=';
  
    const endPoint = url + $name +key;
    try {
      const response = await fetch(endPoint, { cache: 'no-cache' });
      if (response.ok) {
        const jsonResponse = await response.json();
        console.log(jsonResponse.weather[0].main);
        const icon = jsonResponse.weather[0].icon + '@2x.png'
        const url2 = 'https://openweathermap.org/img/wn/';
        const $img = document.querySelector('.imagen');
        $img.setAttribute('src', url2+icon);
        
      }
    } catch (e) {
      console.log(e.message);
    }
  
  };
  infoPais();

});

